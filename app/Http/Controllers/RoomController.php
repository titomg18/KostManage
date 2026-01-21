<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::where('user_id', Auth::id())->paginate(10);
        
        $totalRooms = Room::where('user_id', Auth::id())->count();
        $occupiedRooms = Room::where('user_id', Auth::id())->where('status', 'terisi')->count();
        $vacantRooms = Room::where('user_id', Auth::id())->where('status', 'kosong')->count();
        $maintenanceRooms = Room::where('user_id', Auth::id())->where('status', 'maintenance')->count();
        
        return view('room', compact('rooms', 'totalRooms', 'occupiedRooms', 'vacantRooms', 'maintenanceRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|unique:rooms|max:10',
            'tipe_kamar' => 'required|in:standard,deluxe,suite,premium',
            'harga_sewa' => 'required|numeric|min:0',
            'status' => 'required|in:kosong,terisi,maintenance',
            'fasilitas' => 'nullable|string',
            'luas_kamar' => 'nullable|string|max:20',
            'lantai' => 'nullable|string|max:10',
        ]);

        $validated['user_id'] = Auth::id();

        Room::create($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Kamar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        // Authorization: hanya pemilik kamar yang bisa melihat
        if ($room->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        // Authorization: hanya pemilik kamar yang bisa edit
        if ($room->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        // Authorization: hanya pemilik kamar yang bisa update
        if ($room->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'nomor_kamar' => 'required|max:10|unique:rooms,nomor_kamar,' . $room->id,
            'tipe_kamar' => 'required|in:standard,deluxe,suite,premium',
            'harga_sewa' => 'required|numeric|min:0',
            'status' => 'required|in:kosong,terisi,maintenance',
            'fasilitas' => 'nullable|string',
            'luas_kamar' => 'nullable|string|max:20',
            'lantai' => 'nullable|string|max:10',
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Data kamar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        // Authorization: hanya pemilik kamar yang bisa delete
        if ($room->user_id !== Auth::id()) {
            abort(403);
        }
        
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Kamar berhasil dihapus!');
    }

    // Tambahkan method untuk mengosongkan kamar
public function vacateRoom(Room $room)
{
    if ($room->user_id !== Auth::id()) {
        abort(403);
    }

    if ($room->status != 'terisi') {
        return redirect()->back()
            ->with('error', 'Kamar sudah kosong!');
    }

    // Update penyewa status menjadi nonaktif jika ada
    if ($room->penyewa) {
        $room->penyewa->update(['status' => 'nonaktif']);
    }

    // Kosongkan kamar
    $room->update([
        'penyewa_id' => null,
        'status' => 'kosong'
    ]);

    return redirect()->back()
        ->with('success', 'Kamar berhasil dikosongkan!');
}
}
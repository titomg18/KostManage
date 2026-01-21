<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewas = Penyewa::where('user_id', Auth::id())
                    ->with('room') // Eager load relasi kamar
                    ->latest()
                    ->paginate(10);
        
        // Statistik
        $totalPenyewa = Penyewa::where('user_id', Auth::id())->count();
        $aktifPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'aktif')->count();
        $nonaktifPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'nonaktif')->count();
        $menunggakPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'menunggak')->count();
        
        // Ambil kamar yang kosong untuk dropdown
        $kamarKosong = Room::where('user_id', Auth::id())
                        ->where('status', 'kosong')
                        ->get();
        
        return view('penyewa', compact(
            'penyewas',
            'totalPenyewa',
            'aktifPenyewa',
            'nonaktifPenyewa',
            'menunggakPenyewa',
            'kamarKosong'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kamarKosong = Room::where('user_id', Auth::id())
                        ->where('status', 'kosong')
                        ->get();
        
        return view('penyewas.create', compact('kamarKosong'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|digits:16|unique:penyewas',
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'alamat' => 'required|string',
            'pekerjaan' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif,menunggak',
            'room_id' => 'nullable|exists:rooms,id',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
        ]);

        $validated['user_id'] = Auth::id();

        // Simpan penyewa
        $penyewa = Penyewa::create($validated);

        // Jika ada room_id yang dipilih, update kamar
        if ($request->filled('room_id')) {
            $room = Room::where('user_id', Auth::id())
                    ->where('id', $request->room_id)
                    ->where('status', 'kosong')
                    ->first();
            
            if ($room) {
                $room->update([
                    'penyewa_id' => $penyewa->id,
                    'status' => 'terisi'
                ]);
            }
        }

        return redirect()->route('penyewas.index')
            ->with('success', 'Penyewa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('penyewas.show', compact('penyewa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }
        
        $kamarKosong = Room::where('user_id', Auth::id())
                        ->where('status', 'kosong')
                        ->get();
        
        // Tambahkan kamar yang sedang ditempati oleh penyewa ini (jika ada)
        $currentRoom = $penyewa->room;
        if ($currentRoom) {
            $kamarKosong->push($currentRoom);
        }
        
        return view('penyewas.edit', compact('penyewa', 'kamarKosong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|digits:16|unique:penyewas,no_ktp,' . $penyewa->id,
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'alamat' => 'required|string',
            'pekerjaan' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif,menunggak',
            'room_id' => 'nullable|exists:rooms,id',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
        ]);

        // Simpan perubahan penyewa
        $penyewa->update($validated);

        // Proses perubahan kamar
        $currentRoom = $penyewa->room;
        $newRoomId = $request->room_id;

        // Jika ada perubahan kamar
        if ($newRoomId != ($currentRoom ? $currentRoom->id : null)) {
            
            // Kosongkan kamar lama jika ada
            if ($currentRoom) {
                $currentRoom->update([
                    'penyewa_id' => null,
                    'status' => 'kosong'
                ]);
            }
            
            // Isi kamar baru jika dipilih
            if ($newRoomId) {
                $newRoom = Room::where('user_id', Auth::id())
                            ->where('id', $newRoomId)
                            ->first();
                
                if ($newRoom) {
                    $newRoom->update([
                        'penyewa_id' => $penyewa->id,
                        'status' => 'terisi'
                    ]);
                }
            }
        }

        // Jika status penyewa berubah menjadi nonaktif, kosongkan kamar
        if ($penyewa->status == 'nonaktif' && $penyewa->room) {
            $penyewa->room->update([
                'penyewa_id' => null,
                'status' => 'kosong'
            ]);
        }

        return redirect()->route('penyewas.index')
            ->with('success', 'Data penyewa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }
        
        // Kosongkan kamar yang ditempati sebelum menghapus penyewa
        if ($penyewa->room) {
            $penyewa->room->update([
                'penyewa_id' => null,
                'status' => 'kosong'
            ]);
        }
        
        $penyewa->delete();

        return redirect()->route('penyewas.index')
            ->with('success', 'Penyewa berhasil dihapus!');
    }

    /**
     * Update status via AJAX
     */
    public function updateStatus(Request $request, Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:aktif,nonaktif,menunggak'
        ]);

        $oldStatus = $penyewa->status;
        $penyewa->update(['status' => $request->status]);

        // Jika status berubah dari aktif ke nonaktif, kosongkan kamar
        if ($oldStatus == 'aktif' && $request->status == 'nonaktif' && $penyewa->room) {
            $penyewa->room->update([
                'penyewa_id' => null,
                'status' => 'kosong'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status penyewa berhasil diperbarui!',
            'new_status' => $request->status
        ]);
    }

    /**
     * Assign room to penyewa via AJAX
     */
    public function assignRoom(Request $request, Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'room_id' => 'required|exists:rooms,id'
        ]);

        $room = Room::where('user_id', Auth::id())
                ->where('id', $request->room_id)
                ->first();

        // Cek apakah kamar tersedia
        if ($room->status == 'terisi' && $room->penyewa_id != $penyewa->id) {
            return response()->json([
                'success' => false,
                'message' => 'Kamar sudah ditempati oleh penyewa lain!'
            ], 400);
        }

        // Kosongkan kamar lama jika ada
        $oldRoom = $penyewa->room;
        if ($oldRoom) {
            $oldRoom->update([
                'penyewa_id' => null,
                'status' => 'kosong'
            ]);
        }

        // Isi kamar baru
        $room->update([
            'penyewa_id' => $penyewa->id,
            'status' => 'terisi'
        ]);

        // Update status penyewa menjadi aktif
        $penyewa->update(['status' => 'aktif']);

        return response()->json([
            'success' => true,
            'message' => 'Kamar berhasil ditetapkan untuk penyewa!',
            'room' => [
                'nomor_kamar' => $room->nomor_kamar,
                'tipe_kamar' => $room->tipe_kamar,
                'harga_sewa' => number_format($room->harga_sewa, 0, ',', '.')
            ]
        ]);
    }

    /**
     * Remove room assignment via AJAX
     */
    public function removeRoom(Penyewa $penyewa)
    {
        if ($penyewa->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$penyewa->room) {
            return response()->json([
                'success' => false,
                'message' => 'Penyewa tidak memiliki kamar!'
            ], 400);
        }

        $room = $penyewa->room;
        $room->update([
            'penyewa_id' => null,
            'status' => 'kosong'
        ]);

        // Update status penyewa menjadi nonaktif
        $penyewa->update(['status' => 'nonaktif']);

        return response()->json([
            'success' => true,
            'message' => 'Kamar berhasil dikosongkan dari penyewa!',
            'room_nomor' => $room->nomor_kamar
        ]);
    }

    /**
     * Get available rooms for dropdown
     */
    public function getAvailableRooms()
    {
        $rooms = Room::where('user_id', Auth::id())
                    ->where('status', 'kosong')
                    ->select('id', 'nomor_kamar', 'tipe_kamar', 'harga_sewa')
                    ->get()
                    ->map(function($room) {
                        return [
                            'id' => $room->id,
                            'text' => "{$room->nomor_kamar} - {$room->tipe_kamar} (Rp " . number_format($room->harga_sewa, 0, ',', '.') . ")"
                        ];
                    });

        return response()->json($rooms);
    }
}
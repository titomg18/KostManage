<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewas = Penyewa::where('user_id', Auth::id())->latest()->paginate(10);
        
        // Statistik
        $totalPenyewa = Penyewa::where('user_id', Auth::id())->count();
        $aktifPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'aktif')->count();
        $nonaktifPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'nonaktif')->count();
        $menunggakPenyewa = Penyewa::where('user_id', Auth::id())->where('status', 'menunggak')->count();
        
        return view('penyewa', compact(
            'penyewas',
            'totalPenyewa',
            'aktifPenyewa',
            'nonaktifPenyewa',
            'menunggakPenyewa'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyewas.create');
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
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
        ]);

        $validated['user_id'] = Auth::id();

        Penyewa::create($validated);

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
        
        return view('penyewas.edit', compact('penyewa'));
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
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
        ]);

        $penyewa->update($validated);

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

        $penyewa->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status penyewa berhasil diperbarui!',
            'new_status' => $request->status
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Penyewa;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get all payments for this user's tenants
        $payments = Payment::whereHas('penyewa', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with(['penyewa', 'room'])
        ->orderBy('bulan_pembayaran', 'desc')
        ->paginate(10);

        // Get summary data
        $totalPembayaran = Payment::whereHas('penyewa', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->sum('jumlah');

        $totalLunas = Payment::whereHas('penyewa', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'lunas')->sum('jumlah');

        $totalTertunda = Payment::whereHas('penyewa', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'tertunda')->sum('jumlah');

        $totalMenunggu = Payment::whereHas('penyewa', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'menunggu')->sum('jumlah');

        $penyewas = Penyewa::where('user_id', $user->id)->get();
        
        return view('payment', compact('payments', 'totalPembayaran', 'totalLunas', 'totalTertunda', 'totalMenunggu', 'penyewas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penyewa_id' => 'required|exists:penyewas,id',
            'jumlah' => 'required|numeric|min:0',
            'bulan_pembayaran' => 'required|date_format:Y-m',
            'status' => 'required|in:menunggu,lunas,tertunda,dibatalkan',
            'tanggal_pembayaran' => 'nullable|date',
            'metode_pembayaran' => 'nullable|string',
            'no_referensi' => 'nullable|string',
            'keterangan' => 'nullable|string'
        ]);

        $penyewa = Penyewa::find($validated['penyewa_id']);
        
        if ($penyewa->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        $validated['user_id'] = Auth::user()->id;
        $validated['room_id'] = $penyewa->room?->id;

        Payment::create($validated);

        return redirect()->back()->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function update(Request $request, Payment $payment)
    {
        if ($payment->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        $validated = $request->validate([
            'jumlah' => 'required|numeric|min:0',
            'bulan_pembayaran' => 'required|date_format:Y-m',
            'status' => 'required|in:menunggu,lunas,tertunda,dibatalkan',
            'tanggal_pembayaran' => 'nullable|date',
            'metode_pembayaran' => 'nullable|string',
            'no_referensi' => 'nullable|string',
            'keterangan' => 'nullable|string'
        ]);

        $payment->update($validated);

        return redirect()->back()->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy(Payment $payment)
    {
        if ($payment->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        $payment->delete();

        return redirect()->back()->with('success', 'Pembayaran berhasil dihapus');
    }

    public function editData(Payment $payment)
    {
        if ($payment->user_id != Auth::user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($payment);
    }
}

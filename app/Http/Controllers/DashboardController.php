<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Penyewa;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Tidak perlu middleware di sini karena sudah diatur di web.php
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        $userId = $user->id;
        
        // Statistik Kamar
        $totalRooms = Room::where('user_id', $userId)->count();
        $occupiedRooms = Room::where('user_id', $userId)->where('status', 'terisi')->count();
        $vacantRooms = Room::where('user_id', $userId)->where('status', 'kosong')->count();
        $maintenanceRooms = Room::where('user_id', $userId)->where('status', 'maintenance')->count();
        
        // Statistik Penyewa
        $totalPenyewa = Penyewa::where('user_id', $userId)->count();
        $aktifPenyewa = Penyewa::where('user_id', $userId)->where('status', 'aktif')->count();
        $nonaktifPenyewa = Penyewa::where('user_id', $userId)->where('status', 'nonaktif')->count();
        $menunggakPenyewa = Penyewa::where('user_id', $userId)->where('status', 'menunggak')->count();
        
        // Statistik Pembayaran
        $currentMonth = date('Y-m');
        $currentYear = date('Y');
        
        // Pendapatan bulan ini
        $monthlyRevenue = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('status', 'lunas')
        ->where('bulan_pembayaran', 'like', $currentMonth . '%')
        ->sum('jumlah');
        
        // Pendapatan tahun ini
        $yearlyRevenue = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('status', 'lunas')
        ->where('bulan_pembayaran', 'like', $currentYear . '%')
        ->sum('jumlah');
        
        // Data untuk chart pendapatan 6 bulan terakhir
        $revenueData = $this->getRevenueChartData($userId);
        
        // Aktivitas Terbaru
        $recentActivities = $this->getRecentActivities($userId);
        
        // Penyewa baru bulan ini
        $newPenyewaThisMonth = Penyewa::where('user_id', $userId)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->count();
        
        // Pembayaran tertunda
        $pendingPayments = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('status', 'menunggu')
        ->count();
        
        return view('dashboard', compact(
            'totalRooms',
            'occupiedRooms',
            'vacantRooms',
            'maintenanceRooms',
            'totalPenyewa',
            'aktifPenyewa',
            'nonaktifPenyewa',
            'menunggakPenyewa',
            'monthlyRevenue',
            'yearlyRevenue',
            'revenueData',
            'recentActivities',
            'newPenyewaThisMonth',
            'pendingPayments',
            'user'
        ));
    }
    
    private function getRevenueChartData($userId)
    {
        $data = [];
        $labels = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = date('Y-m', strtotime("-{$i} months"));
            $monthName = date('M', strtotime($date));
            
            $revenue = Payment::whereHas('penyewa', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->where('status', 'lunas')
            ->where('bulan_pembayaran', 'like', $date . '%')
            ->sum('jumlah');
            
            $data[] = $revenue / 1000000; // Convert to juta
            $labels[] = $monthName;
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
    
    private function getRecentActivities($userId)
    {
        $activities = [];
        
        // Pembayaran terbaru
        $recentPayments = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with(['penyewa', 'room'])
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        
        foreach ($recentPayments as $payment) {
            $activities[] = [
                'type' => 'payment',
                'title' => $payment->status == 'lunas' ? 'Pembayaran diterima' : 'Pembayaran ' . $payment->status,
                'description' => $payment->penyewa->nama . ' - ' . ($payment->room ? $payment->room->nomor_kamar : 'Kamar') . 
                                ' (Rp ' . number_format($payment->jumlah, 0, ',', '.') . ')',
                'amount' => $payment->jumlah,
                'status' => $payment->status,
                'time' => $payment->created_at->diffForHumans(),
                'icon' => $payment->status == 'lunas' ? 'cash' : 
                         ($payment->status == 'menunggu' ? 'clock' : 'exclamation-triangle')
            ];
        }
        
        // Penyewa baru
        $recentPenyewas = Penyewa::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        foreach ($recentPenyewas as $penyewa) {
            $activities[] = [
                'type' => 'new_tenant',
                'title' => 'Penyewa baru',
                'description' => $penyewa->nama . ' - ' . ($penyewa->room ? $penyewa->room->nomor_kamar : 'Belum ada kamar'),
                'time' => $penyewa->created_at->diffForHumans(),
                'icon' => 'person-plus'
            ];
        }
        
        // Kamar maintenance
        $maintenanceRooms = Room::where('user_id', $userId)
            ->where('status', 'maintenance')
            ->orderBy('updated_at', 'desc')
            ->limit(2)
            ->get();
        
        foreach ($maintenanceRooms as $room) {
            $activities[] = [
                'type' => 'maintenance',
                'title' => 'Maintenance kamar',
                'description' => 'Kamar ' . $room->nomor_kamar . ' dalam perbaikan',
                'time' => $room->updated_at->diffForHumans(),
                'icon' => 'tools'
            ];
        }
        
        // Urutkan berdasarkan waktu terbaru
        usort($activities, function($a, $b) {
            // Convert time to timestamp for comparison
            $timeA = strtotime($a['time'] ?? 'now');
            $timeB = strtotime($b['time'] ?? 'now');
            return $timeB - $timeA;
        });
        
        return array_slice($activities, 0, 4); // Ambil 4 aktivitas terbaru
    }
}
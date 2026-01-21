<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Penyewa;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        
        // Statistik dasar
        $totalRooms = Room::where('user_id', $userId)->count();
        $occupiedRooms = Room::where('user_id', $userId)->where('status', 'terisi')->count();
        $aktifPenyewa = Penyewa::where('user_id', $userId)->where('status', 'aktif')->count();
        $menunggakPenyewa = Penyewa::where('user_id', $userId)->where('status', 'menunggak')->count();
        
        // Pendapatan
        $monthlyRevenue = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('status', 'lunas')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->sum('jumlah');
        
        $yearlyRevenue = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('status', 'lunas')
        ->whereYear('created_at', date('Y'))
        ->sum('jumlah');
        
        // Data untuk chart
        $yearlyRevenueData = $this->getYearlyRevenueData($userId);
        $roomStatusData = [
            'terisi' => $occupiedRooms,
            'kosong' => Room::where('user_id', $userId)->where('status', 'kosong')->count(),
            'maintenance' => Room::where('user_id', $userId)->where('status', 'maintenance')->count()
        ];
        
        $tenantStatusData = [
            'aktif' => $aktifPenyewa,
            'nonaktif' => Penyewa::where('user_id', $userId)->where('status', 'nonaktif')->count(),
            'menunggak' => $menunggakPenyewa
        ];
        
        // Pembayaran terbaru
        $recentPayments = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with(['penyewa', 'room'])
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();
        
        return view('laporan', compact(
            'monthlyRevenue',
            'yearlyRevenue',
            'totalRooms',
            'occupiedRooms',
            'aktifPenyewa',
            'menunggakPenyewa',
            'yearlyRevenueData',
            'roomStatusData',
            'tenantStatusData',
            'recentPayments',
            'user'
        ));
    }
    
    public function pendapatan(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $filter = $request->get('filter', 'monthly');
        $month = $request->get('month', date('m'));
        $year = $request->get('year', date('Y'));
        
        $query = Payment::whereHas('penyewa', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'lunas');
        
        if ($filter == 'monthly') {
            $query->whereMonth('tanggal_pembayaran', $month)
                  ->whereYear('tanggal_pembayaran', $year);
            $period = Carbon::create($year, $month, 1)->format('F Y');
        } else {
            $query->whereYear('tanggal_pembayaran', $year);
            $period = $year;
        }
        
        $payments = $query->with(['penyewa', 'room'])
                         ->orderBy('tanggal_pembayaran', 'desc')
                         ->paginate(20);
        
        $totalAmount = $query->sum('jumlah');
        
        // Data untuk chart
        $chartData = $this->getPaymentChartData($userId, $filter, $month, $year);
        
        return view('laporan', compact(
            'payments',
            'totalAmount',
            'filter',
            'month',
            'year',
            'period',
            'chartData',
            'user'
        ))->with([
            'showFilter' => true,
            'filterType' => 'pendapatan'
        ]);
    }
    
    public function kamar(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $status = $request->get('status', 'all');
        
        $query = Room::where('user_id', $userId);
        
        if ($status != 'all') {
            $query->where('status', $status);
        }
        
        $rooms = $query->with('penyewa')
                      ->orderBy('nomor_kamar')
                      ->paginate(20);
        
        $roomStats = [
            'total' => Room::where('user_id', $userId)->count(),
            'terisi' => Room::where('user_id', $userId)->where('status', 'terisi')->count(),
            'kosong' => Room::where('user_id', $userId)->where('status', 'kosong')->count(),
            'maintenance' => Room::where('user_id', $userId)->where('status', 'maintenance')->count()
        ];
        
        return view('laporan', compact(
            'rooms',
            'roomStats',
            'status',
            'user'
        ))->with([
            'showFilter' => true,
            'filterType' => 'kamar'
        ]);
    }
    
    public function penyewa(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $status = $request->get('status', 'all');
        
        $query = Penyewa::where('user_id', $userId);
        
        if ($status != 'all') {
            $query->where('status', $status);
        }
        
        $penyewas = $query->with('room')
                         ->orderBy('nama')
                         ->paginate(20);
        
        $tenantStats = [
            'total' => Penyewa::where('user_id', $userId)->count(),
            'aktif' => Penyewa::where('user_id', $userId)->where('status', 'aktif')->count(),
            'nonaktif' => Penyewa::where('user_id', $userId)->where('status', 'nonaktif')->count(),
            'menunggak' => Penyewa::where('user_id', $userId)->where('status', 'menunggak')->count()
        ];
        
        return view('laporan', compact(
            'penyewas',
            'tenantStats',
            'status',
            'user'
        ))->with([
            'showFilter' => true,
            'filterType' => 'penyewa'
        ]);
    }
    
    private function getYearlyRevenueData($userId)
    {
        $data = [];
        $labels = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = date('Y-m', strtotime("-{$i} months"));
            $monthName = date('M', strtotime($date));
            
            $revenue = Payment::whereHas('penyewa', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->where('status', 'lunas')
            ->where('bulan_pembayaran', 'like', $date . '%')
            ->sum('jumlah');
            
            $data[] = $revenue / 1000000;
            $labels[] = $monthName;
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
    
    private function getPaymentChartData($userId, $filter, $month, $year)
    {
        if ($filter == 'monthly') {
            $data = [];
            $labels = [];
            
            $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;
            
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::create($year, $month, $day)->format('Y-m-d');
                
                $revenue = Payment::whereHas('penyewa', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->where('status', 'lunas')
                ->whereDate('tanggal_pembayaran', $date)
                ->sum('jumlah');
                
                $data[] = $revenue;
                $labels[] = $day;
            }
            
            return [
                'labels' => $labels,
                'data' => $data,
                'type' => 'daily'
            ];
        } else {
            $data = [];
            $labels = [];
            
            for ($m = 1; $m <= 12; $m++) {
                $revenue = Payment::whereHas('penyewa', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->where('status', 'lunas')
                ->whereMonth('tanggal_pembayaran', $m)
                ->whereYear('tanggal_pembayaran', $year)
                ->sum('jumlah');
                
                $data[] = $revenue / 1000000;
                $labels[] = date('M', mktime(0, 0, 0, $m, 1));
            }
            
            return [
                'labels' => $labels,
                'data' => $data,
                'type' => 'monthly'
            ];
        }
    }
}
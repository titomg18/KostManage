<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'penyewa_id',
        'room_id',
        'jumlah',
        'bulan_pembayaran',
        'status',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'no_referensi',
        'keterangan'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_pembayaran' => 'date',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke penyewa
    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }

    // Relasi ke room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Scope untuk pembayaran yang tertunda
    public function scopeTertunda($query)
    {
        return $query->where('status', 'tertunda');
    }

    // Scope untuk pembayaran yang lunas
    public function scopeLunas($query)
    {
        return $query->where('status', 'lunas');
    }

    // Scope untuk pembayaran yang menunggu
    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    // Method untuk format bulan
    public function getBulanIndonesiaAttribute()
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        
        $parts = explode('-', $this->bulan_pembayaran);
        $tahun = $parts[0];
        $bulanKey = $parts[1];
        
        return $bulan[$bulanKey] . ' ' . $tahun;
    }
}

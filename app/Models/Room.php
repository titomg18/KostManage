<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id',
        'penyewa_id', // tambahkan ini
        'nomor_kamar',
        'tipe_kamar',
        'harga_sewa',
        'status',
        'fasilitas',
        'luas_kamar',
        'lantai'
    ];

    protected $casts = [
        'harga_sewa' => 'decimal:2',
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

    // Scope untuk kamar yang kosong
    public function scopeKosong($query)
    {
        return $query->where('status', 'kosong');
    }

    // Scope untuk kamar yang terisi
    public function scopeTerisi($query)
    {
        return $query->where('status', 'terisi');
    }
}
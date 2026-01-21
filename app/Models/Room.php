<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id',
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
}
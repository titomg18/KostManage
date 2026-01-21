<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'no_ktp',
        'no_hp',
        'alamat',
        'email',
        'pekerjaan',
        'status',
        'tanggal_masuk',
        'tanggal_keluar'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kamar (jika nanti ada hubungan)
    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }
}
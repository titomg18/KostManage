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

    // Relasi ke kamar (satu penyewa bisa menempati satu kamar)
    public function room()
    {
        return $this->hasOne(Room::class, 'penyewa_id');
    }

    // Method untuk memeriksa apakah penyewa memiliki kamar
    public function hasRoom()
    {
        return $this->room()->exists();
    }

    // Method untuk mendapatkan nomor kamar yang ditempati
    public function getNomorKamarAttribute()
    {
        return $this->room ? $this->room->nomor_kamar : null;
    }

    // Method untuk mendapatkan tipe kamar yang ditempati
    public function getTipeKamarAttribute()
    {
        return $this->room ? $this->room->tipe_kamar : null;
    }

    // Method untuk mendapatkan harga sewa kamar
    public function getHargaSewaAttribute()
    {
        return $this->room ? $this->room->harga_sewa : null;
    }
}
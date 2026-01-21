<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('penyewa_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('jumlah', 12, 2);
            $table->string('bulan_pembayaran')->comment('Format: YYYY-MM (2026-01)');
            $table->enum('status', ['menunggu', 'lunas', 'tertunda', 'dibatalkan'])->default('menunggu');
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('metode_pembayaran')->nullable()->comment('transfer, tunai, cek');
            $table->string('no_referensi')->nullable()->comment('no rekening, no cek, dll');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            // Indexes untuk performa
            $table->index('penyewa_id');
            $table->index('status');
            $table->index('bulan_pembayaran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};

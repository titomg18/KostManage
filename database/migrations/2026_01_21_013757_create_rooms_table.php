<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_kamar')->unique();
            $table->enum('tipe_kamar', ['standard', 'deluxe', 'suite', 'premium']);
            $table->decimal('harga_sewa', 12, 2);
            $table->enum('status', ['kosong', 'terisi', 'maintenance'])->default('kosong');
            $table->text('fasilitas')->nullable();
            $table->string('luas_kamar')->nullable();
            $table->string('lantai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('nama_pemilik');
            $table->string('jenis_umkm');
            $table->string('harga')->nullable();
            $table->string('alamat');
            $table->string('instagram')->nullable();
            $table->string('shopee')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('no_whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};

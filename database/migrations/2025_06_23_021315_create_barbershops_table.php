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
        Schema::create('barbershops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key untuk user yang memiliki barbershop
            $table->string('name'); // Nama barbershop
            $table->string('address'); // Alamat barbershop
            $table->string('location'); // Lokasi barbershop
            $table->string('description')->nullable(); // Deskripsi barbershop, optional
            $table->time('open_time'); // Jam buka barbershop
            $table->time('close_time'); // Jam tutup barbershop
            $table->string('image')->nullable(); // URL gambar barbershop, optional
            $table->json('services')->nullable(); // Layanan yang ditawarkan, disimpan sebagai JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbershops');
    }
};

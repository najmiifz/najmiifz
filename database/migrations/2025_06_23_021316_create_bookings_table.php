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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('barbershop_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel barbershops
            $table->string('name'); // Nama lengkap pelanggan
            $table->string('service_type'); // Jenis layanan yang dipesan
            $table->dateTime('booking_time'); // Waktu booking
            $table->decimal('total_price', 10, 2); // Total harga layanan
            $table->string('status')->default('pending'); // Status booking, default 'pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

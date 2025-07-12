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
        Schema::table('barbershops', function (Blueprint $table) {
            $table->decimal('average_rating', 3, 2)->default (0.00)->after('services');
            // Menambahkan kolom average_rating untuk menyimpan rating rata-rata barbershop
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barbershops', function (Blueprint $table) {
            $table->dropColumn('average_rating');
            // Menghapus kolom average_rating jika migrasi dibatalkan
        });
    }
};

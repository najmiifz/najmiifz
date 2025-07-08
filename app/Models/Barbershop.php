<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Foreign key untuk user yang memiliki barbershop
        'name', // Nama barbershop
        'address', // Alamat barbershop
        'location', // Lokasi barbershop
        'description', // Deskripsi barbershop, optional
        'open_time', // Jam buka barbershop
        'close_time', // Jam tutup barbershop
        'image', // URL gambar barbershop, optional
        'services' // Layanan yang ditawarkan, disimpan sebagai JSON
    ];
    protected $casts = [
        'services' => 'array', // merubah json dari Database ke array PHP
    ];

    public function user() {
        return $this->belongsTo(User::class); // Relasi ke model User
    }

}

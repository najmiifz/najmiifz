<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barbershop_id',
        'booking_id',
        'rating',
        'comment',
    ];
    public function user()
    {
        return $this->belongsTo(User::class); //relasi ke model User
    }
    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class); //relasi ke model Barbershop
    }
    public function booking(){
        return $this->belongsTo(Booking::class); //relasi ke model Booking
    }
}

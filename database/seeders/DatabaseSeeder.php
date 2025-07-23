<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Barbershop;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // 1. Membuat beberapa akun Mitra
       $mitras = User::factory(10)->mitra()->create();

       // 2. Memberikan setiap Mitra beberapa Barbershop
       $mitras->each(function ($mitra) {
            Barbershop::factory(rand(1,2))->create([
                'user_id' => $mitra->id,
            ]);
       });

       //3. Membuat banyak akun Pelanggan
       $pelanggan = User::factory(100)->create();

       //4. Memberi ID Barbershop pada setiap Booking
       $barbershopIds = Barbershop::pluck('id');

       //5. Membuat booking sebanyak 500 sepanjang tahun terakhir
       foreach ($pelanggan as $customer) {
        for ($i = 0; $i < 5; $i++){ //setiap pelanggan membuat 5 booking
                $barbershop = Barbershop::find($barbershopIds->random());
                $service = collect($barbershop->services)->random(); //ambil acak layanan dari barbershop

                Booking::factory()->create([
                    'user_id' => $customer->id,
                    'barbershop_id' => $barbershop->id,
                    'name' => $customer->name,
                    'services' => [$service['name']],
                    'total_price' => $service['price'],
                ]);

        }
       }
    }
}

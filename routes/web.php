<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/webnajmi', function () {
    return view('webnajmi');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});








// 1. Routing dengan 2 parameter NIM dan Nama
Route::get('/data/{NIM}/{Nama}', function ($NIM, $Nama) {
    return "NIM: $NIM <br> Nama: $Nama";
})->name('data');


// 2. Routing dengan NIM hanya akan ditampilkan jika numeric dan Nama akan ditampilkan jika alphabet
Route::get('/Mahasiswa/{NIM}/{Nama}', function ($NIM, $Nama) {
    if (!is_numeric($NIM)) {
        return "NIM harus berupa angka.";
    }

    if (!ctype_alpha($Nama)) {
        return "Nama harus berupa huruf.";
    }

    return "NIM: $NIM <br> Nama: $Nama";
})->name('info');


// 3. Routing cek-bilangan ganjil/genap
Route::get('/Cek-Bilangan/{bilangan}', function ($bilangan) {
    $bilangan = (int) $bilangan;

    if ($bilangan % 2 === 0) {
        $pesan = "Bilangan $bilangan adalah GENAP.";
    } else {
        $pesan = "Bilangan $bilangan adalah GANJIL.";
    }

    return $pesan;
})->name('cek-bilangan');


// 4. Routing dengan nama deret-bilangan dan parameter bilangan
Route::get('/deret-bilangan/{bilangan}', function ($bilangan) {
    $bilangan = (int) $bilangan;
    $hasil = [];

    if ($bilangan <= 0) {
        return "Masukkan bilangan lebih dari 0.";
    }

    $jenis = ($bilangan % 2 === 0) ? 'Genap' : 'Ganjil';

    for ($i = 1; $i <= $bilangan; $i++) {
        if ($jenis === 'Genap' && $i % 2 === 0) {
            $hasil[] = $i;
        } elseif ($jenis === 'Ganjil' && $i % 2 !== 0) {
            $hasil[] = $i;
        }
    }

    return "Deret Bilangan $jenis sampai $bilangan: " . implode(', ', $hasil);
})->name('deret-bilangan');


// 5. Routing deret Fibonacci dari nilai awal ke nilai akhir
Route::get('/logika/{awal}/{akhir}', function ($awal, $akhir) {
    $awal = (int) $awal;
    $akhir = (int) $akhir;

    if ($awal > $akhir) {
        return "Data Awal Tidak Boleh Lebih Besar";
    }

    $a = 0;
    $b = 1;
    $hasil = [];

    while ($b <= $akhir) {
        if ($b >= $awal) {
            $hasil[] = $b;
        }
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }

    return "Awal = $awal, Akhir = $akhir. Output = Deret Bilangan Fibonacci: " . implode(' ', $hasil);
})->name('logika');



route::get('example', function() {
    return view ('example', [
        'name' => 'NAJMI',
        'age' => '21'
    ]);;
});

route::get('person', [PersonController::class, 'index'])->name('person.index');
route::get('person/create', [PersonController::class, 'create'])->name('person.create');
route::post('person/store',[PersonController::class, 'store'])->name('person.store');
route::get('person/{arg}',[PersonController::class, 'show'])->name('person.show');





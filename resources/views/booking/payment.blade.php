<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Konfirmasi Booking - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #f0d067;
        }
        .navbar { background-color: #1f1f1f !important; }
        .navbar a, .navbar span { color: #f0d067 !important; }
        .step-progress { display: flex; justify-content: center; gap: 50px; margin: 20px 0; }
        .step-progress div { font-weight: 600; color: gray; }
        .step-progress .active { color: #f0d067; }
        .card { border-radius: 15px; border: none; background-color: #1c1c1c; box-shadow: 0 5px 20px rgba(240, 208, 103, 0.1); color: #f0d067; }
        .btn-confirm { background-color: #f0d067; color: #121212; font-weight: 600; padding: 12px; border-radius: 50px; width: 100%; border: none; }
        .btn-confirm:hover { background-color: #e6c85b; color: #121212; }
        .price { color: #f0d067; font-weight: 600; }
        hr { border-color: #f0d067; opacity: 0.2; }
    </style>
</head>
<body>

@include('layouts.header')

<!-- Step Progress -->
<div class="step-progress">
    <div>1. Pilih Layanan & Jadwal</div>
    <div class="active">2. Konfirmasi & Bayar</div>
    <div>3. Booking Berhasil</div>
</div>

<!-- Content -->
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <!-- Ringkasan Booking -->
        <div class="col-lg-7">
            <div class="card p-4">
                <h4 class="fw-bold text-center">Konfirmasi Booking Anda</h4>
                <hr>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('storage/' . $barbershop->image) }}" class="rounded" alt="{{ $barbershop->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                    <div>
                        <h6 class="mb-0">{{ $barbershop->name }}</h6>
                        <small>{{ $barbershop->address }}</small>
                    </div>
                </div>
                <p class="mb-1">Nama Pemesan: <strong>{{ Auth::user()->name }}</strong></p>
                <p class="mb-1">Email: <strong>{{ Auth::user()->email }}</strong></p>
                <p class="mb-1">Layanan: <strong>{{ implode(', ', $details['services']) }}</strong></p>
                <p class="mb-1">Tanggal: <strong>{{ \Carbon\Carbon::parse($details['booking_date'])->format('d F Y') }}</strong></p>
                <p class="mb-1">Jam: <strong>{{ $details['booking_time'] }} WIB</strong></p>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Total Harga:</h5>
                    <h5 class="price mb-0">Rp{{ number_format($details['total_price'], 0, ',', '.') }}</h5>
                </div>
                <hr>

                <div class="mt-3">
                    <h5 class="mb-3">Metode Pembayaran</h5>
                    <div class="alert" style="background-color: #2a2a2a; border-color: #444;">
                        <i class="bi bi-cash-coin me-2"></i>
                        <strong>Bayar di Tempat (Cash on Delivery)</strong>
                        <p class="mb-0 mt-1 small text-white-50">Anda akan membayar langsung di kasir barbershop saat kunjungan Anda.</p>
                    </div>
                </div>

                <form action="{{ route('booking.confirm') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-confirm">
                        <i class="bi bi-check2-circle me-1"></i> Konfirmasi & Selesaikan Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Riwayat Booking - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f0d067;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #1f1f1f !important;
            border-bottom: 1px solid #333;
        }
        .navbar .nav-link, .navbar .navbar-brand, .dropdown-item, .nav-link span {
            color: #f0d067 !important;
        }
        .card-booking {
            background-color: #1c1c1c;
            border: 1px solid #333;
            border-radius: 15px;
            padding: 20px;
            transition: all 0.2s ease-in-out;
        }
        .status {
            font-size: 0.9rem;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 50px;
        }
        .status-Menunggu { background-color: #ffc107; color: #000; }
        .status-Diproses { background-color: #0dcaf0; color: #000; }
        .status-Selesai { background-color: #198754; color: #fff; }
        .status-Dibatalkan { background-color: #dc3545; color: #fff; }
    </style>
</head>
<body>

@include('layouts.header')

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Riwayat Booking Anda</h1>
        <p class="text-muted">Lihat semua jadwal potong rambut Anda di sini.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #198754; color: white; border: none;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" style="background-color: #dc3545; color: white; border: none;">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
        @forelse ($bookings as $booking)
            <div class="col-md-6 col-lg-4">
                <div class="card-booking d-flex flex-column h-100">
                    <div>
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="fw-bold mb-1">{{ $booking->barbershop->name }}</h5>
                            <span class="status status-{{ $booking->status }}">{{ $booking->status }}</span>
                        </div>
                        <p class="text-white-50 small mb-3">{{ $booking->barbershop->location }}</p>
                        <p class="mb-1"><i class="bi bi-calendar-event me-2"></i>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d F Y') }}</p>
                        <p class="mb-1"><i class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB</p>
                        <p class="mb-1"><i class="bi bi-tags-fill me-2"></i>Rp{{ number_format($booking->total_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="mt-auto pt-3">
                        @if ($booking->status == 'Menunggu')
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">Batalkan Booking</button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100" disabled>Batalkan Booking</button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x fs-1 text-muted"></i>
                    <h5 class="mt-3">Anda belum memiliki riwayat booking.</h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-danger mt-3">Cari Barbershop Sekarang</a>
                </div>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

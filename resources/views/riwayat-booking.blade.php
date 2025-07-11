@extends('layouts.pelanggan')

@section('title', 'Riwayat Booking')

@section('content')
    <div class="text-center mb-5">
        <h1 class="fw-bold">Riwayat Booking Anda</h1>
        <p class="text-white-50">Lihat semua jadwal potong rambut Anda di sini.</p>
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
                <div class="card d-flex flex-column h-100 p-3">
                    <div>
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="fw-bold mb-1">{{ $booking->barbershop->name }}</h5>
                            <span class="badge
                                @if($booking->status == 'Selesai') bg-success
                                @elseif($booking->status == 'Diproses') bg-info text-dark
                                @elseif($booking->status == 'Dibatalkan') bg-danger
                                @else bg-warning text-dark @endif">
                                {{ $booking->status }}
                            </span>
                        </div>
                        <p class="text-white-50 small mb-3">{{ $booking->barbershop->location }}</p>
                        <p class="mb-1"><i class="bi bi-calendar-event me-2"></i>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d F Y') }}</p>
                        <p class="mb-1"><i class="bi bi-clock me-2"></i>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB</p>
                        <p class="mb-1"><i class="bi bi-tags-fill me-2"></i>Rp{{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        {{-- NEW: Display Payment Method --}}
                        <p class="mb-1"><i class="bi bi-credit-card me-2"></i>{{ $booking->payment_method ?? 'N/A' }}</p>
                    </div>
                    <div class="mt-auto pt-3">
                        @if ($booking->status == 'Selesai' && !$booking->rating)
                            <button type="button" class="btn btn-gold w-100" data-bs-toggle="modal" data-bs-target="#ratingModal-{{ $booking->id }}">
                                Beri Ulasan
                            </button>
                        @elseif ($booking->status == 'Menunggu' && $booking->payment_status == 'Pending' && $booking->payment_method == 'Online')
                            {{-- Add a button to retry payment if you store the snap_token --}}
                             <a href="#" class="btn btn-warning w-100">Lanjutkan Pembayaran</a>
                        @elseif ($booking->status == 'Menunggu')
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">Batalkan Booking</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-calendar-x fs-1 text-muted"></i>
                <h5 class="mt-3">Anda belum memiliki riwayat booking.</h5>
                <a href="{{ route('dashboard') }}" class="btn btn-gold mt-3">Cari Barbershop Sekarang</a>
            </div>
        @endforelse
    </div>
@endsection

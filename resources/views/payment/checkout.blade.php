@extends('layouts.pelanggan') {{-- Use the new customer layout --}}

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div class="container my-5">
    <div class="step-progress">
        <div>1. Pilih Layanan & Jadwal</div>
        <div class="active">2. Konfirmasi & Bayar</div>
        <div>3. Booking Berhasil</div>
    </div>

    <div class="row g-4 justify-content-center mt-4">
        <div class="col-lg-7">
            <div class="card p-4">
                <h4 class="fw-bold text-center">Konfirmasi Booking Anda</h4>
                <hr>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('storage/' . $barbershop->image) }}" class="rounded" alt="{{ $barbershop->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                    <div>
                        <h6 class="mb-0">{{ $barbershop->name }}</h6>
                        <small class="text-white-50">{{ $barbershop->address }}</small>
                    </div>
                </div>
                <p class="mb-1"><strong>Nama Pemesan:</strong> {{ Auth::user()->name }}</p>
                <p class="mb-1"><strong>Layanan:</strong> {{ implode(', ', $details['services']) }}</p>
                <p class="mb-1"><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($details['booking_date'])->format('d F Y') }}, {{ $details['booking_time'] }} WIB</p>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Total Harga:</h5>
                    <h5 class="price mb-0 fw-bold">Rp{{ number_format($details['total_price'], 0, ',', '.') }}</h5>
                </div>
                <hr>

                {{-- Payment Method Selection --}}
                <div class="mt-3">
                    <h5 class="mb-3">Pilih Metode Pembayaran</h5>
                    <div id="payment-options">
                        {{-- This button will trigger the Midtrans popup --}}
                        <button id="pay-button" class="btn btn-gold w-100 p-3 fw-bold">
                            <i class="bi bi-credit-card me-2"></i>Bayar Sekarang (Online)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Add the Midtrans Snap.js script and payment trigger logic --}}
<script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        // Trigger Snap popup
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                // Redirect to booking history or a success page
                window.location.href = "{{ route('riwayat-booking') }}";
            },
            onPending: function(result){
                alert("Menunggu pembayaran Anda!");
                // Redirect or update UI
                window.location.href = "{{ route('riwayat-booking') }}";
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
            }
        });
    });
</script>
@endpush

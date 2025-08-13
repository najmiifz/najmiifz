<x-app-layout>
    <x-slot name="title">
        Riwayat Bookingan
    </x-slot>

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
                        <p class="mb-1"><i class="bi bi-credit-card me-2"></i>{{ $booking->payment_method ?? 'N/A' }}</p>
                    </div>
                    <div class="mt-auto pt-3">
                        @if ($booking->status == 'Selesai' && !$booking->rating)
                            {{-- This button triggers the modal --}}
                            <button type="button" class="btn btn-gold w-100" data-bs-toggle="modal" data-bs-target="#ratingModal-{{ $booking->id }}">
                                Beri Ulasan
                            </button>
                        @elseif ($booking->status == 'Menunggu')
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">Batalkan Booking</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ======================================================= --}}
            {{-- THE FIX: Add the modal code for each completed booking --}}
            {{-- ======================================================= --}}
            @if ($booking->status == 'Selesai' && !$booking->rating)
            <div class="modal fade" id="ratingModal-{{ $booking->id }}" tabindex="-1" aria-labelledby="ratingModalLabel-{{ $booking->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #1c1c1c; color: #f0d067;">
                        <div class="modal-header" style="border-bottom-color: #333;">
                            <h5 class="modal-title" id="ratingModalLabel-{{ $booking->id }}">Beri Ulasan untuk {{ $booking->barbershop->name }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('rating.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="barbershop_id" value="{{ $booking->barbershop_id }}">
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <label class="form-label">Rating Anda:</label>
                                    {{-- Star rating inputs --}}
                                    <div class="rating-stars" style="direction: rtl;">
                                        <input type="radio" id="star5-{{ $booking->id }}" name="rating" value="5" required/><label for="star5-{{ $booking->id }}" style="font-size: 2rem; color: grey; cursor: pointer;">★</label>
                                        <input type="radio" id="star4-{{ $booking->id }}" name="rating" value="4" /><label for="star4-{{ $booking->id }}" style="font-size: 2rem; color: grey; cursor: pointer;">★</label>
                                        <input type="radio" id="star3-{{ $booking->id }}" name="rating" value="3" /><label for="star3-{{ $booking->id }}" style="font-size: 2rem; color: grey; cursor: pointer;">★</label>
                                        <input type="radio" id="star2-{{ $booking->id }}" name="rating" value="2" /><label for="star2-{{ $booking->id }}" style="font-size: 2rem; color: grey; cursor: pointer;">★</label>
                                        <input type="radio" id="star1-{{ $booking->id }}" name="rating" value="1" /><label for="star1-{{ $booking->id }}" style="font-size: 2rem; color: grey; cursor: pointer;">★</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="comment-{{ $booking->id }}" class="form-label">Ulasan (Opsional):</label>
                                    <textarea class="form-control" id="comment-{{ $booking->id }}" name="comment" rows="3" style="background-color: #2a2a2a; color: #f0d067; border-color: #444;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top-color: #333;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-gold">Kirim Ulasan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            {{-- ======================= END OF FIX ======================== --}}

        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-calendar-x fs-1 text-muted"></i>
                <h5 class="mt-3">Anda belum memiliki riwayat booking.</h5>
                <a href="{{ route('dashboard') }}" class="btn btn-gold mt-3">Cari Barbershop Sekarang</a>
            </div>
        @endforelse
    </div>

    {{-- Add some CSS for the star rating hover effect --}}
    <style>
        .rating-stars input:checked ~ label,
        .rating-stars:not(:checked) > label:hover,
        .rating-stars:not(:checked) > label:hover ~ label {
            color: #f0d067 !important;
        }
        .rating-stars input { display: none; }
    </style>
</x-app-layout>

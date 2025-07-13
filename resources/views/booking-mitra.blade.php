@extends('layouts.mitra')

@section('title', 'Daftar Bookingan')

@section('content')
    <h2 class="fw-bold"><i class="bi bi-calendar-check-fill me-2"></i>Bookingan Pelanggan</h2>
    <p class="text-white-50">Berikut adalah daftar pelanggan yang telah melakukan booking di barbershop Anda.</p>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #198754; color: white; border: none;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-4" style="background-color: #1c1c1c; border-color: #333;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Nomor WhatsApp</th>
                            <th>Tanggal & Waktu</th>
                            <th>Status Saat Ini</th>
                            <th width="30%">Ubah Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name ?? 'Pelanggan Dihapus' }}</td>
                                <td>{{ $booking->user->phone_number ?? 'Tidak Tersedia' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d F Y, H:i') }}</td>
                                <td>
                                    <span class="badge
                                        @if($booking->status == 'Selesai') bg-success
                                        @elseif($booking->status == 'Diproses') bg-info text-dark
                                        @elseif($booking->status == 'Dibatalkan') bg-danger
                                        @else bg-warning text-dark @endif">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('mitra.bookings.status.update', $booking->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <select name="status" class="form-select" style="background-color: #2a2a2a; color: #f0d067; border-color: #444;">
                                                <option value="Menunggu" @if($booking->status == 'Menunggu') selected @endif>Menunggu</option>
                                                <option value="Diproses" @if($booking->status == 'Diproses') selected @endif>Diproses</option>
                                                <option value="Selesai" @if($booking->status == 'Selesai') selected @endif>Selesai</option>
                                                <option value="Dibatalkan" @if($booking->status == 'Dibatalkan') selected @endif>Dibatalkan</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-gold">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Belum ada data bookingan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

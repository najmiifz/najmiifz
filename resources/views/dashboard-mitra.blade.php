@extends('layouts.mitra')

@section('title', 'Dashboard Mitra')

@section('content')
    <h2 class="fw-bold">Halo, Mitra!</h2>
    <p class="text-white-50">Selamat datang di Dashboard HayuCukur. Berikut adalah ringkasan bisnis Anda hari ini.</p>

    {{-- Stats Section --}}
    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-journal-text display-4 me-4"></i>
                    <div>
                        <h6 class="card-title text-white-50">Total Booking</h6>
                        <p class="card-text fs-4 fw-bold mb-0">{{ $totalBookings }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-calendar-day display-4 me-4"></i>
                    <div>
                        <h6 class="card-title text-white-50">Booking Hari Ini</h6>
                        <p class="card-text fs-4 fw-bold mb-0">{{ $todayBookings }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-cash-coin display-4 me-4"></i>
                    <div>
                        <h6 class="card-title text-white-50">Pendapatan Hari Ini</h6>
                        <p class="card-text fs-4 fw-bold mb-0">Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Section --}}
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <h5 class="card-title mb-0">Statistik Booking</h5>
                        <div class="btn-group" id="chart-filter-buttons" role="group">
                            <a href="#" data-range="weekly" class="btn btn-sm btn-gold">7 Hari</a>
                            <a href="#" data-range="monthly" class="btn btn-sm btn-outline-gold">30 Hari</a>
                            <a href="#" data-range="yearly" class="btn btn-sm btn-outline-gold">1 Tahun</a>
                        </div>
                    </div>
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation Section --}}
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <a href="{{ route('mitra.bookings.index') }}" class="text-decoration-none card-link">
                <div class="card nav-card h-100 p-3">
                    <h5 class="card-title card-link-title"><i class="bi bi-calendar-check-fill me-2"></i>Bookingan Pelanggan</h5>
                    <p class="card-text text-white-50">Lihat semua daftar bookingan pelanggan yang masuk.</p>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-4">
            <a href="{{ route('mitra.barbershops.index') }}" class="text-decoration-none card-link">
                <div class="card nav-card h-100 p-3">
                    <h5 class="card-title card-link-title"><i class="bi bi-scissors me-2"></i>Kelola Barbershop</h5>
                    <p class="card-text text-white-50">Edit nama, alamat, dan info lainnya dari barbershop kamu.</p>
                </div>
            </a>
        </div>
    </div>
@endsection

@push('page-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const initialData = {!! json_encode($initialChartData) !!};
        const ctx = document.getElementById('bookingChart').getContext('2d');

        const bookingChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: initialData.labels,
                datasets: [{
                    label: 'Jumlah Booking',
                    data: initialData.data,
                    backgroundColor: 'rgba(240, 208, 103, 0.2)',
                    borderColor: 'rgba(240, 208, 103, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, ticks: { color: '#adb5bd', stepSize: 1 }, grid: { color: 'rgba(255, 255, 255, 0.1)' } },
                    x: { ticks: { color: '#adb5bd' }, grid: { display: false } }
                },
                plugins: { legend: { display: false } }
            }
        });

        const filterButtons = document.querySelectorAll('#chart-filter-buttons .btn');
        const chartDataUrl = "{{ route('mitra.chart.data') }}";

        filterButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                filterButtons.forEach(btn => {
                    btn.classList.remove('btn-gold');
                    btn.classList.add('btn-outline-gold');
                });
                this.classList.add('btn-gold');
                this.classList.remove('btn-outline-gold');

                const range = this.dataset.range;

                fetch(`${chartDataUrl}?range=${range}`)
                    .then(response => response.json())
                    .then(data => {
                        bookingChart.data.labels = data.labels;
                        bookingChart.data.datasets[0].data = data.data;
                        bookingChart.update();
                    });
            });
        });
    });
</script>
@endpush

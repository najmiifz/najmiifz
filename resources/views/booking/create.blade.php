<x-app-layout>
    <div class="step-progress mt-4">
        <div class="active">1. Pilih Layanan & Jadwal</div>
        <div>2. Konfirmasi & Bayar</div>
        <div>3. Booking Berhasil</div>
    </div>

    <div class="container my-5">
        <h2 class="text-center fw-bold mb-4">Formulir Booking untuk {{ $barbershop->name }}</h2>

        {{-- Use the new, simpler route in the form action --}}
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            {{-- This hidden input is now very important --}}
            <input type="hidden" name="barbershop_id" value="{{ $barbershop->id }}">
            <input type="hidden" name="total_price" id="total_price_input" value="0">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h4 class="mb-4">Pilih Layanan</h4>
                        <div class="mb-3">
                            <select class="form-select" id="service_id" name="service_id" required>
                                <option value="" selected disabled>Pilih salah satu layanan</option>
                                @foreach($barbershop->services as $index => $service)
                                    <option value="{{ $index }}">{{ $service['name'] }} ({{ $service['duration'] }} menit) - Rp{{ number_format($service['price'], 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-4">Pilih Jadwal</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="booking_date" class="form-label">Tanggal</label>
                                <input type="date" id="booking_date" name="booking_date" class="form-control" value="{{ old('booking_date') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="booking_time" class="form-label">Jam</label>
                                <select class="form-select" id="booking_time" name="booking_time" required disabled>
                                    <option selected disabled>Pilih tanggal dan layanan dulu</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Total Biaya: <span id="totalHarga">Rp0</span></h5>
                            <button type="submit" class="btn btn-danger btn-lg">
                                Lanjut ke Pembayaran <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@push('scripts')
{{-- The JavaScript for real-time availability goes here --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('booking_date');
        const serviceSelect = document.getElementById('service_id');
        const timeSelect = document.getElementById('booking_time');
        const totalHargaSpan = document.getElementById('totalHarga');
        const totalHargaInput = document.getElementById('total_price_input');
        const barbershopId = '{{ $barbershop->id }}';
        const services = @json($barbershop->services);

        function updateTotal() {
            const selectedServiceId = serviceSelect.value;
            if (selectedServiceId !== "" && services[selectedServiceId]) {
                const price = services[selectedServiceId].price;
                totalHargaSpan.innerText = 'Rp' + price.toLocaleString('id-ID');
                totalHargaInput.value = price;
            } else {
                totalHargaSpan.innerText = 'Rp0';
                totalHargaInput.value = 0;
            }
        }

        async function fetchAvailableTimes() {
            const selectedDate = dateInput.value;
            const selectedServiceId = serviceSelect.value;

            updateTotal();

            if (!selectedDate || selectedServiceId === "") {
                timeSelect.disabled = true;
                timeSelect.innerHTML = '<option selected disabled>Pilih tanggal dan layanan dulu</option>';
                return;
            }

            timeSelect.innerHTML = '<option>Loading...</option>';
            timeSelect.disabled = true;

            try {
                const url = `/booking/${barbershopId}/availability?date=${selectedDate}&service_id=${selectedServiceId}`;
                const response = await fetch(url);
                if (!response.ok) throw new Error('Network response was not ok');

                const availableSlots = await response.json();

                timeSelect.innerHTML = '';
                if (availableSlots.length > 0) {
                    timeSelect.disabled = false;
                    timeSelect.innerHTML = '<option selected disabled>Pilih salah satu jam</option>';
                    availableSlots.forEach(slot => {
                        const option = document.createElement('option');
                        option.value = slot;
                        option.textContent = slot;
                        timeSelect.appendChild(option);
                    });
                } else {
                    timeSelect.disabled = true;
                    timeSelect.innerHTML = '<option selected disabled>Tidak ada jadwal tersedia</option>';
                }
            } catch (error) {
                console.error('Fetch error:', error);
                timeSelect.disabled = true;
                timeSelect.innerHTML = '<option selected disabled>Gagal memuat jadwal</option>';
            }
        }

        dateInput.addEventListener('change', fetchAvailableTimes);
        serviceSelect.addEventListener('change', fetchAvailableTimes);

        // If there's an old value for service (from a validation error), trigger the functions
        if(serviceSelect.value) {
            fetchAvailableTimes();
        }
    });
</script>
@endpush

</x-app-layout>

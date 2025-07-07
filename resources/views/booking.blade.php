{{-- resources/views/booking.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    {{-- ... your head content ... --}}
</head>
<body>

@include('layouts.header')

<div class="container mb-5">
    <form action="{{ route('booking.store') }}" method="POST"> {{-- The form tag starts here --}}
        @csrf
        <input type="hidden" name="barbershop_id" value="{{ $barbershop->id }}">
        <input type="hidden" name="total_price" id="total_price_input" value="0">

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card p-4">
                    <h4 class="mb-4">Siapa yang booking?</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="first_name" class="form-control" placeholder="Nama Depan *" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang *" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <input type="email" name="email" class="form-control" placeholder="Email *" value="{{ Auth::user()->email }}" required>
                    </div>
                    {{-- ... other inputs with name attributes ... --}}
                    <div class="mb-3">
                        <label class="form-label">Pilih Layanan</label>
                        <div class="form-check">
                          <input class="form-check-input layanan" name="services[]" type="checkbox" value="Potong Rambut" data-price="50000" id="layanan1">
                          <label class="form-check-label" for="layanan1">Potong Rambut <span class="price">Rp 50.000</span></label>
                        </div>
                        {{-- Add name="services[]" and data-price to other checkboxes --}}
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                          <label class="form-label">Tanggal</label>
                          <input type="date" name="booking_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Jam</label>
                          <input type="time" name="booking_time" class="form-control" required>
                        </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-5">
                {{-- ... your booking detail section ... --}}
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-next">
                <i class="bi bi-check-circle me-1"></i> BOOK APPOINTMENT
            </button>
        </div>
    </form> {{-- The form tag ends here --}}
</div>

<script>
  const checkboxes = document.querySelectorAll('.layanan');
  const totalHargaSpan = document.getElementById('totalHarga');
  const totalHargaInput = document.getElementById('total_price_input');

  checkboxes.forEach(item => {
    item.addEventListener('change', () => {
      let total = 0;
      checkboxes.forEach(c => {
        if (c.checked) {
          total += parseInt(c.dataset.price); // Use data-price attribute
        }
      });
      totalHargaSpan.innerText = 'Rp ' + total.toLocaleString('id-ID');
      totalHargaInput.value = total; // Update the hidden input
    });
  });
</script>
</body>
</html>

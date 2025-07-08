<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Barbershop Tersimpan - Mitra Hayu Cukur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
    }
    .sidebar {
      width: 250px;
      background-color: #B22222;
      color: white;
      min-height: 100vh;
      padding: 2rem 1rem;
      position: fixed;
    }
    .sidebar h4 {
      font-weight: bold;
      margin-bottom: 2rem;
      display: flex;
      align-items: center;
    }
    .sidebar h4 img {
      width: 35px;
      height: 35px;
      margin-right: 10px;
      border-radius: 50%;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin-bottom: 1rem;
      font-size: 1.1rem;
    }
    .sidebar a:hover {
      background-color: #9f1f1f;
      padding: 0.5rem;
      border-radius: 8px;
    }
    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }
    .content-box {
      background-color: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .section-title {
      font-weight: bold;
      margin-top: 2rem;
      margin-bottom: 1rem;
    }
    .info-label {
      font-weight: 600;
      color: #555;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    {{-- Dashboard Link --}}
    <a href="{{ route('dashboard.mitra') }}"><i class="bi bi-house-door-fill"></i> Dashboard</a>

    {{-- Booking Link --}}
    <a href="{{ route('mitra.bookings.index') }}"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>

    {{-- Barbershop Management Link --}}
    <a href="{{ route('mitra.barbershops.index') }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>

    {{-- Logout Link --}}
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
        <div class="content-box">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h4><i class="bi bi-pencil-square"></i> Edit Detail Barbershop</h4>
            <form method="POST" action="{{ route('mitra.barbershop.update', $barbershop->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="text-center my-3">
                    <p class="mb-2">Foto Saat Ini:</p>
                    <img src="{{ asset('storage/' . $barbershop->image) }}" alt="Foto Barbershop" class="img-fluid rounded shadow-sm" style="max-width: 350px;">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ubah Foto Barbershop (Opsional)</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="nama" class="form-label">Nama Barbershop</label>
                <input type="text" id="nama" name="name" class="form-control" value="{{ $barbershop->name }}" required>
                </div>
                <hr>
                <h4>Layanan</h4>
                <div id="services-container">
                    @foreach($barbershop->services as $service)
                    <div class="row g-3 mb-2 align-items-center">
                        <div class="col-md-5"><input type="text" name="service_name[]" class="form-control" value="{{ $service['name'] }}" required></div>
                        <div class="col-md-3"><input type="number" name="service_price[]" class="form-control" value="{{ $service['price'] }}" required></div>
                        <div class="col-md-3"><input type="number" name="service_duration[]" class="form-control" value="{{ $service['duration'] }}" required></div>
                        <div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.parentElement.remove()">X</button></div>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-service-btn" class="btn btn-secondary mt-2">Tambah Layanan</button>
                <hr>

                <button type="submit" class="btn btn-danger w-100 mt-3">
                    <i class="bi bi-save me-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('add-service-btn').addEventListener('click', function() {
            const container = document.getElementById('services-container');
            const serviceDiv = document.createElement('div');
            serviceDiv.classList.add('row', 'g-3', 'mb-2', 'align-items-center');
            serviceDiv.innerHTML = `
                <div class="col-md-5"><input type="text" name="service_name[]" class="form-control" placeholder="Nama Layanan" required></div>
                <div class="col-md-3"><input type="number" name="service_price[]" class="form-control" placeholder="Harga (Rp)" required></div>
                <div class="col-md-3"><input type="number" name="service_duration[]" class="form-control" placeholder="Durasi (menit)" required></div>
                <div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.parentElement.remove()">X</button></div>
            `;
            container.appendChild(serviceDiv);
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Barbershop - Mitra Hayu Cukur</title>
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
    .form-container {
      background-color: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .form-container h4 {
      margin-bottom: 1.5rem;
      font-weight: bold;
      color: #B22222;
    }
    .form-label {
      font-weight: 500;
      color: #333;
    }
    .btn-danger {
      background-color: #B22222;
      border: none;
    }
    .btn-danger:hover {
      background-color: #9f1f1f;
    }
    .card-layanan {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 1rem;
      background-color: #fdfdfd;
      transition: 0.2s;
    }
    .card-layanan:hover {
      box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="#"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="#"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="#"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
        <div class="form-container">
            <h4><i class="bi bi-scissors"></i> Tambah Barbershop Baru</h4>
            <form method="POST" action="{{ route('mitra.barbershop.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label for="nama" class="form-label">Nama Barbershop</label>
                <input type="text" id="nama" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea id="alamat" name="address" class="form-control" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" id="kota" name="location" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">Jam Buka</label>
                    <input type="time" id="jam_buka" name="open_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jam_tutup" class="form-label">Jam Tutup</label>
                    <input type="time" id="jam_tutup" name="close_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto Barbershop</label>
                    <input type="file" id="gambar" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                <textarea id="deskripsi" name="description" class="form-control" rows="3" required></textarea>
                </div>

                <hr>
                <h4>Layanan</h4>
                <div id="services-container">
                    </div>
                <button type="button" id="add-service-btn" class="btn btn-secondary mt-2">Tambah Layanan</button>
                <hr>

                <button type="submit" class="btn btn-danger w-100 mt-3">
                <i class="bi bi-check-circle-fill me-2"></i> Simpan Barbershop
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

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
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; margin: 0; }
    .sidebar { width: 250px; background-color: #B22222; color: white; min-height: 100vh; padding: 2rem 1rem; position: fixed; }
    .sidebar h4 { font-weight: bold; margin-bottom: 2rem; display: flex; align-items: center; }
    .sidebar h4 img { width: 35px; height: 35px; margin-right: 10px; border-radius: 50%; }
    .sidebar a { color: white; text-decoration: none; display: block; margin-bottom: 1rem; font-size: 1.1rem; }
    .sidebar a:hover { background-color: #9f1f1f; padding: 0.5rem; border-radius: 8px; }
    .main-content { margin-left: 250px; padding: 2rem; }
    .form-container { background-color: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
    .form-container h4 { margin-bottom: 1.5rem; font-weight: bold; }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="#"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="#"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="#"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <div class="main-content">
    <div class="form-container">
      <h4><i class="bi bi-scissors"></i> Kelola Barbershop</h4>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barbershop</label>
          <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea id="alamat" name="alamat" class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
          <label for="kota" class="form-label">Kota</label>
          <select id="kota" name="kota" class="form-select" required>
            <option value="">-- Pilih Kota --</option>
            <optgroup label="Aceh">
              <option>Banda Aceh</option>
              <option>Sabang</option>
              <option>Langsa</option>
              <option>Lhokseumawe</option>
              <option>Subulussalam</option>
            </optgroup>
            <optgroup label="DKI Jakarta">
              <option>Jakarta Barat</option>
              <option>Jakarta Pusat</option>
              <option>Jakarta Selatan</option>
              <option>Jakarta Timur</option>
              <option>Jakarta Utara</option>
            </optgroup>
            <optgroup label="Jawa Barat">
              <option>Bandung</option>
              <option>Bekasi</option>
              <option>Bogor</option>
              <option>Cimahi</option>
              <option>Cirebon</option>
            </optgroup>
            <optgroup label="Lainnya">
              <option>Medan</option>
              <option>Surabaya</option>
              <option>Denpasar</option>
              <option>Makassar</option>
            </optgroup>
          </select>
        </div>
        <div class="mb-3">
          <label for="jam_buka" class="form-label">Jam Buka</label>
          <input type="time" id="jam_buka" name="jam_buka" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="jam_tutup" class="form-label">Jam Tutup</label>
          <input type="time" id="jam_tutup" name="jam_tutup" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Foto Barbershop</label>
          <input type="file" id="gambar" name="gambar" class="form-control">
        </div>

        <!-- Layanan -->
        <div class="mb-3">
          <label class="form-label fw-bold">Layanan Barbershop</label>
          <div class="row g-3">
            <!-- Cukur Rambut -->
            <div class="col-md-4">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h6 class="fw-bold mb-2">Cukur Rambut</h6>
                  <div class="mb-2">
                    <label class="form-label">Harga</label>
                    <input type="number" name="layanan[cukur_rambut][harga]" class="form-control" placeholder="contoh: 25000" required>
                  </div>
                  <div>
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="layanan[cukur_rambut][durasi]" class="form-control" placeholder="contoh: 30" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Hairstyling -->
            <div class="col-md-4">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h6 class="fw-bold mb-2">Hairstyling</h6>
                  <div class="mb-2">
                    <label class="form-label">Harga</label>
                    <input type="number" name="layanan[hairstyling][harga]" class="form-control" placeholder="contoh: 30000" required>
                  </div>
                  <div>
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="layanan[hairstyling][durasi]" class="form-control" placeholder="contoh: 40" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Creambath -->
            <div class="col-md-4">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h6 class="fw-bold mb-2">Creambath</h6>
                  <div class="mb-2">
                    <label class="form-label">Harga</label>
                    <input type="number" name="layanan[creambath][harga]" class="form-control" placeholder="contoh: 35000" required>
                  </div>
                  <div>
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="layanan[creambath][durasi]" class="form-control" placeholder="contoh: 45" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-danger mt-4">Simpan Perubahan</button>
      </form>
    </div>
  </div>

</body>
</html>

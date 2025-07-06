<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayu Cukur - Semua Barbershop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .barber-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.07);
            transition: transform 0.3s ease;
        }
        .barber-card:hover {
            transform: translateY(-5px);
        }
        .barber-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    @include('layouts.header')

    {{-- CONTENT --}}
    <div class="container py-5">
        <h2 class="fw-bold text-center mb-4"><i class="bi bi-shop me-2"></i>Semua Barbershop di Bandung</h2>
        <div class="row">
            {{-- Dummy data barber --}}
            @php
                $barbers = [
                    [
                        'id' => 1,
                        'name' => "The Cut Garage",
                        'location' => "Jl. Sudirman No. 12",
                        'image' => "https://images.unsplash.com/photo-1599351431202-1811c4373413?q=80&w=1974&auto=format&fit=crop",
                        'rating' => "4.8",
                        'review' => "250+"
                    ],
                    [
                        'id' => 2,
                        'name' => "Gentlemen's Cut",
                        'location' => "Jl. Merdeka No. 55",
                        'image' => "https://images.unsplash.com/photo-1622288432454-2415b74c4424?q=80&w=1964&auto=format&fit=crop",
                        'rating' => "4.9",
                        'review' => "400+"
                    ],
                    [
                        'id' => 3,
                        'name' => "King's Barbershop",
                        'location' => "Jl. Dago No. 8",
                        'image' => "https://images.unsplash.com/photo-1605497788044-5a32c7ba384b?q=80&w=1974&auto=format&fit=crop",
                        'rating' => "4.7",
                        'review' => "180+"
                    ]
                    // Tambahkan lebih banyak jika ingin
                ];
            @endphp

            @foreach ($barbers as $barber)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="barber-card">
                    <img src="{{ $barber['image'] }}" alt="{{ $barber['name'] }}">
                    <div class="p-4">
                        <h5 class="fw-bold">{{ $barber['name'] }}</h5>
                        <p class="text-muted mb-2"><i class="bi bi-geo-alt-fill me-1"></i> {{ $barber['location'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="bi bi-star-fill text-warning"></i> {{ $barber['rating'] }} ({{ $barber['review'] }})</span>
                            <a href="{{ route('booking.create', $barber['id']) }}" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="text-center py-4 bg-light">
        <small class="text-muted">&copy; 2025 HayuCukur. All Rights Reserved.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

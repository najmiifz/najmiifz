<style>
    /* Style for the navbar transition */
    .navbar {
        transition: top 0.3s ease-in-out;
    }
</style>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container-fluid">
        {{-- Logo and Brand Name --}}
        <a class="navbar-brand fw-bold" href="{{ route('beranda') }}">
            <img src="/images/logocukur.png" alt="Logo" height="60" class="me-2 rounded">
            HayuCukur
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            {{-- Auth Links (Right Side) --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                @guest
                    {{-- SHOWS WHEN USER IS NOT LOGGED IN --}}
                    <li class="nav-item">
                        <a href="{{ route('pilih-akun-mitra') }}" class="nav-link">For Partners</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pilih-akun-pelanggan') }}" class="btn btn-danger">Register</a>
                    </li>
                @endguest

                @auth
                    {{-- SHOWS WHEN USER IS LOGGED IN --}}

                    {{-- Customer-specific Links (from booking.blade.php) --}}
                    @if(Auth::user()->role == 'pelanggan')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat-booking') }}"><i class="bi bi-clock-history me-1"></i>My Bookings</a>
                        </li>
                    @endif

                    {{-- Partner-specific Links --}}
                    @if(Auth::user()->role == 'mitra')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.mitra') }}"><i class="bi bi-speedometer2 me-1"></i>My Dashboard</a>
                        </li>
                    @endif

                    {{-- User Dropdown Menu (for both roles) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener("scroll", function() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (currentScroll > lastScrollTop && currentScroll > navbar.offsetHeight) {
            // Scroll Down
            navbar.style.top = `-${navbar.offsetHeight}px`; // Hides the navbar
        } else {
            // Scroll Up
            navbar.style.top = "0"; // Shows the navbar
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }, false);
</script>

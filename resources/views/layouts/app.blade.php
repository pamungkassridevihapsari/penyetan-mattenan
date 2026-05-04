<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Penyetan Mattenan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --mattenan-red: #b42318;
            --mattenan-ink: #231f20;
            --mattenan-leaf: #2f6f4e;
        }

        body {
            color: var(--mattenan-ink);
            background: #fffaf4;
        }

        .navbar,
        .footer {
            background: #1f1b1c;
        }

        .brand-mark {
            color: #ffd166;
            font-weight: 800;
            letter-spacing: .02em;
        }

        .btn-mattenan {
            --bs-btn-bg: var(--mattenan-red);
            --bs-btn-border-color: var(--mattenan-red);
            --bs-btn-hover-bg: #8f1c13;
            --bs-btn-hover-border-color: #8f1c13;
            --bs-btn-color: #fff;
            --bs-btn-hover-color: #fff;
        }

        .hero {
            min-height: 68vh;
            background:
                linear-gradient(90deg, rgba(31, 27, 28, .88), rgba(31, 27, 28, .48)),
                url('https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=1600&q=80') center/cover;
        }

        .menu-image {
            height: 220px;
            object-fit: cover;
            background: #eee2d2;
        }

        .admin-thumb {
            width: 84px;
            height: 64px;
            object-fit: cover;
            background: #eee2d2;
        }

        .identity-band {
            background: #fff;
            border-top: 1px solid #f1dfc7;
            border-bottom: 1px solid #f1dfc7;
        }
    </style>
</head>
<body>
    @php($business = config('business'))
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand brand-mark" href="{{ route('home') }}">{{ $business['name'] }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('menus.public') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Profil Usaha</a></li>
                    @if(session('is_admin'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.menus.index') }}">Admin</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-light" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="btn btn-sm btn-warning" href="{{ route('login') }}">Portal Admin</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success mb-0">{{ session('success') }}</div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="footer text-white py-4 mt-5">
        <div class="container">
            <div class="row g-3 align-items-start">
                <div class="col-md-6">
                    <div class="fw-semibold small">{{ $business['name'] }}</div>
                    <div class="text-white-50 small">{{ $business['category'] }}</div>
                    <div class="text-white-50 small">{{ $business['address'] }}</div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="text-white-50 small">Area layanan: {{ $business['service_area'] }}</div>
                    <div class="text-white-50 small">Jam buka: {{ $business['hours_summary'] }}</div>
                    <div class="text-white-50 small">Kontak: {{ $business['phone'] }}</div>
                    <a class="link-light small" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($business['maps_query']) }}" target="_blank" rel="noopener">Google Maps</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Penyetan Mattenan')</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
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

        .navbar .nav-link.active {
            color: #ffd166;
            font-weight: 700;
        }

        .navbar .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 3px;
            background: #ffd166;
            border-radius: 999px;
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

        .menu-card .card-body {
            display: flex;
            flex-direction: column;
        }

        .menu-title-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 1rem;
            align-items: start;
        }

        .menu-title {
            min-width: 0;
            line-height: 1.25;
        }

        .menu-price {
            color: var(--mattenan-red);
            font-weight: 800;
            min-width: 92px;
            text-align: right;
            white-space: nowrap;
        }

        .menu-action {
            margin-top: auto;
            padding-top: 1rem;
        }

        .menu-list-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 1rem;
            align-items: start;
        }

        @media (max-width: 575.98px) {
            .menu-title-row,
            .menu-list-row {
                grid-template-columns: 1fr;
            }

            .menu-price {
                min-width: 0;
                text-align: left;
            }
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

        .profile-hero-card {
            min-height: 100%;
            border-radius: .5rem;
            overflow: hidden;
            background:
                linear-gradient(90deg, rgba(31, 27, 28, .88), rgba(31, 27, 28, .38)),
                url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1200&q=80') center/cover;
        }

        .auth-shell {
            min-height: calc(100vh - 180px);
            display: flex;
            align-items: center;
        }

        .auth-card {
            overflow: hidden;
            border: 0;
            border-radius: .75rem;
            box-shadow: 0 1rem 3rem rgba(31, 27, 28, .12);
        }

        .auth-panel {
            background:
                linear-gradient(135deg, rgba(31, 27, 28, .92), rgba(180, 35, 24, .78)),
                url('https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=900&q=80') center/cover;
        }

        .modal-content {
            border: 0;
            border-radius: .75rem;
        }

        .notice-content {
            overflow: hidden;
        }

        .notice-content::before {
            content: "";
            display: block;
            height: 5px;
            background: linear-gradient(90deg, #198754, #8fd19e);
        }

        .modal-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fff1e8;
            color: var(--mattenan-red);
            font-weight: 800;
        }

        .modal-icon-success {
            background: #e8f7ef;
            color: #198754;
            box-shadow: 0 0 0 8px rgba(25, 135, 84, .08);
        }

        .btn-success-soft {
            --bs-btn-bg: #198754;
            --bs-btn-border-color: #198754;
            --bs-btn-color: #fff;
            --bs-btn-hover-bg: #146c43;
            --bs-btn-hover-border-color: #146c43;
            --bs-btn-hover-color: #fff;
        }

        .menu-pagination {
            display: flex;
            justify-content: center;
        }

        .menu-pagination .pagination {
            align-items: center;
            gap: .25rem;
            justify-content: center;
            margin-bottom: 0;
        }

        .menu-pagination .page-link {
            min-width: 2.25rem;
            height: 2.25rem;
            padding: .35rem .65rem;
            border-radius: .4rem;
            color: var(--mattenan-ink);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .92rem;
            line-height: 1;
        }

        .menu-pagination .page-item:first-child .page-link,
        .menu-pagination .page-item:last-child .page-link {
            font-size: .95rem;
            font-weight: 700;
        }

        .menu-pagination .page-item.active .page-link {
            background: var(--mattenan-red);
            border-color: var(--mattenan-red);
            color: #fff;
        }

        .menu-pagination .page-item.disabled .page-link {
            color: #9b9188;
            background: #f7efe6;
        }
    </style>
</head>
<body>
    @php($business = config('business'))
    @php($currentRoute = request()->route()?->getName())
    @php($cartCount = collect(session('cart', []))->sum('quantity'))
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand brand-mark" href="{{ route('home') }}">{{ $business['name'] }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link @if($currentRoute === 'home') active @endif" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link @if($currentRoute === 'menus.public') active @endif" href="{{ route('menus.public') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link @if($currentRoute === 'about') active @endif" href="{{ route('about') }}">Profil Usaha</a></li>
                    <li class="nav-item">
                        <a class="nav-link position-relative @if($currentRoute === 'cart.index') active @endif" href="{{ route('cart.index') }}">
                            &#128722;
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: var(--mattenan-red); font-size: 0.65rem;">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                    @if(session('is_admin'))
                        <li class="nav-item"><a class="nav-link @if(str_starts_with($currentRoute ?? '', 'admin.')) active @endif" href="{{ route('admin.menus.index') }}">Admin</a></li>
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

    <div class="modal fade" id="appNoticeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content notice-content shadow">
                <div class="modal-body p-4 text-center">
                    <div class="modal-icon modal-icon-success mb-3">&#10003;</div>
                    <h2 class="h5 fw-bold mb-2" id="appNoticeTitle">Berhasil</h2>
                    <p class="text-secondary mb-4" id="appNoticeMessage"></p>
                    <button type="button" class="btn btn-success-soft px-4" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="appConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-body p-4">
                    <div class="d-flex gap-3">
                        <div class="modal-icon">?</div>
                        <div>
                            <h2 class="h5 fw-bold mb-2" id="appConfirmTitle">Konfirmasi</h2>
                            <p class="text-secondary mb-0" id="appConfirmMessage"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-mattenan" id="appConfirmButton">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const noticeMessage = @json(session('success'));
            if (noticeMessage) {
                document.getElementById('appNoticeMessage').textContent = noticeMessage;
                bootstrap.Modal.getOrCreateInstance(document.getElementById('appNoticeModal')).show();
            }

            let pendingForm = null;
            const confirmModalElement = document.getElementById('appConfirmModal');
            const confirmModal = bootstrap.Modal.getOrCreateInstance(confirmModalElement);
            const confirmButton = document.getElementById('appConfirmButton');

            document.querySelectorAll('[data-confirm]').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.dataset.confirmed === 'true') {
                        return;
                    }

                    event.preventDefault();
                    pendingForm = form;
                    document.getElementById('appConfirmTitle').textContent = form.dataset.confirmTitle || 'Konfirmasi';
                    document.getElementById('appConfirmMessage').textContent = form.dataset.confirm;
                    confirmButton.textContent = form.dataset.confirmAction || 'Lanjutkan';
                    confirmModal.show();
                });
            });

            confirmButton.addEventListener('click', function () {
                if (!pendingForm) {
                    return;
                }

                pendingForm.dataset.confirmed = 'true';
                confirmModal.hide();
                pendingForm.submit();
            });
        });
    </script>
</body>
</html>

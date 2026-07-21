@extends('layouts.app')

@section('title', 'Penyetan Mattenan')

@section('content')
    @php($business = config('business'))

    <section class="hero d-flex align-items-center text-white">
        <div class="container py-5">
            <div class="col-lg-7">
                <p class="text-warning fw-semibold mb-2">{{ $business['category'] }}</p>
                <h1 class="display-4 fw-bold">{{ $business['name'] }}</h1>
                <p class="lead mt-3 mb-4">{{ $business['tagline'] }} Menyajikan nasi ayam goreng, nasi telur goreng, tahu-tempe goreng, sambal, dan minuman dalam suasana santai.</p>
                <a href="{{ route('menus.public') }}" class="btn btn-mattenan btn-lg">Lihat Menu</a>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <h2 class="h5 fw-bold">Sambal Segar</h2>
                <p class="text-secondary mb-0">Racikan sambal dibuat untuk menemani nasi, ayam goreng, telur, tahu, dan tempe.</p>
            </div>
            <div class="col-md-4">
                <h2 class="h5 fw-bold">Menu Simpel</h2>
                <p class="text-secondary mb-0">Pilihan nasi ayam goreng, nasi telur goreng, tahu, tempe, dan minuman untuk makan harian.</p>
            </div>
            <div class="col-md-4">
                <h2 class="h5 fw-bold">Suasana Santai</h2>
                <p class="text-secondary mb-0">Tempat makan bernuansa kafe kecil yang nyaman untuk sendiri, bersama teman, atau keluarga.</p>
            </div>
        </div>
    </section>

    <section class="identity-band py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
                <div>
                    <p class="text-danger fw-semibold mb-1">Rekomendasi</p>
                    <h2 class="fw-bold mb-0">Menu Favorit</h2>
                </div>
                <a href="{{ route('menus.public') }}" class="btn btn-outline-dark">Lihat Semua Menu</a>
            </div>
            <div class="row g-4">
                @forelse($favoriteMenus as $menu)
                    <div class="col-md-4">
                        <article class="card border-0 shadow-sm h-100 menu-card">
                            @if($menu->image_url)
                                <img src="{{ $menu->image_url }}" class="card-img-top menu-image" alt="{{ $menu->nama }}">
                            @endif
                            <div class="card-body">
                                <span class="badge text-bg-warning mb-2">Favorit</span>
                                <div class="menu-title-row">
                                    <h3 class="h5 fw-bold menu-title">{{ $menu->nama }}</h3>
                                    <span class="menu-price">{{ $menu->price_label }}</span>
                                </div>
                                <p class="text-secondary">{{ $menu->deskripsi }}</p>
                                <div class="menu-action">
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-sm btn-mattenan">Tambah ke Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">Menu favorit belum tersedia.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <p class="text-danger fw-semibold mb-1">Baru Ditambahkan</p>
                <h2 class="fw-bold mb-0">Menu Terbaru</h2>
            </div>
        </div>
        <div class="row g-4">
            @forelse($newMenus as $menu)
                <div class="col-md-4">
                    <article class="card border-0 shadow-sm h-100 menu-card">
                        @if($menu->image_url)
                            <img src="{{ $menu->image_url }}" class="card-img-top menu-image" alt="{{ $menu->nama }}">
                        @endif
                        <div class="card-body">
                            <span class="badge text-bg-success mb-2">Terbaru</span>
                            <div class="menu-title-row">
                                <h3 class="h5 fw-bold menu-title">{{ $menu->nama }}</h3>
                                <span class="menu-price">{{ $menu->price_label }}</span>
                            </div>
                            <p class="text-secondary">{{ $menu->deskripsi }}</p>
                                <div class="menu-action">
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-dark">Tambah ke Keranjang</button>
                                    </form>
                                </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning mb-0">Menu terbaru belum tersedia.</div>
                </div>
            @endforelse
        </div>
    </section>

    <section class="identity-band py-5">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-4">
                    <p class="text-danger fw-semibold mb-1">Pemesanan</p>
                    <h2 class="fw-bold">Pesan dengan Mudah</h2>
                    <p class="text-secondary mb-0">Pilih menu, tambahkan ke keranjang, lalu pilih layanan yang paling nyaman.</p>
                </div>
                <div class="col-lg-8">
                    <div class="row g-3">
                        @foreach($business['order_steps'] as $index => $step)
                            <div class="col-md-4">
                                <div class="bg-white border rounded p-3 h-100">
                                    <div class="badge text-bg-danger mb-3">{{ $index + 1 }}</div>
                                    <h3 class="h6 fw-bold">{{ $step['title'] }}</h3>
                                    <p class="text-secondary mb-0">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge text-bg-light border">Pesan antar</span>
                        <span class="badge text-bg-light border">Bawa pulang</span>
                        <span class="badge text-bg-light border">Makan di tempat</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Daftar Menu - Penyetan Mattenan')

@section('content')
    @php($business = config('business'))
    @php($menusWithImages = $menus->getCollection()->filter->gambar)
    @php($menusWithoutImages = $menus->getCollection()->reject->gambar)

    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <p class="text-danger fw-semibold mb-1">Daftar Menu</p>
                <h1 class="fw-bold mb-0">Pilihan Penyetan</h1>
                <p class="text-secondary mb-0 mt-2">{{ $business['address'] }}</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-outline-dark">Kembali ke Home</a>
        </div>

        @if($menusWithImages->isNotEmpty())
            <div class="row g-4 mb-4">
                @foreach($menusWithImages as $menu)
                    <div class="col-md-6 col-lg-4">
                        <article class="card h-100 shadow-sm border-0 menu-card">
                            <img src="{{ $menu->image_url }}" class="card-img-top menu-image" alt="{{ $menu->nama }}">
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-1 mb-2">
                                    @if($menu->is_favorite)
                                        <span class="badge text-bg-warning">Favorit</span>
                                    @endif
                                    @if($menu->is_new)
                                        <span class="badge text-bg-success">Terbaru</span>
                                    @endif
                                </div>
                                <div class="menu-title-row">
                                    <h2 class="h5 fw-bold menu-title">{{ $menu->nama }}</h2>
                                    <span class="menu-price">{{ $menu->price_label }}</span>
                                </div>
                                <p class="text-secondary mb-0">{{ $menu->deskripsi ?: 'Menu penyetan favorit dari Penyetan Mattenan.' }}</p>
                                <div class="menu-action">
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="number" name="quantity" value="1" min="1" max="99" class="form-control form-control-sm text-center" style="width: 60px;">
                                        <button type="submit" class="btn btn-sm btn-mattenan">Tambah ke Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif

        @if($menusWithoutImages->isNotEmpty())
            <div class="card border-0 shadow-sm">
                <div class="list-group list-group-flush">
                    @foreach($menusWithoutImages as $menu)
                        <div class="list-group-item p-3 p-md-4">
                            <div class="menu-list-row">
                                <div>
                                    <h2 class="h6 fw-bold mb-1">{{ $menu->nama }}</h2>
                                    @if($menu->deskripsi)
                                        <p class="text-secondary mb-0">{{ $menu->deskripsi }}</p>
                                    @endif
                                </div>
                                <div class="text-md-end">
                                    <div class="menu-price">{{ $menu->price_label }}</div>
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline-flex align-items-center gap-1 mt-2">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="number" name="quantity" value="1" min="1" max="99" class="form-control form-control-sm text-center" style="width: 55px;">
                                        <button type="submit" class="btn btn-sm btn-mattenan">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($menus->count() === 0)
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="alert alert-warning">Menu belum tersedia.</div>
                </div>
            </div>
        @endif

        <div class="mt-4">
            {{ $menus->onEachSide(1)->links('vendor.pagination.menu') }}
        </div>
    </section>
@endsection

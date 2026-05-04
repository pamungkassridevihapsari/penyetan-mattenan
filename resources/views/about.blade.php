@extends('layouts.app')

@section('title', 'Identitas Usaha - Penyetan Mattenan')

@section('content')
    @php($business = config('business'))

    <section class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <p class="text-danger fw-semibold mb-1">Identitas Usaha</p>
                <h1 class="display-5 fw-bold">{{ $business['name'] }}</h1>
                <p class="lead text-secondary">{{ $business['short_description'] }}</p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a class="btn btn-mattenan" href="{{ route('menus.public') }}">Lihat Menu</a>
                    <a class="btn btn-outline-dark" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($business['maps_query']) }}" target="_blank" rel="noopener">Buka Google Maps</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <dl class="row mb-0 g-3">
                            <dt class="col-sm-4 text-secondary">Nama Usaha</dt>
                            <dd class="col-sm-8 fw-semibold">{{ $business['name'] }}</dd>

                            <dt class="col-sm-4 text-secondary">Kategori</dt>
                            <dd class="col-sm-8">{{ $business['category'] }}</dd>

                            <dt class="col-sm-4 text-secondary">Alamat</dt>
                            <dd class="col-sm-8">{{ $business['address'] }}</dd>

                            <dt class="col-sm-4 text-secondary">Area Layanan</dt>
                            <dd class="col-sm-8">{{ $business['service_area'] }}</dd>

                            <dt class="col-sm-4 text-secondary">Jam Buka</dt>
                            <dd class="col-sm-8">{{ $business['hours_summary'] }}</dd>

                            <dt class="col-sm-4 text-secondary">Kontak</dt>
                            <dd class="col-sm-8">{{ $business['phone'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="identity-band py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="h4 fw-bold mb-3">Jam Operasional</h2>
                    <div class="list-group shadow-sm">
                        @foreach($business['hours'] as $day => $hour)
                            <div class="list-group-item d-flex justify-content-between gap-3">
                                <span>{{ $day }}</span>
                                <span class="fw-semibold {{ $hour === 'Tutup' ? 'text-danger' : '' }}">{{ $hour }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <p class="text-danger fw-semibold mb-1">Keterangan Tempat</p>
                <h2 class="h4 fw-bold mb-0">Fasilitas dan Info Pengunjung</h2>
            </div>
        </div>

        <div class="row g-3">
            @foreach($business['details'] as $group => $items)
                <div class="col-md-6 col-lg-4">
                    <div class="border rounded bg-white p-3 h-100 shadow-sm">
                        <h3 class="h6 fw-bold mb-3">{{ $group }}</h3>
                        <ul class="list-unstyled mb-0 d-grid gap-2">
                            @foreach($items as $item)
                                <li class="d-flex gap-2">
                                    <span class="text-success fw-bold">✓</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Identitas Usaha - Penyetan Mattenan')

@section('content')
    @php($business = config('business'))

    <section class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="profile-hero-card text-white p-4 p-lg-5 d-flex flex-column justify-content-end shadow-sm">
                    <p class="text-warning fw-semibold mb-1">Identitas Usaha</p>
                    <h1 class="display-5 fw-bold">{{ $business['name'] }}</h1>
                    <p class="lead text-white-50 mb-0">{{ $business['short_description'] }}</p>
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
                            <dd class="col-sm-8">
                                {{ $business['phone'] }}
                                <div class="mt-1">
                                    <a href="{{ $business['instagram_url'] }}" target="_blank" rel="noopener">{{ $business['instagram_label'] }}</a>
                                </div>
                            </dd>
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
                                    <span class="text-success fw-bold">&#10003;</span>
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

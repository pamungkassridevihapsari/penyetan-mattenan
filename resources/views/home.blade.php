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
@endsection

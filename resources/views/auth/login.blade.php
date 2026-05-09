@extends('layouts.app')

@section('title', 'Login Admin - Penyetan Mattenan')

@section('content')
    <section class="auth-shell container py-5">
        <div class="row justify-content-center w-100">
            <div class="col-lg-9">
                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-flex auth-panel text-white p-4 flex-column justify-content-end">
                            <p class="text-warning fw-semibold mb-1">Penyetan Mattenan</p>
                            <h1 class="h3 fw-bold">Portal Pengelolaan Menu</h1>
                            <p class="text-white-50 mb-0">Akses khusus untuk mengatur daftar menu, harga, gambar, dan status rekomendasi.</p>
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body p-4 p-lg-5">
                                <p class="text-danger fw-semibold mb-1">Admin</p>
                                <h2 class="h3 fw-bold mb-4">Masuk ke Portal</h2>
                                <form action="{{ route('login.attempt') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autofocus>
                                        @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-mattenan btn-lg w-100">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

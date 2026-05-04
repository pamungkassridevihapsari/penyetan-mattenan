@extends('layouts.app')

@section('title', 'Login Admin - Penyetan Mattenan')

@section('content')
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 fw-bold mb-3">Portal Admin</h1>
                        <form action="{{ route('login.attempt') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-mattenan w-100">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

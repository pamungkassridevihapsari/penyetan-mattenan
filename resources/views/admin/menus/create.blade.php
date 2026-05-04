@extends('layouts.app')

@section('title', 'Tambah Menu - Penyetan Mattenan')

@section('content')
    <section class="container py-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="fw-bold mb-4">Tambah Menu</h1>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                        @include('admin.menus._form')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

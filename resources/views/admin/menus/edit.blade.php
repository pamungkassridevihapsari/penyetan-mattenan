@extends('layouts.app')

@section('title', 'Edit Menu - Penyetan Mattenan')

@section('content')
    <section class="container py-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="fw-bold mb-4">Edit Menu</h1>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.menus.update', $menu) }}" method="POST" enctype="multipart/form-data" data-confirm="Simpan perubahan pada menu ini?" data-confirm-title="Simpan Perubahan" data-confirm-action="Simpan">
                        @method('PUT')
                        @include('admin.menus._form', ['menu' => $menu])
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

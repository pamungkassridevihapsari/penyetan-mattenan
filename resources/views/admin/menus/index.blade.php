@extends('layouts.app')

@section('title', 'Admin Menu - Penyetan Mattenan')

@section('content')
    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <p class="text-danger fw-semibold mb-1">Admin</p>
                <h1 class="fw-bold mb-0">Kelola Menu</h1>
            </div>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-mattenan">Tambah Menu</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>
                                    @if($menu->gambar)
                                        <img src="{{ $menu->image_url }}" class="rounded admin-thumb" alt="{{ $menu->nama }}">
                                    @else
                                        <div class="rounded admin-thumb d-flex align-items-center justify-content-center text-secondary small">Kosong</div>
                                    @endif
                                </td>
                                <td class="fw-semibold">
                                    {{ $menu->nama }}
                                    <div class="d-flex flex-wrap gap-1 mt-1">
                                        @if($menu->is_favorite)
                                            <span class="badge text-bg-warning">Favorit</span>
                                        @endif
                                        @if($menu->is_new)
                                            <span class="badge text-bg-success">Terbaru</span>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $menu->price_label }}</td>
                                <td class="text-secondary">{{ \Illuminate\Support\Str::limit($menu->deskripsi, 80) }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-outline-dark">Edit</a>
                                        <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">Belum ada menu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $menus->links() }}
        </div>
    </section>
@endsection

@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label for="nama" class="form-label">Nama Menu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $menu->nama ?? '') }}" required>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $menu->harga ?? '') }}" min="0" required>
        @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $menu->deskripsi ?? '') }}</textarea>
        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label for="gambar" class="form-label">Gambar Menu</label>
        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp">
        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @isset($menu)
            @if($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" class="rounded admin-thumb mt-3" alt="{{ $menu->nama }}">
            @endif
        @endisset
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-mattenan">Simpan</button>
</div>

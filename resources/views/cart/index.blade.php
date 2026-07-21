@extends('layouts.app')

@section('title', 'Keranjang - Penyetan Mattenan')

@section('content')
    @php($business = config('business'))

    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <p class="text-danger fw-semibold mb-1">Keranjang</p>
                <h1 class="fw-bold mb-0">Pesanan Anda</h1>
            </div>
            <a href="{{ route('menus.public') }}" class="btn btn-outline-dark">Tambah Menu</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(empty($items))
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-3" style="font-size: 3rem; opacity: 0.3;">&#128722;</div>
                    <h2 class="h5 fw-bold">Keranjang Kosong</h2>
                    <p class="text-secondary mb-4">Belum ada menu yang ditambahkan ke keranjang.</p>
                    <a href="{{ route('menus.public') }}" class="btn btn-mattenan">Lihat Menu</a>
                </div>
            </div>
        @else
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-3">Menu</th>
                                            <th class="text-center" style="width: 140px;">Jumlah</th>
                                            <th class="text-end" style="width: 120px;">Subtotal</th>
                                            <th class="text-center pe-3" style="width: 60px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="ps-3">
                                                    <div class="d-flex align-items-center gap-3">
                                                        @if($item['menu']->image_url)
                                                            <img src="{{ $item['menu']->image_url }}" alt="{{ $item['menu']->nama }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #eee2d2;">
                                                                <span class="text-secondary" style="font-size: 0.75rem;">No Image</span>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <div class="fw-bold">{{ $item['menu']->nama }}</div>
                                                            <div class="text-secondary small">{{ $item['menu']->price_label }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('cart.update', $item['menu']->id) }}" method="POST" class="d-inline-flex align-items-center gap-1">
                                                        @csrf
                                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99" class="form-control form-control-sm text-center" style="width: 60px;" onchange="this.form.submit()">
                                                    </form>
                                                </td>
                                                <td class="text-end fw-bold" style="color: var(--mattenan-red);">
                                                    Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                                </td>
                                                <td class="text-center pe-3">
                                                    <form action="{{ route('cart.remove', $item['menu']->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">&#10005;</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @if(!empty($item['notes']))
                                                <tr>
                                                    <td colspan="4" class="text-secondary small ps-3 pt-0">
                                                        Catatan: {{ $item['notes'] }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Kosongkan Keranjang</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5 fw-bold mb-3">Ringkasan Pesanan</h2>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Subtotal ({{ collect($items)->sum('quantity') }} item)</span>
                                <span class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <hr>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold fs-5" style="color: var(--mattenan-red);">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Layanan <span class="text-danger">*</span></label>
                                    <div class="d-flex flex-column gap-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="service" id="serviceDineIn" value="makan_di_tempat" required>
                                            <label class="form-check-label" for="serviceDineIn">
                                                <span class="fw-semibold">Makan di Tempat</span>
                                                <div class="text-secondary small">Nikmati di tempat</div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="service" id="serviceTakeaway" value="bawa_pulang">
                                            <label class="form-check-label" for="serviceTakeaway">
                                                <span class="fw-semibold">Bawa Pulang</span>
                                                <div class="text-secondary small">Ambil dan bawa sendiri</div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="service" id="serviceDelivery" value="pesan_antar">
                                            <label class="form-check-label" for="serviceDelivery">
                                                <span class="fw-semibold">Pesan Antar</span>
                                                <div class="text-secondary small">Diantar ke alamat Anda</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3" id="addressGroup" style="display: none;">
                                    <label for="address" class="form-label fw-semibold">Alamat Pengiriman <span class="text-danger">*</span></label>
                                    <textarea name="address" id="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-mattenan w-100 btn-lg">
                                    Pesan via WhatsApp
                                </button>

                                <p class="text-secondary small text-center mt-3 mb-0">
                                    Pesanan akan dikirim ke WhatsApp penjual.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    @if(!empty($items))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deliveryRadio = document.getElementById('serviceDelivery');
            const addressGroup = document.getElementById('addressGroup');
            const addressInput = document.getElementById('address');
            const radios = document.querySelectorAll('input[name="service"]');

            radios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    if (deliveryRadio.checked) {
                        addressGroup.style.display = 'block';
                        addressInput.required = true;
                    } else {
                        addressGroup.style.display = 'none';
                        addressInput.required = false;
                        addressInput.value = '';
                    }
                });
            });
        });
    </script>
    @endif
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $menuId => $item) {
            $menu = Menu::find($menuId);
            if ($menu) {
                $subtotal = $menu->harga * $item['quantity'];
                $total += $subtotal;
                $items[] = [
                    'menu' => $menu,
                    'quantity' => $item['quantity'],
                    'notes' => $item['notes'] ?? '',
                    'subtotal' => $subtotal,
                ];
            }
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $cart = session('cart', []);
        $menuId = (string) $request->menu_id;

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] += $request->quantity;
        } else {
            $cart[$menuId] = [
                'quantity' => $request->quantity,
                'notes' => '',
            ];
        }

        session(['cart' => $cart]);

        $menu = Menu::find($request->menu_id);
        $cartCount = collect($cart)->sum('quantity');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "{$menu->nama} ditambahkan ke keranjang.",
                'cart_count' => $cartCount,
            ]);
        }

        return redirect()->route('cart.index')
            ->with('success', "{$menu->nama} ditambahkan ke keranjang.");
    }

    public function update(Request $request, string $menuId)
    {
        $cart = session('cart', []);

        if (! isset($cart[$menuId])) {
            return redirect()->route('cart.index')
                ->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:0|max:99',
        ]);

        if ($request->quantity <= 0) {
            unset($cart[$menuId]);
        } else {
            $cart[$menuId]['quantity'] = $request->quantity;
            $cart[$menuId]['notes'] = $request->input('notes', $cart[$menuId]['notes'] ?? '');
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang diperbarui.');
    }

    public function remove(string $menuId)
    {
        $cart = session('cart', []);
        unset($cart[$menuId]);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Item dihapus dari keranjang.');
    }

    public function clear()
    {
        session(['cart' => []]);

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang dikosongkan.');
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kosong.');
        }

        $request->validate([
            'service' => 'required|in:pesan_antar,bawa_pulang,makan_di_tempat',
            'address' => 'required_if:service,pesan_antar|max:255',
        ]);

        $items = [];
        $total = 0;

        foreach ($cart as $menuId => $item) {
            $menu = Menu::find($menuId);
            if ($menu) {
                $subtotal = $menu->harga * $item['quantity'];
                $total += $subtotal;
                $items[] = [
                    'name' => $menu->nama,
                    'price' => $menu->harga,
                    'quantity' => $item['quantity'],
                    'notes' => $item['notes'] ?? '',
                    'subtotal' => $subtotal,
                ];
            }
        }

        $serviceLabels = [
            'pesan_antar' => 'Pesan Antar',
            'bawa_pulang' => 'Bawa Pulang',
            'makan_di_tempat' => 'Makan di Tempat',
        ];

        $service = $serviceLabels[$request->service];
        $address = $request->input('address') ?? '';

        $message = $this->buildWhatsAppMessage($items, $total, $service, $address);
        $encodedMessage = urlencode($message);
        $whatsappUrl = 'https://wa.me/'.config('business.whatsapp_number').'?text='.$encodedMessage;

        session(['cart' => []]);

        return redirect()->away($whatsappUrl);
    }

    private function buildWhatsAppMessage(array $items, int $total, string $service, ?string $address): string
    {
        $lines = [];
        $lines[] = 'Halo Penyetan Mattenan, saya ingin pesan:';
        $lines[] = '';

        foreach ($items as $index => $item) {
            $line = ($index + 1) . '. ' . $item['name'] . ' x' . $item['quantity'] . ' = Rp ' . number_format($item['subtotal'], 0, ',', '.');
            $lines[] = $line;

            if (! empty($item['notes'])) {
                $lines[] = '   Catatan: ' . $item['notes'];
            }
        }

        $lines[] = '';
        $lines[] = 'Total: Rp ' . number_format($total, 0, ',', '.');
        $lines[] = 'Layanan: ' . $service;

        if ($service === 'Pesan Antar' && ! empty($address)) {
            $lines[] = 'Alamat: ' . $address;
        }

        $lines[] = '';
        $lines[] = 'Terima kasih!';

        return implode("\n", $lines);
    }
}

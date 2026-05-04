<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function publicIndex()
    {
        $menus = Menu::latest()->paginate(9);

        return view('menus.index', compact('menus'));
    }

    public function index()
    {
        $menus = Menu::latest()->paginate(10);

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        return redirect()->route('admin.menus.edit', $menu);
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:150'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }
}

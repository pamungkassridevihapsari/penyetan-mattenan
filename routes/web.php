<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $favoriteMenus = Menu::where('is_favorite', true)->latest()->take(3)->get();
    $newMenus = Menu::where('is_new', true)->latest()->take(3)->get();

    return view('home', compact('favoriteMenus', 'newMenus'));
})->name('home');

Route::get('/tentang', function () {
    return view('about');
})->name('about');

Route::get('/menu', [MenuController::class, 'publicIndex'])->name('menus.public');

Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/tambah', [CartController::class, 'add'])->name('cart.add');
Route::post('/keranjang/update/{menuId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/keranjang/hapus/{menuId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/keranjang/kosongkan', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/menu-images/{path}', function (string $path) {
    if (! Storage::disk('public')->exists($path)) {
        abort(404);
    }

    return Storage::disk('public')->response($path);
})->where('path', '.*')->name('menu.images.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/menus')->name('dashboard');
    Route::resource('menus', MenuController::class);
});

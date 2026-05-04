<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
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

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/menus')->name('dashboard');
    Route::resource('menus', MenuController::class);
});

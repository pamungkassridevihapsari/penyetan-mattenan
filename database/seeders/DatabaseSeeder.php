<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@penyetanmattenan.test'],
            ['name' => 'Admin Penyetan Mattenan']
        );

        Menu::query()->delete();

        $menus = [
            [
                'nama' => 'Nasi Ayam Goreng Mattenan',
                'harga' => 15000,
                'deskripsi' => 'Nasi hangat dengan ayam goreng, sambal, dan lalapan sederhana.',
                'gambar' => 'menu/nasi-ayam-goreng.svg',
                'is_favorite' => true,
                'is_new' => false,
            ],
            [
                'nama' => 'Nasi Telur Goreng',
                'harga' => 10000,
                'deskripsi' => 'Menu simpel berisi nasi hangat, telur goreng, sambal, dan lalapan.',
                'gambar' => 'menu/nasi-telur-goreng.svg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Nasi Tahu Tempe Goreng',
                'harga' => 10000,
                'deskripsi' => 'Nasi dengan tahu goreng, tempe goreng, sambal, dan lalapan.',
                'gambar' => 'menu/tahu-tempe-goreng.svg',
                'is_favorite' => true,
                'is_new' => false,
            ],
            [
                'nama' => 'Paket Hemat Ayam dan Es Teh',
                'harga' => 18000,
                'deskripsi' => 'Nasi ayam goreng dengan sambal dan es teh untuk paket makan praktis.',
                'gambar' => 'menu/paket-hemat.svg',
                'is_favorite' => true,
                'is_new' => true,
            ],
            [
                'nama' => 'Ayam Goreng Sambal',
                'harga' => 12000,
                'deskripsi' => 'Ayam goreng dengan sambal sebagai lauk tambahan.',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Telur Goreng Sambal',
                'harga' => 7000,
                'deskripsi' => 'Telur goreng dengan sambal untuk lauk ringan.',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Tahu Goreng',
                'harga' => 5000,
                'deskripsi' => 'Tahu goreng hangat sebagai lauk tambahan.',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Tempe Goreng',
                'harga' => 5000,
                'deskripsi' => 'Tempe goreng hangat sebagai lauk tambahan.',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Es Teh',
                'harga' => 4000,
                'deskripsi' => 'Teh manis dingin yang segar untuk teman makan.',
                'gambar' => 'menu/es-teh.svg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Teh Hangat',
                'harga' => 3000,
                'deskripsi' => 'Teh manis hangat.',
                'is_favorite' => false,
                'is_new' => false,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

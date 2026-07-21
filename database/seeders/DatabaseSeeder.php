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
            [
                'name' => 'Admin Penyetan Mattenan',
                'password' => 'mattenan123',
            ]
        );

        $menus = [
            [
                'nama' => 'Nasi Ayam Goreng Mattenan',
                'harga' => 15000,
                'deskripsi' => 'Nasi hangat dengan ayam goreng, sambal, dan lalapan sederhana.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Nasi_Ayam_Goreng.jpg',
                'is_favorite' => true,
                'is_new' => false,
            ],
            [
                'nama' => 'Nasi Telur Goreng',
                'harga' => 10000,
                'deskripsi' => 'Menu simpel berisi nasi hangat, telur goreng, sambal, dan lalapan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/f/f0/Fried_rice_with_egg.jpg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Nasi Tahu Tempe Goreng',
                'harga' => 10000,
                'deskripsi' => 'Nasi dengan tahu goreng, tempe goreng, sambal, dan lalapan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Fried_Tofu_%26_Tempeh_%2853783330808%29.jpg',
                'is_favorite' => true,
                'is_new' => false,
            ],
            [
                'nama' => 'Paket Hemat Ayam dan Es Teh',
                'harga' => 18000,
                'deskripsi' => 'Nasi ayam goreng dengan sambal dan es teh untuk paket makan praktis.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/5/57/Ayam_penyet.JPG',
                'is_favorite' => true,
                'is_new' => true,
            ],
            [
                'nama' => 'Ayam Goreng Sambal',
                'harga' => 12000,
                'deskripsi' => 'Ayam goreng dengan sambal sebagai lauk tambahan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Ayam_goreng.JPG',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Telur Goreng Sambal',
                'harga' => 7000,
                'deskripsi' => 'Telur goreng dengan sambal untuk lauk ringan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/9/92/%22Egg_Fried_Rice%22.jpg',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Tahu Goreng',
                'harga' => 5000,
                'deskripsi' => 'Tahu goreng hangat sebagai lauk tambahan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/8/8b/Fried_Tofu.jpg',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Tempe Goreng',
                'harga' => 5000,
                'deskripsi' => 'Tempe goreng hangat sebagai lauk tambahan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/d/dc/Tempeh_%28fried%29.jpg',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Es Teh',
                'harga' => 4000,
                'deskripsi' => 'Teh manis dingin yang segar untuk teman makan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Iced_Tea.jpg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Teh Hangat',
                'harga' => 3000,
                'deskripsi' => 'Teh manis hangat.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Tea_cup.jpg',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Nasi Ayam Komplit',
                'harga' => 20000,
                'deskripsi' => 'Nasi ayam goreng dengan tahu, tempe, sambal, dan lalapan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Nasi_ayam_goreng.jpg',
                'is_favorite' => true,
                'is_new' => true,
            ],
            [
                'nama' => 'Nasi Telur Dadar',
                'harga' => 11000,
                'deskripsi' => 'Nasi hangat dengan telur dadar, sambal, dan lalapan sederhana.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Telur_Dadar.jpg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Paket Tahu Tempe Telur',
                'harga' => 14000,
                'deskripsi' => 'Paket nasi dengan tahu, tempe, telur, sambal, dan lalapan.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Fried_Tofu_%26_Tempeh_%2853783330808%29.jpg',
                'is_favorite' => false,
                'is_new' => true,
            ],
            [
                'nama' => 'Sambal Mattenan',
                'harga' => 3000,
                'deskripsi' => 'Tambahan sambal pedas sebagai pelengkap lauk dan nasi.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Sambalcabe.JPG',
                'is_favorite' => false,
                'is_new' => false,
            ],
            [
                'nama' => 'Es Jeruk',
                'harga' => 5000,
                'deskripsi' => 'Minuman jeruk dingin yang segar.',
                'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Orange_juice_in_a_glass_%284430731914%29.jpg',
                'is_favorite' => false,
                'is_new' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(
                ['nama' => $menu['nama']],
                $menu
            );
        }
    }
}

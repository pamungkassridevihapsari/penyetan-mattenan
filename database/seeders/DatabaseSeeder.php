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
        User::factory()->create([
            'name' => 'Admin Penyetan Mattenan',
            'email' => 'admin@penyetanmattenan.test',
        ]);

        $menus = [
            [
                'nama' => 'Paket Mat 1',
                'harga' => 0,
                'deskripsi' => 'Paket nasi dan lauk sederhana dari referensi menu Penyetan Mattenan. Detail harga dapat dikonfirmasi di tempat.',
            ],
            [
                'nama' => 'Paket Mat 2',
                'harga' => 0,
                'deskripsi' => 'Paket nasi dan lauk sederhana dari referensi menu Penyetan Mattenan. Detail harga dapat dikonfirmasi di tempat.',
            ],
            [
                'nama' => 'Paket Mat 3',
                'harga' => 0,
                'deskripsi' => 'Paket nasi dan lauk sederhana dari referensi menu Penyetan Mattenan. Detail harga dapat dikonfirmasi di tempat.',
            ],
            [
                'nama' => 'Menu Penyetan Mattenan',
                'harga' => 0,
                'deskripsi' => 'Aneka nasi ayam goreng, nasi telur goreng, tahu goreng, tempe goreng, sambal, dan minuman sesuai papan menu.',
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

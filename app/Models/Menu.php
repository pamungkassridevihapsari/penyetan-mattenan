<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'gambar',
        'is_favorite',
        'is_new',
    ];

    protected $casts = [
        'is_favorite' => 'boolean',
        'is_new' => 'boolean',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->gambar) {
            return null;
        }

        if (Str::startsWith($this->gambar, ['http://', 'https://'])) {
            return $this->gambar;
        }

        return asset('storage/'.$this->gambar);
    }

    public function getPriceLabelAttribute(): string
    {
        return $this->harga > 0
            ? 'Rp '.number_format($this->harga, 0, ',', '.')
            : 'Cek harga';
    }

    public function getOrderUrlAttribute(): string
    {
        $message = urlencode("Halo Penyetan Mattenan, saya ingin pesan {$this->nama}.");

        return 'https://wa.me/'.config('business.whatsapp_number').'?text='.$message;
    }
}

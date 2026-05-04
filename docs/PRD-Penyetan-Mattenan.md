# PRD Website Penyetan Mattenan

## 1. Ringkasan Produk

Website Penyetan Mattenan adalah website profil usaha dan katalog menu untuk rumah makan bernuansa kafe/mini resto yang berlokasi di Dungringin, Talunombo, Kecamatan Baturetno, Kabupaten Wonogiri. Website ini membantu calon pelanggan melihat identitas usaha, daftar menu, harga, jam operasional, opsi layanan, serta melakukan pemesanan sederhana melalui WhatsApp.

Website juga menyediakan portal admin sederhana untuk mengelola menu, termasuk nama menu, harga, deskripsi, gambar, status menu favorit, dan status menu terbaru.

## 2. Latar Belakang

Penyetan Mattenan membutuhkan media digital yang lebih rapi dan mudah diakses untuk menampilkan informasi usaha. Informasi yang sebelumnya tersebar melalui Google Maps, papan menu, dan media sosial perlu dikemas dalam satu website yang ringan, profesional, serta mudah dikelola oleh admin.

Website ini tidak dirancang sebagai sistem transaksi penuh seperti marketplace. Fokus utamanya adalah katalog, profil usaha, dan pemesanan awal melalui WhatsApp.

## 3. Tujuan

- Menampilkan identitas Penyetan Mattenan secara profesional.
- Menyediakan katalog menu yang mudah dibaca oleh pelanggan.
- Menonjolkan menu favorit dan menu terbaru di halaman beranda.
- Mempermudah pelanggan melakukan pemesanan melalui WhatsApp.
- Memudahkan admin menambah, mengubah, dan menghapus menu.
- Menyediakan tampilan yang sederhana, elegan, dan cocok untuk rumah makan bernuansa mini resto.

## 4. Target Pengguna

### Pelanggan Umum

Pelanggan yang ingin melihat menu, harga, lokasi, jam buka, dan opsi layanan sebelum datang atau memesan.

### Pelanggan Lokal

Warga sekitar Talunombo, Baturetno, mahasiswa, keluarga, atau kelompok kecil yang mencari tempat makan santai.

### Admin Usaha

Pemilik atau pengelola Penyetan Mattenan yang perlu memperbarui menu, harga, gambar, dan status rekomendasi menu.

## 5. Ruang Lingkup

### Termasuk

- Halaman beranda.
- Halaman daftar menu.
- Halaman profil usaha.
- Portal login admin.
- CRUD menu.
- Upload gambar menu.
- Penanda menu favorit dan menu terbaru.
- Tombol pesan via WhatsApp.
- Popup konfirmasi update/hapus menu.
- Popup sukses setelah tambah/update/hapus menu.
- Favicon bertema makanan/sambal.
- Link Google Maps dan Instagram.

### Tidak Termasuk Untuk Versi Ini

- Checkout online.
- Pembayaran online.
- Keranjang belanja.
- Pelacakan pesanan.
- Multi-admin dengan role kompleks.
- Integrasi API WhatsApp Business.
- Rating dan ulasan pelanggan.

## 6. Informasi Usaha

- Nama usaha: Penyetan Mattenan
- Kategori: Rumah Makan Bernuansa Mini Resto
- Alamat: Dungringin, Talunombo, Kec. Baturetno, Kabupaten Wonogiri, Jawa Tengah 57673
- Kontak: 0878-5332-3655
- Instagram: https://www.instagram.com/penyetanmattenan
- Jam buka:
  - Senin: Tutup
  - Selasa-Minggu: 10.00-21.00
- Opsi layanan:
  - Pesan antar
  - Bawa pulang
  - Makan di tempat
- Pembayaran: Hanya tunai

## 7. Fitur Publik

### 7.1 Beranda

Beranda berfungsi sebagai pintu masuk utama website.

Konten utama:

- Hero section dengan nama Penyetan Mattenan.
- Deskripsi singkat usaha sebagai rumah makan bernuansa mini resto.
- Tombol menuju halaman menu.
- Ringkasan keunggulan:
  - Sambal segar
  - Menu simpel
  - Suasana santai
- Section Menu Favorit.
- Section Menu Terbaru.
- Section cara pesan:
  - Pilih menu
  - Pesan via WhatsApp
  - Pilih layanan

### 7.2 Halaman Menu

Halaman menu menampilkan daftar menu lengkap.

Kebutuhan tampilan:

- Menu bergambar ditampilkan dalam kartu menu.
- Menu tanpa gambar tetap tampil rapi tanpa placeholder gambar kosong.
- Harga harus sejajar dan tidak tercecer.
- Tersedia label Favorit dan Terbaru.
- Setiap menu memiliki tombol pesan via WhatsApp.
- Pagination harus sederhana, rapi, dan tidak menampilkan tombol panah besar.

### 7.3 Profil Usaha

Halaman profil usaha menampilkan identitas usaha secara lengkap.

Konten utama:

- Identitas Penyetan Mattenan.
- Background visual bernuansa rumah makan/mini resto.
- Nama usaha, kategori, alamat, area layanan, jam buka, kontak, dan Instagram.
- Jam operasional per hari.
- Fasilitas dan info pengunjung:
  - Opsi layanan
  - Keunggulan
  - Populer untuk
  - Penawaran
  - Pilihan makan
  - Suasana
  - Tipe pengunjung
  - Pembayaran
  - Anak-anak

### 7.4 Pemesanan

Pemesanan dibuat sederhana melalui WhatsApp.

Alur:

1. Pelanggan melihat menu.
2. Pelanggan menekan tombol Pesan.
3. Website membuka WhatsApp dengan pesan awal berisi nama menu.
4. Pelanggan melanjutkan detail pesanan melalui WhatsApp.

## 8. Fitur Admin

### 8.1 Login Admin

Admin masuk melalui halaman Portal Admin.

Kebutuhan:

- Tampilan login sederhana dan elegan.
- Tidak menampilkan kredensial default di halaman login.
- Jika login berhasil, admin diarahkan ke halaman kelola menu tanpa flash message yang mengganggu.

### 8.2 Kelola Menu

Admin dapat:

- Melihat daftar menu.
- Menambah menu.
- Mengedit menu.
- Menghapus menu.
- Upload gambar menu.
- Menandai menu sebagai Favorit.
- Menandai menu sebagai Terbaru.

Field menu:

- Nama menu
- Harga
- Deskripsi
- Gambar
- Status favorit
- Status terbaru

### 8.3 Popup Admin

Kebutuhan popup:

- Sebelum update menu, tampilkan popup konfirmasi custom.
- Sebelum delete menu, tampilkan popup konfirmasi custom.
- Setelah berhasil tambah/update/delete, tampilkan popup sukses custom.
- Popup sukses menggunakan nuansa hijau, ikon centang, dan tombol OK hijau.
- Popup konfirmasi dan popup sukses harus tampil lebih profesional daripada alert browser bawaan.

## 9. Daftar Menu Awal

Menu awal yang relevan:

- Nasi Ayam Goreng Mattenan
- Nasi Telur Goreng
- Nasi Tahu Tempe Goreng
- Paket Hemat Ayam dan Es Teh
- Ayam Goreng Sambal
- Telur Goreng Sambal
- Tahu Goreng
- Tempe Goreng
- Es Teh
- Teh Hangat
- Nasi Ayam Komplit
- Nasi Telur Dadar
- Paket Tahu Tempe Telur
- Sambal Mattenan
- Es Jeruk

## 10. Kebutuhan UI/UX

- Tampilan sederhana, bersih, dan profesional.
- Warna utama menyesuaikan nuansa sambal/penyetan: merah, gelap, kuning hangat, dan aksen hijau.
- Header harus menunjukkan halaman aktif.
- Halaman menu harus mudah discan.
- Harga menu harus sejajar dan terbaca jelas.
- Tombol pemesanan harus mudah ditemukan.
- Halaman login harus terasa aman, rapi, dan tidak ramai.
- Footer memuat informasi usaha secara kecil dan tidak terlalu mencolok.

## 11. Kebutuhan Teknis

- Framework: Laravel
- Template: Blade
- UI: Bootstrap
- Database: MySQL
- Model utama: Menu
- Controller utama: MenuController
- Storage gambar: Laravel public storage
- Pemesanan: WhatsApp link
- Admin auth: login sederhana berbasis session

## 12. Non-Functional Requirements

- Website harus ringan dan cepat dimuat.
- Tampilan harus responsif di desktop dan mobile.
- Validasi form wajib tersedia di CRUD menu.
- Upload gambar harus dibatasi pada format gambar umum.
- Data sensitif admin tidak ditampilkan di halaman publik.
- Navigasi harus jelas dan konsisten.

## 13. Success Metrics

- Pelanggan dapat menemukan menu dan harga dalam waktu kurang dari 30 detik.
- Pelanggan dapat membuka WhatsApp pemesanan dari halaman menu.
- Admin dapat menambah atau mengubah menu tanpa bantuan developer.
- Informasi profil usaha mudah ditemukan.
- Tampilan website terasa lebih profesional dibanding hanya mengandalkan Google Maps atau papan menu.

## 14. Rencana Pengembangan Lanjutan

Prioritas berikutnya:

- Menambahkan kategori menu.
- Menambahkan filter menu favorit, paket, lauk, dan minuman.
- Menambahkan status ketersediaan menu.
- Menambahkan galeri tempat.
- Menambahkan link langsung ke Instagram di footer.
- Menambahkan halaman promo atau paket khusus.
- Mengganti auth sederhana dengan sistem admin Laravel yang lebih aman.

## 15. Risiko dan Catatan

- Gambar menu yang memakai URL eksternal dapat gagal tampil jika sumber gambar berubah atau koneksi internet tidak tersedia.
- Harga menu perlu disesuaikan dengan harga aktual usaha.
- Sistem pemesanan via WhatsApp belum menghitung total otomatis.
- Jika nanti website digunakan secara publik, kredensial admin harus diganti dan mekanisme login perlu diperkuat.

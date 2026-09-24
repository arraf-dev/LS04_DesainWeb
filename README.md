# LS04 - Software Desain Web

Implementasi katalog produk kreatif berdasarkan Labsheet 04 INF60268. Proyek ini menyediakan dua versi halaman:

- `static/`: kartu produk ditulis langsung pada HTML.
- `dynamic/`: data produk dipisahkan ke `products.php` dan dapat diurutkan berdasarkan harga.

## Aset gambar

Kode memakai aset asli sesuai starter labsheet. Letakkan file berikut di kedua folder `static/assets/` dan `dynamic/assets/`:

```text
hero-original.jpg
product-1-original.jpg
product-2-original.jpg
product-3-original.jpg
```

Tidak ada aset gambar yang dibuat atau diubah oleh implementasi ini.

## Menjalankan halaman statis

Dari folder proyek:

```powershell
php -S localhost:8001 -t static
```

Buka [http://localhost:8001](http://localhost:8001).

Anda juga dapat membuka folder `static` menggunakan Live Server di Visual Studio Code.

## Menjalankan halaman dinamis

Dari folder proyek:

```powershell
php -S localhost:8000 -t dynamic
```

Buka alamat berikut:

- [http://localhost:8000](http://localhost:8000) untuk urutan awal.
- [http://localhost:8000/?sort=price](http://localhost:8000/?sort=price) untuk harga termurah.

## Validasi lokal

Jalankan pemeriksaan struktur proyek:

```powershell
./tests/validate-project.ps1
```

Jalankan pemeriksaan syntax PHP:

```powershell
php -l dynamic/index.php
php -l dynamic/products.php
```

## Bukti praktikum

Gunakan DevTools dengan pengaturan labsheet: viewport 1440 x 900, Disable cache aktif, hard reload, dan Network log dibersihkan sebelum pengujian. Simpan bukti browser, Network, dan Console ke folder `bukti/`.

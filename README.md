# STOK_PRO — Laravel Inventory Management

Aplikasi manajemen stok berbasis Laravel 9, PHP 8.0.30+, MySQL/MariaDB, Bootstrap 5.

## Fitur saat ini
- Login/logout admin
- Dashboard statistik dan peringatan stok minimum
- CRUD produk, kategori, supplier
- Transaksi stok masuk dan keluar dengan pemeriksaan stok
- Riwayat transaksi dan filter tanggal/jenis
- Laporan persediaan dan cetak melalui browser (Print / Save as PDF)
- Responsive desktop dan HP

## Instalasi di Windows + XAMPP
1. Ekstrak folder `STOCKPRO` ke `D:\APK STOK_PRO\STOCKPRO`.
2. Pastikan folder ini memiliki file `artisan` di akar folder.
3. Buka CMD:
   ```bat
   cd /d "D:\APK STOK_PRO\STOCKPRO"
   ```
4. Pastikan PHP dan Composer terpasang:
   ```bat
   php -v
   composer -V
   ```
5. Install dependency:
   ```bat
   composer install
   ```
6. Salin `.env.example` menjadi `.env`:
   ```bat
   copy .env.example .env
   ```
7. Buat database bernama `stockpro` melalui phpMyAdmin, lalu jalankan:
   ```bat
   php artisan key:generate
   php artisan migrate --seed
   ```
8. Jalankan:
   ```bat
   php artisan serve
   ```
9. Buka `http://127.0.0.1:8000`.

## Login demo
- Email: `admin@stockpro.test`
- Password: `Admin123!`

Ganti password demo sebelum aplikasi dipakai secara nyata atau dijual ke pelanggan.

## Catatan
- Bootstrap dan Bootstrap Icons dimuat dari CDN, sehingga tampilan memerlukan internet.
- Cetak laporan menggunakan dialog Print browser; pilih "Save as PDF" untuk membuat PDF.
- Export XLSX, upload gambar, multi-user role granular, backup otomatis, dan pengujian deployment belum termasuk dalam starter ini.
- Jangan unggah `.env` atau kredensial database ke repositori publik.

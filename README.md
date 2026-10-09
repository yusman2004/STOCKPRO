# 📦 STOCKPRO — Sistem Informasi Stok Barang

Aplikasi web untuk mengelola stok barang secara praktis, terstruktur, dan efisien. Projek ini dikembangkan menggunakan Laravel sebagai framework utama.

## 🚀 Fitur Utama

* Pengelolaan data barang
* Pencatatan stok barang
* Tambah, lihat, edit, dan hapus data
* Pengelolaan data menggunakan database
* Antarmuka web yang mudah digunakan

## 🛠️ Teknologi

* **Framework:** Laravel 9
* **Bahasa Pemrograman:** PHP
* **Database:** MySQL
* **Web Server:** Apache
* **Development Environment:** XAMPP

## ⚙️ Cara Instalasi

1. Clone repository ini:

   ```bash
   git clone https://github.com/yusman2004/STOCKPRO.git
   ```

2. Masuk ke folder projek:

   ```bash
   cd STOCKPRO
   ```

3. Instal dependensi Laravel:

   ```bash
   composer install
   ```

4. Salin file konfigurasi `.env.example` menjadi `.env`.

   ```bash
   copy .env.example .env
   ```

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Buat database melalui phpMyAdmin, lalu sesuaikan konfigurasi database pada file `.env`.

7. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

8. Jalankan aplikasi:

   ```bash
   php artisan serve
   ```

9. Buka aplikasi melalui browser:

   `http://127.0.0.1:8000`

## 👨‍💻 Pembuat

**YUSMAN TELAUMBANUA**

Projek ini dibuat oleh YUSMAN TELAUMBANUA sebagai pengembangan aplikasi web untuk pengelolaan stok barang.

---

© 2026 YUSMAN TELAUMBANUA. All rights reserved.

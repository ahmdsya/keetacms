## CMS Keeta
Merupakan Content Management System sederhana yang dapat digunakan untuk membuat website berita dan dibangun menggunakan Framework Laravel 5.8.

## Fitur
- Management berita/artikel
- Add kategori & halaman
- Management komentar
- Management tampilan/tema
- Management menu
- User role (super admin, editor, & writer)

## Requirements
- Composer
- PHP >= 7.1.3

## Cara Install
- Download CMS Keeta secara manual
- Ekstrak projek ke direktori localhost
- Copy & Paste file .env.example menjadi .env
- Buat database baru
- Buka Command Prompt (cmd), lalu masuk ke direktori projek cms keeta
`contoh => cd C:\xampp\htdocs\keeta`
- Ketik kode `composer update` , untuk mendownload semua depedency projek dan tunggu sampai proses selesai
- Kemudian ketik kode berikut `php artisan keeta:install` , untuk proses instalasi cms keeta
- Jika terjadi error saat instalasi, silahkan coba kembali sekali lagi
- Atau ketikan kode berikut `php artisan keeta:install-db` , untuk konfigurasi database. Kemudian `php artisan keeta:install-admin` , untuk konfigurasi akun admin
- Untuk mengakses halaman admin, dapat menambah ` /admin` diakhir url projek
`contoh => http://localhost/keeta/admin`
# Sistem Komisi dan Pembayaran Kredit

## Instalasi Backend (Laravel)
1. Clone repository di gitbash 'git clone https://github.com/jovanmorgan/sistem_penjualan.git 
2. Lalu masuk ke folder backend-sistem-penjualan denngan Perintah cd backend-sistem-penjualan
2. Jalankan `composer install`
3. Jalankan cp .env.example .env untuk Copy `.env.example` ke `.env` lalu sesuaikan database.
4. Jalankan php artisan key:generate untuk membuat key pada laravel
4. Jalankan `php artisan migrate`
5. Jalankan perintah dibawa untuk memasukan data kedalam table marketing dan penjualan :

php artisan db:seed --class=MarketingSeeder
php artisan db:seed --class=PenjualanSeeder

6. Lalu Jalankan `php artisan serve` agar api dapat diakses

7. kunjungi url ini untuk menginstall Frontend React nya ""

## API
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/komisi` | Lihat komisi marketing |
| GET | `/api/pembayaran` | Lihat data pembayaran |
| POST | `/api/pembayaran` | Tambah pembayaran |

## Cara Menggunakan
1. Buka `http://localhost:3000` untuk melihat data komisi dan pembayaran.
2. Gunakan Postman untuk mengirim pembayaran.

## Postman Collection
File `Sistem-Penjualan-postman_collection.json` disertakan dalam repo. setelah mengambilnya anda bisa menghapusnya dari fokder laravel

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

## Instalasi Frontend (React)
1. Masuk ke folder `frontend-sistem-penjualan`
2. Jalankan `npm install`
3. Jalankan `npm run dev`

#Problame 
1. Jika Frontend react tidak dapat menerima api maka buka config/cors.php
 dan perikasa apakah path api sudah sesuai atau url react pada allowed_origins berbeda contoh :

return [
    'paths' => ['api/*', 'http://127.0.0.1:8000/komisi'], // Sesuaikan path yang ingin diizinkan CORS
    'allowed_methods' => ['*'], // Mengizinkan semua metode HTTP
    'allowed_origins' => ['http://localhost:5173'], // Mengizinkan semua asal permintaan (ubah sesuai url react kamu)
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

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
File `postman_collection.json` disertakan dalam repo.

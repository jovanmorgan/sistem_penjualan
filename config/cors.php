<?php

return [
    'paths' => ['api/*', 'http://127.0.0.1:8000'], // Sesuaikan path yang ingin diizinkan CORS
    'allowed_methods' => ['*'], // Mengizinkan semua metode HTTP
    'allowed_origins' => ['http://localhost:5173'], // Mengizinkan semua asal permintaan (ubah sesuai kebutuhan)
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

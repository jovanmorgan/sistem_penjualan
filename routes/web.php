<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketingController;

Route::get('/komisi', [MarketingController::class, 'getKomisi']);

Route::get('/', function () {
    return view('welcome');
});

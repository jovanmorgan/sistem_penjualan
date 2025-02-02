<?php

use App\Http\Controllers\Api\MarketingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\PenjualanController;

Route::get('/komisi', [MarketingController::class, 'getKomisi']);


Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);

Route::get('/penjualan', [PenjualanController::class, 'index']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

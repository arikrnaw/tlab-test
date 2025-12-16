<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\resepController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\KategoriController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API is running',
        'timestamp' => date('Y-m-d H:i:s'),
    ]);
});

Route::apiResource('items', ItemController::class);
Route::apiResource('resep', resepController::class);
Route::apiResource('bahan', BahanController::class);
Route::apiResource('kategori', KategoriController::class);


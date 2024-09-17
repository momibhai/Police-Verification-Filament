<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriminalRecordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/criminal-records', [CriminalRecordController::class, 'index']);

Route::post('/api/search-criminal', [CriminalRecordController::class, 'search']);
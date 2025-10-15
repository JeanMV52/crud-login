<?php

use App\Http\Controllers\ObraController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('obras', [ObraController::class, 'index']);
    Route::get('obras/{id}', [ObraController::class, 'show']);
    Route::post('obras', [ObraController::class, 'store']);
    Route::put('obras/{id}', [ObraController::class, 'update']);
    Route::delete('obras/{id}', [ObraController::class, 'destroy']);
});

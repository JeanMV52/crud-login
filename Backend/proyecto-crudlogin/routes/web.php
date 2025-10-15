<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    // Obtener todas las obras
    Route::get('/obras', [ObraController::class, 'index']);
    
    // Crear una nueva obra
    Route::post('/obras', [ObraController::class, 'store']);
    
    // Obtener una sola obra
    Route::get('/obras/{id}', [ObraController::class, 'show']);
    
    // Actualizar una obra
    Route::put('/obras/{id}', [ObraController::class, 'update']);
    
    // Eliminar una obra
    Route::delete('/obras/{id}', [ObraController::class, 'destroy']);
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

// Asignar rol de admin a un usuario
Route::get('/asignar-rol', [UserController::class, 'index']);

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// Subir imagenes
Route::post('/upload-single', [UploadController::class, 'uploadSingle']);
Route::post('/upload-multiple', [UploadController::class, 'uploadMultiple']);


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

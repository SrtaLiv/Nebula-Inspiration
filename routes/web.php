<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

// Obtener las imagenes de la base de datos
Route::get('home', [ImageController::class, 'home']);
Route::get('/home/{tagId?}', [ImageController::class, 'getImagesByTag']);

// Route::get('/home', function () {
//     $images = Route::get('/images', [ImageController::class, 'getAllImages']);
//     return Inertia::render('home2', [
//         'images' => $images
//     ]);
// })->name('home2');


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

// A VERIFICAR:
// Route::get('/user/{id}', [UserController::class, 'show']);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

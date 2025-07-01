<?php

use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProviderCallbackController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;


/*
    (redirect) dependiendo si hago /auth/google o /auth/discord,
    me redirige a la pagina de login de google o discord.

    (callback) dependiendo donde me haya logeado (google o discord),
    en la configuracion de cada proveedor tengo que poner la el url callback especifico.
    
    por ejemplo, en la configuracion de 
    google tengo que poner: http://tu-dominio.com/auth/google/callback
    y en la de discord: http://tu-dominio.com/auth/discord/callback
*/

Route::get('/auth/{provider}', [OAuthController::class, 'redirect'])->where('provider', 'google|discord');
Route::get('/auth/{provider}/callback', [OAuthController::class, 'callback'])->where('provider', 'google');

// Obtener las imagenes de la base de datos
Route::get('/home', [ImageController::class, 'home'])->name('home');
Route::get('/home/{tagId?}', [ImageController::class, 'getImagesByTag'])->name('tagsById');


// Subir imagenes
Route::post('/upload-single', [UploadController::class, 'uploadSingle']);
Route::post('/upload-multiple', [UploadController::class, 'uploadMultiple']);

Route::get('/', function () {
    return Inertia::render('uploadImage');
})->name('upload');

// Route::get('/home', function () {
//     $images = Route::get('/images', [ImageController::class, 'getAllImages']);
//     return Inertia::render('home2', [
//         'images' => $images
//     ]);
// })->name('home2');


// Asignar rol de admin a un usuario
Route::get('/asignar-rol', [UserController::class, 'index']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// A VERIFICAR:
// Route::get('/user/{id}', [UserController::class, 'show']);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

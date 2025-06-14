<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        if ($user) {
            $user->assignRole('admin');
            return response()->json(['mensaje' => 'Rol asignado con éxito']);
        }

        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }
}

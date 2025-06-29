<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Inertia\Inertia;
use Illuminate\View\View;

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

    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function uploadSingle(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        // ME DA EL USUARIO
        $user = Auth::user();
        $id = $user->id;

        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public'); // guarda en storage/app/public/uploads


        // Guarda en la tabla 'images'
        Image::create([
            'url' => $filePath,
            'user_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Imagen subida correctamente');

        // return response()->json(['mensaje' => 'Imagen subida correctamente']);
    }

    public function uploadMultiple(Request $request)
    {
        $validated = $request->validate([
            'files' => 'required|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        $files = $request->file('files');
        $filePaths = [];

        foreach ($files as $file) {
            $filePaths[] = $file->store('uploads', 'public');
        }

        // Aquí podrías guardar cada archivo en la base de datos si querés
    }
}

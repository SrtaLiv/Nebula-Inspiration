<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Image; // Asegurate de importar tu modelo Image
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;

class ImageController extends Controller
{
    // public function getImagesPorUsuario()
    // {
    //     try {
    //         $user = Auth::user();

    //         // Obtener todas las imágenes del usuario
    //         $images = Image::where('user_id', $user->id)->get();

    //         return response()->json([
    //             'success' => true,
    //             'images' => $images
    //         ]);
    //     } catch (Exception $e) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error fetching images',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function getAllImages(): JsonResponse
    {
        try {
            $images = Image::all(); // Trae todas las imágenes de la base

            return response()->json([
                'success' => true,
                'images' => $images
            ]);
        } catch (\Exception $e) {
            // \Log::error('Error fetching all images: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error fetching images',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function home()
    {

        // $images = Image::where('is_public', true)->get()->orderBy('created_at', 'desc')->limit(20);
        $images = Image::all();
        $tags = Tag::all();

        return Inertia::render(
            'home2', //nomrbe del archivo
            [
                'images' => $images,
                'tags' => $tags
            ]
        );
    }

    public function getImagesByTag($tagId = null)
    {
        try {
            $images = Image::when($tagId, function ($query) use ($tagId) {
                $query->whereHas('tags', function ($q) use ($tagId) {
                    $q->where('tags.id', $tagId); 
                });
            })->get();

            $tags = Tag::all();

            return Inertia::render('home2', [
                'images' => $images,
                'tags' => $tags,
                'activeTag' => $tagId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching images',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    // Si querés todas las imágenes de todas las carpetas de un usuario, podés usar una relación:
    // $images = Image::whereIn('folder_id', function ($query) use ($user) {
    //     $query->select('id')->from('folders')->where('user_id', $user->id);
    // })->get();

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'age',
        'username',
    ];
    use HasFactory;

    // pertenece a muchas imagenes
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}

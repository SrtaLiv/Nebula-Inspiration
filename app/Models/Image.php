<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // esto se agrega por seguridad, evitar ej que pongan admin = true
    protected $fillable = ['url', 'user_id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // pertenece a muchos tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

      // pertenece a muchas folders
      public function folders()
      {
          return $this->belongsToMany(Folder::class);
      }
}

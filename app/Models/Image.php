<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // esto se agrega por seguridad, evitar ej que pongan admin = true
    protected $fillable = ['url', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

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
    ];// como estas? gtodo bien?
}

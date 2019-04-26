<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chooses extends Model
{
    protected $fillable = [
        'title', 'content', 'image',
    ];
}

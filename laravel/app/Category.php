<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'content', 'icon',
    ];
    public function services()
    {
        return $this->hasMany(Service::class,'category_id');
    }
}

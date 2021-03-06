<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title', 'content', 'image','category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}

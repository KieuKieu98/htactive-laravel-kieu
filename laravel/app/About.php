<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title', 'content', 'icon',
    ];

    // public function getTitleUcAttribute() {
    //     return ucfirst($this->title) . ' Mutator';
    // }

    public function getDateTimeFormatAttribute() {
        return $this->created_at->format('d/m/Y');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categories() {
        return $this->pluck('name');
    }
    
    public function article() {
        return $this->belongsTo(Article::class);
    }
}

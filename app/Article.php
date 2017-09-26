<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //permet l'assignement de masse pour les requêtes de masses
    protected $fillable = ['category_id', 'title', 'content', 'image', 'slug'];
    
    public function category() {
        return $this->hasOne(Category::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function scopeSearchByTitle($query, $title) {
        return $query->where('title', 'LIKE', '%'.$title.'%');
    }
    
}

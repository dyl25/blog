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
    
    /**
     * Recherche un ou plusieur article par son titre
     * @param type $query
     * @param string $title Le titre de l'article.
     * @return Collection Les articles correspondant à la recherche
     */
    public function scopeSearchByTitle($query, $title) {
        return $query->where('title', 'LIKE', '%'.$title.'%');
    }
    
    /**
     * Récupère tous les articles à valider
     * @return Collection Les articles à valider
     */
    public function toValidate() {
        $articleIds = $this->pluck('id')->all();
        
        return $this->all()->whereNotIn('validations', $articleIds);
    }
    
}

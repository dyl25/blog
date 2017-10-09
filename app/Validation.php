<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $fillable = ['article_id', 'validator_id', 'status', 'justification'];
    
    public function validator() {
        return $this->belongsTo(User::class);
    }
    
    public function article() {
        return $this->belongsTo(Article::class);
    }
    
    /**
     * 
     * @param int $id L'id de l'article.
     * @return bool true si validé sinon false
     */
    public function isValidated($id) {
        return $this->whereIn('id', [$id])->count() == 1;
    }
}

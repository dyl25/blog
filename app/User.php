<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function role() {
        return $this->belongsTo(Role::class);
    }
    
    public function articles() {
        return $this->hasMany(Article::class);
    }
    
    public function publish(Article $article) {
        $this->articles()->save($article);
    }
    
    public function isAdmin() {
        return $this->role->name == 'admin' || $this->role->name == 'validator';
    }
    
}

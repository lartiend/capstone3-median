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
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getArticles() {

        return  $this->hasMany('App\Article');
    }
    public function getComments() {
        return $this->hasMany(Comment::class);
    }
    public function getBookmarks() {
        return $this->hasMany(Bookmark::class);
    }
}

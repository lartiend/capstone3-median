<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getArticle() {
    	return $this->belongsTo(Article::class, 'article_id', 'id'); //di ko na gets kung bakit article_id
    }
    public function getUser() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

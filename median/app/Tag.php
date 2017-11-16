<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function getArticles() {
    	return $this->belongsToMany(Article::class, 'article_tags', 'article_id', 'tag_id');
    }
}

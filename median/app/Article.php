<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
	public function getTags() {
    	return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
	public function getComments() {
    	return $this->hasMany(Comment::class, 'article_id', 'id');
    }
    public function descComments(){
        return $this->getComments()->orderBy('created_at', 'desc');
    }
}

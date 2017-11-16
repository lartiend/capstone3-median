<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function getArticle() {
        return $this->belongsTo(Article::class);
    }
}

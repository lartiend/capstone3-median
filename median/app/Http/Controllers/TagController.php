<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use DB;

class TagController extends Controller
{
    public function viewTagArticles($tag) {
    	$articles = DB::table('article_tags')->where('tag_id',$tag)->get();
    	return view('tags.show', compact('articles', 'tag'));
    }
}

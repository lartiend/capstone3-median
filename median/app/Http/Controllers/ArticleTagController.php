<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;
use App\article_tag;
use DB;
use Session;

class ArticleTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {
        $tags = $request->input('tag_names');
        $tags = explode(",",strtolower($tags));

        foreach ($tags as $tag) {
            if(Tag::where('name', $tag)->count() == 0) {
                $Tag = new Tag();
                $Tag->name = $tag;
                $Tag->save();
            }
            else {
                Session::flash('flash.level', 'danger');
                Session::flash('flash.content', $tag.' already exist in storage.');
                return redirect("articles/$article->id");
            }
                $tag_name = Tag::where('name', $tag)->first();
                $article_tag = new article_tag();
                $article_tag->article_id    = $article->id;
                $article_tag->tag_id        = $tag_name->id;
                $article_tag->save();
        }
        Session::flash('flash.level', 'info');
        Session::flash('flash.content', 'Tags added.');
        return redirect("articles/$article->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

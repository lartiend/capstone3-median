<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Validator;
use Auth;

class ArticleCommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {
        $rules = array(
            'comment' => 'required|max:500'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("articles/$article->id")
            ->withErrors($validator)
            ->withInput();
        } else {
            $comment = new Comment();
            $comment->user_id       = Auth::user()->id;
            $comment->article_id    = $article->id;
            $comment->description   = $request->comment;
            $comment->save();

            $request->session()->flash('flash_message.level', 'success');
            $request->session()->flash('flash_message.content', 'Comment added!');
            return redirect("articles/$article->id");
        }
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
    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();
        return redirect("articles/$article->id");
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Auth;
use Image;
use Validator;
use Session;
use App\User;
use App\Bookmark;
use App\Follow;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_articles = Article::where('user_id', '=', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(3);
        $TopRatedArticleList = Article::orderBy('rate', 'desc')
                            ->paginate(4);
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->paginate(3);
        $follows = Follow::where('user_id', Auth::user()->id)->paginate(3);
        return view('articles.index', compact('user_articles', 'TopRatedArticleList', 'bookmarks', 'follows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|max:100',
            'content' => 'required',
            'coverPhoto' => 'mimes:jpeg,bmp,png',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("articles/create")
            ->withErrors($validator)
            ->withInput();
        } else {
            $article = new Article();
            $article->title = $request->title;
            $article->content = $request->content;
            $article->user_id = Auth::user()->id;

            if ($request->hasFile('coverPhoto')) {
                $image = $request->file('coverPhoto');
                $image->move('uploads/forums', time()."_".$image->getClientOriginalName());
                $article->image = "uploads/forums/".time()."_".$image->getClientOriginalName();
                $img = Image::make($article->image)->resize(800, 450)->save();
            } else {
                $article->image = 'img/no-image.jpg';
            }

            $article->save();

            $request->session()->flash('flash_message.level', 'success');
            $request->session()->flash('flash_message.content', 'Congratulations! Your post is now online.');
            return redirect("articles/$article->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = array(
            'title' => 'required|max:100',
            'content' => 'required',
            'coverPhoto' => 'mimes:jpeg,bmp,png',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect("articles/$article->id/edit")
            ->withErrors($validator)
            ->withInput();
        } else {
            $article->title = $request->title;
            $article->content = $request->content;

            if ($request->hasFile('coverPhoto')) {
                $image = $request->file('coverPhoto');
                $image->move('uploads/forums', time()."_".$image->getClientOriginalName());
                $article->image = "uploads/forums/".time()."_".$image->getClientOriginalName();
                $img = Image::make($article->image)->resize(800, 450)->save();
            }
            elseif ($article->image != 'img/no-image.jpg') {
                // do nothing
             } 
            else {
                $article->image = 'img/no-image.jpg';
            }

            $article->save();

            $request->session()->flash('flash_message.level', 'success');
            $request->session()->flash('flash_message.content', 'Congratulations! Your post is now online.');
            return redirect("articles/$article->id");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        // return redirect(url()->previous());
        return redirect("articles");
    }
    public function addRate(Article $article)
    {
        $article->rate = $article->rate + 1;
        $article->save();
        return redirect(url()->previous());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Auth;

class BookmarkController extends Controller
{   
    /**
     * Bookmarks an article and save it to currently logged user.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function addToBookmark(Request $request)
    {
    	if (Bookmark::where('article_id', $request->articleID)
            ->where('user_id', Auth::user()->id)->exists() == true) {
    		// if exists, but user clicked on the button, then delete it in DB.
    		$this->destroyToBookmark($request);
    	} else {
	        $bookmark = new Bookmark();
	        $bookmark->article_id 	= $request->articleID;
	        $bookmark->user_id 		= Auth::user()->id;
	        $bookmark->save();
    	}
        return redirect("articles");
    }
    public function destroyToBookmark($request) {
    	$bookmark_id = Bookmark::where('article_id', $request->articleID)
            ->where('user_id', Auth::user()->id)->value('id');

		$bookmark = Bookmark::find($bookmark_id);
		$bookmark->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use App\Follow;
use Auth;

class InterestsController extends Controller
{
    public function viewInterests($user) {
		$bookmarks = Bookmark::where('user_id', $user)
					->orderBy('created_at', 'desc')->get();
		$follows = Follow::where('user_id', $user)
					->orderBy('created_at', 'desc')->get();
		
    	return view('interests.index', compact('bookmarks', 'follows'));
    }
}

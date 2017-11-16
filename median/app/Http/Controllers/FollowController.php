<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;

class FollowController extends Controller
{
    public function addToFollow(Request $request)
	{
		if (Follow::where('author_id', $request->userID)
				->where('user_id', Auth::user()
				->id)->exists() == true) {
		// if exists, but user clicked on the button, then delete it in DB.
			$this->destroyToFollow($request);
		} else {
			$follow = new Follow();
			$follow->author_id	= $request->userID;
			$follow->user_id	= Auth::user()->id;
			$follow->save();
		}
		return redirect(url()->previous());
	}
	public function destroyToFollow($request) {
    	$follow_id = Follow::where('author_id', $request->userID)
				->where('user_id', Auth::user()
				->id)->value('id');

		$follow = Follow::find($follow_id);
		$follow->delete();
    }
}

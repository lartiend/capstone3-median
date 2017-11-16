<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use Illuminate\Support\Facades\Input;
use Auth;

class NewsletterController extends Controller
{
	public function store(Request $request) {

		if (Newsletter::where('email', '=', Input::get('email_newsletter'))->exists()) {
			$request->session()->flash('newsletter_message.level', 'danger');
			$request->session()->flash('newsletter_message.content', 'Email is already a subscriber.');
			if (Auth::user()) {
				return redirect('articles');
			} else {
				return redirect('login');
			}
			
		} else {
			$request->session()->flash('newsletter_message.level', 'success');
			$request->session()->flash('newsletter_message.content', 'You are now subscribed!');

			$newsletter = new Newsletter();
			$newsletter->email = $request->email_newsletter;
			$newsletter->save();
			return redirect('/');
		}
	}
}


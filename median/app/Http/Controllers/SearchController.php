<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchForm () {
    	return view('search.searchform');
    }
    public function searchprocess (Request $request) {
    	dd($request);
    	// create 3 view - for names, tags and both options
    	return view('search.itemResults',compact('results')); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RateController extends Controller
{
    public function viewRate($id) {
    	return view('rate.rate');
    }
}

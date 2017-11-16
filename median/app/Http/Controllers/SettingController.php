<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Validator;

class SettingController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('settings.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('settings.edit', compact('id'));
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
        $rules = array(
            'name' => 'string|max:255|required',
            'username' => 'string|max:255|required',
            'email' => 'string|email|max:255|required',
            'password' => 'string|min:6|required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($request->password != $request->password2) {
            $request->session()->flash('flash_message.level', 'danger');
            $request->session()->flash('flash_message.content', 'Password mismatched!');
            return redirect('settings/'.Auth::id());
        }
        elseif ($validator->fails()) {
            return redirect('settings/'.Auth::id())
            ->withErrors($validator)
            ->withInput();
        }
        else {
            $user = User::find($id);
            $user->name     = $request->name;
            $user->username = $request->username;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $request->session()->flash('flash_message.level', 'success');
            $request->session()->flash('flash_message.content', 'Congratulations! Your information has been updated.');
            return redirect('settings/'.Auth::id());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deactivate = User::find($id);
        $deactivate->status = 2;
        $deactivate->save();
        Auth::logout();
        Session::flash('newsletter_message.level', 'danger');
        Session::flash('newsletter_message.content', 'Your account has been deactivated.');
        return redirect('/');
    }
}

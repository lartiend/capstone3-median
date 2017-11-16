<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->role_id == 1 )
            {
                return $next($request);
            }
        $request->session()->flash('newsletter_message.level', 'danger');
        $request->session()->flash('newsletter_message.content', 'The page is strictly for admin only.');
        return redirect('/');
        }
    }

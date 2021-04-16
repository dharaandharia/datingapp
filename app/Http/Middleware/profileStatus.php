<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserStatus;

class profileStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->status->information){
            return redirect('profile/create');
        }
    
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }

        if(!Auth::user()->status->tendencies){
            return redirect('set');
        }
        return $next($request);
    }
}

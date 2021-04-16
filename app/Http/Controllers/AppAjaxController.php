<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppAjaxController extends Controller
{
    public function like(Request $request){
        DB::table(Auth::user()->id.'_likes')->insert([
            'user_id' => $request->user_id
        ]);
        DB::table($request->user_id.'_fans')->insert([
            'user_id' => Auth::user()->id
        ]);
    }

    public function dislike(Request $request){
        DB::table(Auth::user()->id.'_dislikes')->insert([
            'user_id' => $request->user_id
        ]);
    }
}
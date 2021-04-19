<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;
use App\Models\Matching;
use App\Events\NewMatch;

class AppAjaxController extends Controller
{
    public function like(Request $request){
        DB::table(Auth::user()->id.'_likes')->insert([
            'user_id' => $request->user_id
        ]);

        if(DB::table(Auth::user()->id.'_fans')->where('user_id', $request->user_id)->first()==null){
            DB::table($request->user_id.'_fans')->insert([
                'user_id' => Auth::user()->id
            ]);
        }else{
            $chat = Chat::create([]);

            $first = Matching::create([
                'chat_id' => $chat->id,
                'user_id' => Auth::user()->id,
                'match_with' => $request->user_id,
            ]);

            $second = Matching::create([
                'chat_id' => $chat->id,
                'user_id' => $request->user_id,
                'match_with' => Auth::user()->id,
            ]);

            event(new NewMatch($first));
            event(new NewMatch($second));
        }

    }

    public function dislike(Request $request){
        DB::table(Auth::user()->id.'_dislikes')->insert([
            'user_id' => $request->user_id
        ]);
    }
}
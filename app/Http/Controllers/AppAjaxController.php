<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Chat;
use App\Models\UserPreferences;
use App\Models\UserFavoriteFoods;
use App\Models\UserFavoriteDrinks;

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
            $chat = Chat::create([
                'last_message' => 'You have got a new MATCH!!!'
            ]);

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
        if(DB::table(Auth::user()->id.'_dislikes')->where('user_id', $request->user_id)->first()==null){
            DB::table(Auth::user()->id.'_dislikes')->insert([
                'user_id' => $request->user_id
            ]);
        }
    }

    public function setFoodPref(Request $request){
        foreach($request->pref as $pref){
            if(count(Auth::user()->preferences->where('food_pref','=',$pref)) == 0){
                UserPreferences::create([
                    'user_id' => Auth::user()->id,
                    'food_pref' => $pref
                ]);
            }
        };

        return Auth::user()->fresh()->preferences;
    }

    public function deleteFoodPref(Request $request){
        Auth::user()->preferences->find($request->id)->delete();
    }

    public function setFavoriteFoods(Request $request){
        foreach($request->favorite as $favorite){
            if(count(Auth::user()->favoriteFoods->where('favorite_food','=',$favorite)) == 0){
                UserFavoriteFoods::create([
                    'user_id' => Auth::user()->id,
                    'favorite_food' => $favorite
                ]);
            }
        };
    }

    public function deleteFavoriteFood(Request $request){
        Auth::user()->favoriteFoods->find($request->id)->delete();
    }

    public function setFavoriteDrinks(Request $request){
        foreach($request->favorite as $favorite){
            if(count(Auth::user()->favoriteFoods->where('favorite_drink','=',$favorite)) == 0){
                UserFavoriteDrinks::create([
                    'user_id' => Auth::user()->id,
                    'favorite_drink' => $favorite
                ]);
            }
        };

        return Auth::user()->fresh()->favoriteFoods;
    }

    public function deleteFavoriteDrink(Request $request){
        Auth::user()->favoriteDrinks->find($request->id)->delete();
    }
}
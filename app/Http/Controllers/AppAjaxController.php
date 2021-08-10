<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Chat;
use App\Models\UserPreferences;
use App\Models\UserFavoriteFoods;
use App\Models\UserFavoriteDrinks;
use App\Models\UserHoliday;
use App\Models\UserMusic;
use App\Models\UserHobbie;
use App\Models\User;
use App\Models\ProfileInformation;

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
    
    public function setuserholidays(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			foreach($data['holidays'] as $holiday_id){
				$UserHoliday = new UserHoliday;
				$UserHoliday->user_id = Auth::user()->id;
				$UserHoliday->holiday_id = $holiday_id;
				if($UserHoliday->save()){
				}
			}
			return true;
		}
	}

    public function deleteUserHolidays(Request $request){
        UserHoliday::where('id',$request->id)->delete();
    }
    
    
    public function setusermusic(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			foreach($data['music'] as $music_id){
				$UserMusic = new UserMusic;
				$UserMusic->user_id = Auth::user()->id;
				$UserMusic->music_id = $music_id;
				if($UserMusic->save()){
				}
			}
			return true;
		}
	}
	
	public function setuserhobbie(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			foreach($data['hobbie'] as $hobbie_id){
				$UserHobbie = new UserHobbie;
				$UserHobbie->user_id = Auth::user()->id;
				$UserHobbie->hobbie_id = $hobbie_id;
				if($UserHobbie->save()){
				}
			}
			return true;
		}
	}
	
	public function setaboutinfo(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			//~ print_r($data);die;
			$user = User::where('id',Auth::user()->id)->first();
			if(!empty($user)){
				$user->aboutinfo = $data['about'];
				if($user->save()){
					return true;
				}
			}
			else{
				return false;
			}
		}
	}
	
	public function setCityState(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			$user = ProfileInformation::where('user_id',Auth::user()->id)->first();
			if(!empty($user)){
				$user->country = $data['country'];
				$user->city = $data['city'];
				if($user->save()){
					echo '1';
					die();
				}
				else{
					echo '0';
					die();
				}
			}
		}
		else{
			echo '0';
			die();
		}
	}
	
	public function setGender(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			$user = ProfileInformation::where('user_id',Auth::user()->id)->first();
			if(!empty($user)){
				$user->sex = $data['gender'];
				if($user->save()){
					echo '1';
					die();
				}
				else{
					echo '0';
					die();
				}
			}
		}
		else{
			echo '0';
			die();
		}
	}
	
	public function setBirthday(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			$user = ProfileInformation::where('user_id',Auth::user()->id)->first();
			if(!empty($user)){
				$user->b_day = $data['bday'];
				if($user->save()){
					echo '1';
					die();
				}
				else{
					echo '0';
					die();
				}
			}
		}
		else{
			echo '0';
			die();
		}
	}

    public function deleteUserMusic(Request $request){
        UserMusic::where('id',$request->id)->delete();
    }
    
    public function deleteUserHobbie(Request $request){
        UserHobbie::where('id',$request->id)->delete();
    }
}

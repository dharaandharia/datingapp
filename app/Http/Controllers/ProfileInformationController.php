<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\ProfileInformation;
use App\Models\Preference;
use App\Models\FavoriteFood;
use App\Models\FavoriteDrink;
use App\Models\UserHobbie;
use App\Models\UserMusic;
use App\Models\Music;
use App\Models\UserPreferences;
use App\Models\UserHoliday;
use App\Models\Holiday;
use App\Models\Hobby;

class ProfileInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(!Auth::user()->status->tendencies){
            return redirect('set');
        }

        $user = Auth::user()->information;
        $food_pref = Preference::all()->reject(function($one){
            if(!Auth::user()->preferences->where('food_pref',$one->food_pref)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->food_pref;
        })->values();
        $pref = Auth::user()->preferences;

        $favoriteFood = FavoriteFood::all()->reject(function($one){
            if(!Auth::user()->favoriteFoods->where('favorite_food',$one->favorite_food)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->favorite_food;
        })->values();
        $userFavoriteFoods = Auth::user()->favoriteFoods;

        $favoriteDrink = FavoriteDrink::all()->reject(function($one){
            if(!Auth::user()->favoriteDrinks->where('favorite_drink',$one->favorite_drink)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->favorite_drink;
        })->values();
        $userFavoriteDrinks = Auth::user()->favoriteDrinks;
        
        $userHobbies = UserHobbie::where(['user_id'=>Auth::user()->id])->with('hobbie')->get();
        
        $hobbiesArr = array();
        foreach($userHobbies as $hobbies){
			$hobbiesArr[$hobbies['hobbie']['id']] = $hobbies['hobbie']['hobbie'];
		}
		
		$userMusic = UserMusic::where(['user_id'=>Auth::user()->id])->with('music')->get();
        
        $musicArr = array();
        foreach($userMusic as $music){
			$musicArr[$music['music']['id']] = $music['music']['music'];
		}
		
		$userHoliday = UserHoliday::where(['user_id'=>Auth::user()->id])->with('holiday')->get();
		
		$holidayArr = array();
        foreach($userHoliday as $holiday_key => $holiday){
			$holidayArr[$holiday['holiday']['id']] = $holiday['holiday']['holiday'];
		}
		
		$holidaysTableData = Holiday::select('id','holiday')->get()->all();
		$musicTableData = Music::select('id','music')->get()->all();
		$hobbieTableData = Hobby::select('id','hobbie')->get()->all();
		//~ print_r($holidaysTableData);die;
		$profileInfo = ProfileInformation::where('user_id',Auth::user()->id)->first();
		//~ print_r($profileInfo);die;
		$userabout = User::where('id',Auth::user()->id)->select('aboutinfo')->first();
        return view('profile.index')->with(['user' => $user,'food_pref' => $food_pref,'pref' => $pref,'favoriteFood' => $favoriteFood, 'userFavoriteFoods' => $userFavoriteFoods,'favoriteDrink' => $favoriteDrink, 'userFavoriteDrinks' => $userFavoriteDrinks,'hobbiesArr'=>$hobbiesArr,'musicArr'=>$musicArr,'userHoliday'=>$userHoliday,'holidayArr'=>$holidayArr,'profileInfo'=>$profileInfo,'holidaysTableData'=>$holidaysTableData,'musicTableData'=>$musicTableData,'hobbieTableData'=>$hobbieTableData,'userabout'=>$userabout]);
    }
    
    public function profile2(){
		if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(!Auth::user()->status->tendencies){
            return redirect('set');
        }

        $user = Auth::user()->information;
        $food_pref = Preference::all()->reject(function($one){
            if(!Auth::user()->preferences->where('food_pref',$one->food_pref)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->food_pref;
        })->values();
        $pref = Auth::user()->preferences;

        $favoriteFood = FavoriteFood::all()->reject(function($one){
            if(!Auth::user()->favoriteFoods->where('favorite_food',$one->favorite_food)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->favorite_food;
        })->values();
        $userFavoriteFoods = Auth::user()->favoriteFoods;

        $favoriteDrink = FavoriteDrink::all()->reject(function($one){
            if(!Auth::user()->favoriteDrinks->where('favorite_drink',$one->favorite_drink)->first() == null){
                return $one;
            }
        })->map(function($one){
            return $one->favorite_drink;
        })->values();
        $userFavoriteDrinks = Auth::user()->favoriteDrinks;

        return view('profile.index2')->with(['user' => $user,'food_pref' => $food_pref,'pref' => $pref,'favoriteFood' => $favoriteFood, 'userFavoriteFoods' => $userFavoriteFoods,'favoriteDrink' => $favoriteDrink, 'userFavoriteDrinks' => $userFavoriteDrinks]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status->information){
            return redirect('/dashboard');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->status->information){
            return redirect('/dashboard');
        }

        Validator::make($request->all(), [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'sex' => ['required','string','max:255'],
            'b_day' => ['required','date','max:255'],
            'country' => ['required','string','max:255'],
            'city' => ['required','string','max:255']
        ], $messages=[
            'required' => 'Please insert your :attribute.',
            'sex.required' => 'Please insert your identity.',
            'b_day.required' => 'please insert your birthday.'
        ])->validate();

        ProfileInformation::create([
            'user_id' => Auth::user()->id,
            'first_name' => ucfirst($request['first_name']),
            'last_name' => ucfirst($request['last_name']),
            'sex' => $request['sex'],
            'b_day' => $request['b_day'],
            'country' => ucfirst($request['country']),
            'region' => ucfirst($request['region']),
            'city' => ucfirst($request['city']),
        ]);

        $status = Auth::user()->status;
        $status->information = true;
        $status->save();

        return redirect('/profilePicture/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(!Auth::user()->status->tendencies){
            return redirect('set');
        }
        if(!Auth::user()->status->is_admin){
            if(Auth::user()->matches->where('match_with',$id)->first() == null){
                return redirect('/profile');
            }
        }

        $user = Auth::user()->information;

        $userView = User::find($id);

        return view('profile.view')->with(['user' => $user, 'view' => $userView]);
    }

    public function adminView($user,$id){
        if(!Auth::user()->status->is_admin){
            return redirect('/dashboard');
        }
        $user_id = $user;
        $userView = User::find($id);


        return view('admin.userProfile')->with(['view' => $userView, 'user_id' => $user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

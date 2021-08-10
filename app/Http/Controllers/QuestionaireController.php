<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Cookie;
use Redirect;
use App\Models\Preference;
use App\Models\UserPreferences;
use App\Models\Hobby;
use App\Models\Question;
use App\Models\UserHobbie;
use App\Models\FreeTime;
use App\Models\UserFreeTime;
use App\Models\Music;
use App\Models\UserMusic;
use App\Models\Holiday;
use App\Models\UserHoliday;
use App\Models\UserAnswer;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Events\Registered;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class QuestionaireController extends Controller
{
	
	use PasswordValidationRules;
	
	public function testemail(){
	    $user = User::where('email','shafia7274@gmail.com')->first();
	    if(!empty($user)){
	        $user->sendEmailVerificationNotification();
	    }
	}
	 
	public function savedata(Request $request){
		Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
        
		$data = $request->all();
		
        $USER = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'registration_step' => 1,
        ]);
        
        UserStatus::create([
            'user_id' => $USER->id
        ]);
        
        Schema::create($USER->id.'_likes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });

        Schema::create($USER->id.'_dislikes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });

        Schema::create($USER->id.'_fans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });
        
        return redirect('register/questionaire/1/'.$USER->id);
	}
	
	public function questionaire($step,$id){
		
		$user = User::where('id',$id)->first();
		if(!empty($user)){
			$user->registration_step = $step;
			if($user->save()){
				if($step == 3){
					$preferences = Preference::get()->all();
					
					return view('questionaire.step'.$step)->with(['id'=>$id,'preferences'=>$preferences]);
				}
				elseif($step == 5){
					$hobbies = Hobby::get()->all();
					return view('questionaire.step5')->with(['id'=>$id,'hobbies'=>$hobbies]);
				}
				
				elseif($step == 6){
				    
					$freetimeoptions = FreeTime::get()->all();
					return view('questionaire.step6')->with(['id'=>$id,'freetimeoptions'=>$freetimeoptions]);
				}
				elseif($step == 8){
					$music = Music::get()->all();
					return view('questionaire.step8')->with(['id'=>$id,'music'=>$music]);
				}
				elseif($step == 10){
				    
					$holidays = Holiday::get()->all();
					return view('questionaire.step10')->with(['id'=>$id,'holidays'=>$holidays]);
				}
				else{
					return view('questionaire.step'.$step)->with(['id'=>$id]);
				}
			}
		}
		else{
			return Redirect::back()->withErrors(['msg', 'Something went wrong. Please try again']);
		}
	}
	
	public function saveFoodPreference(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			//print_r($data);die;
			if(!empty($data['food_pref'])){
				foreach($data['food_pref'] as $food_pref){
					$userFoodPref = new UserPreferences;
					$userFoodPref->user_id = $data['user_id'];
					$userFoodPref->food_pref = $food_pref;
					$userFoodPref->save();
				}
			}
			
			return redirect('questions/'.$data['user_id']);
		}
	}
	
	public function saveUserHobbies(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			if(!empty($data['hobby'])){
				foreach($data['hobby'] as $hobbie){
					$hobby = new UserHobbie;
					$hobby->user_id = $data['user_id'];
					$hobby->hobbie_id = $hobbie;
					$hobby->save();
				}
			}
			return redirect('register/questionaire/6/'.$data['user_id']);
		}
	}
	
	public function saveFreeTimeOptions(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			if(!empty($data['freetimeoption'])){
				foreach($data['freetimeoption'] as $freetime){
					$options = new UserFreeTime;
					$options->user_id = $data['user_id'];
					$options->free_time_id = $freetime;
					$options->save();
				}
			}
			return redirect('register/questionaire/7/'.$data['user_id']);
		}
	}
	
	public function saveUserMusic(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			if(!empty($data['music_opt'])){
				foreach($data['music_opt'] as $music_opt){
					$music_options = new UserMusic;
					$music_options->user_id = $data['user_id'];
					$music_options->music_id = $music_opt;
					$music_options->save();
				}
			}
			return redirect('questions2/'.$data['user_id']);
		}
	}
	
	public function saveUserHolidays(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			
			if(!empty($data['holidays'])){
				foreach($data['holidays'] as $holidays){
					$saveholidays = new UserHoliday;
					$saveholidays->user_id = $data['user_id'];
					$saveholidays->holiday_id = $holidays;
					$saveholidays->save();
				}
			}
			return redirect('/questionaire/about/'.$data['user_id']);
		}
	}
	
	public function saveOptions(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			//print_r($data);die;
			if(!empty($data['question'])){
				foreach($data['question'] as $quid => $opt_id){
					$savequestion = new UserAnswer;
					$savequestion->user_id = $data['user_id'];
					$savequestion->question_id = $quid;
					$savequestion->option_id = $opt_id;
					$savequestion->save();
				}
			}
			
			return redirect('register/questionaire/'.$data['next_step'].'/'.$data['user_id']);
		}
	}
	
	public function questions($id){
		$questions = Question::where(['category'=>'hobby'])->with('option')->get()->all();
		
		return view('questionaire.questions_1')->with(['questions'=>$questions,'id'=>$id,'nextstep'=>5]);
	}
	
	public function questions2($id){
		$questions = Question::where(['category'=>'alcohol'])->with('option')->get()->all();
		return view('questionaire.questions_1')->with(['questions'=>$questions,'id'=>$id,'nextstep'=>9]);
	}
	
	public function aboutInfo($id){
		return view('questionaire.about_info')->with(['user_id'=>$id]);
	}
	
	public function saveAboutInfo(Request $request){
		if(!empty($request->all())){
			$data = $request->all();
			$user = User::where('id',$data['user_id'])->first();
			if(!empty($user)){
				$user->aboutinfo = $data['aboutinfo'];
				if($user->save()){
					return redirect('/login')->with(['success'=>'Registered successfully. An email has been sent to your registered email. Please verify your email.']);
					//send verification email to user
					event(new Registered($user));
				}
			}
		}
	}
	
	
}

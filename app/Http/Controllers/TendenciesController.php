<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Male;
use App\Models\Female;
use App\Models\Non;

class TendenciesController extends Controller
{
    public function create(){
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(Auth::user()->status->tendencies){
            return redirect('/');
        }

        return view('tendencies.set');
    }

    public function store(Request $request){
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(Auth::user()->status->tendencies){
            return redirect('/');
        }

        Validator::make($request->all(),[
            'iam' => ['required','integer'],
            'looking_for' => ['required','integer'],
            'from' => ['required','integer'],
            'to' => ['required','integer'],
        ],$messages=[
            'iam.required' => 'Please select a field.',
            'looking_for.required' => 'Please select a field.',
            'from.required' => 'Please set a range.',
            'to.required' => 'Please set a range.',
        ])->validate();

        $user = Auth::user()->information;
        $user->iam = $request['iam'];
        $user->looking_for = $request['looking_for'];
        $user->from = $request['from'];
        $user->to = $request['to'];
        Auth::user()->status->tendencies = true;
        Auth::user()->information->save();
        Auth::user()->status->save();
        
        if($request['iam'] == 0 ){
            Female::create([
                'user_id'=> Auth::user()->id,
                'looking_for' => $request['looking_for'],
                'from' => $request['from'],
                'to' => $request['to'],
                'age' => Auth::user()->information->b_day->age,
            ]);
        }elseif($request['iam'] == 1 ){
            Male::create([
                'user_id'=> Auth::user()->id,
                'looking_for' => $request['looking_for'],
                'from' => $request['from'],
                'to' => $request['to'],
                'age' => Auth::user()->information->b_day->age,
            ]);
        }elseif($request['iam'] == 2 ){
            Non::create([
                'user_id'=> Auth::user()->id,
                'looking_for' => $request['looking_for'],
                'from' => $request['from'],
                'to' => $request['to'],
                'age' => Auth::user()->information->b_day->age,
            ]);
        }

        return redirect('/');
    }
}

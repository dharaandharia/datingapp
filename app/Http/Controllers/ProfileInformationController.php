<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileInformation;

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

        return view('profile.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status->information){
            return redirect('profilePicture/create');
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
            return redirect('/profilePicture/create');
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
        //
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

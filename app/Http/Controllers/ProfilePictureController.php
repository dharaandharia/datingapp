<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 

class ProfilePictureController extends Controller
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

        return redirect('/profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(Auth::user()->status->profile_picture){
            return redirect('/dashboard');
        }

        return view('profilePicture.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Validator::make($request->all(),[
            'profile_image' => ['required','image','max:1999']
        ],$messages=[
            'profile_image.required' => 'Please select a photo.',
            'profile_image.image' => 'Invalid File Extension',
            'profile_image.max' => 'File must be less than 2 mb'
        ])->validate();

        if ($request->hasFile('profile_image')){
            //get file name with the extension
            $fileNameWithExt= $request->file('profile_image')->getClientOriginalName();

            //get just filename
            $fileName = str_replace(' ','',pathinfo($fileNameWithExt, PATHINFO_FILENAME));

            //get just the extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();

            //file name to store(unique)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('profile_image')->storeAs('public/profile_pictures',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        Auth::user()->information->profile_picture = $fileNameToStore;
        Auth::user()->information->save();

        Auth::user()->status->profile_picture = true;
        Auth::user()->status->save();

        return redirect('/dashboard');
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
        return redirect('/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        return redirect('/profile');

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
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        if(!Auth::user()->status->tendencies){
            return redirect('set');
        }

        Validator::make($request->all(),[
            'profile_image' => ['required','image','max:1999']
        ],$messages=[
            'profile_image.required' => 'Please select a photo.',
            'profile_image.image' => 'Invalid File Extension',
            'profile_image.max' => 'File must be less than 2 mb'
        ])->validate();

        if ($request->hasFile('profile_image')){
            //get file name with the extension
            $fileNameWithExt= $request->file('profile_image')->getClientOriginalName();

            //get just filename
            $fileName = str_replace(' ','',pathinfo($fileNameWithExt, PATHINFO_FILENAME));

            //get just the extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();

            //file name to store(unique)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('profile_image')->storeAs('public/profile_pictures',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        Auth::user()->information->profile_picture = $fileNameToStore;
        Auth::user()->information->save();

        Auth::user()->status->profile_picture = true;
        Auth::user()->status->save();

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->status->information){
            return redirect('/profile/create');
        }
        if(!Auth::user()->status->profile_picture){
            return redirect('profilePicture/create');
        }
        return redirect('/profile');

        // Storage::delete('public/cover_images/'.$post->cover_image);
    }
}

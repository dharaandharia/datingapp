<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribtionController extends Controller
{
    public function index(){
        $user = Auth::user()->information;
        
        return view('subscribtion.index')->with('user',$user);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdditionalInformationController extends Controller
{
    public function create(){
        $user = Auth::user()->information;


        return view('moreInfo.create')->with('user', $user);
    }
}

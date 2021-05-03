<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function privacyPolicy(){
        return view('legal.privacyPolicy');
    }

    public function termsAndConditions(){
        return view('legal.termsAndConditions');
    }

    public function userAgreement(){
        return view('legal.userAgreement');
    }
}

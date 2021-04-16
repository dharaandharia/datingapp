<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Male;
use App\Models\Female;
use App\Models\Non;
use App\Models\ProfileInformation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user()->information;

        if( $user->iam == 1 ){

            if( $user->looking_for == 0 ){
                $result = Female::where('looking_for','=','1')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();          
            }elseif( $user->looking_for == 1 ){
                $first = Male::where('looking_for','=','1')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Male::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second);
            }elseif( $user->looking_for == 2 ){
                $first = Male::where('looking_for','=','1')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Male::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $third = Female::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $fourth = Non::where('looking_for','=','1')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $fifth = Non::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second->merge($third->merge($fourth->merge($fifth))));
            }

        }elseif( $user->iam == 0 ){
            if( $user->looking_for == 1 ){
                $result = Male::where('looking_for','=','0')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
            }elseif( $user->looking_for == 0 ){
                $first = Female::where('looking_for','=','0')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Female::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second);
            }elseif( $user->looking_for == 2 ){
                $first = Female::where('looking_for','=','0')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Female::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $third = Male::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $fourth = Non::where('looking_for','=','0')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $fifth = Non::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second->merge($third->merge($fourth->merge($fifth))));
            }

        }elseif( $user->iam == 2 ){
            if( $user->looking_for == 0 ){
                $first = Non::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Female::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second);
            }elseif( $user->lokking_for == 1 ){
                $first = Non::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Male::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second);
            }elseif( $user->lokking_for == 2 ){
                $first = Non::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $second = Female::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();
                $third = Male::where('looking_for','=','2')->where('age','>=',$user->from)->where('age','<=',$user->to)->get();

                $result = $first->merge($second->merge($third));
            }
        }

        $result = $result->reject(function($item){
            if(!DB::table(Auth::user()->id.'_likes')->where('user_id', $item->user_id)->first()==null){
                return $item;
            }elseif(!DB::table(Auth::user()->id.'_dislikes')->where('user_id', $item->user_id)->first()==null){
                return $item;
            }
        })->values()->map(function($item){
            return $item->getUser->information;
        });

        return view('dashboard.index')->with(['user' => $user , 'result' => $result]);
    }
}

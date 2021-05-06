<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){

        $users = User::all()->reject(function($each){
            if ($each->status->is_admin){
                return $each;
            }
        })->values()->map(function($each){
            $matches_num = count($each->Matches);
            $each->matches_num = $matches_num;
            return $each;
        });

        return view('admin.index')->with('users',$users);
    }

    public function userDashboard($id){

        $user = User::find($id);

        $chats = DB::table('matchings')->where('matchings.user_id',$user->id)->join('chats','matchings.chat_id','=','chats.id')->join('profile_information','matchings.match_with','=','profile_information.user_id')->select('matchings.chat_id','matchings.match_with','chats.last_message_by','chats.last_message','chats.number_of_messages','chats.seen','chats.updated_at','profile_information.first_name','profile_information.last_name','profile_information.profile_picture')->orderBy('updated_at','desc')->get();

        $chats->map(function($item){
            $item->messages = DB::table('messages')->where('chat_id',$item->chat_id)->orderBy('created_at','desc')->select('content','user_id')->get();
            return $item;
        });

        return view('admin.userDashboard')->with(['user' => $user , 'chats' => $chats]);
    }
}
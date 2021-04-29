<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use App\Models\Chat;
use App\Events\NewMessage;

class MessageController extends Controller
{
    public function store(Request $request){

        Validator::make($request->all(),[
            'message' => ['required','string','max:500'],
            'chat_id' => ['required', 'integer']
        ])->validate();

        $msg = Message::create([
            'chat_id' => $request->chat_id,
            'content' => $request->message,
            'user_id' => Auth::user()->id
        ]);

        $chat = Chat::find($msg->chat_id);

        if($chat->last_message_by == Auth::user()->id){
            $chat->last_message = $msg->content;
            $chat->number_of_messages++;
            $chat->seen = false;
            $chat->save();
        }else{
            $chat->last_message = $msg->content;
            $chat->last_message_by = Auth::user()->id;
            $chat->number_of_messages = 1;
            $chat->save();
        }

        broadcast(new NewMessage($msg))->toOthers();
        
    }

    public function seen(Request $request){

        $chat = Chat::find($request->chat_id);

        $chat->seen = true;
        $chat->number_of_messages = 0;
        $chat->save();
        
    }
}

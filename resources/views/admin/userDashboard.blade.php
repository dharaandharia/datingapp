@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        .chat-messages-wrapper{
            height: calc( 100% - 70px );
        }    
    </style>
@endsection

@section('content')
<div class="mb-2">
    <a href="{{ url('/adminPanel') }}" class="btn btn-outline-dark">< back</a>
    <a href="{{ url('/profileadminview/'.$user->id.'/'.$user->id)}}" class="btn btn-outline-dark float-right"> Profile</a>
</div>
<div class="container pt-3 pt-lg-4">
    <div class="row">
        <div class="chat-wrapper col-lg-4 p-2">
            <div class="chat col">
                <div class="chat-top p-3 row">
                    <img src="{{asset('storage/profile_pictures/'.$user->information->profile_picture)}}" alt="">
                    <div class="d-flex align-items-center">
                        <h2 class="m-0 d-flex align-items-center pl-5"><b>Chats</b></h2>
                    </div>
                </div>

                {{-- ALL CHAT CONTACTS --}}

                <div class="contacts my-3 pt-2">
                    @if (!count($chats)==0)
                        @foreach ($chats as $chat)

                                <div class="contact d-flex align-items-center px-3" id="chatBanner_{{$chat->chat_id}}">
                                    <div class="chat-img" style="background: url('/storage/profile_pictures/{{$chat->profile_picture}}') center / cover no-repeat"> </div>
                                    <div class="chat-info pl-3">
                                        <b>{{$chat->first_name}} {{$chat->last_name}}</b>
                                        <p class="m-0">
                                        @if ($chat->last_message_by == null)
                                            {{$chat->last_message}}
                                        @else
                                            @if ($chat->last_message_by == $user->id)
                                            <span>You: </span>{{ (strlen($chat->last_message)>25) ? substr($chat->last_message,0,24).'...' : $chat->last_message }}
                                            @else
                                            {{ (strlen($chat->last_message)>27) ? substr($chat->last_message,0,26).'...' : $chat->last_message }}
                                            @endif
                                        @endif</p>
                                        @if ($chat->seen == false && $chat->last_message_by !== $user->id)
                                            @if ($chat->last_message_by == null)
                                                <span class="msg-num text-center"></span>
                                            @else
                                                <span class="msg-num text-center">{{ $chat->number_of_messages }}</span>
                                            @endif
                                        @else
                                            <span class="msg-num text-center d-none"></span>
                                        @endif
                                    </div>
                                </div>

                        @endforeach
                    @else
                        <div class="no-contacts d-flex align-items-center">
                            <h5 class="col text-center pb-5">No matches YET ... </h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="app col-lg-8 p-2">
            
            <div class="contact-chat d-none d-lg-block" id="blank"></div>
            {{-- CHAT MESSAGES DISPLAY --}}
            
            @foreach ($chats as $chat)
                <div class="contact-chat d-none" id="chat_{{$chat->chat_id}}">
                    <div class="contact-chat-top m-0 p-3 row">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-lg fa-angle-left px-3 d-lg-none"></i>
                        </div>
                        <div class="contact-chat-img ml-2" style="background: url('/storage/profile_pictures/{{$chat->profile_picture}}') center / cover no-repeat"></div>
                        <div class="d-flex align-items-center">
                            <span class="ml-4"><a href="{{ url('/profileadminview/'.$user->id.'/'.$chat->match_with)}}">{{$chat->first_name.' '.$chat->last_name}}</a></span>
                        </div>
                    </div>
                    <div class="chat-messages-wrapper p-3">
                        <div class="chat-messages d-flex flex-column-reverse p-1">
                            @foreach ($chat->messages as $msg)

                                @if ($msg->user_id == $user ->id)

                                    <div class="row m-0 single-message mine py-1">
                                        <div class="col p-0 limit">
                                            <div class="px-3 message-content p-0">{{ $msg->content }}</div>
                                        </div>
                                        <div class="message-pic align-self-end" style="background: url('/storage/profile_pictures/{{$user->information->profile_picture}}') center / cover no-repeat"></div>
                                    </div>

                                @else
                                    <div class="row m-0 single-message py-1">
                                        <div class="message-pic align-self-end" style="background: url('/storage/profile_pictures/{{$chat->profile_picture}}') center / cover no-repeat"></div>
                                        <div class="col p-0 limit">
                                            <div class="px-3 message-content p-0">{{ $msg->content }}</div>
                                        </div>
                                    </div>
                                    
                                @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/userDashboard.js') }}"></script>
    <script>
        let chats = @json($chats);
        let user = @json($user);
    </script>
@endsection
@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <section class="container pt-3 pt-lg-4">
        <div class="row">
            <div class="chat-wrapper d-none d-lg-block col-lg-4 p-2">
                <div class="chat col">
                    <div class="chat-top p-3 row">
                        <img src="{{asset('storage/profile_pictures/'.$user->profile_picture)}}" alt="">
                        <div class="d-flex align-items-center">
                            <h2 class="m-0 d-flex align-items-center pl-5"><b>Chats</b></h2>
                        </div>
                        <div class="col d-flex align-items-center flex-row-reverse">
                            <i class="fas fa-times p-1 d-lg-none" id="chatListClose"></i>
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
                                                @if ($chat->last_message_by == Auth::user()->id)
                                                <span>You: </span>{{ (strlen($chat->last_message)>25) ? substr($chat->last_message,0,24).'...' : $chat->last_message }}
                                                @else
                                                {{ (strlen($chat->last_message)>27) ? substr($chat->last_message,0,26).'...' : $chat->last_message }}
                                                @endif
                                            @endif</p>
                                            @if ($chat->seen == false && $chat->last_message_by !== Auth::user()->id)
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
                                <h5 class="col text-center pb-5">No available matches YET! ... <br>Find now &#x2192</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="app col-lg-8 p-2">

                {{-- MATCH APP --}}

                <Div class="img d-flex align-items-center justify-content-center" id="app">
                    <div class="spinner d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo.png') }}" alt="" id="spinLogo">
                    </div>
                    <div class="info text-center d-none">
                        <h2><b class="infos"></b></h3>
                    </div>
                    <div class="btn-wrapper row d-none">
                        <div class="disable-dislike d-none"></div>
                        <div class="dislike d-flex align-items-center justify-content-center mr-4" id="dislike">
                            <i class="fas fa-2x fa-times"></i>
                        </div>
                        <div class="disable-like d-none"></div>
                        <div class="like d-flex align-items-center justify-content-center ml-4" id="like">
                            <i class="fas fa-2x fa-heart pt-1"></i>
                        </div>
                    </div>
                </div>
                <div class="noMatch align-items-center justify-content-center d-none">
                    <div class="text-center">
                        <i class="fas fa-3x fa-sync-alt"></i>
                        <h3 class="mt-4 m-3">No matches at the moment !! <br>Try later...</h3>
                    </div>
                </div>


                {{-- CHAT MESSAGES DISPLAY --}}

                @foreach ($chats as $chat)
                    
                    <div class="contact-chat d-none" id="chat_{{$chat->chat_id}}">
                        <div class="contact-chat-top m-0 p-3 row">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-lg fa-angle-left px-3 d-lg-none"></i>
                            </div>
                            <div class="contact-chat-img ml-2" style="background: url('/storage/profile_pictures/{{$chat->profile_picture}}') center / cover no-repeat"></div>
                            <div class="d-flex align-items-center">
                                <span class="ml-4"><a href="{{ url('/profile/'.$chat->match_with)}}">{{$chat->first_name.' '.$chat->last_name}}</a></span>
                            </div>
                            <div class="col d-flex align-items-center flex-row-reverse">
                                <i class="fas fa-times p-1 d-none d-lg-block" id="chatClose"></i>
                            </div>
                        </div>
                        <div class="chat-messages-wrapper p-3">
                            <div class="chat-messages d-flex flex-column-reverse p-1">
                                @foreach ($chat->messages as $msg)

                                    @if ($msg->user_id == Auth::user()->id)

                                        <div class="row m-0 single-message mine py-1">
                                            <div class="col p-0">
                                                <div class="px-3 message-content p-0">{{ $msg->content }}</div>
                                            </div>
                                            <div class="message-pic align-self-end" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"></div>
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
                        <div class="chat-form m-0">
                            <form class="row m-0 p-2" id="sendMsg">
                                <div class="col-9 p-0">
                                    <textarea name="message" class="col"></textarea>
                                </div>
                                <input type="number" name="chat_id" value="{{ $chat->chat_id }}" hidden>
                                @csrf
                                <div class="col-3 p-0 pl-2 send-btn">
                                    <button class=" btn btn-primary btn-block" type="submit" id="send"><b>send</b></button>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>     
@endsection    

@section('scripts')
    <script>
        let chats = @json($chats);
        let result = @json($result);
        let user = @json(Auth::user());
        let csrf_token = '{{csrf_token()}}';
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
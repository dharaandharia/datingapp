@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
@endsection



@section('content')
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
    <div class="container">
        <a href="#" class="navbar-brand">
            <div class="row">
                <div class="align-self-center ml-3 mr-1">
                    <img src="{{ asset('images/logo.png')}}" alt="logo" style="height: 31px">
                </div>
                <div class="align-self-center">
                    <img src="{{ asset('images/wegatyou.png') }}" alt="brandtext" style="height:16px">
                </div>                        
            </div>
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-logout">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>


<header id="home-section">
    <div class="dark-overlay">
        <div class="home-inner d-flex justify-content-center">
            <div class="container d-flex align-items-center justify-content-center pt-4 px-2">
                <div class="card col-md-6 col-lg-5 col-xl-4 p-0 pb-4 mt-5">
                    <div class="card-body opacity-10 text-center p-0">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="pt-4">
                        <h2 class="pt-3 m-0">Profile Picture</h2>
                        <P class="p-0 m-0 px-5 text-theme">Set your photo and get company right away <i class="far fa-grin-stars"></i></P>
                        
                        {!! Form::open(['action'=>'App\Http\Controllers\ProfilePictureController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="col">
                            <div class="row mx-4 mt-5 file-upload-wrapper">
                                <div class="col align-self-center" id="fileName">No file chosen</div>
                                {{ Form::label('profile_image','Choose File',['class'=>'custom-file-upload btn btn-outline-light btn-sm mr-1'])}}
                                
                                
                                <div class="row justify-content-center col p-0 m-0">
                                    {{ Form::file('profile_image',['id'=> 'profile_image'] )}}
                                </div>
                            </div>
                            @if ($errors->has('profile_image'))
                                <div class="row justify-content-left col pl-4" id="profileImageMsg">
                                    <p class="m-0 erroMsg text-left pl-4">*{{ $errors->first('profile_image')}}</p>
                                </div>
                            @endif
                            <div class="col p-1 pt-4 mt-4">
                                {{ Form::submit('submit',['class'=>'btn btn-theme btn-block'])}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection

@section('scripts')
<script src="{{ asset('js/create_profile_image.js') }}"></script>
@endsection
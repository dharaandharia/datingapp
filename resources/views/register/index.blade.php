@extends('layouts.master')

@section('styles')
        <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
@endsection

@section('content')



<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
    <div class="container">
        <a href="{{ url('/')}}" class="navbar-brand">
            <div class="row">
                <div class="align-self-center ml-3 mr-1">
                    <img src="images/logo.png" alt="logo" style="height: 31px">
                </div>
                <div class="align-self-center">
                    <img src="images/wegatyou.png" alt="brandtext" style="height:16px">
                </div>                        
            </div>
        </a>
    </div>
</nav>


<header id="home-section">
    <div class="dark-overlay">
        <div class="home-inner d-flex justify-content-center">
            <div class="container d-flex align-items-center justify-content-center pt-4 px-2">
                <div class="card col-md-6 col-lg-5 col-xl-4 p-0 pb-4">
                    <div class="card-body opacity-10 text-center p-0">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="pt-4">
                        <h2 class="pt-3 pb-1">Register</h2>
                        <form action="{{ url('/register-step1')}} " method="POST" class="d-flex justify-content-left">
                            @csrf
                            <div class="col">

                                {{-- name --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-user input-icon px-2"></i>
                                    <input type="text" name="name" class="input-field" placeholder="Name" id="name" value="{{ old('name') }}">
                                </div>

                                @if ($errors->has('name'))
                                    <div class="row justify-content-left col" id="nameMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('name')}}</p>
                                    </div>
                                @endif

                                {{-- email --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-envelope-open-text input-icon px-2"></i>
                                    <input type="text" name="email" class="input-field" placeholder="Email" id="email" value="{{ old('email')}}">
                                </div>

                                @if ($errors->has('email'))
                                    <div class="row justify-content-left col" id="emailMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('email')}}</p>
                                    </div>
                                @endif

                                {{-- password --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-lock input-icon px-2"></i>
                                    <input type="password" name="password" class="input-field" placeholder="Password" id="password">
                                </div>
                                @if ($errors->has('password'))
                                    <div class="row justify-content-left col" id="passwordMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('password')}}</p>
                                    </div>
                                @endif

                                {{-- password confirmation --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-key input-icon px-2"></i>
                                    <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm Password" id="passwordConfirm">
                                </div>

                                {{-- submit buttom --}}

                                <div class="col p-1 pt-4">
                                    <button class="btn btn-theme btn-block" type="submit">Sign Up</button>
                                </div>
                                {{-- form end --}}
                                <p class="m-0 pt-2">Or Sign up with</p>
                                <div class="col row m-0 p-0 pt-1">
                                    <button class="btn btn-facebook col m-1"><i class="fab fa-facebook-f mr-3"></i>Facebook</button>
                                    <button class="btn btn-instagram col m-1"><i class="fab fa-instagram mr-3"></i>Instagram</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@endsection

@section('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection

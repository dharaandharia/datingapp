@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tendencies.css') }}">
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
    <div class="">
        <div class="home-inner d-flex justify-content-center">
            <div class="container d-flex align-items-center justify-content-center pt-4 px-2">
                <div class="card col-md-7 col-lg-5 col-xl-4 p-0 pb-4 mt-5 mb-2">
                    <div class="card-body opacity-10 text-center p-0">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="pt-4">

                        <form action="{{ url('/set')}} " method="POST" class="d-flex justify-content-left" id="setForm">
                            @csrf
                            <input type="number" name="iam" id="iam" class="d-none" value="{{ old('iam') }}">
                            <input type="number" name="looking_for" id="for" class="d-none" value="{{ old('looking_for') }}">
                            <div class="col px-5 mt-5">

                                {{-- iam input field interface --}}

                                <h4 class="row text-left">I am:</h4>
                                <div class="row justify-content-between iam">
                                    <div class="d-flex align-items-center {{ (old('iam') === '0')?'selected':''}}" id="iam0"><div class="radio"></div><b>Female</b></div>
                                    <div class="d-flex align-items-center {{ (old('iam') === '1')?'selected':''}}" id="iam1"><div class="radio"></div><b>Male</b></div>
                                    <div class="d-flex align-items-center {{ (old('iam') === '2')?'selected':''}}" id="iam2"><div class="radio"></div><b>Non-Binary</b></div>
                                </div>

                                @if ($errors->has('iam'))
                                    <div class="row justify-content-left col p-0" id="iamMsg">
                                        <p class="m-0 erroMsg text-left pt-1">*{{ $errors->first('iam')}}</p>
                                    </div>
                                @endif

                                {{-- looking_for input field interface --}}

                                <h4 class="row text-left mt-3">Looking for:</h4>
                                <div class="row justify-content-between for">
                                    <div class="d-flex align-items-center {{ (old('looking_for') === '0')?'selected':''}}" id="for0"><div class="radio"></div><b>Female</b></div>
                                    <div class="d-flex align-items-center {{ (old('looking_for') === '1')?'selected':''}}" id="for1"><div class="radio"></div><b>Male</b></div>
                                    <div class="d-flex align-items-center {{ (old('looking_for') === '2')?'selected':''}}" id="for2"><div class="radio"></div><b>Both</b></div>
                                </div>

                                @if ($errors->has('looking_for'))
                                    <div class="row justify-content-left col p-0" id="forMsg">
                                        <p class="m-0 erroMsg text-left pt-1">*{{ $errors->first('looking_for')}}</p>
                                    </div>
                                @endif
                                
                                {{-- setting age range --}}

                                <div class="row justify-content-between mt-4">
                                    <h4 class="age">Age:</h4>
                                    <label class="ml-3" for="from">from:</label>
                                    <input type="number" name="from" id="from" class="col input-field text-center" value="{{ old('from') }}">
                                    <label class="ml-3" for="to">to:</label>
                                    <input type="number" name="to" id="to" class="col input-field mx-4 text-center" value="{{ old('to') }}">
                                </div>

                                @if ($errors->has('from'))
                                    <div class="row justify-content-left col p-0" id="rangeMsg">
                                        <p class="m-0 erroMsg text-left pt-1">*{{ $errors->first('from')}}</p>
                                    </div>
                                @else
                                    @if ($errors->has('to'))
                                        <div class="row justify-content-left col p-0" id="rangeMsg">
                                            <p class="m-0 erroMsg text-left pt-1">*{{ $errors->first('to')}}</p>
                                        </div>
                                    @endif
                                @endif

                                {{-- submit buttom --}}

                                <div class="row pt-4">
                                    <button class="btn btn-theme btn-block what" type="submit">Submit</button>
                                </div>

                                {{-- form end --}}
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
<script src="{{ asset('js/tendencies.js') }}"></script>
@endsection
@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
    <style>
        .home-inner{
            position: static;
        }
    </style>
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
                <div class="card col-md-6 col-lg-5 col-xl-4 p-0 pb-4 mt-5 mb-2">
                    <div class="card-body opacity-10 text-center p-0">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="pt-4">
                        <h2 class="pt-3 m-0">About You</h2>
                        <p class="p-0 m-0 px-4 text-success">WELCOME<br>Congrats !! You have been successfully registered.</p>
                        <P class="p-0 m-0 px-5">Please insert your presonal information to get started now !!</P>
                        <form action="{{ url('/profile')}} " method="POST" class="d-flex justify-content-left">
                            @csrf
                            <div class="col">

                                {{-- first name --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-user input-icon px-2"></i>
                                    <input type="text" name="first_name" class="input-field" placeholder="First name" id="firstName" value="{{ old('first_name') }}">
                                </div>

                                @if ($errors->has('first_name'))
                                    <div class="row justify-content-left col" id="firstNameMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('first_name')}}</p>
                                    </div>
                                @endif

                                {{-- last name --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-envelope-open-text input-icon px-2"></i>
                                    <input type="text" name="last_name" class="input-field" placeholder="Last name" id="lastName" value="{{ old('last_name')}}">
                                </div>

                                @if ($errors->has('last_name'))
                                    <div class="row justify-content-left col" id="lastNameMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('last_name')}}</p>
                                    </div>
                                @endif

                                {{-- sex --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-lock input-icon px-2"></i>
                                    <select name="sex" class="input-field" id="sex" placeholder="Your sex">
                                        <option value=""> -- How do you identify -- </option>
                                        <option {{ (old('sex') == 'Male Straight')?'selected':''}}>Male Straight</option>
                                        <option {{ (old('sex') == 'Female Straight')?'selected':''}}>Female Straight</option>
                                        <option {{ (old('sex') == 'Gay')?'selected':''}}>Gay</option>
                                        <option {{ (old('sex') == 'Lesbian')?'selected':''}}>Lesbian</option>
                                        <option {{ (old('sex') == 'Bisexual')?'selected':''}}>Bisexual</option>
                                        <option {{ (old('sex') == 'Non-Binary')?'selected':''}}>Non-Binary</option>
                                        <option {{ (old('sex') == 'Prefer not to say')?'selected':''}}>Prefer not to say</option>

                                    </select>
                                </div>
                                @if ($errors->has('sex'))
                                    <div class="row justify-content-left col" id="sexMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('sex')}}</p>
                                    </div>
                                @endif

                                {{-- birthday --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-key input-icon px-2"></i>
                                    <input type="date" name="b_day" class="input-field" placeholder="Birthday" id="bDay" value="{{ old('b_day') }}">
                                </div>
                                @if ($errors->has('b_day'))
                                    <div class="row justify-content-left col" id="bDayMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('b_day')}}</p>
                                    </div>
                                @endif

                                {{-- country --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-key input-icon px-2"></i>
                                    <input type="text" name="country" class="input-field" placeholder="Country" id="country" value="{{ old('country') }}">
                                </div>
                                @if ($errors->has('country'))
                                    <div class="row justify-content-left col" id="countryMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('country') }}</p>
                                    </div>
                                @endif

                                {{-- region --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-key input-icon px-2"></i>
                                    <input type="text" name="region" class="input-field" placeholder="Region (Optional)" id="region" {{ $errors->first('region') }}>
                                </div>
                                @if ($errors->has('region'))
                                    <div class="row justify-content-left col" id="regionMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('region')}}</p>
                                    </div>
                                @endif

                                {{-- city --}}

                                <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                    <i class="fas fa-key input-icon px-2"></i>
                                    <input type="text" name="city" class="input-field" placeholder="City" id="city" {{ $errors->first('city') }}>
                                </div>
                                @if ($errors->has('city'))
                                    <div class="row justify-content-left col" id="cityMsg">
                                        <p class="m-0 erroMsg text-left">*{{ $errors->first('city')}}</p>
                                    </div>
                                @endif

                                {{-- submit buttom --}}

                                <div class="col p-1 pt-4">
                                    <button class="btn btn-theme btn-block" type="submit">Submit</button>
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
<script src="{{ asset('js/create_profile.js') }}"></script>
@endsection
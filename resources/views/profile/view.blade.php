@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-head">
    <div class="container profile-hed">
        <div class="row">
            <div class="col-lg-3 p-0 px-lg-3">
                <div class="pt-4 pb-2 pb-lg-4 pp-bg">
                    <div class="ppWrapper mx-5 m-lg-0">
                        <div class="pp" style="background: url('/storage/profile_pictures/{{$view->information->profile_picture}}') center / cover no-repeat"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 d-flex align-items-center justify-content-center justify-content-lg-start">
                <div class="pl-lg-5">
                    <h1 class="text-center text-lg-left m-0"><b>{{ $view->information->first_name }} {{ $view->information->last_name }}</b></h1>
                    <h6 class="text-center text-lg-left pb-3 p-lg-0"><i class="fas fa-map-marker-alt pr-2"></i><b>{{ $view->information->city.', '.$view->information->country}}</b></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row pt-3">
            <div class="col-lg-3">
                <div class="pl-4 about-section">
                    <h1 class="mb-4"><b>About:</b></h1>
                    <div class="about-info">
                        <b class="h5 font-weight-bold text-dark">{{ date('d/m/Y',strtotime($view->information->b_day)) }}</b><br><span class="text-muted">Date of birth</span><br>
                    </div>
                    <div class="mt-3 about-info">
                        <b class="h5 font-weight-bold text-dark">{{ $view->information->sex }}</b><br><span class="text-muted">Sex</span><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if (!count($view->preferences)==0)
                    <div class="wall-info mt-3 mt-lg-0" id="pref">
                        <div><b class="h4 font-weight-bold text-dark">Food Preference</b></div>
                        <hr class="mx-0 my-1">
                        <div class="row mt-2 showState">
                            <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-utensils fa-2x"></i></div>
                            <div class="col-9 d-flex align-items-center">
                                <ul class="m-0">
                                    @foreach ($view->preferences as $one)
                                    <li id="foodPref_{{$one->id}}">{{ $one->food_pref }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!count($view->favoriteFoods)==0)
                    <div class="wall-info mt-3" id="favoriteFood">
                        <div><b class="h4 font-weight-bold text-dark">Favorite Food</b></div>
                        <hr class="mx-0 my-1">
                        <div class="row mt-2 showState">
                            <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-hamburger fa-2x"></i></div>
                            <div class="col-9 d-flex align-items-center">
                                <ul class="m-0">
                                    @foreach ($view->favoriteFoods as $one)
                                    <li id="favorite_f{{$one->id}}">{{ $one->favorite_food }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!count($view->favoriteDrinks)==0)
                    <div class="wall-info my-3" id="favoriteDrink">
                        <div><b class="h4 font-weight-bold text-dark">Favorite Drink</b></div>
                        <hr class="mx-0 my-1">
                        <div class="row mt-2 showState">
                            <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-cocktail fa-2x"></i></div>
                            <div class="col-9 d-flex align-items-center">
                                
                                <ul class="m-0">
                                    @foreach ($view->favoriteDrinks as $one)
                                    <li id="favorite_d{{$one->id}}">{{ $one->favorite_drink }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/create_profile_image.js') }}"></script>
@endsection
@extends('layouts.main')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <div class="pp" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"></div>
                        <button class="ppEdit" type="button" data-toggle="modal" data-target="#ppEdit"><i class="fas fa-lg fa-pen"></i></button>
                        <div class="modal fade" id="ppEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header px-3 py-2">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit photo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['action'=>['App\Http\Controllers\ProfilePictureController@update',$user->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                        {{ Form::hidden('_method','PUT') }}
                                        <div class="col">
                                            <div class="row mx-4 my-3 file-upload-wrapper">
                                                
                                                <div class="col align-self-center" id="fileName">No file chosen</div>
                                                {{ Form::label('profile_image','Choose File',['class'=>'custom-file-upload btn btn-outline-primary btn-sm mr-1'])}}
                                                
                                                
                                                <div class="row justify-content-center col p-0 m-0">
                                                    {{ Form::file('profile_image',['id'=> 'profile_image'] )}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer px-3 py-2">
                                        <button type="button" class="btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                                        {{ Form::submit('Attach photo',['class'=>'btn-sm btn-primary'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 d-flex align-items-center justify-content-center justify-content-lg-start">
                <div class="pl-lg-5">
                    <h1 class="text-center text-lg-left m-0"><b>{{ $user->first_name }} {{ $user->last_name }}</b></h1>
                    <h6 class="text-center text-lg-left pb-3 p-lg-0"><i class="fas fa-map-marker-alt pr-2"></i><b>{{ $user->city.', '.$user->country}}</b></h6>
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
                    <h1 class="mb-3"><b>About:</b></h1>
                    <div class="about-info">
                        <b class="h5 font-weight-bold text-dark">{{ date('d/m/Y',strtotime($user->b_day)) }}</b><br><span class="text-muted">Date of birth</span><br>
                    </div>
                    <div class="mt-3 about-info">
                        <b class="h5 font-weight-bold text-dark">{{ $user->sex }}</b><br><span class="text-muted">Sex</span><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="wall-info mt-3 mt-lg-0" id="pref">
                    <div><b class="h4 font-weight-bold text-dark">Food Preference</b><span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></div>
                    <hr class="mx-0 my-1">
                    <div class="row mt-2 showState">
                        <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-utensils fa-2x"></i></div>
                        <div class="col-9 d-flex align-items-center">
                            @if (!count($pref)==0)
                            <ul class="m-0">
                                @foreach ($pref as $one)
                                <li id="foodPref_{{$one->id}}">{{ $one->food_pref }}</li>
                                @endforeach
                            </ul>
                            @else
                                -You have no preferences !!!<br>
                                Update your profile to enhance your profile.
                            @endif
                        </div>
                    </div>
                    <div class="editState d-none mt-2">
                        @if (!count($pref)==0)
                                @foreach ($pref as $one)
                                    <div class="edit-state-element" id="{{$one->id}}">
                                        {{$one->food_pref}}
                                        <i class="fas fa-times pl-2"></i>
                                    </div>
                                @endforeach
                        @endif
                        <form id="prefForm" class="mt-3 d-flex justify-content-center align-items-center">
                            @csrf
                            <select multiple id="preferences"></select>
                            <button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
                        </form>
                    </div>
                </div>
                <div class="wall-info mt-3" id="favoriteFood">
                    <div><b class="h4 font-weight-bold text-dark">Favorite Food</b><span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></div>
                    <hr class="mx-0 my-1">
                    <div class="row mt-2 showState">
                        <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-hamburger fa-2x"></i></div>
                        <div class="col-9 d-flex align-items-center">
                            @if (!count($userFavoriteFoods)==0)
                            <ul class="m-0">
                                @foreach ($userFavoriteFoods as $one)
                                <li id="favorite_f{{$one->id}}">{{ $one->favorite_food }}</li>
                                @endforeach
                            </ul>
                            @else
                                -You have no favorite foods !!!<br>
                                Update your profile to enhance your profile.
                            @endif
                        </div>
                    </div>
                    <div class="editState d-none mt-2">
                        @if (!count($pref)==0)
                                @foreach ($userFavoriteFoods as $one)
                                    <div class="edit-state-element" id="{{$one->id}}">
                                        {{$one->favorite_food}}
                                        <i class="fas fa-times pl-2"></i>
                                    </div>
                                @endforeach
                        @endif
                        <form  id="favoriteFoodForm" class="mt-3 d-flex justify-content-center align-items-center">
                            @csrf
                            <select multiple id="favoriteFoods"></select>
                            <button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
                        </form>
                    </div>
                </div>
                <div class="wall-info my-3" id="favoriteDrink">
                    <div><b class="h4 font-weight-bold text-dark">Favorite Drink</b><span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></div>
                    <hr class="mx-0 my-1">
                    <div class="row mt-2 showState">
                        <div class="col-3 d-flex justify-content-center align-items-center"><i class="fas fa-cocktail fa-2x"></i></div>
                        <div class="col-9 d-flex align-items-center">
                            @if (!count($userFavoriteDrinks)==0)
                            <ul class="m-0">
                                @foreach ($userFavoriteDrinks as $one)
                                <li id="favorite_d{{$one->id}}">{{ $one->favorite_drink }}</li>
                                @endforeach
                            </ul>
                            @else    
                                -You have no favorite drinks !!!<br>
                                Update your profile to enhance your profile.
                            @endif
                        </div>
                    </div>
                    <div class="editState d-none my-2">
                        @if (!count($pref)==0)
                                @foreach ($userFavoriteDrinks as $one)
                                    <div class="edit-state-element" id="{{$one->id}}">
                                        {{$one->favorite_drink}}
                                        <i class="fas fa-times pl-2"></i>
                                    </div>
                                @endforeach
                        @endif
                        <form  id="favoriteDrinkForm" class="mt-3 d-flex justify-content-center align-items-center">
                            @csrf
                            <select multiple id="favoriteDrinks"></select>
                            <button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/create_profile_image.js') }}"></script>
    <script>
        let favoriteDrink = @json($favoriteDrink);
        let favoriteFood = @json($favoriteFood);
        let food_pref = @json($food_pref);
        let csrf_token = '{{csrf_token()}}';
    </script>

@endsection
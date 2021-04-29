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
    <div class="container bg-white">
        <div class="row pt-3">
            <div class="col-lg-3">
                <div class="pl-lg-4">
                    <h4><b>About:</b></h4>
                    <b class="h4 font-weight-bold">{{ date('d/m/Y',strtotime($user->b_day)) }}</b><br>Date of birth<br>
                    <b>{{ $user->sex }}</b><br>Sex:<br>
                </div>
            </div>
            <div class="col-lg-9">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/create_profile_image.js') }}"></script>
@endsection
@extends('layouts.main')

@section('content')
    <div class="container text-center pt-5">

        {{ $user->first_name}} {{ $user->last_name}} <br>        {{ $user->b_day }}

    </div>

@endsection
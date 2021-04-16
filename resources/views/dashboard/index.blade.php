@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    
    <section class="container pt-3 pt-lg-4">
        <div class="row">
            <div class="chat d-none d-lg-block col-lg-4 p-2"></div>
            <div class="app col-lg-8 p-2">
                <Div class="img d-flex align-items-center justify-content-center">
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
                        <i class="fas fa-4x fa-sync-alt"></i>
                        <h2 class="mt-4 m-2">No matches at the moment !! <br>Try later...</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>     







@endsection    

@section('scripts')
    <script>
        let result = @json($result);
        let csrf_token = '{{csrf_token()}}';
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
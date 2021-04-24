<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wegatyou</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    @yield('styles')
</head>
<body>
    <nav class="navbar  bg-transparent navbar-light p-1 d-none d-lg-block" id="main-nav">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item p-li">
                    <a class="nav-link" href="#pMenu" data-toggle="collapse" aria-expanded="false" aria-controls="pMenu"><div class="nav-img" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"> </div></a>
                    <div class="collapse" id="pMenu" >
                        <div class="pMenu-wrapper">
                            <div class="arrow"></div>
                            <div class="p-0 m-0 hide-arrow">
                                <a href="{{ url('/profile' )}}">
                                    <div class="py-2 d-flex align-items-center row m-0">
                                        <div class="col-3">

                                            <div class="nav-img" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"> </div>
                                        </div>
                                        <h6 class="d-flex justify-items-center m-0 p-0 col-9">{{ $user->first_name}} {{$user->last_name}}</h6>
                                    </div>
                                </a>
                                <form action="{{ url('/logout') }}" method="POST" class="">
                                    @csrf
                                    <button type="submit" class="nav-logout row p-0 m-0 d-flex align-items-center"><i class="fas fa-lg fa-sign-out-alt col-3 p-0 text-center"></i><div class="col-9 p-0">Logout</div></button>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="d-lg-none" id="nav-sm">
        <div class="fix-part">
            <div class="container d-flex justify-content-between">
                <div class="row">
                    <i class="p-3 fas fa-lg fa-bars align-self-center"></i>
                    <i class="p-3 fas fa-lg fa-times align-self-center d-none"></i>
                </div>
                <div>
    
                    <a href="{{ url('/')}}" class="navbar-brand py-3">
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
                <div class="row sm-msg-num-wrapper">
                    <i class="p-3 fas fa-lg fa-paper-plane align-self-center pt-1"></i>
                    <span class="sm-msg-num text-center d-none"></span>
                </div>
            </div>
        </div>
        <div class="nav-rest d-none">
            <div class="container">
                <hr>

                <a href="{{ url('/profile' )}}">
                    <div class="py-3 d-flex align-items-center">
                        <div class="col-3 justify-content-center p-0 d-flex">
                            <div class="nav-img m-0" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"> </div>
                        </div>
                            <h6 class="d-flex justify-items-center m-0 p-0 col-9 text-left">{{ $user->first_name}} {{$user->last_name}}</h6>
                    </div>
                </a>

                <hr>

                <form action="{{ url('/logout') }}" method="POST" class="">
                    @csrf
                    <button type="submit" class="logout-sm p-0 d-flex align-items-center my-3"><i class="fas fa-lg fa-sign-out-alt col-3 p-0 text-center"></i><div class="col-9 p-0">Log out</div></button>
                </form>

                <hr>
            </div>

        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
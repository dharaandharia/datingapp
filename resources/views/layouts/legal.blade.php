<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Wegatyou</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/legal.css') }}">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    @yield('styles')
</head>
<body>
    <nav class="navbar  bg-white navbar-light p-3" id="main-nav">
        <div class="container">
            <a href="{{ url('/')}}" class="navbar-brand">
                <div class="row">
                    <div class="align-self-center ml-3 mr-1">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" style="height: 31px">
                    </div>
                    <div class="align-self-center">
                        <img src="{{ asset('images/wegatyou.png') }}" alt="brandtext" style="height:16px">
                    </div>
                    <div class="align-self-center ml-3">
                        <h4 class="text-muted m-0 font-weight-bold">Legal</h4>
                    </div>                   
                </div>
            </a>
        </div>
    </nav>

    <div class="content container bg-white my-5 p-4 p-md-5">
        @yield('content')
    </div>

    <div class="p-4"></div>
    <footer>
        <hr>
        <div class="container">
            <span class="float-right mb-3">copyright &copy; 2021, <a href="{{ url('/')}}"><b>Wegatyou</b></a></span>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
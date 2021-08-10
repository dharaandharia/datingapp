@extends('layouts.master')
{{-- Find the people who just get who you are and like you for it. --}}

    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
    @endsection


    @section('content')

        {{--    NAVIGATION BAR     --}}

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
            <div class="container">
                <a href="{{ url('/')}}" class="navbar-brand">
                    <div class="row">
                        <div class="align-self-center ml-3 mr-1">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" style="height: 31px">
                        </div>
                        <div class="align-self-center">
                            <img src="{{ asset('images/wegatyou.png') }}" alt="brandtext" style="height:16px">
                        </div>                        
                    </div>
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#home-section" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about-section" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#howItWorks-section" class="nav-link">How it works</a>
                        </li>
                        <li class="nav-item">
                            <a href="#review-section" class="nav-link">Safe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{--    HOME SECTION    --}}

        <header id="home-section">
            <div class="dark-overlay">
                <div class="home-inner d-flex justify-content-center">
                    <div class="container d-flex align-items-center justify-content-center pt-4 px-2">
                        <div class="card col-md-6 col-lg-5 col-xl-4 p-0 pb-4">
							@if(session()->has('success'))
							<div class="alert alert-success">
								{{ session()->get('success') }}
							</div>
						    @endif
                            <div class="card-body opacity-10 text-center p-0">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="pt-4">
                                <h2 class="pt-3 pb-1">Sign in</h2>
                                <form action="{{ url('/login')}}" method="POST" class="d-flex justify-content-left">
                                    @csrf
                                    <div class="col">
                                        <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                            <i class="fas fa-user input-icon px-2"></i>
                                            <input type="text" name="email" class="input-field" placeholder="Email" id="email" value="{{ old('email') }}">
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="row justify-content-left col" id="emailMsg">
                                                <p class="m-0 erroMsg text-left">*{{ $errors->first('email')}}</p>
                                            </div>
                                        @endif
                                        <div class="row justify-content-center col p-0 m-0 mt-3 mb-1">
                                            <i class="fas fa-lock input-icon px-2"></i>
                                            <input type="password" name="password" class="input-field" placeholder="Password" id="password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="row justify-content-left col" id="passwordMsg">
                                                <p class="m-0 erroMsg text-left">*{{ $errors->first('password')}}</p>
                                            </div>
                                        @endif
                                        <div class="row justify-content-left col pt-1" >
                                            <a href="#" class="forgot-pass">Forgot Password?</a>
                                        </div>
                                        <div class="col p-1 pt-2">
                                            <button class="btn btn-theme btn-block" type="submit">Login</button>
                                        </div>
                                        <p class="m-0 pt-2">Or login with</p>
                                        <div class="col row m-0 p-0 pt-1">
                                            <button class="btn btn-facebook col m-1"><i class="fab fa-facebook-f mr-3"></i>Facebook</button>
                                            <a class="btn btn-instagram col m-1" href="{{ url('/sign-in/github') }}"><i class="fab fa-instagram mr-3"></i>Instagram</a>
                                        </div>
                                        <p class="m-0 pt-2">Don't have account? <a href="{{ url('/register') }}">Sign up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="aft-header">
            <div class="container">
                <div class="row">
                    <div class="col-4 text-center">
                        <i class="fas my-2 fa-2x fa-users"></i>
                        <h5><b>BEST SOCIETY</b></h5>
                        <p class="d-none d-lg-block">Find the people who just get who you are and like you for it.</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas my-2 fa-2x fa-lock"></i>
                        <h5><b>SAFE & SECURE</b></h5>
                        <p class="d-none d-lg-block">Daily profile quality checks to ensure a safe dating experience with real people.</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas my-2 fa-2x fa-graduation-cap"></i>
                        <h5><b>85% HIGHLY EDUCATED</b></h5>
                        <p class="d-none d-lg-block">Our members hold an above-average education.</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{--     ABOUT SECTION     --}}

        <div id="about-section">
            <div class="about-head text-center py-4">
                <div class="container">                
                    <h1 class="pt-4 pb-2">Online Dating With WeGatYou</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <i class="fas fa-5x fa-bullseye py-3 py-md-4"></i>
                            <h3>High Success Rate</h3>
                            <p class="pt-2">Thousands of singles find love through our dating sites each month. Register today to find that special someone on WeGatYou.</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-5x fa-cogs py-3 py-md-4"></i>
                            <h3>Intelligent Matchmaking</h3>
                            <p class="pt-2">We continuously fine-tune our matchmaking algorithm to deliver the most relevant and active singles based on your preferences.</p>

                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-5x fa-certificate py-3 py-md-4"></i>
                            <h3>Meet Eligible Singles</h3>
                            <p class="pt-2">WeGatyou is only for those who want a serious relationship. Over 90% of our members are 30+ and hold an above-average education.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-body text-cetner py-4 pt-5 mb-2">
                <div class="container">
                    <div class="text-center">
                        <img src="images/laptop-with-heart.png" alt="laptop with heart" class="col-5 col-md-3 col-lg-2">
                        <h1 class="pt-4 pb-2">Serious Online Dating</h1>
                        <div class="row px-sm-5 pt-2">
                            <div class="col-md-6 px-sm-5"><p>We believe that real happiness starts with a truly like-minded match, which is why our passion is helping compatible singles connect. If you're serious about finding lasting love, then WeGatyou is the dating site for you.</p></div>
                            <div class="col-md-6 px-sm-5 pt-4 pt-md-0"><p>With singles right across the world, WeGatYou is an international dating platform, operating with partners in all the world widely and helping singles find love each month through our online dating sites.</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="about-img">
                <div class="dark-overlay"></div>
            </div>-->
        </div>

        {{--     HOW TO START SECTION     --}}

        <div id="howItWorks-section">
            <div class="howItworks-head py-4 ">
                <div class="container text-center">
                    <h1>How it works</h1>
                    <h5 class="pb-4">Get started on WeGatYou.com today in 3 simple steps:</h5>
                    <div class="row algin-item-center">
                        <div class="col-4 d-flex align-items-center"><i class="col fa-3x fas fa-plus"></i></div>
                        <div class="col-8 text-left pl-0">
                            <h4><b>Create a Profile</b></h4>
                            <p>Create your profile in seconds with our easy sign-up. Don't forget to add a photo!</p>
                        </div>
                    </div>
                    <div class="row algin-item-center pt-2">
                        <div class="col-4 d-flex align-items-center"><i class="col fas fa-3x fa-search"></i></div>
                        <div class="col-8 text-left pl-0">
                            <h4><b>Browse Singles</b></h4>
                            <p>Search our large member base with ease, with a range of preferences and settings.</p>
                        </div>
                    </div>
                    <div class="row algin-item-center pl-0 pt-2">
                        <div class="col-4 d-flex align-items-center"><i class="col fas fa-3x fa-comments"></i></div>
                        <div class="col-8 text-left pl-0">
                            <h4><b>Start Communicating</b></h4>
                            <p>Send a message or interest to start communicating with members. It's your time to shine.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="howItWorks-body py-5">
                <div class="container text-center">
                    <h1 class="pb-2 m-0">Skip The Small Talk. Meet For a First Date.</h1>
                    <img src="images/logo.png" alt="" class="col-5 col-md-3 col-lg-2 pb-3 p-4">
                    <p>WeGatYou is a dating app that isn't about superficial love at first sight, but an opportunity to experience someone's company and a new culinary adventure. Aren't we all tired of the endless swiping left to right see that we only matched with someone we didn't like in the first place? WeGatYou will introduce you to new people and their favorite food spots every day. Skip the small talk and meet up for a first date over the best food and drinks around!</p>
                </div>
            </div>
        </div>

        {{--      REVIEW SECTION      --}}

        <div id="review-section">
            <div class="carousel-review">
                <div class="dark-overlay">
                    {{-- <div class="container-md">

                        <div id="slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li class="active" data-target="#slider" data-slide-to="0"></li>
                              <li data-target="#slider" data-slide-to="1"></li>
                              <li data-target="#slider" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <div class="carousel-caption">
                                  <i class="pb-4 fas fa-lg fa-quote-left"></i>
                                  <p>Being consistently charming in a text conversation, especially with a complete stranger, is not necessarily a perfect indicator of whether you'll be compatible. That's why WeGatYou tries to get you in the same room.</p>
                                  <div class="review-img text-center">
                                    <img src="images\guilherme-almeida-1858175.jpg" alt="" class="my-3">
                                    <h5>GUILHERME ALMEIDA</h5>
                                  </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="carousel-caption">
                                  <i class="pb-4 fas fa-lg fa-quote-left"></i>
                                  <p>Having similar taste in food is a major plus (and obviously the cornerstone of any healthy relationship?). It's perfect for foodies looking for a partner with similar taste buds.</p>
                                  <div class="review-img text-center">
                                    <img src="images/daniel-xavier-1102341.jpg" alt="" class="my-3">
                                    <h5>DANIEL XAVIER</h5>
                                  </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="carousel-caption">
                                  <i class="pb-4 fas fa-lg fa-quote-left"></i>
                                  <p>Apps like Tinder have taken every spark of magic and excitement out of dating. In contrast, WeGatYou is focused on giving you both a night of culinary culture, and good company too.</p>
                                  <div class="review-img text-center">
                                    <img src="images\kevin-bidwell-3863793.jpg" alt="" class="my-3">
                                    <h5>KEVIN BEDWELL</h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                  
                            <!-- CAROUSEL CONTROLS -->
                            <a href="#slider" class="carousel-control-prev" data-slide="prev">
                              <span class="carousel-control-prev-icon"></span>
                            </a>
                  
                            <a href="#slider" class="carousel-control-next" data-slide="next">
                              <span class="carousel-control-next-icon"></span>
                            </a>
                          </div>
                    </div> --}}
                </div>
            </div>
            <div class="safe text-center">
                <div class="container py-4">
                    <h1>SAFE.</h1>
                    <h3>Nothing can happen. Except fall in love.</h3>

                    <p class="px-4">WeGatYou works hard to make sure you don’t have to worry about security and privacy when looking for a partner online: 128bit SSL encryption. ID check. Profiles verified personally by our staff. What else can happen? Only one thing: that you fall in love.</p>
                    <img src="images\Lock-Check_100x100.png" alt="">
                </div>
            </div>
        </div>

        {{--      FOOTER      --}}

        <footer>
            <div class="container text-center">
                <div class="row py-5">
                    <div class="col-md-4 text-center">
                        <h4 class="pb-2">Follow WeGatYou</h4>
                        <a href="#"><i class="px-3 fab fa-2x fa-twitter-square"></i></a>
                        {{-- <a href="#"><i class="px-3 fab fa-2x fa-facebook-square"></i></a> --}}
                        <a href="#"><i class="px-3 fab fa-2x fa-instagram-square"></i></a>
                    </div>
                    <div class="col-md-4 legal pt-4 pt-md-0">
                        <a class="d-block" href="{{ url('/privacypolicy') }}">Privacy Policy</a>
                        <a class="d-block my-2" href="{{ url('/termsandconditions') }}">Terms and Conditions</a>
                        <a  class="d-block" href="{{ url('/useragreement') }}">User Agreement</a>
                    </div>
                    <div class="col-md-4 text-center pt-5 pt-md-2">
                        <div>
                            <img src="images/wegatyou.png"alt="">
                        </div>
                        <span>copyright &copy; 2021</span>
                    </div>
                </div>
            </div>
        </footer>

    @endsection


    @section('scripts')
        <script src="{{ asset('js/homepage.js') }}"></script>
    @endsection

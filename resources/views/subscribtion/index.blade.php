<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wegatyou</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/pay_combined.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    @yield('styles')
</head>
<style>
    .navbar{ background-color:rgba(0, 142, 214, 0.6) !important; }
</style>
<body id="runtimePage" class="paymentPages noSubnavi">
    <nav class="navbar bg-transparent navbar-light p-1 d-none d-lg-block" id="main-nav">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item p-li">
                    <a class="nav-link" href="#pMenu" data-toggle="collapse" aria-expanded="false" aria-controls="pMenu">
                        Profile
                        <div class="nav-img" style="background: url('/storage/profile_pictures/{{$user->profile_picture}}') center / cover no-repeat"> </div>
                    </a>
                    <div class="collapse" id="pMenu">
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
                                <a href="{{ url('/subscribtion') }}">
                                    <div class="row p-0 m-0 d-flex align-items-center pMenu-item">
                                        <div class="col-3 p-0 text-center">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="col-9 p-0">
                                            Subscription
                                        </div>
                                    </div>
                                </a>
                                <form action="{{ url('/logout') }}" method="POST" class="">
                                    @csrf
                                    <button type="Hello Submit" class="nav-logout row p-0 m-0 d-flex align-items-center"><i class="fas fa-lg fa-sign-out-alt col-3 p-0 text-center"></i><div class="col-9 p-0">Logout</div></button>
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
                <a href="{{ url('/subscribtion') }}">
                    <div class="p-0 d-flex align-items-center my-3">
                        <div class="col-3 p-0 text-center">
                            <i class="fas fa-star fa-lg"></i>
                        </div>
                        <div class="col-9 p-0">Subscribtion</div>
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

   
      <div id="pageWrapper" style="background-color: rgba(0, 142, 214, 0.6) !important;">
         
         <main id="content">
            <!-- For Mmenu -->
            
           <!-- <div id="brandImage">
               <picture> -->
                  <!--[if IE 9]>
                  <video style="display: none;">
                     <![endif]-->
                     <!--<source srcset="{{ asset('images/Paywall_MW_xl.jpg') }}" media="(min-width: 768px)">
                     <source srcset="{{ asset('images/Paywall_MW_m.jpg') }}" media="(min-width: 481px)">
                     <source srcset="{{ asset('images/Paywall_MW_s.jpg') }}" media="(max-width: 480px)">-->
                     <!--[if IE 9]>
                  </video>
                  <![endif]-->
                 <!-- <img src="{{ asset('images/pexels-taryn-elliott-3889742.jpg') }}" alt="">
               </picture>
            </div>-->
            
            
            <section id="productSelection" class="tile">
               <div id="baseProducts">
                  <form id="baseProduct_hero"
                     class="baseProduct is-active" method="post">
                     <div class="productHeader">
                        <h3><strong>Premium</strong></h3>
                     </div>
                     <div class="productBody">
                        <div class="productInfoText">
                           <h4 id="productNamehero">
                           </h4>
                           <ul>
                              
                               <li> Features:  Standard Plan plus</li>
                                <li>Unlimited likes</li>
                               <li> Passport to chat with singles anywhere around the world </li>
                               <li> Rewind to give someone a second chance </li>
                               <li> One free Push per month to be the top profile in your area for 20 minutes</li>
                              <li>  Additional Top Likes to stand out from the crowd</li> 
                               <li> Chat online</li>

                           </ul>
                        </div>
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="6,95">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £6.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">/month</span>
                                 </span>
                                 </span>
                                
                              </div>
                              <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/premium/1') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                           </div>
                        </div>
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="6,95">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £29.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">6 months</span>
                                 </span>
                                 </span>
                                
                              </div>
                              <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/premium/6') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                           </div>
                        </div>
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="6,95">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £54.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">12 months</span>
                                 </span>
                                 </span>
                                
                              </div>
                              
                           </div>
                           <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/premium/12') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                        </div>
                     </div>
                  </form>
                  <form id="baseProduct_long" action=""
                     class="baseProduct " data-product-id="d81beab8-d2c7-4e47-98c4-893d7339cf74">
                     
                     <div class="productHeader">
                        <h3><strong>Gold</strong></h3>
                     </div>
                     <div class="productBody">
                        <div class="productInfoText">
                           <h4 id="productNamelong">
                              
                           </h4>
                           <ul>
                               <li> Features: Premium Plan plus</li>
                               <li> Avoiding being seen, and keeping things private </li>
                               <li> women make the first move </li>
                               <li> five Top Likes per day </li>
                              <li>  Advanced profile controls</li>
                               <li> Likes You feature, which lets you see who likes you </li>
                               <li> Find out who added you to their favourites</li>
                               <li> Get your messages read first.</li>
                           </ul>
                           <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="10.90">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £10.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">/month</span>
                                 </span>
                                 </span>
                              </div>
                              <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/gold/1') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                           </div>
                        </div>
                        </div>
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="10.90">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £54.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">6 months</span>
                                 </span>
                                 </span>
                              </div>
                              <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/gold/6') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                           </div>
                        </div>
                       
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="10.90">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £99.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 <span class="segValue">12 months</span>
                                 </span>
                                 </span>
                              </div>
                              <div class="buttonArea">
							    <a target="_blank" href="{{ url('/subscribtion/gold/12') }}"  class="wdk-button t-primarySkin1 t-rightIcon"><span class="icon"></span>Select</a> 
                                </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  <form id="baseProduct_short" action=""
                     class="baseProduct" data-product-id="de544c77-c5f1-497f-9793-8f4e50612b2a">
                    
                     <div class="productHeader">
                        <h3><strong>Standard</strong> Plan</h3>
                     </div>
                     <div class="productBody">
                        <div class="productInfoText">
                           <h4 id="productNameshort">
                              
                           </h4>
                           <ul>
                               <li> Register for free</li>
                               <li> 24 hours to make the first move</li>
                                <li>24 hours to respond </li>
                               <li> dependable wingmate wherever you go</li>
                               <li> 2 people will only match when there is a mutual interest</li>
                               <li> Like 3 people per day. </li>
                              <li>  No stress. </li>
                              <li>No rejection</li>
                              <li>No subscription, buy services as and when you need them.</li>
                           </ul>
                        </div>
                       
                     </div>
                  </form>
                  
                  <form id="baseProduct_hero" action=""
                     class="baseProduct is-active" data-product-id="de544c77-c5f1-497f-9793-8f4e50612b2a" style="left:25% !important">
                    
                     <div class="productHeader">
                        <h3><strong>Mizar </strong> Coins</h3>
                     </div>
                     <div class="productBody">
                        <div class="productInfoText">
                           <h4 id="productNameshort">
                              
                           </h4>
                           <ul>
                               <li>
									Buy Mizar Coins: UPGRADE FOR EXTRAS: non-subscription, single and multi-use paid   features (Mizar Coins), with starter packs of Mizar coins available from £1.99
									Features price list in Mizar:
									Pack of 10 likes: 1 Mizar
									Access to chat 24 hrs : 1 Mizar
								</li>
                           </ul>
                        </div>
                        <div class="priceArea">
                           <div class="stylishPrice">
                              <div class="wallPrice noFlexPrice" data-price="19,90">
                                 <span class="prefix"></span>
                                 <span class="intValueAndSep">
                                 £1.
                                 <span class="decValue" style="min-width:3ex;">
                                 99
                                 
                                 </span>
                              </div>
                           </div>
                           <div class="buttonArea hideInSM">
                           <a href="{{ url('/subscribtion/mizar/1') }}" class="wdk-button t-primarySkin1 t-rightIcon " target="_blank">
							   <span class="icon">
                                 <svg class="wdk-icon icon_arrow_right_light " role="presentation">
                                    <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_arrow_right_light.svg?version=6.36.1/#icon_arrow_right_light"></use>
                                 </svg>
                              </span>
							   Select
							</a>
                        </div>
                        </div>
                        
                        
                     </div>
                  </form>
               </div>

            </section>          
            
         </main>
         <footer id="footerUnified" class="registrationLayout">
            <nav>
               <ul>
                   <li>
                     <a id="footerLink1" href="{{ url('/privacypolicy') }}">Privacy policy </a>
                  </li>
                  <li>
                     <a id="footerLink2" href="{{ url('/termsandconditions') }}" >Terms & conditions </a>
                  </li>
                  <li>
                     <a id="footerLink3" href="{{ url('/useragreement') }}" >User Agreement</a>
                  </li>
                  
               </ul>
            </nav>
         </footer>
      </div>
	 
      </div>
       <script src="https://ankitkapoor.in/datingapp1/js/app.js"></script>
    <script src="https://ankitkapoor.in/datingapp1/js/main.js"></script>
   </body>
</html>

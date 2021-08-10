@extends('layouts.main')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app_combined.css') }}">
	<script src="{{ asset('/js/modernizr_combined.js') }}" nonce=""></script>
	<script defer="" src="{{ asset('/js/peg_logger.js?v=2') }}" nonce=""></script>
	<script defer="" src="{{ asset('/js/base_combined.js') }}" nonce=""></script>
	<script defer="" src="{{ asset('/js/app_combined.js') }}" nonce=""></script>
	<style>
   .navbar { background-color: rgba(0, 142, 214, 0.6) !important; }
</style>
@endsection

@section('content')
   <body id="partnerProfilePage" class="profilePages noSubnavi ">
      <div id="appShellContent" class="">
         <div id="">
            <main id="content" class="is-visible" aria-hidden="false">
               <!-- For Mmenu -->
               <header id="profileHeader">
                  <div class="headerWrapper1">
                     <div id="bgImgBox" class="img_01_abstrakt-0017"></div>
                     <div id="sedCard">
                        <div id="photoBox">
                           <div class="photoWrapper useForVideoCallLayer">
                              <a href="javascript:void(0)" id="profilePicBM">
								 <img src="{{asset('storage/profile_pictures/'.$profileInfo->profile_picture)}}" alt="">
                                 <span class="u-photoProtector"> </span>
                                 <span class="photo clearPhoto"></span>
                              </a>
                           </div>
                        </div>
                        <div id="mainUserInfo" class="">
                           <h2>
                              <span class="givenAliasName"></span>
                              <span class="bulletPoint"> • </span>
                              <span class="myNameText">{{ $user->first_name }} {{ $user->last_name }}</span>,
                              <span class="noBreakWrapper">
                              <span class="age">{{ $user->city.', '.$user->country}}</span>
                              </span>
                           </h2>
                           <h3>
                              <span class="iconWrapper">
                                 <span class="favoredProfile ">
                                 </span>
                              </span>
                           </h3>
                        </div>
                     </div>
                     <div id="profileMenu">
                        <div id="profileMenuList" role="navigation" aria-hidden="true">
                           <ul>
                              <li>
                                 <p class="chiffre">
                                    <svg class="wdk-icon icon_user_female_100 " role="presentation">
                                       <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_user_female_100.svg?version=6.36.1/#icon_user_female_100"></use>
                                    </svg>
                                    Profile ID: EHMNDXRR
                                 </p>
                                 <button id="closePartnerProfileMenu" class="wdk-button t-plainSkin3 t-iconOnly " type="submit" aria-label="Close">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_x " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_x.svg?version=6.36.1/#icon_x"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Close </span> 
                                 </button>
                              </li>
                              <li id="favoriteButton">
                                 <a id="favoriteProfile" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-url="/partner/favorite" data-partner-userid="EHMNDXRR">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_star_2 " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_star_2.svg?version=6.36.1/#icon_star_2"></use>
                                       </svg>
                                    </span>
                                    <span class="text"> <span class="addFavorite">Add to favorites</span> <span class="removeFavorite">Remove as Favourite</span> </span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                              </li>
                              <li id="aliasButton">
                                 <a id="giveAlias" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-open-modalbox-id="giveAliasModalbox">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_address_book " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_address_book.svg?version=6.36.1/#icon_address_book"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Give nickname</span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                                 <div id="giveAliasModalbox" class="wdk-modalbox" data-url="/partner/givealias_layer?partnerChiffre=EHMNDXRR" data-close-on-esc="true" role="dialog" aria-modal="true" aria-hidden="true" inert="true"></div>
                                 <a id="editAlias" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-open-modalbox-id="editAliasModalbox">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_address_book " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_address_book.svg?version=6.36.1/#icon_address_book"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Change nickname</span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                                 <div id="editAliasModalbox" class="wdk-modalbox" data-url="/partner/givealias_layer?partnerChiffre=EHMNDXRR" data-close-on-esc="true" role="dialog" aria-modal="true" aria-hidden="true" inert="true"></div>
                              </li>
                              <li id="rejectButton">
                                 <a id="rejectProfile" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-open-modalbox-id="rejectProfileModalbox">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_forbidden " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_forbidden.svg?version=6.36.1/#icon_forbidden"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Remove match</span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                                 <div id="rejectProfileModalbox" class="wdk-modalbox" data-url="/partner/writemessage_layer/rejection?partnerUser=EHMNDXRR" data-close-on-esc="true" role="dialog" aria-modal="true" aria-hidden="true" inert="true"></div>
                                 <a id="rejectContact" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-open-modalbox-id="rejectContactModalbox">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_forbidden " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_forbidden.svg?version=6.36.1/#icon_forbidden"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Discard Contact</span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                                 <div id="rejectContactModalbox" class="wdk-modalbox" data-url="/partner/writemessage_layer/reject_contact?partnerUser=EHMNDXRR" data-close-on-esc="true" role="dialog" aria-modal="true" aria-hidden="true" inert="true"></div>
                              </li>
                              <li id="reportButton">
                                 <a id="reportProfile" class="wdk-button t-plainSkin3 wdk_loadingIndicator" href="#" data-open-modalbox-id="reportProfileModalbox">
                                    <span class="icon">
                                       <svg class="wdk-icon icon_warning " role="presentation">
                                          <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_warning.svg?version=6.36.1/#icon_warning"></use>
                                       </svg>
                                    </span>
                                    <span class="text">Report Match</span> <span class="trippleDot loader t-dark"></span> 
                                 </a>
                                 <div id="reportProfileModalbox" class="wdk-modalbox" data-url="/partner/report_profile?partnerId=EHMNDXRR" data-close-on-esc="true" role="dialog" aria-modal="true" aria-hidden="true" inert="true"></div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div id="favoriteProfileSuccess" class="wdk-toast t-small" aria-hidden="true">
                        Added to favorites 
                     </div>
                     <div id="unfavoriteProfileSuccess" class="wdk-toast t-small" aria-hidden="true">
                        Removed from reminder list 
                     </div>
                     <div id="reportProfileSuccessfull" class="wdk-toast t-small" aria-hidden="true">
                        Many thanks for reporting this profile.
                        <br><br>
                        We will check the profile accordingly. 
                     </div>
                     <div id="editAliasSuccessfull" class="wdk-toast t-small" aria-hidden="true">
                        Assign name 
                     </div>
                     <a id="partnerPagerPrev" class="partnerPager disabled" href="#"></a>
                     <a id="partnerPagerNext" class="partnerPager disabled" href="#"></a>
                  </div>
                  <div class="headerWrapper2">
                     <div class="moreInfoBox">
                        <div id="matchingPoints">
                        </div>
                       
                        <div id="communicationButtons" data-reload-url="/partner/contact_buttons?chiffre=EHMNDXRR">
                           <button id="selectMessage" class="wdk-button t-primarySkin1 t-circle t-size_200 js-onlineOnly showAnimation" type="button">
                              <span class="icon">
                                 <svg class="wdk-icon icon_message " role="presentation">
                                    <use xlink:href="/static_app/eharmony/img/icons/single_color/icon_message.svg?version=6.36.1/#icon_message"></use>
                                 </svg>
                              </span>
                              <span class="text"></span> 
                           </button>
                           
                        </div>
                     </div>
                  </div>
                  <nav id="profileTabNavi" data-scroll-to-tab-navi="" aria-label="Profile Tabs" class="showSwiperArrows">
                     <ul class="dragscroll">
                        <li id="profileTab" class="wdk_loadingIndicator active" data-content-url="/partner/profile_tab?userid=EHMNDXRR" data-content-loaded="true" data-tracking-name="PROFILE_TAB">
                           <a href="#">
                           <span class="text">
                           <span class="hideInM hideInLXL">Profile</span>
                           <span class="hideInS">About</span>
                           </span>
                           <span class="trippleDot loader t-dark"></span>
                           </a>
                        </li>
                        
                     </ul>
                  </nav>
               </header>
               <div id="tabContents">
                  <div id="profileTabContent" class="active">
                     <section class="wdk-cardDeck js-withMagicCards shuffleDone">
                        <div class="primaryCol">
                           <article id="personalStatementCard" data-2column-position="primary">
                              <h2>Introduction<span class="float-right"><i class="fas fa-edit px-3" id="abt_edit_icon" onclick="showAbtForm()"></i><i class="fas fa-times px-3 d-none"  id="abt_cross_icon" onclick="hideAbtForm()"></i></span></h2>
                              <p class="personalStatementText">{{ $userabout->aboutinfo ? $userabout->aboutinfo : 'N/A' }}</p>
                              <form class="abt-from" id="abt-from-id" style="display:none;">
									@csrf
									<textarea name="aboutinfo" id="about_info_txt" rows="10" style="width:100%">{{ $userabout->aboutinfo }}</textarea>
									<button type="submit" class="btn btn-outline-primary btn-sm ml-3">Save</button>
								</form>
                           </article>
                           <article id="similaritiesCard" data-2column-position="primary">
                              <h2>Lifestyle</h2>
                              <div id="interests" class="similarities">
                                 <h4>Interests and Hobbies<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
                                 <ul class="showState">
									 @if(count($hobbiesArr) > 0)
										 @foreach($hobbiesArr as $hobby_key => $hobby)
											<li id="hobby_d{{ $hobby_key }}">{{ $hobby }}</li>
										 @endforeach
									@else
										<li>N/A</li>
									@endif
                                 </ul>
                                 <div class="editState d-none mt-2">
								
									@if (!count($hobbiesArr)==0)
										@foreach($hobbiesArr as $hobby_key => $hobby)
											<div class="edit-state-element" id="{{$hobby_key}}">
												{{ $hobby }}
												<i class="fas fa-times pl-2"></i>
											</div>
										@endforeach
									@endif
									<form id="hobbyForm" class="mt-3 d-flex justify-content-center align-items-center">
										@csrf
										<select multiple id="hobbie_select">
											@foreach($hobbieTableData as $hobby_key => $hobby_table)
												<option value="{{ $hobby_key }}">{{ $hobby_table['hobbie'] }}</option>
											@endforeach
										</select>
										<button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
									</form>
								</div>
                              </div>
                              <div id="music" class="similarities">
                                 <h4>Music<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
                                 <ul class="showState">
									 @if(count($musicArr) > 0)
										 @foreach($musicArr as $music_key => $music)
											<li id="music_d{{ $music_key }}">{{ $music }}</li>
										 @endforeach
									@else
										<li>N/A</li>
									@endif
                                 </ul>
                                 <div class="editState d-none mt-2">
								
									@if (!count($musicArr)==0)
										@foreach($musicArr as $music_key => $music)
											<div class="edit-state-element" id="{{$music_key}}">
												{{$music}}
												<i class="fas fa-times pl-2"></i>
											</div>
										@endforeach
									@endif
									<form id="musicForm" class="mt-3 d-flex justify-content-center align-items-center">
										@csrf
										<select multiple id="music_select">
											@foreach($musicTableData as $music_key => $music_table)
												<option value="{{ $music_key }}">{{ $music_table['music'] }}</option>
											@endforeach
										</select>
										<button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
									</form>
								</div>
							
                              </div>
                              
                              <div id="holiday" class="similarities">
							 <h4>Travelling<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
							 <ul class="showState">
								@if(count($holidayArr) > 0)
									
									@foreach($holidayArr as $holiday_key => $holiday)
										<li id="holiday_d{{ $holiday_key }}">{{ $holiday }}</li>
									 @endforeach
								@else
									<li>N/A</li>
								@endif
							 </ul>
							 <div class="editState d-none mt-2">
								
								@if (!count($holidayArr)==0)
									@foreach($holidayArr as $holiday_key => $holiday)
										<div class="edit-state-element"  id="{{$holiday_key}}">
											{{$holiday}}
											<i class="fas fa-times pl-2"></i>
										</div>
									@endforeach
								@endif
								<form id="holidayForm" class="mt-3 d-flex justify-content-center align-items-center">
									@csrf
									<select multiple id="holiday_select">
										@foreach($holidaysTableData as $holiday_key => $holiday_table)
											<option value="{{ $holiday_key }}">{{ $holiday_table['holiday'] }}</option>
										@endforeach
									</select>
									<button type="submit" class="btn btn-outline-primary btn-sm ml-3">Add</button>
								</form>
							</div>
							</div>
                              
                              <div class="similarities" id="pref">
                                 <h4>Food Preference<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
                                 <ul class="showState">
									@if (!count($pref)==0)
										
										@foreach ($pref as $one)
											<li id="foodPref_{{$one->id}}">{{ $one->food_pref }}</li>
										 @endforeach
									@else
										<li>N/A</li>
									@endif
                                 </ul>
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
                              <div class="similarities" id="favoriteFood">
                                 <h4>Favorite Food<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
                                 <ul class="showState">
         									@if (!count($userFavoriteFoods)==0)
         										@foreach ($userFavoriteFoods as $one)
         										<li id="favorite_f{{$one->id}}">{{ $one->favorite_food }}</li>
         										@endforeach
         									
         									@else
         										-You have no favorite foods !!!<br>
         										Update your profile to enhance your profile.
         									@endif
                                 </ul>
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
                              <div class="similarities" id="favoriteDrink">
                                 <h4>Favorite Drink<span class="float-right"><i class="fas fa-edit px-3 openEditState"></i><i class="fas fa-times px-3 d-none closeEditState"></i></span></h4>
                                 <ul class="showState">
									@if (!count($userFavoriteDrinks)==0)
										@foreach ($userFavoriteDrinks as $one)
										<li id="favorite_d{{$one->id}}">{{ $one->favorite_drink }}</li>
										@endforeach
									@else    
										-You have no favorite drinks !!!<br>
										Update your profile to enhance your profile.
									@endif
                                 </ul>
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
                           </article>
                        </div>
                        <div class="secondaryCol">
                           <article id="factfileCard" data-2column-position="secondary" class="profileBigIconCard is-close">
                              <h2>Factfile</h2>
                              <ul class="lessFactfileItems">
								  <li id="membership">
									  <span class="wdk-icon factfileIcon itemIcon"></span>
									  <h4>Membership</h4>
									  <span class="factfileValue itemValue">
										  @if($profileInfo->subscribtion == 0)
											@php $subscription = 'N/A'; @endphp
										  @elseif($profileInfo->subscribtion == 1)
											@php $subscription = 'Mizar'; @endphp
										  @elseif($profileInfo->subscribtion == 2)
											@php $subscription = 'Premium'; @endphp
										  @elseif($profileInfo->subscribtion == 3)
											@php $subscription = 'Gold'; @endphp
										  @endif
                                       {{ $subscription }}
                                      
                                       @if($profileInfo->subscribtion == 0)
											<a class="btn btn-primary" href="{{ url('/subscribtion') }}" style="    text-decoration: none;">Purchase Subscription</a>
                                       @elseif($profileInfo->subscribtion == 1)
										 <a class="btn btn-primary" href="{{ url('/subscribtion') }}" style="    text-decoration: none;">Upgrade Subscription</a>
                                       @endif
                                       </span>
                                     
								  </li>
                                 <li id="region">
                                    <span class="wdk-icon factfileIcon itemIcon">
<!--
                                    <img src="{{ asset('/images/icon_location_pin.svg') }}" alt="City of residence">
-->
                                    </span>
                                    <h4>City of residence<span><i class="fas fa-edit px-3" id="loc_edit" onclick="showLocForm()"></i><i class="fas fa-times px-3 d-none" id="loc_close" onclick="hideLocForm()"></i></span></h4>
                                    <span class="factfileValue itemValue">
                                       {{ $user->city.', '.$user->country}}
                                    </span>
                                    
									<form id="locationForm" class="mt-3 d-flex justify-content-center align-items-center" style="display:none !important;">
										@csrf
										<span class="factfileValue itemValue">
											<label>City</label>
											<input type="text" id="city_txt" name="city" class="form-control" placeholder="City" value="{{ $user->city }}">
										
											<label>Country</label>
											<input type="text"  id="country_txt" name="country" class="form-control" placeholder="Country" value="{{ $user->country }}">
											
											<button type="submit" class="btn btn-outline-primary btn-sm ml-3" style="    margin-top: 14px;">Update</button>
										</span>
										
									</form>
									
                                 </li>
								 
                                 <li id="bodyType">
                                    <span class="wdk-icon factfileIcon itemIcon">
                                    </span>
                                    <h4>Date of Birth<span><i class="fas fa-edit px-3" id="dob_edit" onclick="showDobForm()"></i><i class="fas fa-times px-3 d-none" id="dob_close" onclick="hideDobForm()"></i></span></h4>
                                    <span class="factfileValue itemValue">{{ date('d/m/Y',strtotime($user->b_day)) }}</span>
                                 </li>
                                 <form id="dobForm" class="mt-3 d-flex justify-content-center align-items-center" style="display:none !important;">
									@csrf
									 <input type="date" name="b_day" class="form-control" placeholder="Birthday" id="bDay" value="{{ date('d/m/Y',strtotime($user->b_day)) }}">
									 <button type="submit" class="btn btn-outline-primary btn-sm ml-3" style="margin-top: 14px;">Update</button>
								 </form>
                                 
                                 <li id="ethnicity">
                                    <span class="wdk-icon factfileIcon itemIcon">
                                    </span>
                                    <h4>Sex<span><i class="fas fa-edit px-3" id="gender_edit" onclick="showUserForm()"></i><i class="fas fa-times px-3 d-none" id="gender_close" onclick="hideUserForm()"></i></span></h4>
                                    <span class="factfileValue itemValue">
                                    {{ $user->sex }} </span>
                                 </li>
                                 
									 <select name="sex" class="form-control" id="profile_sex" placeholder="Your sex" style="margin-left: 36px;display:none !important; width: 80% !important;" onchange="updateGender()">
										<option value=""> -- How do you identify -- </option>
										<option value="Male Straight" {{ ($user->sex == "Male Straight") ? "selected" : "" }}>Male Straight</option>
										<option value="Female Straight" {{ ($user->sex == "Female Straight")? "selected" : ""}}>Female Straight</option>
										<option value="Gay" {{ ($user->sex == "Gay") ? "selected" : "" }}>Gay</option>
										<option value="Lesbian" {{ ($user->sex == "Lesbian") ? "selected" : ""}}>Lesbian</option>
										<option value="Bisexual" {{ ($user->sex == "Bisexual") ? "selected" : ""}}>Bisexual</option>
										<option value="Non-Binary" {{ ($user->sex == "Non-Binary") ? "selected" : ""}}>Non-Binary</option>
										<option value="Prefer not to say" {{ ($user->sex == "Prefer not to say") ? "selected" : ""}}>Prefer not to say</option>
									</select>
								
                              </ul>
                              

                        </div>

                           </div>
                        </div>
                     </section>
                  </div>
               </div>

            </main>
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
         </div>
      </div>
      @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/create_profile_image.js') }}"></script>
    <script>
        let favoriteDrink = @json($favoriteDrink);
        let favoriteFood = @json($favoriteFood);
        let food_pref = @json($food_pref);
        
        let csrf_token = '{{csrf_token()}}';
        
        function showAbtForm(){
			$('#abt-from-id').css('display','block');
			$('#abt_edit_icon').css('display','none');
			$('#abt_cross_icon').css('display','block');
			$('#abt_cross_icon').removeClass('d-none');
		}
	
		function hideAbtForm(){
			$('#abt-from-id').css('display','none');
			$('#abt_edit_icon').css('display','block');
			$('#abt_cross_icon').css('display','none');
			$('#abt_cross_icon').addClass('d-none');
		}
		
		function showLocForm(){
			$('#loc_edit').css('display','none');
			$('#loc_close').css('display','block');
			$('#loc_close').removeClass('d-none');
			$('#locationForm').css('display','block');
		}
		
		function hideLocForm(){
			$('#loc_edit').css('display','block');
			$('#loc_close').css('display','none');
			$('#locationForm').css('display','none !important;');
			$('#loc_close').addClass('d-none');
		}
		
		function showUserForm(){
			$('#profile_sex').css('display','block');
			$('#gender_edit').css('display','none');
			$('#gender_close').css('display','block');
			$('#gender_close').removeClass('d-none');
		}
		
		function hideUserForm(){
			$('#profile_sex').css('display','none');
			$('#gender_edit').css('display','block');
			$('#gender_close').css('display','none');
			$('#gender_close').addClass('d-none');
		}
		
		function updateGender(){
		
		let value = $('#profile_sex').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/updategender',
                data:{_token : csrf_token, gender : value},
                success:function() {
                    location.reload();
                },
            });
        }
	}
	
	function showDobForm(){
		$('#dobForm').css('display','block');
		$('#dob_edit').css('display','none');
		$('#dob_close').css('display','block');
		$('#dob_close').removeClass('d-none');
	}
	
	function hideDobForm(){
		$('#dobForm').css('display','none');
		$('#dob_edit').css('display','block');
		$('#dob_close').css('display','none');
		$('#dob_close').removeClass('d-none');
	}
        
    </script>

@endsection
   </body>
</html>
@endsection

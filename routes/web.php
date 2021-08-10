<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\AdditionalInformationController;
use App\Http\Controllers\TendenciesController;
use App\Http\Controllers\AppAjaxController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\SubscribtionController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionaireController;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->middleware('guest');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//Auth::routes(['verify' => true]);

Route::get('testemail/', [QuestionaireController::class, 'testemail']);

Route::group(['middleware'=> ['auth','is.admin']],function (){

    Route::resource('profile',ProfileInformationController::class);
    Route::get('profile2',[ProfileInformationController::class,'profile2']);
    Route::resource('profilePicture',ProfilePictureController::class);
    Route::get('set',[TendenciesController::class, 'create']);
    Route::post('set',[TendenciesController::class, 'store']);
    
});



Route::group(['middleware' => ['auth','is.admin','check.profile']],function(){  

    Route::get('dashboard',[DashboardController::class,'index']); 
    Route::post('like',[AppAjaxController::class, 'like']);
    Route::post('dislike',[AppAjaxController::class, 'dislike']);

    Route::post('foodpreferences',[AppAjaxController::class,'setFoodPref']);
    Route::post('removefoodpreference',[AppAjaxController::class,'deleteFoodPref']);
    
    Route::post('userholidays',[AppAjaxController::class,'setuserholidays']);
    Route::post('removeholidays',[AppAjaxController::class,'deleteUserHolidays']);
    
    Route::post('usermusic',[AppAjaxController::class,'setusermusic']);
    Route::post('removemusic',[AppAjaxController::class,'deleteUserMusic']);
    
    Route::post('userhobbie',[AppAjaxController::class,'setuserhobbie']);
    Route::post('removehobbie',[AppAjaxController::class,'deleteUserHobbie']);

    Route::post('favoritefoods',[AppAjaxController::class,'setFavoriteFoods']);
    Route::post('removefavoritefood',[AppAjaxController::class,'deleteFavoriteFood']);

    Route::post('favoritedrinks',[AppAjaxController::class,'setFavoriteDrinks']);
    Route::post('removefavoritedrink',[AppAjaxController::class,'deleteFavoriteDrink']);
    
    
    Route::post('updatestatecity',[AppAjaxController::class,'setCityState']);
    Route::post('updategender',[AppAjaxController::class,'setGender']);
    
    Route::post('updatebday',[AppAjaxController::class,'setBirthday']);
    
    
    Route::post('aboutinfo',[AppAjaxController::class,'setaboutinfo']);

    Route::post('sendmessage', [MessageController::class, 'store']);
    Route::post('seen', [MessageController::class, 'seen']);

    Route::get('subscribtion',[SubscribtionController::class, 'index']);
    Route::get('subscribtion/{type}/{month}',[SubscribtionController::class, 'paymentForm']); 
    Route::get('test-subscribtion',[SubscribtionController::class, 'test']);
    Route::get('process-payment/{amt}/{type}',[SubscribtionController::class, 'process']);
    
    Route::get('save-payment',[SubscribtionController::class, 'savePaymentDetails']);
});

Route::post('register-step1/', [QuestionaireController::class, 'savedata']);
Route::post('savefoodpreference/', [QuestionaireController::class, 'saveFoodPreference']);
Route::post('saveuserhobbies/', [QuestionaireController::class, 'saveUserHobbies']);
Route::post('savefreeTimeoptions/', [QuestionaireController::class, 'saveFreeTimeOptions']);
Route::post('saveusermusic/', [QuestionaireController::class, 'saveUserMusic']);
Route::post('saveuserholidays/', [QuestionaireController::class, 'saveUserHolidays']);
Route::post('saveoptions/', [QuestionaireController::class, 'saveOptions']);
Route::post('saveaboutinfo/', [QuestionaireController::class, 'saveAboutInfo']);
Route::get('register/questionaire/{step}/{id}', [QuestionaireController::class, 'questionaire']);
Route::get('/questionaire/about/{id}', [QuestionaireController::class, 'aboutInfo']);
Route::get('questions/{id}', [QuestionaireController::class, 'questions']);
Route::get('questions2/{id}', [QuestionaireController::class, 'questions2']);
Route::get('privacypolicy', [LegalController::class, 'privacyPolicy']);
Route::get('termsandconditions', [LegalController::class, 'termsAndConditions']);
Route::get('useragreement', [LegalController::class, 'userAgreement']);


Route::get('/sign-in/github', [SocialiteController::class, 'github']);
Route::get('/sign-in/github/redirect', [SocialiteController::class, 'githubRedirect']);


Route::group(['middleware' => ['auth','not.admin']], function(){

    Route::get('/adminPanel', [AdminController::class, 'index']);
    Route::get('/userdashboard/{id}', [AdminController::class, 'userDashboard']);
    Route::get('/profileadminview/{user}/{id}', [ProfileInformationController::class, 'adminView']);

});

//Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

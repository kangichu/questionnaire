<?php

use Illuminate\Support\Facades\Route;

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
	if(Auth::check()){ 
		if(Auth::user()->hasRole('user')){ 
			return redirect('/user');
		} else if(Auth::user()->hasRole('administrator')){ 
			return redirect('/home');
		} else if(Auth::user()->hasRole('superadministrator')){ 
			return redirect('/admin');
		}
		
	}
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');



//Send OTP
Route::post('/sendOtp', 'SendOTPController@sendOtp');

//change password on first login
Route::get('/changePassword/Form','PassController@showChangePasswordForm')->name('passForm');
Route::post('/changePassword','PassController@changePassword')->name('changePassword');

//Survey 
Route::get('/survey/view', 'SurveyController@index');
Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');



// Administrator & superadministrator
Route::group(['middleware' => 'role:administrator|superadministrator'], function (){
	
	Route::get('/questionnaires/create', 'QuestionnaireController@create');
	Route::post('/questionnaires/delete', 'QuestionnaireController@destroy')->name('questionnaire_delete');
	Route::get('/questionnaires/view', 'QuestionnaireController@index');
	Route::post('/questionnaires', 'QuestionnaireController@store');
	Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');

	Route::get('/questionnaires/activate/{id}', 'QuestionnaireController@activate');
	Route::get('/questionnaires/deactivate/{id}', 'QuestionnaireController@deactivate');


	Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
	Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');
	Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');

	Route::get('/survey/answers', 'SurveyController@answers');
	
});

// Superadministrator
Route::group(['middleware' => 'role:superadministrator'], function (){

	//Users
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/users', 'UserController@users');
	Route::post('/r/reset', 'UserController@preset')->name('preset');
	Route::resource('/d', 'UserController');
	Route::get('/users/create', 'UserController@userscreate');
	Route::post('/users/upgrade', 'UserController@userUpgrade')->name('upgradeUser');
	Route::post('/add', 'UserController@store')->name('add');

});







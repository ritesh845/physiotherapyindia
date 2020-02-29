<?php

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
    return view('welcome');
    
});

//Auth Related Controllers
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'VerifyController@getVerify')->name('getverify');
Route::get('/resendVerifyCode', 'VerifyController@resendVerifyCode')->name('resendVerifyCode');
Route::post('/verify', 'VerifyController@postVerfiy')->name('verify');
Route::get('/verify/{token}', 'VerifyController@verifyUser')->name('verifyUser');


//Common Function Use
Route::get('/states/{country_code}', 'HomeController@states');
Route::get('/cities/{state_code}', 'HomeController@cities');


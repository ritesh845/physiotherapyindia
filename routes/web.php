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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'VerifyController@getVerify')->name('getverify');
Route::get('/resendVerifyCode', 'VerifyController@resendVerifyCode')->name('resendVerifyCode');
Route::post('/verify', 'VerifyController@postVerfiy')->name('verify');
Route::get('/verify/{token}', 'VerifyController@verifyUser')->name('verifyUser');

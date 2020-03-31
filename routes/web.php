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
    return view('layouts.home');
    
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
Route::get('/doc_download/{id}', 'HomeController@doc_download');

Route::get('/notification_read/{id}', 'HomeController@notification_read')->name('notification_read');


Route::post('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::get('article_show/{id}', 'BasicController@article_show')->name('article_show');

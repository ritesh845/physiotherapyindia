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

// Route::prefix('admin')->group(function() {
	Route::group(['prefix' => 'admin', 'middleware' => ['role:super_admin']], function() {
	    Route::resource('/', 'AdminController');
	   
	});
	Route::group(['middleware' => ['role:super_admin|member']], function() {
		Route::resource('/service', 'ServiceController');
	    Route::get('/services_docs/{id}', 'ServiceController@services_docs');
	    Route::post('/member_document', 'ServiceController@member_document');
		Route::resource('/article', 'ArticleController');
	});


 // });

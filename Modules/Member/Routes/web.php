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

// Route::prefix('member')->group(function() {
    Route::resource('/member', 'MemberController');
    Route::resource('/qualification', 'QualificationController');
    Route::resource('/specialization', 'SpecializationController');
    Route::post('/member_photo', 'MemberController@member_photo');
// });

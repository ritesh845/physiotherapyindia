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
	Route::group(['middleware' => ['role:super_admin']], function() {
	    Route::resource('/admin', 'AdminController');

	   	Route::resource('/acl/user', 'ACL\UserController');
	   	Route::get('/acl/user/role/{id}','ACL\UserController@role');
	   	Route::post('/acl/user/role_assign','ACL\UserController@role_assign');
	   	Route::get('/acl/user/permission/{id}','ACL\UserController@permission');
	   	Route::post('/acl/user/permission_assign','ACL\UserController@permission_assign');
	   	Route::resource('/acl/role', 'ACL\RoleController');
	   	Route::resource('/acl/permission', 'ACL\PermissionController');
	});
	Route::group(['middleware' => ['role:super_admin|admin|member|member_admin']], function() {

		Route::group(['prefix' => 'approval'], function(){
			Route::get('qualification','ApprovalController@qualifications');
		   	Route::get('qualification/{id}','ApprovalController@qualification_show');
		   	Route::get('qualification_approve/{id}','ApprovalController@qualification_approve');
		   	Route::post('qualification_approve_all','ApprovalController@qualification_approve_all');
		   	
		   	Route::post('qualification_decline','ApprovalController@qualification_decline');
		   	Route::post('qualification_decline_all','ApprovalController@qualification_decline_all');

		   	Route::get('specialization','ApprovalController@specialization');
		   	Route::get('specialization/{id}','ApprovalController@specialization_show');
		   	Route::get('specialization_approve/{id}','ApprovalController@specialization_approve');
		   	Route::post('specialization_approve_all','ApprovalController@specialization_approve_all');

		   	Route::post('specialization_decline','ApprovalController@specialization_decline');
		   	Route::post('specialization_decline_all','ApprovalController@specialization_decline_all');
		});

		Route::resource('/service', 'ServiceController');
		Route::get('/service/destroy/{id}', 'ServiceController@delete');
	    Route::get('/services_docs/{id}', 'ServiceController@services_docs');
	    Route::post('/member_document', 'ServiceController@member_document');
	    
	});

	Route::group(['middleware' => ['role:super_admin|admin']], function() {
		Route::resource('/article', 'Content\ArticleController');
		Route::get('/article/destroy/{id}', 'Content\ArticleController@delete');
	});


 // });

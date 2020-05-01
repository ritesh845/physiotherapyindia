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
		   	Route::get('service_request','ApprovalController@service_request');
		});

		Route::resource('/service', 'ServiceController');
		Route::get('/service/destroy/{id}', 'ServiceController@delete');
	    Route::get('/services_docs/{id}', 'ServiceController@services_docs');
	    Route::post('/member_document', 'ServiceController@member_document');
		
		Route::get('/service/coming_soon/{id}', 'ServiceFormController@coming_soon');
	    
		Route::get('/service/iap_membership/{id}', 'ServiceFormController@iap_membership');
		Route::post('/service/iap_membership/store', 'ServiceFormController@iap_membership_store');
		Route::get('/service/iap_membership_edit/{id}', 'ServiceFormController@iap_membership_edit');
		Route::patch('/service/iap_membership/update/{id}', 'ServiceFormController@iap_membership_update');

		Route::get('/service/payment/{id}', 'ServiceFormController@service_payment');
		Route::get('/service/payment_now/{id}', 'ServiceFormController@payment_now');
	});

	Route::group(['middleware' => ['role:super_admin|admin']], function() {
		Route::resource('/article', 'Content\ArticleController');
		Route::get('/article/destroy/{id}', 'Content\ArticleController@delete');
		Route::post('/article/category_update', 'Content\ArticleController@category_update');
		
		Route::post('/article/update_order', 'Content\ArticleController@update_order');
	});


 // });

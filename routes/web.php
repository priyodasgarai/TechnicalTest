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

Route::prefix('admin')->group(function(){
	Route::match(['get','post'],'/','application\ADMIN\AdminController@login');
	Route::get('/dashboard','application\ADMIN\AdminController@dashboard');
	
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('Admin-view.login');
});
Route::get('/dashboard', function () {
    return view('Admin-view.dashboard');
});



->namespace('application\ADMIN')
*/
Route::get('/blank', function () {
    return view('Admin-view.blank');
});
Route::prefix('admin')->namespace('application\ADMIN')->group(function(){
	Route::match(['get','post'],'/','AdminController@login');
        Route::group(['middleware'=>['admin']],function(){
            Route::get('/dashboard','AdminController@dashboard');
            Route::get('/update-admin-password','AdminController@editAdminPassword');
            Route::get('/logout','AdminController@logout');
            Route::post('check-current-pwd','AdminController@chkCurrentPassword');
            Route::post('update-current-pwd','AdminController@updateCurrentPassword');
            Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
            
             /**************************************************************************************
    Route::any('admin-stores-new','application\admin\CategoryController@admin_store_new');
    Route::get('admin-stores','application\admin\CategoryController@admin_store_get');
    Route::get('admin-stores-edit-{id}', 'application\admin\CategoryController@admin_store_edit');
    Route::post('admin-stores-edit-post','application\admin\CategoryController@admin_store_edit_post');
    Route::get('admin-stores-delete-{id}', 'application\admin\CategoryController@admin_store_delete');
     /**************************************************************************************/
            Route::get('/sections','SectionController@sections');
            
        });
	
	
});
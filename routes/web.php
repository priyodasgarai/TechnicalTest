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
    return view('welcome');
});

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
     /****************************************Sections**********************************************/     
            Route::get('/sections','SectionController@sections');
            Route::post('update-section-status','SectionController@updateSectionStatus');
            Route::match(['get','post'],'add-section','SectionController@addSection');
            Route::get('/edit-section-{id}','SectionController@editSection');
            Route::post('/edit-section','SectionController@updateSection');
            Route::get('section-delete-{id}', 'SectionController@deleteSection');
    /****************************************Categories**********************************************/     
            Route::get('/categories','CategoryController@categories');
            Route::post('update-category-status','CategoryController@updateCategoryStatus');
            Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
            Route::post('append-categories-level','CategoryController@appendCategoriesLevel');
//            Route::post('update-section-status','SectionController@updateSectionStatus');
//            Route::match(['get','post'],'add-section','SectionController@addSection');
//            Route::get('/edit-section-{id}','SectionController@editSection');
//            Route::post('/edit-section','SectionController@updateSection');
//            Route::get('section-delete-{id}', 'SectionController@deleteSection');
            
        });
	
	
});
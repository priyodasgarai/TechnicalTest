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


Route::any('/add-post', 'adminController\postController@create');
Route::any('/', 'adminController\postController@post_get');   
Route::get('admin-post-edit-{id}', 'adminController\postController@post_edit');
Route::put('admin-post-submit-{id}', 'adminController\postController@post_edit_submit');

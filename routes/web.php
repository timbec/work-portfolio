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

Route::get('/dashboard', 'AdminController@index')->name('dashboard');

Route::resource('/dashboard/users', 'Dashboard\AdminUsersController' );
Route::resource('/dashboard/posts', 'Dashboard\AdminPostsController', ['names' => [
    'index' => 'admin.posts.index', 
    'create' => 'admin.posts.create',
    'store' => 'admin.posts.store', 
    'edit' => 'admin.posts.edit'
]]);

Route::resource('/dashboard/categories', 'Dashboard\AdminCategoriesController', ['names' => [
    'index' => 'admin.categories.index', 
    'create' => 'admin.categories.create',
    'store' => 'admin.categories.store', 
    'edit' => 'admin.categories.edit'
]]);

 Route::resource('/dashboard/media', 'Dashboard\AdminMediaController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'
    ]]);

//Route::get('/dashboard/media/upload', ['as'=>'admin.media.upload']);

Route::delete('admin/delete/media', 'Dashboard\AdminMediaController@deleteMedia');

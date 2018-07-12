<?php

use App\Post;
use App\Work;
use App\Tag;
use App\WorkCategory;


use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\WorkResource as WorkResource;
use App\Http\Resources\WorkSingle as WorkSingle;
use App\Http\Resources\PostSingle as PostSingle;

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

use Illuminate\Support\Facades\Mail; 

/**
 * REST API
 */
 Route::get('/works', function() {

    $works = Work::all();

    $tags = Tag::all();

    return WorkResource::collection($works);

 });

Route::get('/test', function() {

    $works = Work::all();

    $tags = Tag::all();

    return $tags;

});

Route::get('/posts', function() {

   $posts = Post::all();

   return PostResource::collection($posts);

});


Route::get('/work-categories', function() {

   $work_categories = WorkCategory::all();

   return $work_categories;
});

Route::get('/posts/{id}', function($slug) {
   $post = Post::findBySlugOrFail($slug);

   return new PostSingle($post);
});

Route::get('/works/{id}', function($slug) {
   $work = Work::findBySlugOrFail($slug);
   $tags = Tag::all();
   $work_categories = WorkCategory::all();

   return new WorkSingle($work);
});

//Contact Forms
Route::get('contact',
    ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'ContactController@store']);

/**
 * Pages Controller
 */
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about' );
Route::get('/contact', 'PagesController@contact' );

Route::get('/projects', 'WorksController@index' );
Route::get('projects/{id}', ['as'=>'project.work', 'uses'=>'WorksController@work']);

Route::get('/blog', 'PostsController@index' );
Route::get('blog/{id}', ['as'=>'blog.post', 'uses'=>'PostsController@post']);

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

Route::resource('/dashboard/work-categories', 'Dashboard\AdminWorkCategoriesController', ['names' => [
    'index' => 'admin.work-categories.index',
    'create' => 'admin.work-categories.create',
    'store' => 'admin.work-categories.store',
    'edit' => 'admin.work-categories.edit'
]]);

 Route::resource('/dashboard/media', 'Dashboard\AdminMediaController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'
    ]]);
//Route::get('/dashboard/media/upload', ['as'=>'admin.media.upload']);

//Works
Route::resource('dashboard/works', 'Dashboard\WorksController',
['names' => [
     'index' => 'admin.works.index',
     'create'=>'admin.works.create',
     'store'=>'admin.works.store',
     'edit'=>'admin.works.edit'
]]);

Route::delete('admin/delete/media', 'Dashboard\AdminMediaController@deleteMedia');

Route::resource('/dashboard/tags', 'Dashboard\AdminTagsController', ['names' => [
    'index' => 'admin.tags.index',
    'create' => 'admin.tags.create',
    'store' => 'admin.tags.store',
    'edit' => 'admin.tags.edit'
]] );

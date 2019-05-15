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
//Route::get('/', function(){ return abort(404); });
Route::get('/', 'PublicController@index')->name('index');
Route::get('/post/{id}', 'PublicController@singlePost')->name('singlePost');
Route::get('/about-us', 'PublicController@aboutUs')->name('about');

Route::get('/contact-us', 'PublicController@contactUs')->name('contact');
Route::post('/contact-us', 'PublicController@contactUsPost')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('post/new', 'AuthorController@newPost')->name('newPost');
    Route::post('post/new', 'AuthorController@submitNewPost')->name('submitNewPost');
    Route::post('post/{id}/delete', 'AuthorController@deletePost')->name('deletePost');
    Route::get('post/{id}/edit', 'AuthorController@editPost')->name('postEdit');
    Route::post('post/{id}/edit', 'AuthorController@submitEditPost')->name('submitEditPost');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});


Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'AdminController@posts')->name('adminPosts');
    Route::post('post/{id}/delete', 'AdminController@deletePost')->name('adminDeletePost');
    Route::get('post/{id}/edit', 'AdminController@editPost')->name('adminPostEdit');
    Route::post('post/{id}/edit', 'AdminController@submitEditPost')->name('adminSubmitEditPost');
    Route::get('comments', 'AdminController@comments')->name('adminComments');
    Route::post('comment/{id}/delete', 'AdminController@deleteComment')->name('adminDeleteComment');
    Route::get('users', 'AdminController@users')->name('adminUsers');
    Route::get('user/{id}/edit', 'AdminController@adminUserEdit')->name('adminUserEdit');
    Route::post('user/{id}/edit', 'AdminController@submitUserEdit')->name('submitUserEdit');
    Route::post('user/{id}/delete', 'AdminController@deleteUser')->name('adminDeleteUser');
});
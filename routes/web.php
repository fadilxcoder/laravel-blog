<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{PublicController, AdminController, AuthorController, HomeController, UserController};
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

/*
Route::get('/', function() {
    return abort(404); # Force 404
});
*/

# Open routes
Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/home', [PublicController::class, 'index'])->name('home');
Route::get('/post/{id}', [PublicController::class, 'singlePost'])->where('id', '[0-9]+')->name('singlePost');
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('about');
Route::get('/contact-us', [PublicController::class, 'contactUs'])->name('contact');
Route::post('/contact-us', [PublicController::class, 'contactUsPost'])->name('contactPost');
Route::get('/cars', [PublicController::class, 'carsList'])->name('carlist');
Route::get('/car/{id}', [PublicController::class, 'carSingle'])->name('carSingle');
Route::get('/posts-manipulation/{id}', [PublicController::class, 'postManipulation'])->name('post_manipulation');

Route::resource('car-lists', \App\Http\Controllers\CarsController::class);

# Authentication routes
Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

# User routes
Route::prefix('user')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('userDashboard');
    Route::get('/comments', [UserController::class, 'comments'])->name('userComments');
    Route::post('/comment/{id}/delete', [UserController::class, 'deleteComment'])->name('deleteComment');
    Route::get('/profile', [UserController::class, 'profile'])->name('userProfile');
    Route::post('/profile', [UserController::class, 'profilePost'])->name('userProfilePost');
});

# Author routes
Route::group(['prefix' => 'author', 'middleware' => ['auth', 'checkRole:author']], function() {
    Route::get('/dashboard', [AuthorController::class, 'dashboard'])->name('authorDashboard');
    Route::get('/comments', [AuthorController::class, 'comments'])->name('authorComments');
    Route::get('/posts', [AuthorController::class, 'posts'])->name('authorPosts');
    Route::get('/post/new', [AuthorController::class, 'newPost'])->name('newPost');
    Route::post('/post/new', [AuthorController::class, 'submitNewPost'])->name('submitNewPost');
    Route::post('/post/{id}/delete', [AuthorController::class, 'deletePost'])->name('deletePost');
    Route::get('/post/{id}/edit', [AuthorController::class, 'editPost'])->name('postEdit');
    Route::post('/post/{id}/edit', [UserController::class, 'submitEditPost'])->name('submitEditPost');
});

# Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('/posts', [AdminController::class, 'posts'])->name('adminPosts');
    Route::post('/post/{id}/delete', [AdminController::class, 'deletePost'])->name('adminDeletePost');
    Route::get('/post/{id}/{title}/edit', [AdminController::class, 'editPost'])->where(['id' => '[0-9]+', 'author' => '[a-z-]+'])->name('adminPostEdit');
    Route::post('/post/{id}/edit', [AdminController::class, 'submitEditPost'])->name('adminSubmitEditPost');
    Route::get('/comments', [AdminController::class, 'comments'])->name('adminComments');
    Route::post('/comment/{id}/delete', [AdminController::class, 'deleteComment'])->name('adminDeleteComment');
    Route::get('/users', [AdminController::class, 'users'])->name('adminUsers');
    Route::get('/user/{id}/edit', [AdminController::class, 'adminUserEdit'])->name('adminUserEdit');
    Route::post('/user/{id}/edit', [AdminController::class, 'submitUserEdit'])->name('submitUserEdit');
    Route::post('/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('adminDeleteUser');
});

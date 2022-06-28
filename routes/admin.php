<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([ 
    'register' => false
]);

Route::get('change-language/{locale}','Admin\LanguageController@changeLanguage')->name('frontend_change_locale');

Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::group(['namespace' => 'Admin\User'], function () {
            Route::get('dashboard', 'UserController@dashboard')->name('admin.dashboard');
        });
        // Manage Categories
        Route::group([ 'namespace' => 'Admin\Category'], function () {
            Route::resource('categories', 'CategoryController');
        });
        // Manage Posts
        Route::group([ 'namespace' => 'Admin\Post'], function () {
            Route::resource ('posts','PostController');
            Route::get('posts/galleries/destroy/{id}','PostController@showGallery')->name('posts.gallery');
            Route::delete('posts/gallery/destroy/{photo}','PostController@deleteGallery')->name('posts.gallery.destroy');
        });
        // Manage Posts
        Route::group([ 'namespace' => 'Comment'], function () {
            Route::get('comments','CommentController@index')->name('comments.index');
            Route::delete('comments/destroy/{id}','CommentController@destroy')->name('comments.destroy');
            Route::get('/markAsRead', 'CommentController@markAsReadAll')->name('MarkAsRead_all');
        });
        // Manage Tags
        Route::group([ 'namespace' => 'Admin\Tag'], function () {
            Route::resource('tags','TagController');
        });
        // Manage Testimonial
        Route::group([ 'namespace' => 'Admin\Testimonial'], function () {
            Route::resource('testimonials','TestimonialController');
        });
        //manage about
        Route::group(['prefix'=>'abouts','namespace'=>'Admin\About'],function () {
            Route::get('/', 'AboutController@about')->name('admin.about');
            Route::put('/update', 'AboutController@aboutUpdate')->name('about.update');
        });
    // Manage users
        Route::group(['prefix' => 'users', 'namespace' => 'Admin\User'], function () {
            Route::get('/', 'UserController@index')->name('admin.user');
            Route::get('/create', 'UserController@create')->name('admin.user.create');
            Route::post('/create', 'UserController@store')->name('admin.user.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit');
            Route::post('/edit/{id}', 'UserController@update')->name('admin.user.update');
            Route::delete('/destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');
            Route::post('/{id}', 'UserController@changepassword')->name('admin.user.changepassword');
        });
    });

<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/', function () {
    return view('front.pages.home');
})->name('home.index');
    Route::get('/about', function () {
        return view('front.pages.about');
    })->name('home.about');
    Route::get('/services', function () {
        return view('front.pages.service');
    })->name('home.service');
    
Route::get('/blog','Front\FrontController@blog')->name('home.blog');
Route::get('/single-blog/{id}','Front\FrontController@blogShow')->name('home.single-blog');

Route::post('blog/comment/{post}','Front\Comment\CommentController@store')->name('comment.store');
Route::post('blog/like','Front\FrontControlle@like')->name('blog.like');

    Route::get('/contact',function(){
        return view('front.pages.contact');
    })->name('home.contact');
// });

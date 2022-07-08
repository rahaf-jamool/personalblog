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

Route::get('/','Front\FrontController@home')->name('home.index');

Route::get('/about','Front\FrontController@about')->name('home.about');

Route::get('/blogs','Front\FrontController@blog')->name('home.blog');
Route::get('/single-blog/{id}','Front\FrontController@blogShow')->name('home.single-blog');
Route::get('/blog/search','Front\FrontController@search')->name('blog.search');
Route::post('blog/comment/{post}','Comment\CommentController@store')->name('comments.store');
Route::post('blog/comment-replay/{comment}','Comment\CommentReplayController@store')->name('commentReplay.store');
Route::post('blog/like','Front\FrontController@like')->name('blog.like');

Route::get('/categories', 'Front\FrontController@categories')->name('home.categories');
    
Route::get('/my-channel','Youtube\YoutubeController@getPlayListIndex')->name('home.mychannel');
Route::get('/getVideos/{id}','Youtube\YoutubeController@getPlayListVideosIndex')->name('home.getVideos');
Route::get('/contact','Front\FrontController@contact')->name('home.contact');
Route::post('/contact/send-message','Front\FrontController@sendMessage')->name('contact.sendMessage');

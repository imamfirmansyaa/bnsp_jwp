<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/post/article', 'PostController@article')->name('post.article');
Route::post('/post/post-comment/', 'PostController@postComment')->name('post.post-comment');
Route::get('/post/comment/{id}', 'PostController@comment')->name('post.comment');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/post' , 'PostController');
Route::resource('/comment', 'CommentController');
Route::resource('/profile', 'ProfileController');

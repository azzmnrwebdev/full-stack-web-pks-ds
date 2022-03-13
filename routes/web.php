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


Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index');

    Route::resource('profile', 'ProfileController')->only([
        'index', 'edit', 'update'
    ]);

    Route::resource('posts', 'PostsController');
});

Route::resource('comment', 'CommentController')->only([
    'store', 'destroy'
]);

Route::resource('reply', 'ReplyController')->only([
    'store', 'destroy'
]);


Auth::routes();

Route::get('users', 'UserController@users')->name('users');
Route::get('user/{id}', 'UserController@user')->name('user.view');
Route::post('ajaxRequest', 'UserController@ajaxRequest')->name('ajaxRequest');

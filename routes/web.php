<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['namespace' => 'Blog'], function() {
    //Home
    Route::get('blog/', 'ArticleController@home')
        ->name('blog.home');

    //Article Detail
    Route::get('blog/{article}', 'ArticleController@article')
        ->name('blog.article');

    //Article Add
    Route::get('blog/article/add', 'ArticleController@add')->name('blog.article.add')->middleware('auth');
    Route::post('blog/api/article/add', 'ArticleController@apiAdd')->name('blog.api.article.add')->middleware('auth');

    //Article Edit
    Route::get('blog/{article}/edit', 'ArticleController@edit')->name('blog.article.edit')->middleware('auth');
    Route::post('blog/api/{article}/edit', 'ArticleController@apiEdit')->name('blog.api.article.edit')->middleware('auth');

    //Article Delete
    Route::post('blog/api/delete', 'ArticleController@apiDelete')->name('blog.api.article.delete')->middleware('auth');
});


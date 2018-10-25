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

Route::group(['prefix' => 'admin'], function() {
    Route::get('app/profile', 'Admin\AppController@add')->middleware('auth');
    Route::get('app/create', 'Admin\AppController@new'); //新規作成ページ
    Route::post('app/create', 'Admin\AppController@create'); //作成ボタン
    Route::get('app', 'Admin\AppController@index');//一覧
    Route::get('app/detail', 'Admin\AppController@detail');//詳細ページ
    Route::get('app/timeline', 'Admin\AppController@timeline');//timeline
    Route::get('app/tweet', 'Admin\AppController@tweet');//投稿作成
    Route::post('app/tweet', 'Admin\AppController@contribution');//ツイートする
    Route::get('app/event', 'Admin\AppController@event');//event
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

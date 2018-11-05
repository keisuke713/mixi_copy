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
    Route::get('app/create', 'Admin\AppController@new')->middleware('auth'); //新規作成ページ
    Route::post('app/create', 'Admin\AppController@create')->middleware('auth'); //作成ボタン
    Route::get('app', 'Admin\AppController@index')->middleware('auth');//一覧
    Route::get('app/top/{community}', 'Admin\AppController@top')->middleware('auth');//詳細ページ
    Route::get('app/timeline/{community}', 'Admin\AppController@timeline')->middleware('auth');//timeline
    Route::get('app/tweet/{community}', 'Admin\AppController@tweet')->middleware('auth');//投稿作成
    Route::post('app/tweet/{community}', 'Admin\AppController@contribution')->middleware('auth');//ツイートする
    Route::get('app/comment/{tweet}', 'Admin\AppController@comment')->middleware('auth');//コメント作成ページ
    Route::post('app/comment/{tweet}', 'Admin\AppController@post')->middleware('auth');//コメント送信
    Route::get('app/list/{tweet}', 'Admin\AppController@list')->middleware('auth');//コメント一覧表示
    Route::get('app/event/{community}', 'Admin\AppController@event')->middleware('auth');//event
    Route::get('app/make/{community}', 'Admin\AppController@make')->middleware('auth');//event作成ページ
    Route::post('app/make/{community}', 'Admin\AppController@submit')->middleware('auth');//event送信
    Route::get('app/join/{community}', 'Admin\AppController@join')->middleware('auth');//参加する
    Route::get('app/delete/{community}', 'Admin\AppController@delete')->middleware('auth');//退会する
    Route::get('app/flash/{community}', 'Admin\AppController@flash')->middleware('auth');//フラッシュ
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

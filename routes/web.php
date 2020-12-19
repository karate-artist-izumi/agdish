<?php

use App\Plan;
use Illuminate\Http\Request;

//検索ページ
Route::get('/books', 'PlansController@search');

//topページ
Route::get('/tops', 'PlansController@top');

//詳細ページ
Route::get('/details/{id}', 'PlansController@detail');

//一覧画面
Route::get('/', 'PlansController@list');

//プラン登録
Route::post('/plans','PlansController@store');

//プラン削除
Route::delete('/plan/{plan}', 'PlansController@destroy');


//更新画面
Route::post('/plansedit/{plans}', 'PlansController@edit');

// 更新処理
Route::post('/plans/update','PlansController@update');

// 以下小川作業分

Route::post('/buy', 'ShopController@input');
Route::get('/buy/result', 'ShopController@result');

// 小川作業ここまで

// 以下田崎作業分

Route::get('/mypage', 'UserController@showUser');

Route::get('/profile', 'UserController@showUserInfo');

Route::get('/profileedit', 'UserController@showUserEdit')->name('pe');

Route::post('/profile/update', 'UserController@showUserupdate');

Route::get('/logintest', function () {
  return view('logintest');
});

// 田崎作業ここまで

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


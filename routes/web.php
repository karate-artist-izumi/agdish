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

//野菜検索
Route::get('/search1/{vegetable}', 'PlansController@search_vegetable');

//県検索
Route::get('/search2/{small_place}', 'PlansController@search_small_place');

//AND検索
Route::get('/search4', 'PlansController@search_and');

//プラン検索
Route::post('/searchs','PlansController@search');

//日付検索
Route::post('/search3', 'PlansController@search_plan_date');



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


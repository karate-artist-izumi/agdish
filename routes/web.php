<?php

use App\Plan;
use Illuminate\Http\Request;

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


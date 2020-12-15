<?php


use App\Plan;
use Illuminate\Http\Request;

//一覧
Route::get('/', function () {
    return view('plans');
});

//登録
Route::post('/plans', function (Request $request) {
    //
});

//削除
Route::delete('/plan/{plan}', function (Book $book) {
    //
});

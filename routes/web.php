<?php


use App\Plan;
use Illuminate\Http\Request;

//topページ
Route::get('/tops', function () {
    $plans = Plan::orderBy('created_at', 'desc')->get();
    return view('tops');
});

//詳細ページ
Route::get('/details', function () {
    $plans = Plan::orderBy('created_at', 'desc')->get();
    return view('details');
});

//一覧画面
Route::get('/', function () {
    $plans = Plan::orderBy('created_at', 'desc')->get();
    return view('plans', [
        'plans' => $plans
    ]);
});

//プラン登録
Route::post('/plans', function (Request $request) {

    //バリデーション
    $validator = Validator::make($request->all(), [
        'title' => 'required',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquentモデル
    $plans = new Plan;
    $plans->title = $request->title;
    $plans->description = '説明';
    $plans->plan_date = '2020-12-17 00:00:00';
    $plans->photo = '写真url';
    $plans->ag_latitude = '35.669177';
    $plans->ag_longitude = '139.703221';
    $plans->dish_latitude = '35.680254';
    $plans->dish_longitude = '139.728755';
    $plans->price = '5000';
    $plans->place = '東京都';
    $plans->small_place = '渋谷区';
    $plans->vegetable = '地下野菜';
    $plans->map = 'mapURL';
    $plans->save(); 
    return redirect('/');



});

//プラン削除
Route::delete('/plan/{plan}', function (Plan $plan) {
    $plan->delete();       //追加
    return redirect('/');  //追加
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


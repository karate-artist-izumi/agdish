<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;   //Bookモデルを使えるようにする
use Validator;  //バリデーションを使えるようにする
use Auth;       //認証モデルを使用する

class PlansController extends Controller
{

    //topページ
    public function top(){
        $plans = Plan::orderBy('created_at', 'desc')->get();
        return view('tops');
    }

    //詳細ページ
    public function detail($id){
        $plan = Plan::find($id);
        return view('details',['plan' => $plan]);
    }

    //一覧表示
    public function list(){
        $plans = Plan::orderBy('created_at', 'desc')->get();
        return view('plans', ['plans' => $plans]);
    }


    //登録
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
        'plan_date' => 'required',
        // 'photo' => 'required',
        // 'ag_latitude' => 'required',
        // 'ag_longitude' => 'required',
        // 'dish_latitude' => 'required',
        // 'dish_longitude' => 'required',
        'price' => 'required',
        'place' => 'required',
        'small_place' => 'required',
        'vegetable' => 'required',
        // 'map' => 'required',
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
        $plans->description = $request->description;
        $plans->plan_date = $request->plan_date;
        $plans->photo = $request->photo;
        $plans->ag_latitude = $request->ag_latitude;
        $plans->ag_longitude = $request->ag_longitude;
        $plans->dish_latitude = $request->dish_latitude;
        $plans->dish_longitude = $request->dish_longitude;
        $plans->price = $request->price;
        $plans->place = $request->place;
        $plans->small_place = $request->small_place;
        $plans->vegetable = $request->vegetable;
        $plans->map = $request->map;
        $plans->save(); 
        return redirect('/');

    }

    //削除
    public function destroy(Plan $plan){
        $plan->delete();       //追加
        return redirect('/');  //追加
    }

    //更新画面
    public function edit(Plan $plans){
        return view('plansedit', ['plan' => $plans]);
    }


    //更新処理
    public function update(Request $request){
    //バリデーション
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'plan_date' => 'required',
        // 'photo' => 'required',
        // 'ag_latitude' => 'required',
        // 'ag_longitude' => 'required',
        // 'dish_latitude' => 'required',
        // 'dish_longitude' => 'required',
        'price' => 'required',
        'place' => 'required',
        'small_place' => 'required',
        'vegetable' => 'required',
        // 'map' => 'required',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $plans = Plan::find($request->id);
        $plans->title = $request->title;
        $plans->description = $request->description;
        $plans->plan_date = $request->plan_date;
        $plans->photo = $request->photo;
        $plans->ag_latitude = $request->ag_latitude;
        $plans->ag_longitude = $request->ag_longitude;
        $plans->dish_latitude = $request->dish_latitude;
        $plans->dish_longitude = $request->dish_longitude;
        $plans->price = $request->price;
        $plans->place = $request->place;
        $plans->small_place = $request->small_place;
        $plans->vegetable = $request->vegetable;
        $plans->map = $request->map;
        $plans->save(); 
        return redirect('/');

    }








}

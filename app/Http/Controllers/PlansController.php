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
        return view('tops',['plans' => $plans]);
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
        // 'description' => 'required',
        // 'plan_date' => 'required',
        // 'photo' => 'required',
        // 'ag_latitude' => 'required',
        // 'ag_longitude' => 'required',
        // 'dish_latitude' => 'required',
        // 'dish_longitude' => 'required',
        // 'adult_price' => 'required',
        // 'child_price' => 'required',
        // 'place' => 'required',
        // 'small_place' => 'required',
        // 'vegetable' => 'required',
        // 'map' => 'required',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
            }

        //file 取得
        $ag_file = $request->file('ag_photo');
        //file が空かチェック
        if( !empty($ag_file) ){
        //ファイル名を取得
        $ag_filename = $ag_file->getClientOriginalName();
        //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
        $ag_move = $ag_file->move('./upload/',$ag_filename); //public/upload/...
        }else{
        $ag_filename = "";
        }

        //file 取得
        $dish_file = $request->file('dish_photo');
        //file が空かチェック
        if( !empty($dish_file) ){
        //ファイル名を取得
        $dish_filename = $dish_file->getClientOriginalName();
        //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
        $ag_move = $dish_file->move('./upload/',$dish_filename); //public/upload/...
        }else{
        $dish_filename = "";
        }

        
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $plans = new Plan;
        $plans->title = $request->title;
        $plans->description = $request->description;
        $plans->plan_date = $request->plan_date;
        $plans->ag_name = $request->ag_name;
        $plans->dish_name = $request->dish_name;
        // $plans->photo = $request->photo;
        $plans->ag_photo = $ag_filename;
        $plans->dish_photo = $dish_filename;
        $plans->ag_latitude = $request->ag_latitude;
        $plans->ag_longitude = $request->ag_longitude;
        $plans->dish_latitude = $request->dish_latitude;
        $plans->dish_longitude = $request->dish_longitude;
        $plans->adult_price = $request->adult_price;
        $plans->child_price = $request->child_price;
        $plans->place = $request->place;
        $plans->small_place = $request->small_place;
        $plans->vegetable = $request->vegetable;
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
        // 'title' => 'required',
        // 'description' => 'required',
        // 'plan_date' => 'required',
        // 'photo' => 'required',
        // 'ag_latitude' => 'required',
        // 'ag_longitude' => 'required',
        // 'dish_latitude' => 'required',
        // 'dish_longitude' => 'required',
        // 'price' => 'required',
        // 'place' => 'required',
        // 'small_place' => 'required',
        // 'vegetable' => 'required',
        // 'map' => 'required',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        //file 取得
        $ag_file = $request->file('ag_photo');
        //file が空かチェック
        if( !empty($ag_file) ){
        //ファイル名を取得
        $ag_filename = $ag_file->getClientOriginalName();
        //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
        $ag_move = $ag_file->move('./upload/',$ag_filename); //public/upload/...
        }else{
        $ag_filename = "";
        }

        //file 取得
        $dish_file = $request->file('dish_photo');
        //file が空かチェック
        if( !empty($dish_file) ){
        //ファイル名を取得
        $dish_filename = $dish_file->getClientOriginalName();
        //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
        $ag_move = $dish_file->move('./upload/',$dish_filename); //public/upload/...
        }else{
        $dish_filename = "";
        }


        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $plans = Plan::find($request->id);
        $plans->title = $request->title;
        $plans->description = $request->description;
        $plans->plan_date = $request->plan_date;
        $plans->ag_name = $request->ag_name;
        $plans->dish_name = $request->dish_name;
        // $plans->photo = $request->photo;
        $plans->ag_photo = $ag_filename;
        $plans->dish_photo = $dish_filename;
        $plans->ag_latitude = $request->ag_latitude;
        $plans->ag_longitude = $request->ag_longitude;
        $plans->dish_latitude = $request->dish_latitude;
        $plans->dish_longitude = $request->dish_longitude;
        $plans->adult_price = $request->adult_price;
        $plans->child_price = $request->child_price;
        $plans->place = $request->place;
        $plans->small_place = $request->small_place;
        $plans->vegetable = $request->vegetable;
        $plans->save(); 
        return redirect('/');

    }


//野菜検索
public function search_vegetable($vegetable)
    {
        $plans = Plan::where('vegetable', $vegetable)->get();
        $data = ['plans' => $plans];
        return view('searchs', $data);
    }

//県検索
public function search_small_place($small_place)
    {
        // 'name', 'like', '%川%'
        $plans = Plan::where('small_place',$small_place)->get();
        // $data = ['plans' => $plans];
        // return view('searchs', $data);
        return view('searchs', ['plans' => $plans]);
    }


//AND検索
public function search_and(Request $request)
    {
        $small_place=$request->input('small_place');
        $vegetable=$request->input('vegetable');
   
        $plans = Plan::where('small_place', $small_place)->where('vegetable', $vegetable)->get();
        $data = ['plans' => $plans];
        return view('searchs', $data);
    }

//日付検索
public function search_plan_date(Request $request)
    {
        $plan_date=$request->input('plan_date');
   
        // $plans = Plan::where('small_place', $small_place)->where('vegetable', $vegetable)->get();
        $plans = Plan::where('plan_date', $plan_date)->get();
        $data = ['plans' => $plans];
        return view('searchs', $data);
    }


//プラン検索
public function search(Request $request)
    {
        $small_place=$request->input('small_place');
        $vegetable=$request->input('vegetable');
        $plan_date=$request->input('plan_date');
   
        // $plans = Plan::where('small_place', $small_place)->where('vegetable', $vegetable)->get();
        $plans = Plan::where('small_place', $small_place)->where('vegetable', $vegetable)->where('plan_date', $plan_date)->get();
        $data = ['plans' => $plans];
        return view('searchs', $data);
    }




}

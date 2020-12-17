<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;   //Bookモデルを使えるようにする

class ShopController extends Controller
{
    //
    public function input(Request $request){
        $plan = Plan::find($request->plan_id);
        session([
            'adult' => $request->adult,
            'child' => $request->child,
            'name'  => $request->name,
            'tell'  => $request->tell,
            'email' => $request->email
            ]);
        return view('userInput',['plan' => $plan]);
    }

    //
    public function result(){
        // 購入データをDBに保存
        // ユーザー情報を保存
        $sessionData = session()->all();
        return view('result',['sessionData' => $sessionData]);
    }



}

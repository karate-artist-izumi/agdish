<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Plan;   //Bookモデルを使えるようにする
use App\Sale;
use App\User;
use Auth;

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;



class ShopController extends Controller
{
    //詳細画面から得た情報から確認画面を表示
    public function input(Request $request){
        // もしログインしていなかったら以下の処理
        $plan = Plan::find($request->plan_id);
        if (!Auth::id()) {
            session([
                'plan_id' => $request->plan_id,
                'adult' => $request->adult,
                'child' => $request->child,
                'name'  => $request->name,
                'tell'  => $request->tell,
                'email' => $request->email,
                'pass' => $request->pass
            ]);
        } else {
            // ログインしていたときの処理
            $user = User::find(Auth::id());
            session([
                'plan_id' => $request->plan_id,
                'adult' => $request->adult,
                'child' => $request->child,
                'name'  => $user->name,
                'tell'  => $user->tell,
                'email' => $user->email,
                'pass' => $request->pass
            ]);
        }

        return view('userInput',['plan' => $plan]);
    }

    //
    public function result(){
        $sessionData = session()->all();
        $plan = Plan::find($sessionData['plan_id']);
        
        session([
            'plan_title' => $plan->title,
            'plan_adult_price' => $plan->adult_price,
            'plan_child_price' => $plan->child_price,
        ]);

        if (!User::where('email', $sessionData['email'])->exists()) {
            // ユーザー情報を保存
            $user = new User;
            $user->name = $sessionData['name'];
            $user->email = $sessionData['email'];
            $user->tell = $sessionData['tell'];
            $user->password = Hash::make($sessionData['pass']);
            $user->save(); 
            
            // インサートしたレコードを取得
            $last_insert_id = $user->id;
            
            // 購入データをDBに保存
            // リレーションしなくてもいいようにマイページで必要な情報全部入れる
            $sale = new Sale;
            $sale->user_id = $last_insert_id;
            $sale->plan_id = $sessionData['plan_id'];
            $sale->plan_title = $plan->title;
            $sale->plan_date = $plan->plan_date;
            $sale->plan_adult_price = $plan->adult_price;
            $sale->plan_child_price = $plan->child_price;
            $sale->adult_kazu = $sessionData['adult'];
            $sale->child_kazu = $sessionData['child'];
            $sale->save();
        } else {
            $user = User::where('email', $sessionData['email'])->first();
            // 購入データをDBに保存
            // リレーションしなくてもいいようにマイページで必要な情報全部入れる
            $sale = new Sale;
            $sale->user_id = $user->id;
            $sale->plan_id = $sessionData['plan_id'];
            $sale->plan_title = $plan->title;
            $sale->plan_date = $plan->plan_date;
            $sale->plan_adult_price = $plan->adult_price;
            $sale->plan_child_price = $plan->child_price;
            $sale->adult_kazu = $sessionData['adult'];
            $sale->child_kazu = $sessionData['child'];
            $sale->save();

        }
        
        //メールを送信
        $mail_name =$sessionData['name'];
        $mail_text = $mail_name.' 様、ご購入ありがとうございました';
        $data = session()->all();
        $mail_to = $sessionData['email'];
        Mail::to($mail_to)->send( new SampleMail($mail_name, $mail_text, $data) );

        return view('result',['sessionData' => $sessionData]);

        //メールを送信
        $mail_name =$sessionData['name'];
        $mail_text = $mail_name.' 様、ご購入ありがとうございました';
        $data = session()->all();
        // 管理者のメールアドレスを入力
        $mail_to = 'gawgaw.developer@gmail.com';
        Mail::to($mail_to)->send( new SampleMail($mail_name, $mail_text, $data) );

        return view('result',['sessionData' => $sessionData]);

    }



}

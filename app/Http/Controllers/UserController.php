<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   //Bookモデルを使えるようにする
use App\Sale;   //Bookモデルを使えるようにする
use Auth;   //Bookモデルを使えるようにする

class UserController extends Controller
{
    public function showUser(){
        $login_user_id = Auth::id();
        $user = User::find($login_user_id);
        $reservePlans = Sale::where('user_id', $login_user_id)->get();
        // 必要な情報を持たせて、mypage.blade.phpを返す
        return view('mypage',['user' => $user, 'reservePlans' => $reservePlans]);
    }
}

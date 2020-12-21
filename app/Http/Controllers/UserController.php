<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   //Userモデルを使えるようにする
use App\Sale;   //Saleモデルを使えるようにする
use Auth;   //Bookモデルを使えるようにする
use DateTime;

use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //mypage_new
    public function showUserNew(){
        $login_user_id = Auth::id();
        $today=new DateTime();
        $user = User::find($login_user_id);
        //reservePlansは複数のデータを取得する為 s がついてviewでfor
        // dd($login_user_id);
        $reservePlans = Sale::where('user_id', $login_user_id)-> whereDate('plan_date','>',$today)->get();
        // 必要な情報を持たせて、mypage.blade.phpを返す
        return view('mypage_new',['user' => $user, 'reservePlans' => $reservePlans]);
    }

    

    //mypage_old
    public function showUserOld(){
        $login_user_id = Auth::id();
        $today=new DateTime();
        $user = User::find($login_user_id);
        //reservePlansは複数のデータを取得する為 s がついてviewでfor
        // dd($login_user_id);
        $oldPlans = Sale::where('user_id', $login_user_id)-> whereDate('plan_date','<',$today)->get();
        // 必要な情報を持たせて、mypage.blade.phpを返す
        // return view('mypage_new',['user' => $user, 'reservePlans' => $reservePlans]);
        return view('mypage_old',['user' => $user, 'oldPlans' => $oldPlans]);
    }
    
    //mypage_favorite
    public function showUserFavorite(){

        $user = \Auth::user();
        // 省略
        $favoritePlans = $user->favoritePlans;
        return view('mypage_favorite',['user' => $user, 'favoritePlans' => $favoritePlans]);
    }

    //profile
    public function showUserInfo(){
        $login_user_id = Auth::id();
        //user1レコードの為、単数系
        $user = User::find($login_user_id);
        // 必要な情報を持たせて、mypage.blade.phpを返す
        return view('profile',['user' => $user,]);
    }

    //profile変更画面
    public function showUserEdit(){
        $user = User::find(Auth::id());
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('profileedit', [
            'user' => $user,
        ]);
    }

    //profile変更処理
    public function showUserupdate(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'tell' => 'required|max:255',
        ]);
        // dd($validator->fails());
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()->route('pe')
            ->withInput()
            ->withErrors($validator);
        }
        //データ更新
        $user = User::find($request->id);
        $form = $request->all();
        $user->fill($form)->save();
        // $user->name   = $request->name;
        // $user->email = $request->email;
        // $user->tell = $request->tell;
        // $user->save();
        return redirect('/profile');
    }


}

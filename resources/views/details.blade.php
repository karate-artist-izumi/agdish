<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>詳細ページ</title>
  <!-- <link rel="stylesheet" href="../css/main2.css"> -->
  <link rel="stylesheet" href="{{asset('/css/main2.css')}}">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <style>
    #mapSample {
      height:500px;
      width:100%;
    }
  </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->
 
  

 

<div id="p20"></div>


              <div>{{ $plan->title }}</div>
   
              <div>{{ $plan->description }}</div>
   
              <div>{{ $plan->plan_date }}</div>
    
              

              <div>{{ $plan->ag_latitude }}</div>

              <div>{{ $plan->ag_longitude }}</div>

              <div>{{ $plan->dish_latitude }}</div>

              <div>{{ $plan->dish_longitude }}</div>

              <div>{{ $plan->price }}</div>

              <div>{{ $plan->place }}</div>

              <div>{{ $plan->small_place }}</div>

              <div>{{ $plan->vegetable }}</div>

              <div>{{ $plan->map }}</div>


      <div id="mapSample"></div>

      <span id="js-ag_latitude" data-name="{{ $plan->ag_latitude }}"></span>
      <span id="js-ag_longitude" data-name="{{ $plan->ag_longitude }}"></span>
      <span id="js-dish_latitude" data-name="{{ $plan->dish_latitude }}"></span>
      <span id="js-dish_longitude" data-name="{{ $plan->dish_longitude }}"></span>

      <form action="{{ url('buy') }}" method="post">
      {{ csrf_field() }}
      <!-- 1218追加 -->
      @if(!Auth::id())
        <div class="col-sm-6">
            代表者氏名
            <input type="text" name="name" class="form-control">
        </div>
        <div class="col-sm-6">
            電話番号
            <input type="test" name="tell" class="form-control">
        </div>
        <div class="col-sm-6">
            メールアドレス
            <input type="test" name="email" class="form-control">
        </div>
        <div class="col-sm-6">
            登録用パスワード
            <input type="password" name="pass" class="form-control">
        </div>
        <!-- 1218追加 -->
        @endif
        <span>
          おとなの人数
          <select name="adult" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
        </span>
        <span>
          こどもの人数
          <select name="child" id="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
        </span>
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <button type="submit">購入確認画面へ</button>
      </form>
  
  <!-- ここから上にコードを書く -->
  <!-- この中に記述していく -->
  <!-- <script type="text/javascript" src="js/bootstrap.bundle.js"></script> -->
  <script src="{{ asset('/js/map.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDfICqav8n0LnTfZ3FtjZhPuas7lIdh8kc&callback=initMap"></script>
</body>
</body>

</html>

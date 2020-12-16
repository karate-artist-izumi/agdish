<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TOP</title>
  <link href="{{asset('/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('/css/app.css')}}" rel="stylesheet">

</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->

  <header>
    <nav>
      <div role="navigation" class="header d-flex flex-row justify-content-between">
        <div class="header_left w-50">
          <ul class="d-flex flex-row justify-content-start">
            <li><h1>AgDish</h1></li>
            <li><h2>アグディッシュ</h2></li>
            <li><p>キャッチコピー</p> </li>
          </ul>
        </div>
        <div class="header_right w-50">
          <ul class="d-flex flex-row justify-content-end">
            <li><p>ログイン</p></li>
            <li><p>|</p></li>
            <li><p>ユーザー登録</p></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

 <div id="navi">
   <div id="navi_search">
   <textarea name="" id="search"></textarea>
   <button>Search</button>
   </div>
 </div>
  

  <div class="video-wrap">
    <p>AgDish</p>
    

    <video src="upload/agdish01.mp4" autoplay loop muted></video>
    <video src="upload/agdish02.mp4" autoplay loop muted></video>
</div>

<div id="p20"></div>


          @foreach ($plans as $plan)
          <a href="/details/{{ $plan->id }}">
          <div id="select">
            <div id="select_img">
              <img src="upload/no01.jpg" alt="">
              <img src="upload/ryo01.jpg" alt="">
            </div>
            <div id="select_text">{{ $plan->title }}</div>
            <div id="tyudan">
              <div id="place">開催場所：{{ $plan->small_place }}　</div>
              <div id="price">　金額：{{ $plan->price }}円</div>
            </div>
            <div id="details">{{ $plan->description }}</div>
          </div>    
              </a>
            <div id="p20"></div>
            @endforeach

  
  <!-- ここから上にコードを書く -->
  <!-- この中に記述していく -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="js/bootstrap.bundle.js"></script> -->
  <script src="js/main.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TOP</title>

  <link href="{{asset('/css/app.css')}}" rel="stylesheet">
  <link href="{{asset('/css/main.css')}}" rel="stylesheet">
  
  <!-- GoogleFonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet" />



</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->

  <header>
    <div class="header_wrapper">

      <nav>
        <div role="navigation" class="header_top d-flex flex-row justify-content-between">
          <div class="header_left w-50">
            <ul class="d-flex flex-row justify-content-start">
              <li><img src="/img/logo.png" alt=""></li>
              <li><p>アグディッシュ</p></li>
            </ul>
          </div>
          <div class="header_right w-50">
            <ul class="d-flex flex-row justify-content-end">
            @if(Auth::id())
              <a href="/mypage_new">マイページ</a>
              @else
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a></li>
              @endif
              <!--  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('ログアウト') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div> -->
              <li><img src="/img/gotoeat.png" alt="AgDish"></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="header_center">
        <div class="header_message">
          <p><span>ワクワク</span>と体験を</p>
        </div>
      </div>

      <div class="header_bottom">
        <div class="search_box d-flex justify-content-between">
          <div class="search_box_left">
            <h2 class="search_title">都道府県・食材・日時から探す</h2>
          </div>
          <div class="search_box_right">


            <form method="post" action="{{ url('searchs') }}" class="d-flex justify-content-end">
            {{ csrf_field() }}
        
                <div class="search_cell select_wrapper center">
                  <select class="select custom-select sources" name="small_place" id="source" placeholder="都道府県">
                      <option value="茨城県">茨城県</option>
                      <option value="栃木県">栃木県</option>
                      <option value="群馬県">群馬県</option>
                      <option value="埼玉県">埼玉県</option>
                      <option value="千葉県">千葉県</option>
                      <option value="東京都">東京都</option>
                      <option value="神奈川県">神奈川県</option>
                  </select>
                </div>
                <div class="search_cell select_wrapper center">
                  <select class="select custom-select sources" name="vegetable" id="source" placeholder="食材">
                    <option value="白菜">白菜</option>
                    <option value="ほうれん草">ほうれん草</option>
                    <option value="人参">人参</option>
                    <option value="トマト">トマト</option>
                  </select>
                </div>
                <div class="search_cell calender">
                  <label><input type="date" name="plan_date" value="yyyy-mm-dd" max="9999-12-31"></label>
                </div>
                <div class="search_cell">
                  <button type="submit">検索</button>
                </div>
              
            </form>
          </div>
        </div>
      </div>

    </div>
  </header>


  <main>
    <section>
      <div class="d-flex flex-column izumi">
        <div>
          <img src="/img/kaigi1.JPG" alt="">
        </div>
        <div>
          <img src="/img/kaigi2.jpg" alt="">
        </div>
        <div>
          <img src="/img/kaigi3.jpg" alt="">
        </div>
      </div>
    </section>
  </main>


  <!-- この中に記述していく -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="js/bootstrap.bundle.js"></script> -->
  <script src="js/main.js"></script>
  <script src="js/tops.js"></script>

  <!-- slicker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#swipe').slick({
    slidesToShow:1,
    slidesToScroll:1,
    autoplay:true,
    autoplaySpeed:3000,
});
});
<script type="text/javascript" src="js/jquery.arctext.js"></script>
  </script>
  <script>
    $arctext_1.arctext({radius: 300})
  </script>
</body>

</html>
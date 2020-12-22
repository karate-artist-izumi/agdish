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
      <img src="/img/info.jpg" alt="">
    </section>
  </main>

  <footer>
    <div class="footer_wrapper">

      <div class="footer_top d-flex flex-row justify-content-center">
        <div class="footer_cell">
          <div class="footer_title">
            <p>利用したい</p>
          </div>
          <div class="footer_list">
            <ul class="">
                <li><a href="/about">アグリッシュとは？</a></li>
                <li><a href="#">アグリッシュ基準</a></li>
                <li><a href="#">ご利用ガイド</a></li>
                <li><a href="#">品質保証について</a></li>
                <li><a href="#">注文方法</a></li>
                <li><a href="#" target="_blank" rel="noopener">飲食店の方へ</a></li>
                <li><a href="#" target="_blank" rel="noopener">イベント主催者の方へ</a></li>
              </ul>
          </div>
        </div>
        <div class="footer_cell">
          <div class="footer_title">
            <p>出店したい</p>
          </div>
          <div class="footer_list">
            <ul class="">
                <li><a href="/about">出品者募集</a></li>
                <li><a href="#">募集要件</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#" target="_blank" rel="noopener"></a></li>
                <li><a href="#" target="_blank" rel="noopener"></a></li>
              </ul>
          </div>
        </div>
        <div class="footer_cell">
          <div class="footer_title">
            <p>アグリッシュについて</p>
          </div>
          <div class="footer_list">
            <ul class="">
                <li><a href="/about">運営会社</a></li>
                <li><a href="#">よくある質問</a></li>
                <li><a href="#">お問い合わせ</a></li>
                <li><a href="#">利用規約</a></li>
                <li><a href="#">プライバシーポリシー</a></li>
                <li><a href="#" target="_blank" rel="noopener">特定商取引法</a></li>
                <li><a href="/about/" target="_blank" rel="noopener">採用情報</a></li>
              </ul>
          </div>
        </div>
      </div>

      <div class="footer_bottom">
        <div>
          <ul class="sns_list d-flex flex-row justify-content-center">
            <li><a href="#" target="_blank" rel="noopener"><img src="https://img.icons8.com/clouds/100/000000/line-me.png"/></a></li>
            <li><a href="#" target="_blank" rel="noopener"><img src="https://img.icons8.com/clouds/100/000000/instagram.png"/></a></li>
            <li><a href="#" target="_blank" rel="noopener"><img src="https://img.icons8.com/clouds/100/000000/facebook-f.png"/></a></li>
            <li><a href="#" target="_blank" rel="noopener"><img src="https://img.icons8.com/clouds/100/000000/twitter-circled.png"/></a></li>
          </ul>
        </div>
        <div>
          <p class="copyright"><small>Copyright</small> © 2020 KARATE DOJO Inc.</p>
        </div>
      </div>
    </div>
  </footer>

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
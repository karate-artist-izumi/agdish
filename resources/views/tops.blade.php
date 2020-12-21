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

  <!-- GoogleFonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">

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
              <li><p>キャッチコピー</p> </li>
            </ul>
          </div>
          <div class="header_right w-50">
            <ul class="d-flex flex-row justify-content-end">
              <li><p>ログイン</p></li>
              <li><p>|</p></li>
              <li><p>ユーザー登録</p></li>
              <li><img src="/img/gotoeat.png" alt=""></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="header_center">
        <div class="header_message">
          <p>トップメッセージ編集したよ!!!!!!!!!!!!</p>
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

    <!--  videoは外す（一応残しとく）-->

    <!-- <section>
      <div class="main_top">
        <div class="video_container">
          <video id="video" src="upload/agdish01.mp4" type="vdeo/mp4"autoplay loop muted></video>
        </div>
      </div>
    </section> -->

    <!--  videoは外す（一応残しとく）-->


    <section>
      <div class="info">

      </div>
    </section>


<!-- 検索用リンクここから↓ -->

<ul>
    <li><a href="/search1/白菜">白菜</a></li>
    <li><a href="/search1/ほうれん草">ほうれん草</a></li>
    <li><a href="/search1/人参">人参</a></li>
    <li><a href="/search1/トマト">トマト</a></li>
</ul>

<ul>
    <li><a href="/search2/茨城県">茨城県</a></li>
    <li><a href="/search2/栃木県">栃木県</a></li>
    <li><a href="/search2/群馬県">群馬県</a></li>
    <li><a href="/search2/埼玉県">埼玉県</a></li>
    <li><a href="/search2/千葉県">千葉県</a></li>
    <li><a href="/search2/東京都">東京都</a></li>
    <li><a href="/search2/神奈川県">神奈川県</a></li>
</ul>


  <form method="post" action="{{ url('search3') }}">
  {{ csrf_field() }}
      <input type="date" id="today" name="plan_date" value="yyyy-mm-dd" max="9999-12-31">
      <button type="submit">検索</button>
  </form>

<!-- 検索用リンクここまで↑ -->



    <section>
      <div class="select_wrapper d-flex flex-wrap justify-content-center">
        @foreach ($plans as $plan)
          <div class="select_box">
            <a href="/details/{{ $plan->id }}">
              <div class="select_cell d-flex flex-column">

                <div class="select_img"> 
                  <img src="upload/{{ $plan->ag_photo }}" alt="">
                </div>
                <div class="select_img">
                  <img src="upload/{{ $plan->dish_photo }}" alt="">
                </div>

                <div id="select_text">
                  <p>{{ $plan->title }}</p>
                </div>

                <div id="place">
                  <p>開催場所：{{ $plan->small_place }}</p> 
                </div>

                <div id="adult_price">
                  <p>大人料金：{{ $plan->adult_price }}円</p>
                </div>

                <div id="child_price">
                  <p>子供料金：{{ $plan->child_price }}円</p>
                </div>
          
                <div id="details">
                  <p>{{ $plan->description }}</p>
                </div>

              </div>
            </a>
          </div>
        @endforeach
      </div>
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
                <li><a href="#" target="_blank" rel="noopener">採用情報</a></li>
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
</body>

</html>
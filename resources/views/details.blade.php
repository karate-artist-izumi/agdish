<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細ページ</title>
    <link rel="stylesheet" href="{{asset('/css/details.css')}}">
  </head>

  <body>
  <header>

  </header>
  <main>

  </main>
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
    
    <!-- footerはここから -->

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

  <!-- footerはここまで -->

    <script src="{{ asset('/js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDfICqav8n0LnTfZ3FtjZhPuas7lIdh8kc&callback=initMap"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    
  </body>
  </body>

  </html>

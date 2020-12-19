<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細ページ</title>
    <link rel="stylesheet" href="{{asset('/css/details.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" >
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>

  <body>
    <header>
      <nav>
        <div class="header">
          <div class="logo">
            <img src="/img/logo.png" alt="AgDish">
          </div>
        </div>
      </nav>
    </header>

    <main>
      <section>
          <div class="info d-flex flex-row">

            <div class="plan_info d-flex flex-column w-55">

              <div>
                <p style="font-weight:bold; font-size:32px">店舗情報</p>
              </div>

              <div class="info_cell d-flex flex-row">
                <div class="info_pic">
                  <div>
                    <img src="upload/{{ $plan->ag_photo }}" alt="">
                  </div>
                </div>
                <div class="info_pic">
                  <div>
                    <img src="upload/{{ $plan->dish_photo }}" alt="">
                  </div>
                </div>
              </div>

              <div class="info_cell d-flex flex-row">
                <div>
                  <p>プラン名</p>
                </div>
                <div>
                  <p>{{ $plan->ag_name }}</p>
                </div>
              </div>
              <div class="info_cell d-flex flex-row">
                <div>
                  <p>プラン名</p>
                </div>
                <div>
                  <p>{{ $plan->dish_name }}</p>
                </div>
              </div>

              <div class="info_cell d-flex flex-row">
                <div>
                  <p>プラン名</p>
                </div>
                <div>
                  <p>{{ $plan->title }}</p>
                </div>
              </div>

              <div class="info_cell d-flex flex-row">
                <div>
                  <p>プラン詳細</p>
                </div>
                <div>
                  <p>{{ $plan->description }}</p>
                </div>
              </div>
              <div class="info_cell d-flex flex-row">
                <div>
                  <p>野菜</p>
                </div>
                <div>
                  <p>{{ $plan->vegetable }}</p>
                </div>
              </div>
              

              <div class="info_cell d-flex flex-row">
                <div class="info_cell d-flex flex-row">
                  <div>
                    <p>大人料金</p>
                  </div>
                  <div>
                    <p>{{ $plan->adult_price }}</p>
                  </div>
                </div>
                <div class="info_cell d-flex flex-row">
                  <div>
                    <p>子供料金</p>
                  </div>
                  <div>
                    <p>{{ $plan->child_price }}</p>
                  </div>
                </div>
              </div>

              <div class="info_cell d-flex flex-row">
                <div>
                  <p>住所</p>
                </div>
                <div>
                  <p>{{ $plan->place }}</p>
                </div>
              </div>
            
            </div>

            <div class="plan_map w-45 d-flex flex-column">

              <div class="map">
                <div id="mapSample" style="width:550px; height:350px">
                  <span id="js-ag_latitude"    data-name="{{ $plan->ag_latitude }}"></span>
                  <span id="js-ag_longitude"   data-name="{{ $plan->ag_longitude }}"></span>
                  <span id="js-dish_latitude"  data-name="{{ $plan->dish_latitude }}"></span>
                  <span id="js-dish_longitude" data-name="{{ $plan->dish_longitude }}"></span>
                </div>
              </div>

              <div class="reservation">
                <p>ご予約はこちらから</p>
              </div>

              <div class="form">
                <form action="{{ url('buy') }}" method="post">
                  {{ csrf_field() }}
                  <!-- 1218追加 -->
                  @if(!Auth::id())
                    <div class="d-flex flex-row w-100">

                      <div class="flex_item_right w-50">
                        <div class="contact_info">
                            代表者氏名
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="contact_info">
                            電話番号
                            <input type="test" name="tell" class="form-control">
                        </div>
                      </div>

                      <div class="flex-item w-50">
                        <div class="contact_info">
                            メールアドレス
                            <input type="test" name="email" class="form-control">
                        </div>
                        <div class="contact_info">
                            登録用パスワード
                            <input type="password" name="pass" class="form-control">
                        </div>
                      </div>

                    </div>
                    
                    <!-- 1218追加 -->
                    <div class="count_number">
                      @endif
                      <div class="d-flex flex-row">

                          <div class="d-flex flex-column w-50">
                            <div class="number_adult">
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
                            </div>
                            <div>
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
                            </div>
                          </div>
                          <div class="w-50 button">
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <button type="submit">購入確認画面へ</button>
                          </div>

                      </div>
                    </div>
                    
                </form>
              </div>

            </div>

          </div>
        </section>
      </main>
    
    <!-- footerはここから -->

    <footer>
      <div class="footer_wrapper">

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
    </footer>

  <!-- footerはここまで -->

    <script src="{{ asset('/js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDfICqav8n0LnTfZ3FtjZhPuas7lIdh8kc&callback=initMap"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </body>

</html>

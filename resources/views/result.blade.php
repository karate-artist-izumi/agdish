<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/common.css')}}" rel="stylesheet">
    <link href="{{asset('/css/result.css')}}" rel="stylesheet">

    <title>購入後画面</title>
  </head>
  <body>

    <!-- headerはここから -->
    <header>
      <nav>
        <div class="header d-flex flex-row justify-content-between">
          <div class="logo">
            <img src="/img/logo.png" alt="AgDish">
          </div>
          <div class="logo">
            <img src="/img/gotoeat.png" alt="AgDish">
          </div>
        </div>
      </nav>
    </header>
    <!-- footerはここまで -->

    <main>
      <section>
        <div class="main">
          <div class="result d-flex flex-column">
            <div class="result_cell">
              <h2>{{ $sessionData['name'] }}様</h2>
            </div>
            <div class="result_cell">
              <h1>支払い手続きが完了致しました。</h1>  
            </div>
            <div class="result_cell">
              <a class="btn btn-border-shadow btn-border-shadow--color" href="/tops"><p>トップページ（プラン一覧ページ）へ戻る</p></a>
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

  </body>
</html>
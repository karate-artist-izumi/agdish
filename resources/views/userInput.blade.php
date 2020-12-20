<?php
$data = session()->all();
$cartData = [];

array_push($cartData, [
      'price_data'   => [
      'currency'     => 'JPY',
      'product_data' => [ 'name' => $plan->title.'大人料金',],
      'unit_amount'  => $plan->adult_price,
      ],
      'quantity' => $data['adult'],
  ]);
  // もしこども人数が0ならarray_pushしない
  if (!$data['child'] === 0) {
    array_push($cartData, [
          'price_data'   => [
          'currency'     => 'JPY',
          'product_data' => [ 'name' => $plan->title.'こども料金', ],
          'unit_amount'  => $plan->child_price,
          ],
          'quantity' => $data['child'],
    ]);
  }

require '../vendor/autoload.php';

$secretKey = env('STRIPE_SECRET');
$publicKey = env('STRIPE_KEY');

$stripe = new \Stripe\StripeClient($secretKey);
$session = $stripe->checkout->sessions->create([
  'payment_method_types' => ['card'],
  'line_items' => [$cartData],
  'mode' => 'payment',
  // 本番のサイトURLを入力
  // 'success_url' => 'https://cheese-wagon.crap.jp/buy/result.php?session_id={CHECKOUT_SESSION_ID}',
  // 'cancel_url' => 'https://cheese-wagon.crap.jp/buy/result.php?session_id={CHECKOUT_SESSION_ID}',

  // ローカル時のURLを入力
  'success_url' => 'http://localhost/buy/result?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => 'http://localhost/buy/result?session_id={CHECKOUT_SESSION_ID}',
]);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/common.css')}}" >
    <link rel="stylesheet" href="{{asset('/css/userInput.css')}}" >
    <!-- fontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <title>Document</title>
    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    </head>

  <body class="is-slide" id="page-animate">

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
        <div class="main">
          <div class="user_top">
            <h2>- お客様確認画面 -</h2>  
          </div>
          <div class="user d-flex flex-column">
            <div class="user_cell">
              <p>選択したプラン：{{ $plan->title }}</p>
            </div>
            <div class="user_cell d-flex flex-row">
              <div class="adult_price">
                <p>大人×{{ $data['adult'] }}</p>
              </div>
              <div class="child_price">
                <p>こども×{{ $data['child'] }}</p>
              </div>
            </div>
            <div class="user_cell">
              <p>お客様お名前：{{ $data['name'] }}</p>
            </div>
            <div class="user_cell">
              <p>お客様電話番号：{{ $data['tell'] }}</p>
            </div>
            <div class="user_cell">
              <p>お客様メールアドレス：{{ $data['email'] }}</p>
            </div>

              <button class="button_style btn-three" id="checkout-button">次へ<i class="fas fa-forward"></i>支払い情報の入力</button>
            

          </div>
        </div>
      </section>
    </main>

  <!-- footerはここから -->
    <footer>
      <div class="footer_wrapper footer">

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

<script type="text/javascript">
  var stripe = Stripe('<?php echo $publicKey;?>');

  var checkoutButton = document.getElementById('checkout-button');
  checkoutButton.addEventListener('click', function() {
    stripe.redirectToCheckout({sessionId: "<?php echo $session->id;?>"})
    .then(function (result) {
      if (result.error) {
        // var displayError = document.getElementById('error-message');
        // displayError.textContent = result.error.message;
      }
    });
  });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
  // 画面が読み込まれた時、is-slideを外し、アニメーションさせる
$(window).on('load', function(){
 $('body').removeClass('is-slide');
});

$(function() {
 // ハッシュリンク(#)と別ウィンドウでページを開く場合は実行しない

 $('a:not([href^="#"]):not([target])').on('click', function(e){
   e.preventDefault();         // ページ遷移を一旦キャンセル
   url = $(this).attr('href'); // 遷移先のURLを取得

   if (url !== '') {
     $('body').addClass('is-slide-in'); // 画面遷移前のアニメーション is-slide-in

     setTimeout(function () {
       window.location = url;  // 0.7秒後に取得したURLに遷移
     }, 700);
   }
   return false;
 });

});
</script>

</body>
</html>
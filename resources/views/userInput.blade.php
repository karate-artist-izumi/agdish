<?php
$data = session()->all();
$cartData = [];

array_push($cartData, [
  'price_data' => [
      'currency' => 'JPY',
      'product_data' => [
          'name' => $plan->title.'大人料金',
      ],
      'unit_amount' => $plan->adult_price,
  ],
  'quantity' => $data['adult'],
  ]);
  // もしこども人数が0ならarray_pushしない
  if (!$data['child'] === 0) {
    array_push($cartData, [
      'price_data' => [
          'currency' => 'JPY',
          'product_data' => [
              'name' => $plan->title.'こども料金',
          ],
          'unit_amount' => $plan->child_price,
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
  <title>Document</title>
  <!-- Stripe -->
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  

<h1>ユーザー確認画面</h1>

<p>選択したプラン：{{ $plan->title }}</p>
  <p>大人×{{ $data['adult'] }}</p>
  <p>こども×{{ $data['child'] }}</p>
  <p>お客様お名前：{{ $data['name'] }}</p>
  <p>お客様：電話番号：{{ $data['tell'] }}</p>
  <p>お客様メールアドレス：{{ $data['email'] }}</p>
  <button id="checkout-button">次へ/支払い情報の入力</button>
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

</body>
</html>
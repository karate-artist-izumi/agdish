<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>マイページ</h1>
​
  <!-- find()でとってきた!! -->
  <!-- ユーザー情報は1件だけ取ってきているので以下の方法で表示可能 -->
  <p>ログイン中のユーザーの名前：{{ $user->name }}</p>
​
  <!-- where()で絞り込んでget()でとってきた!! -->
  <!-- 予約中のプランは複数件とれてきているの以下の方法で表示する -->
  <!-- 1件だったとしてもループで回さないとエラーになる -->
  <h2>予約中のプラン</h2>
​
  @foreach($reservePlans as $reservePlan)
  <h3>{{ $reservePlan->plan_title }}</h3>
  <p>開催日：{{ $reservePlan->plan_date }}</p>
  <p>大人料金{{ $reservePlan->plan_adult_price }}円 × {{ $reservePlan->adult_kazu }}名様</p>
  <p>こども料金{{ $reservePlan->plan_adult_price }}円 × {{ $reservePlan->adult_kazu }}名様</p>
  @endforeach
​
</body>
</html>

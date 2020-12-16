<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>詳細ページ</title>
  <link rel="stylesheet" href="../css/main2.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->
 
  

 

<div id="p20"></div>


              <div>{{ $plan->title }}</div>
   
              <div>{{ $plan->description }}</div>
   
              <div>{{ $plan->plan_date }}</div>
    
              <div>{{ $plan->photo }}</div>

              <div>{{ $plan->ag_latitude }}</div>

              <div>{{ $plan->ag_longitude }}</div>

              <div>{{ $plan->dish_latitude }}</div>

              <div>{{ $plan->dish_longitude }}</div>

              <div>{{ $plan->price }}</div>

              <div>{{ $plan->place }}</div>

              <div>{{ $plan->small_place }}</div>

              <div>{{ $plan->vegetable }}</div>

              <div>{{ $plan->map }}</div>


      <div id="google_map"></div>


  
  <!-- ここから上にコードを書く -->
  <!-- この中に記述していく -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="js/bootstrap.bundle.js"></script> -->
  <script src="js/google_map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
</body>

</html>
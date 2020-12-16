<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>詳細ページ</title>
  <link rel="stylesheet" href="css/main2.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->
 
  

  <div class="video-wrap">
    
    

 

<div id="p20"></div>

      <tr>
          <!-- 本タイトル -->
          <td class="table-text">
              <div>{{ $plan->title }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->description }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->plan_date }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->photo }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->ag_latitude }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->ag_longitude }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->dish_latitude }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->dish_longitude }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->price }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->place }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->small_place }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->vegetable }}</div>
          </td>
          <td class="table-text">
              <div>{{ $plan->map }}</div>
          </td>


          </td>
      </tr>



  
  <!-- ここから上にコードを書く -->
  <!-- この中に記述していく -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="js/bootstrap.bundle.js"></script> -->
  <script src="js/main.js"></script>
</body>

</html>
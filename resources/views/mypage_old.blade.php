<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>
  agdishマイページ
  </title>
  <!--     Fonts and icons     -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="/tops" class="simple-text logo-normal">
          agdish
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="/mypage_new">
              <i class="fas fa-leaf"></i>
              <p>予約一覧</p>
            </a>
          </li>
          <li>
            <a href="/mypage_favorite">
            <i class="fas fa-seedling"></i>
              <p>お気に入り</p>
            </a>
          </li>
          <li class="active ">
            <a href="#">
            <i class="fas fa-history"></i>
              <p>過去の購入履歴</p>
            </a>
          </li>
          <li>
            <a href="/profile">
            <i class="far fa-user-circle"></i>
              <p>プロフィール</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">{{Auth::user()->name}}のマイページ</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="検索する">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
              </div>
            </form>

            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-bell"></i>

                  <p>
                    <span class="d-lg-none d-md-block">ユーザー情報</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('ログアウト') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- Veu Field -->
      <div class="content container-fluid content-row">
        <h5 class="ml-2 mb-2">過去の購入履歴</h5>
        <div class="card-group">
          <div class="row">

            <!-- 購入したプランを表示-->
            @foreach($oldPlans as $oldPlan)
            <div class="col-sm-6 col-lg-3">
              <div class="card" style="width: 14rem;">
                <div class="card-body">
                  <h5>{{ $oldPlan->plan_title }}</h5>
                  <?php $date = date("Y-m-d",strtotime($oldPlan->plan_date)) ?>
                  <p class="card-title">開催日：{{ $date }}</p>
                  <p class="card-title">大人料金{{ $oldPlan->plan_adult_price }}円 × {{ $oldPlan->adult_kazu }}名様</p>
                  <p class="card-title">こども料金{{ $oldPlan->plan_child_price }}円 × {{ $oldPlan->child_kazu }}名様</p>
                  <p class="card-title">合計金額{{ $oldPlan->plan_adult_price * $oldPlan->adult_kazu + $oldPlan->plan_child_price * $oldPlan->child_kazu }}円</p>
                  <a href="/details/{{ $oldPlan->id }}" class="btn btn-primary">詳細を確認する</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Veu Field -->
      <!-- footer -->
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © 2020,Lab_10th made with by TEAM ISM
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core&Plugins JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}" defer></script>
  <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
</body>

</html>

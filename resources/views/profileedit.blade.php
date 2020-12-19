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
          <li>
            <a href="/mypage">
              <i class="fas fa-leaf"></i>
              <p>購入履歴</p>
            </a>
          </li>
          <li class="active ">
            <a href="/profile">
            <i class="far fa-user-circle"></i>
              <p>プロフィール</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-pin-3"></i>
              <p>テスト2</p>
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-bell"></i>

                  <p>
                    <span class="d-lg-none d-md-block">ユーザー情報</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">テスト</a>
                  <a class="dropdown-item" href="#">テスト</a>
                  <a class="dropdown-item" href="#">ログアウト</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- Veu Field -->
      <div class="content container-fluid content-row">
        <h5 class="ml-2 mb-2"><a href="#" >ご登録情報(変更画面)</a></h5>
        <div class="card-group">
                <!-- バリデーションエラーの表示に使用-->
                @include('common.errors')
                <!-- バリデーションエラーの表示に使用-->

            <!-- お客様の情報を表示-->
          <form action="{{ url('profile/update') }}" method="POST">
          {{ csrf_field() }}
            <table>
              <tr>
                <th>お名前</th>
                <td>
                  <!-- inputにstyle充ててます -->
                  <input style="border:none;" type="text" name="name" value="{{$user->name}}">
                </td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td>
                  <!-- inputにstyle充ててます -->
                  <input style="border:none;" type="text" name="email" value="{{$user->email}}">
                </td>
              </tr>
              <tr>
                <th>電話番号</th>
                <td>
                  <!-- inputにstyle充ててます -->
                  <input style="border:none;" type="text" name="tell" value="{{$user->tell}}">
                </td>
              </tr>
            </table>
            <div class="well well-sm">
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary">変更</button>
            <a class="btn btn-link pull-right" href="{{ url('profile') }}">
              戻る
            </a>
          </form>
        </div>
            <!-- お客様の情報を表示 END-->
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

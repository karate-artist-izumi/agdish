<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログイン</title>
  <link href="{{asset('/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('/css/app.css')}}" rel="stylesheet">

  <!-- GoogleFonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
</head>

<body>
  <!-- この中に記述していく -->
  <!-- ここから下にコードを書く -->
    <header>
        <div class="header_wrapper">
        <nav>
            <div role="navigation" class="header_top d-flex flex-row justify-content-between">
            <div class="header_left w-50">
                <ul class="d-flex flex-row justify-content-start">
                <li><img src="/img/logo.png" alt=""></li>
                <li><p>アグディッシュ</p></li>
                <li><p>キャッチコピー</p> </li>
                </ul>
            </div>
            <div class="header_right w-50">
                <ul class="d-flex flex-row justify-content-end">
                <li><p><a href="/tops">トップページへ戻る</a></p></li>
                </ul>
            </div>
            </div>
        </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <!-- 下記をadmin用に修正した -->
                        <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('新規登録') }}</div>

                        <div class="card-body">
                            @isset($url)
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('管理者') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('管理者パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認用パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            @else
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認用パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                            @endisset
                            <!-- 上記までを修正 -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('登録する') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
</body>

</html>

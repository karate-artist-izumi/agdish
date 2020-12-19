<!DOCTYPE html>
<html lang="ja">
    <style>
        body {
            background-color: #fffacd;
        }
        h1 {
            font-size: 16px;
            color: #ff6666;
        }
        #button {
            width: 200px;
            text-align: center;
        }
            #button a {
            padding: 10px 20px;
            display: block;
            border: 1px solid #2a88bd;
            background-color: #FFFFFF;
            color: #2a88bd;
            text-decoration: none;
            box-shadow: 2px 2px 3px #f5deb3;
        }
            #button a:hover {
            background-color: #2a88bd;
            color: #FFFFFF;
        }
    </style>
    <body>
        <p>{{$text}}</p></br>
        <p>ご予約のプラン：{{ $data['plan_title'] }}</p>
        <p>おとな：{{ $data['plan_adult_price'] }}×{{ $data['adult'] }}名様</p>
        @if($data['child'] > 0)
        <p>こども：{{ $data['plan_child_price'] }}×{{ $data['child'] }}名様</p>
        @endif
        <p>詳細の予約内容はマイページよりご確認ください。</p>
    </body>
</html>
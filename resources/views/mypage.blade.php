<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            プランの一覧
        </div>

        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
<!-- ログインしないと見れないページ -->
@if (count($plans) > 0)
  <div>
    <h1>{{ $data['name'] }}様のマイページ</h1>
    <h2>購入履歴</h2>
      <div>
        <p>プラン名:{{ $data['title'] }}</p>
        <p>開催場所:{{ $data['place'] }}</p>
        <p>開催日:{{ $data['plan_date'] }}</p>
        <p>説明:{{ $data['description'] }}</p>
        <!-- 画像 -->
        <p>{{ $data['title'] }}</p>
      </div>
  </div>
@endif

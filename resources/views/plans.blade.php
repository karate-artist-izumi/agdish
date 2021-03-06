
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

        <!-- 本登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('plans') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    プラン名
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    説明
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="col-sm-6">
                    開催日
                    <input type="date" name="plan_date" class="form-control">
                </div>
                <div class="col-sm-6">
                    農家名
                    <input type="text" name="ag_name" class="form-control">
                </div>
                <div class="col-sm-6">
                    レストラン名
                    <input type="text" name="dish_name" class="form-control">
                </div>
                <!-- <div class="col-sm-6">
                    写真URL
                    <input type="text" name="photo" class="form-control">
                </div> -->
                <div class="col-sm-6">
                    <label>農家写真</label>
                    <input type="file" name="ag_photo">
                </div>
                <div class="col-sm-6">
                    <label>レストラン写真</label>
                    <input type="file" name="dish_photo">
                </div>
                <div class="col-sm-6">
                    農家緯度
                    <input type="text" name="ag_latitude" class="form-control">
                </div>
                <div class="col-sm-6">
                    農家経度
                    <input type="text" name="ag_longitude" class="form-control">
                </div>
                <div class="col-sm-6">
                    レストラン緯度
                    <input type="text" name="dish_latitude" class="form-control">
                </div>
                <div class="col-sm-6">
                    レストラン経度
                    <input type="text" name="dish_longitude" class="form-control">
                </div>
                <div class="col-sm-6">
                    大人料金
                    <input type="text" name="adult_price" class="form-control">
                </div>
                <div class="col-sm-6">
                    子供料金
                    <input type="text" name="child_price" class="form-control">
                </div>
                <div class="col-sm-6">
                    場所
                    <input type="text" name="place" class="form-control">
                </div>
                <div class="col-sm-6">
                    Search[県]
                    <input type="text" name="small_place" class="form-control">
                </div>
                <div class="col-sm-6">
                    Search[野菜]
                    <input type="text" name="vegetable" class="form-control">
                </div>

            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- プランのリスト -->
     @if (count($plans) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th white-space: nowrap;>プラン名　　　　　　　　　　　　</th>
                        <th white-space: nowrap;>説明　　　　　　　　　　　　　　　　</th>
                        <th white-space: nowrap;>開催日</th>
                        <th white-space: nowrap;>農家名　　　　　　</th>
                        <th white-space: nowrap;>レストラン名　　　</th>
                        <!-- <th>写真URL</th> -->
                        <th white-space: nowrap;>農家写真</th>
                        <th white-space: nowrap;>レストラン写真</th>
                        <th white-space: nowrap;>農家緯度</th>
                        <th white-space: nowrap;>農家経度</th>
                        <th white-space: nowrap;>レストラン緯度</th>
                        <th white-space: nowrap;>レストラン経度</th>
                        <th white-space: nowrap;>大人料金</th>
                        <th white-space: nowrap;>子供料金</th>
                        <th white-space: nowrap;>開催場所　　　　　　</th>
                        <th white-space: nowrap;>Search[県]</th>
                        <th white-space: nowrap;>Search[野菜]</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>

                        @foreach ($plans as $plan)
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
                                    <div>{{ $plan->ag_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $plan->dish_name }}</div>
                                </td>
                                <!-- <td class="table-text">
                                    <div>{{ $plan->photo }}</div>
                                </td> -->
                                <td>
                                    <div> <img src="upload/{{$plan->ag_photo}}" width="100"></div>
                                </td>
                                <td>
                                    <div> <img src="upload/{{$plan->dish_photo}}" width="100"></div>
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
                                    <div>{{ $plan->adult_price }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $plan->child_price }}</div>
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
                                

                                <!--本の更新-->
                                <td>
                                    <form action="{{ url('plansedit/'.$plan->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form>
                                </td>

                                <!-- 本: 削除ボタン -->
                                <td>
                                <form action="{{ url('plan/'.$plan->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection

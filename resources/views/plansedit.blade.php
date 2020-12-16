@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('plans/update') }}" method="POST">


        <div class="form-group">
           <label for="title">プラン名</label>
           <input type="text" id="title" name="title" class="form-control" value="{{$plan->title}}">
        </div>
        <div class="form-group">
           <label for="title">説明</label>
           <input type="text" id="description" name="description" class="form-control" value="{{$plan->description}}">
        </div>
        <div class="form-group">
           <label for="title">開催日</label>
           <input type="text" id="plan_date" name="plan_date" class="form-control" value="{{$plan->plan_date}}">
        </div>
        <div class="form-group">
           <label for="title">写真URL</label>
           <input type="text" id="photo" name="photo" class="form-control" value="{{$plan->photo}}">
        </div>
        <div class="form-group">
           <label for="title">農家緯度</label>
           <input type="text" id="ag_latitude" name="ag_latitude" class="form-control" value="{{$plan->ag_latitude}}">
        </div>
        <div class="form-group">
           <label for="title">農家経度</label>
           <input type="text" id="ag_longitude" name="ag_longitude" class="form-control" value="{{$plan->ag_longitude}}">
        </div>
        <div class="form-group">
           <label for="title">レストラン緯度</label>
           <input type="text" id="dish_latitude" name="dish_latitude" class="form-control" value="{{$plan->dish_latitude}}">
        </div>
        <div class="form-group">
           <label for="title">レストラン経度</label>
           <input type="text" id="dish_longitude" name="dish_longitude" class="form-control" value="{{$plan->dish_longitude}}">
        </div>
        <div class="form-group">
           <label for="title">金額</label>
           <input type="text" id="price" name="price" class="form-control" value="{{$plan->price}}">
        </div>
        <div class="form-group">
           <label for="title">場所</label>
           <input type="text" id="place" name="place" class="form-control" value="{{$plan->place}}">
        </div>
        <div class="form-group">
           <label for="title">Search[県]</label>
           <input type="text" id="small_place" name="small_place" class="form-control" value="{{$plan->small_place}}">
        </div>
        <div class="form-group">
           <label for="title">Search[野菜]</label>
           <input type="text" id="vegetable" name="vegetable" class="form-control" value="{{$plan->vegetable}}">
        </div>
        <div class="form-group">
           <label for="title">MAP</label>
           <input type="text" id="map" name="map" class="form-control" value="{{$plan->map}}">
        </div>

 
        



        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$plan->id}}">
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         {{ csrf_field() }}
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title')
  The Estate : {{$buInfo->bu_name}}
@endsection

@section('header')

  {!! Html::style('cus/buall.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row profile">
      @include('website.bu.pages')
		<div class="col-md-9">
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/showAllBuilding/'.$buInfo->id)}}">{{$buInfo->bu_name}}</a></li>
      </ol>
      <div class="profile-content">
        <h1>{{$buInfo->bu_name}}</h1>
        <hr>
        <div class="btn-group" role="group" style="display:block;">
        <a href="{{ url('/search?bu_square='.$buInfo->bu_square) }}" class="btn btn-default">Surface : {{$buInfo->bu_square}}</a>
        <a href="{{ url('/search?bu_price='.$buInfo->bu_price) }}" class="btn btn-default">Price : {{$buInfo->bu_price}}</a>
        <a href="{{ url('/search?bu_place='.$buInfo->bu_place)}}" class="btn btn-default">Place : {{bu_place()[$buInfo->bu_place]}}</a>
        <a href="{{ url('/search?rooms='.$buInfo->rooms) }}" class="btn btn-default">Rooms : {{$buInfo->rooms}}</a>
        <a href="{{ url('/search?bu_type='.$buInfo->bu_type)  }}" class="btn btn-default">Type : {{bu_type()[$buInfo->bu_type]}}</a>
        <a href="{{ url('/search?bu_rent='.$buInfo->bu_rent)  }}" class="btn btn-default">Rent/Sell : {{bu_type()[$buInfo->bu_rent]}}</a>
        </div>
        <br>
        <hr>
        <p>{!! nl2br($buInfo->bu_large_dis)!!}</p>
        <hr>
        <br>
        <div id="map" style="width:100%;height:500px;"></div>
      </div>
      <br>
      <div class="profile-content">
        <h3>Random Rent/Sale Estates</h3>
        @include('website.bu.sharefile', ['bu' => $some_rent])
        <h3>Random Types Estates</h3>
        @include('website.bu.sharefile', ['bu' => $some_type])
		  </div>
		</div>
	</div>
</div>
<br>
<br>
@endsection

@section('footer')
<script>
  function myMap() {
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng({{$buInfo->bu_latitude}},{{$buInfo->bu_longitude}});
    var mapOptions = {center: myCenter, zoom: 5};
    var map = new google.maps.Map(mapCanvas,mapOptions);
    var marker = new google.maps.Marker({
      position: myCenter,
      animation: google.maps.Animation.BOUNCE
    });
    marker.setMap(map);
  }
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy1NjM1xfvdB22D8F3jY-OitQPC5qRvFk&callback=myMap"></script>

@endsection

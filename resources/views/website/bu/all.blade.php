@extends('layouts.app')

@section('title')
  All Estates
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
        <h2 style="text-align: center;">Main Menu</h2>
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="{{url('/showAllBuilding')}}">
							<i class="fa fa-home"></i>
							Estates </a>
						</li>
						<li>
							<a href="{{url('/forRent')}}">
							<i class="fa fa-user"></i>
							Rent </a>
						</li>
						<li>
							<a href="{{url('/forBuy')}}">
							<i class="fa fa-user"></i>
							Sell </a>
						</li>
						<li>
							<a href="{{url('/type/2')}}">
							<i class="fa fa-user"></i>
							Houses </a>
						</li>
						<li>
							<a href="{{url('/type/0')}}">
							<i class="fa fa-user"></i>
							Appartment </a>
						</li>
						<li>
							<a href="{{url('/type/1')}}">
							<i class="fa fa-user"></i>
							Lands </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
			<div class="profile-sidebar">
        <h2 style="text-align: center;">Advanced Search</h2>
				<div class="profile-usermenu" style="padding:10px;">
          {!! Form::open(['url'=> 'search','method'=>'get']) !!}
					<ul class="nav">
            <li>
               {!! Form::text("bu_price_from", null, ['class' => 'form-control', 'placeholder' => 'Price From']) !!}
            </li>
            <br>
            <li>
	             {!! Form::text("bu_price_to", null, ['class' => 'form-control', 'placeholder' => 'Price To']) !!}
						</li>
            <br>
						<li>
	             {!! Form::select("bu_place", bu_place(), null, ['class' => 'select2 form-control', 'placeholder' => 'Place']) !!}
						</li>
            <br>
						<li>
	             {!! Form::select("rooms", roomnumber(), null, ['class' => 'form-control', 'placeholder' => 'Rooms']) !!}
						</li>
            <br>
						<li>
	             {!! Form::select("bu_type", bu_type(), null, ['class' => 'form-control', 'placeholder' => 'Estate type']) !!}
						</li>
            <br>
						<li>
	             {!! Form::select("bu_rent", bu_rent(), null, ['class' => 'form-control', 'placeholder' => 'Rent Or Sell']) !!}
						</li>
            <br>
            <li>
	             {!! Form::text("bu_square", null, ['class' => 'form-control', 'placeholder' => 'Surface']) !!}
						</li>
            <br>
            <li>
	             {!! Form::submit("Search", ['class' => 'banner_btn']) !!}
						</li>
					</ul>
      {!! Form::close() !!}
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
      <ol class="breadcrumb">
          @if(isset($array))
            @if(!empty($array))
                @foreach($array as $key => $value)
                  <li><a href="{{url('/search?'.$key .'='. $value)}}">{{searchnameFiled()[$key]}}->
                    @if($key == 'bu_type')
                      {{bu_type()[$value]}}
                    @elseif($key == 'bu_rent')
                      {{bu_rent()[$value]}}
                    @elseif($key == 'bu_place')
                      {{bu_place()[$value]}}
                    @else
                      {{$value}}
                    @endif
                  </a></li>
                @endforeach
            @endif
          @endif
      </ol>
      <div class="profile-content">
         @include('website.bu.sharefile',['bu' => $buAll])
         <div class="text-center">
           {{ $buAll->appends(Request::except('page'))->render()}}
         </div>
      </div>
		</div>
	</div>
</div>
<br>
<br>
@endsection

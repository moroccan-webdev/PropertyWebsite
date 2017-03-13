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
      @include('website.bu.pages')
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

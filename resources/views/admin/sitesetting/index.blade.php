@extends('admin.layouts.layout')

@section('title')
  Site Setting
@endsection

@section('header')

@endsection

@section('content')

<section class="content-header">
  <h1>
    Add users
    <small>Users Table</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="{{ url('/adminpanel/sitesetting') }}">Site Setting</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Site Setting</h3>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
          <form class="" action="{{url('/adminpanel/sitesetting')}}" method="post">
            {{csrf_field()}}
          @foreach($sitesetting as $setting)
          <div class="col-md-2">
            {{$setting->slug}}
          </div>
          <div class="form-group{{ $errors->has('$setting->namesetting') ? ' has-error' : '' }}">
              <div class="col-md-10">
                @if($setting->type == 0)
                  {!! Form::text($setting->namesetting , $setting->value ,['class' => 'form-control']) !!}
                @else
                  {!! Form::textarea($setting->namesetting , $setting->value ,['class' => 'form-control']) !!}
                @endif
                  @if ($errors->has('$setting->namesetting'))
                      <span class="help-block">
                          <strong>{{ $errors->first('$setting->namesetting') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          @endforeach
          <button type="submit" class="btn btn-app" name="submit"><i class="fa fa-save"></i>Save Settings</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection

@section('footer')

@endsection

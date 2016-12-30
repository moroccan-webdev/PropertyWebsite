@extends('layouts.app')

@section('title')
  login page
@endsection

@section('content')
<div class="container">
  <div class="contact_bottom">
    <hr>
    <h3>Login</h3>
    <hr>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}

          <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder='Write Your Email Here' required autofocus>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" placeholder='Write Your Password Here' required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="text2">
              <div class="col-md-12">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember"> Remember Me
                      </label>
                  </div>
              </div>
          </div>
          <div class="text2">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-warning" style="font-size:0.9em;">
                    <i class="fa fa-btn fa-sign-in" style="color:#ffffff"></i>
                    Login
                  </button>
                  <a class="banner_btn" href="{{ url('/password/reset') }}"> Forgot Your Password?</a>
              </div>
          </div>
      </form>
  </div>
  <div class="clearfix">

  </div>
  <br>
</div>

@endsection

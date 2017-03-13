<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      {!!Html::style('website/css/bootstrap.min.css')!!}
      {!!Html::style('website/css/flexslider.css')!!}
      {!!Html::style('website/css/style.css')!!}
      {!!Html::style('website/css/font-awesome.min.css')!!}
      {!!Html::script('website/js/jquery.min.js')!!}

      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

      <title>
          {{getSetting()}}
          |
          @yield('title')
      </title>
      {!! Html::style('cus/css/select2.css') !!}
          @yield('header')

</head>
<body>
<div class="header">
  <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
    <div class="menu"> <a class="toggleMenu" href="#"><img src="{{ Request::root() }}website/images/nav_icon.png" alt="" /> </a>
      <ul class="nav" id="nav">
        <li class="current"><a href="{{ url('/') }}">Home</a></li>
        <li class="current"><a href="{{ url('/showAllBuilding') }}">Estates</a></li>

        <li class="dropdown">
            <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Rent <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              @foreach(bu_type() as $keyType => $type)
                <li><a href="{{ url('/search?bu_rent=0&bu_type='.$keyType) }}">{{ $type }}</a></li>
              @endforeach
            </ul>
        </li>

        <li class="dropdown">
            <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sell <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              @foreach(bu_type() as $keyType => $type)
                <li><a href="{{ url('/search?bu_rent=1&bu_type='.$keyType) }}">{{ $type }}</a></li>
              @endforeach
            </ul>
        </li>

        <li><a href="contact.html">Contact Us</a></li>

        @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ url('/logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                          </li>
                      </ul>
                  </li>
        @endif

        <div class="clear"></div>
      </ul>
    </div>
  </div>
</div>



    @yield('content')

    <div class="footer">
      <div class="footer_bottom">
        <div class="follow-us">
          <a class="fa fa-facebook social-icon" href="{{getSetting('Facebook')}}"></a>
          <a class="fa fa-twitter social-icon" href="{{getSetting('Twitter')}}"></a>
          <a class="fa fa-linkedin social-icon" href="{{getSetting('Youtube')}}"></a>
          <a class="fa fa-google-plus social-icon" href="{{getSetting('Facebook')}}"></a>
        </div>
        <div class="copy">
          <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
        </div>
      </div>
    </div>

    {!! Html::script('website/js/responsive-nav.js') !!}
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
      $('.select2').select2();
    </script>

    @yield('footer')

</body>
</html>

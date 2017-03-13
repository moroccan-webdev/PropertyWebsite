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
    <br>
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

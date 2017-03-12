@extends('admin.layouts.layout')

@section('title')
  Edit Estate
@endsection

@section('header')
  {!! Html::style('cus/css/select2.css') !!}
@endsection

@section('content')

<section class="content-header">
  <h1>
    Edit Estate
    <small>Estate Table</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/adminpanel/bu') }}">Manage Users</a></li>
    <li class="active"><a href="{{ url('/adminpanel/bu/edit'.$bu->id) }}">Edit User</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Estate</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! Form::model($bu , ['route'=> ['bu.update', $bu->id],'method'=>'PUT']) !!}
            @include('admin.bu.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('footer')
  {!! Html::script('cus/js/select2.js') !!}
  <script type="text/javascript">
  $('.select2').select2();
</script>
@endsection

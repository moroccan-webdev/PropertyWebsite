@extends('admin.layouts.layout')

@section('title')
  Edit User
@endsection

@section('header')

@endsection

@section('content')

<section class="content-header">
  <h1>
    Edit user
    <small>User Table</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/adminpanel/user') }}">Manage Users</a></li>
    <li class="active"><a href="{{ url('/adminpanel/user/edit'.$user->id) }}">Edit User</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! Form::model($user , ['route'=> ['user.update', $user->id],'method'=>'PUT']) !!}
            @include('admin.users.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('footer')

@endsection

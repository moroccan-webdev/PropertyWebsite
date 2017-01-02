@extends('admin.layouts.layout')

@section('title')
  Add User
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
    <li><a href="{{ url('/adminpanel/users') }}">Manage Users</a></li>
    <li class="active"><a href="{{ url('/adminpanel/users/create') }}">Add User</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Add New User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! Form::open(['url'=> ['adminpanel/user '],'method'=>'POST']) !!}
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

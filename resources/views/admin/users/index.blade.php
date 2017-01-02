@extends('admin.layouts.layout')

@section('title')
  Manage Users
@endsection

@section('header')
  {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
<section class="content-header">
  <h1>
    Manage users
    <small>Users Table</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="{{ url('/adminpanel/users') }}">Manage Users</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Creation date</th>
              <th>Priveleges</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->admin == 1 ? 'Administrator':'Guest'}}</td>
              <td><a href="{{ url('adminpanel/user/'.$user->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a>
  						    <div class="btn-xs" style="display:inline-block">
  						    {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
  						    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
  						    {!! Form::close() !!}
  		            </div>
              </td>
            </tr>

            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Creation date</th>
                <th>Priveleges</th>
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('footer')
  {!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
  {!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}
  <script type="text/javascript">
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });
  </script>
@endsection

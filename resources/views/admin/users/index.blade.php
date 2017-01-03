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
          <table id="data" class="table table-bordered table-hover">
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

      var lastIdx = null;
      $('#data thead th').each( function () {
      if($(this).index()  < 4 ){
          var classname = $(this).index() == 6  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
      }else if($(this).index() == 4){
          $(this).html( '<select><option value="0"> Guest </option><option value="1"> Admin </option></select>' );
      }

  } );

  var table = $('#data').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ url('/adminpanel/user/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'created_at', name: 'created_at'},
          {data: 'admin', name: 'admin'},
          {data: 'exame', name: 'exame'},
          {data: 'control', name: ''}
      ],
      "language": {
          "url": "{{ Request::root()  }}/admin/cus/English.json"
      },
      "stateSave": false,
      "responsive": true,
      "order": [[0, 'desc']],
      "pagingType": "full_numbers",
      aLengthMenu: [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, "All"]
      ],
      iDisplayLength: 25,
      fixedHeader: true,

      "oTableTools": {
          "aButtons": [
              {
                  "sExtends": "csv",
                  "sButtonText": "File Excel",
                  "sCharSet": "utf16le"
              },
              {
                  "sExtends": "copy",
                  "sButtonText": "Copy Data",
              },
              {
                  "sExtends": "print",
                  "sButtonText": "Print",
                  "mColumns": "visible",
              }
          ],

          "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
      },

      "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
      ,initComplete: function ()
      {
          var r = $('#data tfoot tr');
          r.find('th').each(function(){
              $(this).css('padding', 8);
          });
          $('#data thead').append(r);
          $('#search_0').css('text-align', 'center');
      }

  });

  table.columns().eq(0).each(function(colIdx) {
      $('input', table.column(colIdx).header()).on('keyup change', function() {
          table
                  .column(colIdx)
                  .search(this.value)
                  .draw();
      });
  });



  table.columns().eq(0).each(function(colIdx) {
      $('select', table.column(colIdx).header()).on('change', function() {
          table
                  .column(colIdx)
                  .search(this.value)
                  .draw();
      });

      $('select', table.column(colIdx).header()).on('click', function(e) {
          e.stopPropagation();
      });
  });

  $('#data tbody')
          .on( 'mouseover', 'td', function () {
              var colIdx = table.cell(this).index().column;

              if ( colIdx !== lastIdx ) {
                  $( table.cells().nodes() ).removeClass( 'highlight' );
                  $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
              }
          } )
          .on( 'mouseleave', function () {
              $( table.cells().nodes() ).removeClass( 'highlight' );
          } );
  </script>
@endsection

@if (Session::has('flash_message'))
<div class="alert alert-danger" id="mes" role="alert">
  <strong>Success:</strong>{{Session::get('flash_message')}}
</div>
<script>
  swal({   title: "{{Session::get('flash_message')}}",   text: "Auto close alert!",   timer: 5000,   showConfirmButton: false });
</script>
@endif

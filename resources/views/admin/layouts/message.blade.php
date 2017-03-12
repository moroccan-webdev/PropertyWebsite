@if (Session::has('flash_message'))
<div class="alert alert-danger" id="mes" role="alert">
  <strong>Success:</strong>{{Session::get('flash_message')}}
</div>
@endif

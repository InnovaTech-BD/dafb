@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger col-lg-12 " role="alert">
  {{$error}}
</div>
@endforeach
@endif
@if (session('success'))
<div class="alert alert-success col-lg-12 " role="alert">
{{ session('success') }}
</div>
@endif  
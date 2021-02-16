@extends('layouts.backend.app')

@section('title')
@isset($user)Update User @else Create User @endif
@endsection

@section('header-title')
@isset($user)Update User @else Create User @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample"action="@isset($user){{ route('app.users.user.update',$user->id) }} @else {{ route('app.users.user.store') }} @endif" enctype="multipart/form-data" method="POST">
            @csrf
            @isset($user) @method('PUT') @endif
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputName1">Name</label>
              <input type="text" name="name" class="form-control @error('name')) is-invalid  @enderror" value="@isset($user){{ $user->name }} @else {{ old('name') }} @endif" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword4">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="@isset($user){{ $user->profile->phone }} @else {{ old('phone') }} @endif"  placeholder="Phone Number" >
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email address</label>
              <input type="email" name="email" class="form-control @error('email')) is-invalid  @enderror "  value="@isset($user){{ $user->email }} @else {{ old('email') }} @endif" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label >Password</label>
                <input type="password" name="password" class="form-control @error('password')) is-invalid  @enderror"  placeholder="Password">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword4">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control"  placeholder="Password">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleSelectGender">Gender</label>
                <select class="form-control @error('gender')is-invalid @enderror" name="gender"  id="exampleSelectGender">
                  <option value="male" @isset($user) @if($user->profile-> gender=="male")selected @endif @endif>Male</option>
                  <option value="female" @isset($user) @if($user->profile->gender=="female")selected @endif @endif>Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
              <label for="exampleSelectGender">Role</label>
              <select class="form-control @error('role')is-invalid @enderror" name="role_id" >
                @foreach($roles as $key => $role)
                <option value="{{ $role->id }}" @isset($user) @if($user->role->slug==$role->slug) selected @endif @endif>{{ $role->title }}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="form-group" id="avatar">
              <label>Profile Picture</label>
              <input type="file" name="avatar" class="file-upload-default" onchange="loadFile(event)">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Avatar">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($user)Change @else Upload @endif</button>
                </span>
              </div>
            </div>
            <div class="form-group" id="output">
              @isset($user)
              <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($user->profile->avatar) }}>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Address</label>
              <textarea name="address" class="form-control" id="exampleTextarea1" rows="4">@isset($user){{ $user->profile->address }}@endif</textarea>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">@isset($user)Update @else Create @endif</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
  var loadFile = function(event) {
    const image=document.createElement('img');
    const output=document.getElementById('output');
    const uploadButton=document.getElementById('upload');
    while(output.firstChild){
        output.firstChild.remove();
    }
    image.id='newImage';
    image.classList="img-thumbnail";
    image.setAttribute("style", "height: 100px;width: 100px;");
    output.appendChild(image);
    output.childNodes[0].src=URL.createObjectURL(event.target.files[0]);
    upload.innerHTML="change";
  };
</script>
@endpush
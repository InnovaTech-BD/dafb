@extends('layouts.backend.app')

@section('title')
Profile
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample"action="{{ route('app.profile.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
           @method('PUT')               
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlFile1"> Profile picture</label>
                    <input type="file" class="form-control-file dropify" id="exampleFormControlFile1" name="avatar" data-default-file="{{ Storage::url(auth()->user()->profile->avatar) }}">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputName1">Name</label>
                <input type="text" name="name" class="form-control @error('name')) is-invalid  @enderror" value="{{ auth()->user()->name }}" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword4">Phone Number</label>
                  <input type="text" name="phone" class="form-control" value="{{ auth()->user()->profile->phone }}"  placeholder="Phone Number" >
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email address</label>
                <input type="email" name="email" class="form-control @error('email')) is-invalid  @enderror "  value="{{ auth()->user()->email }}" id="exampleInputEmail3" placeholder="Email">
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
                <div class="form-group col-md-12">
                  <label for="exampleSelectGender">Gender</label>
                  <select class="form-control @error('gender')is-invalid @enderror" name="gender"  id="exampleSelectGender">
                    <option value="male"  @if(auth()->user()->profile-> gender=="male")selected @endif >Male</option>
                    <option value="female"  @if(auth()->user()->profile->gender=="female")selected @endif >Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea name="address" class="form-control" id="exampleTextarea1" rows="4">{{ auth()->user()->profile->address }}</textarea>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Dropify
            $('.dropify').dropify();
        });
    </script>    
@endpush

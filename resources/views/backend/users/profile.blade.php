@extends('layouts.backend.app')
@section('title','User Profile')
@section('content')
<div class="row user-profile-area">
    <div class="col-md-6 col-sm-12 mx-auto">
        <div class="card p-3">
        <div class="row">
        <div class="col-md-12">
            <div class="profile">
            <img src="{{ Storage::url($user->profile->avatar) }}" alt="">
            </div>
        </div>
        <div class="col-md-12">
            <div class="profile-info">
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Name</h4>
                </div>
                <div class="col-6">
                  <p>{{ $user->name }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Phone Number</h4>
                </div>
                <div class="col-6">
                  <p>{{ $user->profile->phone }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Email address</h4>
                </div>
                <div class="col-6">
                  <p>{{ $user->email }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Gender</h4>
                </div>
                <div class="col-6">
                  <p>{{ $user->profile->gender }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Role</h4>
                </div>
                <div class="col-6">
                  <p class="text-info">{{ $user->role->title }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Address</h4>
                </div>
                <div class="col-6">
                  <p>{{ $user->profile->address }}</p>
                </div>
              </div>
            
            </div>
        </div>
        <div class="col-md-12">
           <a href="{{ route('app.users.user.edit',$user->id) }}"> <button type="button" class="btn btn-sm btn-success">Edit profile</button>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
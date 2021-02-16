
@extends('layouts.backend.app')
@section('title','Message details')
@section('content')
<div class="row user-profile-area">
    <div class="col-md-6 col-sm-12 mx-auto">
        <div class="card p-3">
        <div class="row">
        <div class="col-md-12">
            <div class="profile-info">
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Name</h4>
                </div>
                <div class="col-6">
                  <p>{{ $message->name }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Email address</h4>
                </div>
                <div class="col-6">
                  <p>{{ $message->email }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Message</h4>
                </div>
                <div class="col-6">
                  <p>{{ $message->message }}</p>
                </div>
              </div>
            
            </div>
        </div>
        <div class="col-md-12">
           <a href="{{ route('app.contact.index',$message->id) }}"> <button type="button" class="btn btn-sm btn-success">Back to list</button>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.backend.app')
@section('title','Volunteer Details')
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
                  <p>{{ $volunteer->name }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>House</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->house }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Street</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->street }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Postal code</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->postal }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>City</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->city }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Country</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->country }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Age</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->age }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Gender</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->gender }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Phone</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->phone }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Email</h4>
                </div>
                <div class="col-6">
                  <p>{{ $volunteer->email }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Status</h4>
                </div>
                <div class="col-6">
                  <select class="form-control @error('gender')is-invalid @enderror" name="gender"  id="exampleSelectStatus">
                    <option value="1" @if($volunteer->status==1) selected  @endif>Accept</option>
                    <option value="0" @if($volunteer->status==0) selected  @endif >On hold</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
           <a href="{{ route('app.volunteers.index',$volunteer->id) }}"> <button type="button" class="btn btn-sm btn-success">Back to list</button>
        </div>
        </div>
        </div>
    </div>
</div>
<form id="statusChange" action="{{route('app.volunteers.status')}}" method="POST" style="display: none;">
  @csrf
  <input type='number' name="status">
  <input type='number' value="{{$volunteer->id}}" name="id">
</form>
@push('custom-scripts')
<script>
  const selector=document.getElementById('exampleSelectStatus');
  const forms=document.getElementById('statusChange');
  const inputField=document.getElementsByName('status');
  selector.addEventListener('change',function(event){
    inputField[0].value=event.target.value;
    forms.submit()
  });
</script>
@endpush
@endsection
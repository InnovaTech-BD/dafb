
@extends('layouts.backend.app')
@section('title','scholarship Details')
@section('content')
<div class="row user-profile-area">
    <div class="col-md-6 col-sm-12 mx-auto">
        <div class="card p-3">
        <div class="row">
        <div class="col-md-12">
            <div class="profile-info">
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Firstname</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->firstname }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Lastname</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->lastname }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Gender</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->gender }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Fathers name</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->fathers }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Present Address</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->address }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Postal</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->postal }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Cell Phone</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->phone }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>School Phone</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->schoolphone }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Email</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->email }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Collecge/School</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->school }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Collecge/School Attending</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->schoolrole }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Grade</h4>
                </div>
                <div class="col-6">
                  <p>{{ $scholarship->grade }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-6">
                  <h4>Status</h4>
                </div>
                <div class="col-6">
                  <select class="form-control @error('gender')is-invalid @enderror" name="gender"  id="exampleSelectStatus">
                    <option value="1" @if($scholarship->status==1) selected  @endif>Accept</option>
                    <option value="0" @if($scholarship->status==0) selected  @endif >On hold</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
           <a href="{{ route('app.scholarships.index',$scholarship->id) }}"> <button type="button" class="btn btn-sm btn-success">Back to list</button>
        </div>
        </div>
        </div>
    </div>
</div>
<form id="statusChange" action="{{route('app.scholarships.status')}}" method="POST" style="display: none;">
  @csrf
  <input type='number' name="status">
  <input type='number' value="{{$scholarship->id}}" name="id">
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
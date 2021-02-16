@extends('layouts.backend.app')
@section('title')
@if(isset($role)) Update Role @else Create Role @endif
@endsection
@section('content')  
<div class="row">
    <div class="col-md-12 grid-margin stretch-card ">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title pb-3">@if(isset($role)) Update Role @else Create Role @endif</h4>
          <form class="forms-sample" action="@isset($role){{ route('app.settings.roles.role.update',$role->id) }} @else {{ route('app.settings.roles.role.store') }} @endif "method="POST">
           @csrf
           @isset($role) @method("PUT") @endif 
            <div class="form-group">
              <input type="text" placeholder="Role Title" name ='title' class="form-control" id="title" @if(isset($role)) value="{{ $role->title }}" @else  value="{{ old('title') }}" @endif >
            </div>
            <h4 class="card-title pt-3">Permissions</h4>
            @foreach($modules as $key => $module)
            <div class="row">
              <div class="col-md-3">
                <div class="form-check ">
                  <label class="form-check-label">
                    <input type="checkbox" disabled class="form-check-input"> {{ $module->title }} </label>
                </div>
              </div> 
              <div class="col-md-9">
                <div class="form-group form-check-inline">
                  @foreach($module->permissions as $key => $permission)
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" @isset($role) @if($role->hasPermission($permission->slug)) checked @endif @endif> {{ $permission->title }} </label>
                  </div>
                  @endforeach
                </div>
              </div>             
            </div>
            @endforeach
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection    

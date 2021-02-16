@extends('layouts.backend.app')

@section('title')
@isset($member)Update Member @else Create Member @endif
@endsection

@section('header-title')
@isset($member)Update Member @else Create Member @endif
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
          <form class="forms-sample"action="@isset($member){{ route('app.teams.update',$member->id) }} @else {{ route('app.teams.store') }} @endif" enctype="multipart/form-data" method="POST">
            @csrf
            @isset($member) @method('PUT') @endif
            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Name(en)</label>
              <input type="text" name="en_name" class="form-control @error('en_name')) is-invalid  @enderror" value="@isset($member){{ $member->name['en'] }} @else {{ old('en_name') }} @endif" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Name(bn)</label>
              <input type="text" name="bn_name" class="form-control @error('bn_name')) is-invalid  @enderror" value="@isset($member){{ $member->name['bn'] }} @else {{ old('bn_name') }} @endif" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Name(de)</label>
              <input type="text" name="de_name" class="form-control @error('de_name')) is-invalid  @enderror" value="@isset($member){{ $member->name['de'] }} @else {{ old('de_name') }} @endif" id="exampleInputName1" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Type</label>
              <select class="form-control @error('type')is-invalid @enderror" name="type"  id="exampleSelectGender">
                <option value="exceutive" @if(isset($member) && $member->type=='exceutive') selected @endif)>Exceutive Committee</option>
                <option value="general" @if(isset($member) && $member->type=='general') selected @endif) >General Assembly</option>
              </select>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleSelectGender">Designation(en)</label>
                <input type="text" name="en_designation" class="form-control @error('en_designation')) is-invalid  @enderror" value="@isset($member){{ $member->designation['en'] }} @else {{ old('en_designation') }} @endif" id="exampleInputName1" placeholder="Designation">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleSelectGender">Designation(bn)</label>
                <input type="text" name="bn_designation" class="form-control @error('bn_designation')) is-invalid  @enderror" value="@isset($member){{ $member->designation['bn'] }} @else {{ old('bn_designation') }} @endif" id="exampleInputName1" placeholder="Designation">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleSelectGender">Designation(de)</label>
                <input type="text" name="de_designation" class="form-control @error('de_designation')) is-invalid  @enderror" value="@isset($member){{ $member->designation['de'] }} @else {{ old('de_designation') }} @endif" id="exampleInputName1" placeholder="Designation">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email address</label>
              <input type="email" name="email" class="form-control @error('email')) is-invalid  @enderror "  value="@isset($member){{ $member->email }} @else {{ old('email') }} @endif" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="form-group" id="avatar">
              <label>Image</label>
              <input type="file" name="image" class="file-upload-default" onchange="loadFile(event)">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Avatar">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($member)Change @else Upload @endif</button>
                </span>
              </div>
            </div>
            <div class="form-group" id="output">
              @isset($member)
              <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($member->image) }}>
              @endif
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">@isset($member)Update @else Create @endif</button>
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
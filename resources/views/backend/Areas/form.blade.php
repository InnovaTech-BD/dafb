@extends('layouts.backend.app')

@section('title')
@isset($are)Update area @else Create area @endif
@endsection

@section('header-title')
@isset($are)Update area @else Create area @endif
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
          <form class="forms-sample"action="@isset($area){{ route('app.areas.update',$area->id) }} @else {{ route('app.areas.store') }} @endif" enctype="multipart/form-data" method="POST">
            @csrf
            @isset($area) @method('PUT') @endif
            <div class="row">
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Headline(en)</label>
              <input type="text" name="en_headline" class="form-control @error('en_headline')) is-invalid  @enderror" value="@isset($area){{ $area->headline['en'] }} @else {{ old('en_headline') }} @endif" id="exampleInputName1" placeholder="Headline">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Headline(bn)</label>
              <input type="text" name="bn_headline" class="form-control @error('bn_headline')) is-invalid  @enderror" value="@isset($area){{ $area->headline['bn'] }} @else {{ old('bn_headline') }} @endif" id="exampleInputName1" placeholder="Headline">
              </div>
              <div class="form-group col-md-4">
                <label for="exampleInputName1">Headline(de)</label>
              <input type="text" name="de_headline" class="form-control @error('de_headline')) is-invalid  @enderror" value="@isset($area){{ $area->headline['de'] }} @else {{ old('de_headline') }} @endif" id="exampleInputName1" placeholder="Headline">
              </div>
            </div>
            <div class="form-group" id="avatar">
              <label>Image</label>
              <input type="file" name="image" class="file-upload-default" onchange="loadFile(event)">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Avatar">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($area)Change @else Upload @endif</button>
                </span>
              </div>
            </div>
            <div class="form-group" id="output">
              @isset($area)
              <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($area->image) }}>
              @endif
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">@isset($area)Update @else Create @endif</button>
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
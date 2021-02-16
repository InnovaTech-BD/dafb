@extends('layouts.backend.app')

@section('title')
@isset($face)Update Happy Face @else Create happy Face @endif
@endsection

@section('header-title')
@isset($face)Update happy Face @else Create happy Face @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush
@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="{{isset($face)?route('app.faces.update',$face->id):route('app.faces.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($face)
            @method('PUT')
            @endif
              <div class="form-group" id="avatar">
                <label>Image</label>
                <input type="file" name="image" class="file-upload-default " onchange="loadFile(event)">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info @error('image')is-invalid @enderror" disabled placeholder="Upload Cover">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($face)Change @else Upload @endif</button>
                  </span>
                </div>
                <div class="form-group" id="output">
                  @isset($face)
                  <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($face->image) }}>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">English Description</label>
                <textarea class="form-control @error('en_description')is-invalid @enderror" name="en_description" id="exampleTextarea1" rows="4">{{$face->description['en']??old('en_description')}}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Bangla Description</label>
                <textarea class="form-control @error('bn_description')is-invalid @enderror" name="bn_description" id="exampleTextarea1" rows="4">{{$face->description['bn']??old('bn_description')}}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Deutsch Description</label>
                <textarea class="form-control @error('de_description')is-invalid @enderror" name="de_description" id="exampleTextarea1" rows="4">{{$face->description['de']??old('de_description')}}</textarea>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">@isset($face)Update @else Create @endif</button>
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
    <!-- plugin js for this page -->
    <script src="{{asset('assets/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simplemde/simplemde.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/formpickers.js')}}"></script>
    <!-- plugin js for this page -->
    <script>
      var loadFile = function(face) {
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
        output.childNodes[0].src=URL.createObjectURL(face.target.files[0]);
        upload.innerHTML="change";
      };
    </script>
@endpush



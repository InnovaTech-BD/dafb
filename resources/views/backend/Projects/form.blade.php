@extends('layouts.backend.app')

@section('title')
@isset($project)Update Programs @else Create Programs @endif
@endsection

@section('header-title')
@isset($project)Update Programs @else Create Programs @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body create-programs-form">
          <form id="example-form" action="{{isset($project)?route('app.projects.update',$project->id):route('app.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($project)
            @method('PUT')
            @endif
            <div>
              <h3>English</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('en_headline')is-invalid @enderror" name="en_headline" value="{{$project->headline['en']??old('en_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group" id="avatar">
                  <label>Picture</label>
                  <input type="file" name="image" class="file-upload-default" onchange="loadFile(event)">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Avatar">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($project)Change @else Upload @endif</button>
                    </span>
                  </div>
                </div>
                <div class="form-group" id="output">
                  @isset($project)
                  <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($project->image) }}>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description</label>
                  <textarea  name="en_description" id='tinyMceExampleBangla'>
                    {{$project->description['en']??old('en_description')}}
                  </textarea>
                </div>
              </section>
              <h3>বাংলা</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('bn_headline')is-invalid @enderror" name="bn_headline" value="{{$project->headline['bn']??old('bn_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description</label>
                  <textarea  name="bn_description" id='tinyMceExample'>
                    {{$project->description['bn']??old('bn_description')}}
                  </textarea>
                </div>
              </section>
              <h3>Deitsch</h3>
              <section>
                <section>
                  <div class="form-group">
                    <label for="exampleInputName1">Headline</label>
                    <input type="text" class="form-control @error('de_headline')is-invalid @enderror" name="de_headline" value="{{$project->headline['de']??old('de_headline')}}" id="exampleInputName1" placeholder="Headline">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Description</label>
                    <textarea  name="de_description" id='tinyMceExampleGerman'>
                      {{$project->description['de']??old('de_description')}}
                    </textarea>
                  </div>
                </section>
              </section>
            </div>
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
    <script src="{{asset('assets/vendors/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/editorDemo.js')}}"></script>
    <script src="{{asset('assets/js/wizard.js')}}"></script>
    <!-- plugin js for this page -->
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



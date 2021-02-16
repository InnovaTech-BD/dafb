@extends('layouts.backend.app')

@section('title')
@isset($event)Update event @else Create event @endif
@endsection

@section('header-title')
@isset($event)Update event @else Create event @endif
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
          <form id="example-form" class="forms-sample" action="{{isset($event)?route('app.events.upcoming.update',$event->id):route('app.events.upcoming.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($event)
            @method('PUT')
            @endif
            <div>
              <h3>English</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('en_headline')is-invalid @enderror" name="en_headline" value="{{$event->headline['en']??old('en_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group" id="avatar">
                  <label>Picture</label>
                  <input type="file" name="image" class="file-upload-default " onchange="loadFile(event)">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info @error('image')is-invalid @enderror" disabled placeholder="Upload Cover">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($event)Change @else Upload @endif</button>
                    </span>
                  </div>
                  <div class="form-group" id="output">
                    @isset($event)
                    <img id="newImage" class="img-thumbnail" style="height: 100px;width: 100px;"src={{ Storage::url($event->image) }}>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName1">Location</label>
                      <input type="text" class="form-control @error('en_location')is-invalid @enderror" name="en_location" value="{{$event->location['en']??old('en_location')}}" id="exampleInputName1" placeholder="Location">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date</label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" name="date" class="form-control  @error('date')is-invalid @enderror" value="{{$event->date??old('date')}}" placeholder="m/d/y">
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Description</label>
                  <textarea class="form-control @error('en_description')is-invalid @enderror" name="en_description" id="exampleTextarea1" rows="4">{{$event->description['en']??old('en_description')}}</textarea>
                </div>
              </section>
              <h3>বাংলা</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('bn_headline')is-invalid @enderror" name="bn_headline" value="{{$event->headline['bn']??old('bn_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputName1">Location</label>
                      <input type="text" class="form-control @error('bn_location')is-invalid @enderror" name="bn_location" value="{{$event->location['bn']??old('bn_location')}}" id="exampleInputName1" placeholder="Location">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Description</label>
                  <textarea class="form-control @error('bn_description')is-invalid @enderror" name="bn_description" id="exampleTextarea1" rows="4">{{$event->description['bn']??old('bn_description')}}</textarea>
                </div>
              </section>
              <h3>Deitsch</h3>  
                <section>
                  <div class="form-group">
                    <label for="exampleInputName1">Headline</label>
                    <input type="text" class="form-control @error('de_headline')is-invalid @enderror" name="de_headline" value="{{$event->headline['de']??old('de_headline')}}" id="exampleInputName1" placeholder="Headline">
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputName1">Location</label>
                        <input type="text" class="form-control @error('de_location')is-invalid @enderror" name="de_location" value="{{$event->location['de']??old('de_location')}}" id="exampleInputName1" placeholder="Location">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control @error('de_description')is-invalid @enderror" name="de_description" id="exampleTextarea1" rows="4">{{$event->description['de']??old('de_description')}}</textarea>
                  </div>
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
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/formpickers.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery-steps/jquery.steps.min.js')}}"></script>
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



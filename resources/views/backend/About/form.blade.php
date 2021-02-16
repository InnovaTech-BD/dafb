@extends('layouts.backend.app')

@section('title')
Update About page
@endsection

@section('header-title')
Update About Page
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
          <form id="example-form" action="{{route('app.about.update',$about->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($about)
            @method('PUT')
            @endif
            <div>
              <h3>English</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('en_headline')is-invalid @enderror" name="en_headline" value="{{$about->headline['en']??old('en_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description</label>
                  <textarea  name="en_description" id='tinyMceExampleBangla'>
                    {{$about->description['en']??old('en_description')}}
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Headline buttom</label>
                  <input type="text" class="form-control @error('en_headline2')is-invalid @enderror" name="en_headline2" value="{{$about->headline2['en']??old('en_headline2')}}" id="exampleInputName1" placeholder="Headline Buttom">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description Buttom</label>
                  <textarea  name="en_description2" id='tinyMceExampleBangla2'>
                    {{$about->description2['en']??old('en_description2')}}
                  </textarea>
                </div>
              </section>
              <h3>বাংলা</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('bn_headline')is-invalid @enderror" name="bn_headline" value="{{$about->headline['bn']??old('bn_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description</label>
                  <textarea  name="bn_description" id='tinyMceExample'>
                    {{$about->description['bn']??old('bn_description')}}
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Headline Buttom</label>
                  <input type="text" class="form-control @error('bn_headline2')is-invalid @enderror" name="bn_headline2" value="{{$about->headline2['bn']??old('bn_headline2')}}" id="exampleInputName1" placeholder="Headline Buttom">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Description Buttom </label>
                  <textarea  name="bn_description2" id='tinyMceExample2'>
                    {{$about->description2['bn']??old('bn_description2')}}
                  </textarea>
                </div>
              </section>
              <h3>Deitsch</h3>
              <section>
                <section>
                  <div class="form-group">
                    <label for="exampleInputName1">Headline</label>
                    <input type="text" class="form-control @error('de_headline')is-invalid @enderror" name="de_headline" value="{{$about->headline['de']??old('de_headline')}}" id="exampleInputName1" placeholder="Headline">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Description</label>
                    <textarea  name="de_description" id='tinyMceExampleGerman'>
                      {{$about->description['de']??old('de_description')}}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Headline Buttom</label>
                    <input type="text" class="form-control @error('de_headline2')is-invalid @enderror" name="de_headline2" value="{{$about->headline2['de']??old('de_headline2')}}" id="exampleInputName1" placeholder="Headline Buttom">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Description Buttom</label>
                    <textarea  name="de_description2" id='tinyMceExampleGerman2'>
                      {{$about->description2['de']??old('de_description2')}}
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
@endpush



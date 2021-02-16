@extends('layouts.backend.app')

@section('title')
@isset($report)Update Programs @else Create Programs @endif
@endsection

@section('header-title')
@isset($report)Update Programs @else Create Programs @endif
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
          <form id="example-form" action="{{route('app.reports.update',$report->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($report)
            @method('PUT')
            @endif
            <div>
              <h3>English</h3>
              <section>
                @if(!isset($report))
                <div class="form-group">
                  <label class=" col-form-label">Type</label>
                    <select name="type" class="form-control">
                      <option value="">Select a type</option> 
                      <option value="annualreport">Annual Report</option>  
                      <option value="financialstatement">Financial statement</option>  
                    </select>
                </div>
                @endif
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('en_headline')is-invalid @enderror" name="en_headline" value="{{$report->headline['en']??old('en_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="en_description" value="{{old('en_description')}}" class="form-control  @error('en_description') is-invalid @enderror">{{$report->description['en']??old('en_description')}}</textarea>
                </div>
                <div class="form-group" id="avatar">
                  <label>Pdf File</label>
                  <input type="file" name="file" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Pdf report">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-gradient-primary" type="button" id="upload">@isset($report)Change @else Upload @endif</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label >Buttom Description</label>
                  <textarea name="en_buttomdesc" value="{{old('en_buttomdesc')}}" class="form-control  @error('en_buttomdesc') is-invalid @enderror">{{$report->buttom_desc['en']??old('en_buttomdesc')}}</textarea>
                </div>
              </section>
              <h3>বাংলা</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('bn_headline')is-invalid @enderror" name="bn_headline" value="{{$report->headline['bn']??old('bn_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label >Description</label>
                  <textarea name="bn_description" value="{{old('bn_description')}}" class="form-control  @error('bn_description') is-invalid @enderror">{{$report->description['bn']??old('bn_description')}}</textarea>
                </div>
                <div class="form-group">
                  <label >Buttom Description</label>
                  <textarea name="bn_buttomdesc" value="{{old('bn_buttomdesc')}}" class="form-control  @error('bn_buttomdesc') is-invalid @enderror">{{$report->buttom_desc['bn']??old('bn_buttomdesc')}}</textarea>
                </div>
              </section>
              <h3>Deutsch</h3>
              <section>
                <div class="form-group">
                  <label for="exampleInputName1">Headline</label>
                  <input type="text" class="form-control @error('de_headline')is-invalid @enderror" name="de_headline" value="{{$report->headline['bn']??old('de_headline')}}" id="exampleInputName1" placeholder="Headline">
                </div>
                <div class="form-group">
                  <label >Description</label>
                  <textarea name="de_description" value="{{old('de_description')}}" class="form-control  @error('de_description') is-invalid @enderror">{{$report->buttom_desc['de']??old('de_description')}}</textarea>
                </div>
                <div class="form-group">
                  <label >Buttom Description</label>
                  <textarea name="de_buttomdesc" value="{{old('de_buttomdesc')}}" class="form-control  @error('de_buttomdesc') is-invalid @enderror">{{$report->buttom_desc['de']??old('de_buttomdesc')}}</textarea>
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
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simplemde/simplemde.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/wizard.js')}}"></script>
    <!-- plugin js for this page -->
@endpush



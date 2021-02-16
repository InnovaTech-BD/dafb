@extends('layouts.backend.app')

@section('title')
@isset($slider)Update Slider @else Create Slider @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendors/dropify/dropify.min.css')}}">
@endpush
@section('header-title')
@isset($slider)Update Slider @else Create Slider @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
@if(isset($slider))
@if(count($slider->images))
<div class='row'>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th> Image </th>
                <th> Title </th>
                <th class="text-center"> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($slider->images as $image)
              <tr>
                <td class="py-1">
                  <img src="{{ Storage::url($image->image) }}" alt="image" />
                </td>
                <td>
                  {{ $image->headline['en'] }}
                </td>
                <td style="text-align: center">                                      
                  <a data-toggle="modal" href="" data-target="#delete{{ $image->id }}" class="badge badge-danger">Delete</a>                    
                  </td>          
                   <!-- Modal -->
                   <div class="modal fade" id="delete{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Slider content</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          <button id="delete" type="button" class="btn btn-danger" onclick="deleteForm('{{ $image->id }}')">Delete</button>
                          <form id="deleteform{{ $image->id }}"
                            action="{{ route('app.image.destroy',$image->id) }}" method="POST"
                            style="display: none;">
                            @csrf()
                            @method('DELETE')
                          </form>
                        </div> 
                      </div>
                    </div>
                  </div>
              </tr>  
              @endforeach        
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div> 
@endif
@endif
<div class="row">
  <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="form-sample" action="{{isset($slider)?route('app.sliders.update',$slider->id):route('app.sliders.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($slider)
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Project</label>
                  <div class="col-sm-9">
                    <select name="project" class="form-control">
                      <option value="">Select a project</option> 
                      @foreach ($projects as $project)
                      <option value="{{$project->id}}" @isset($slider) @if($slider->project_id==$project->id) selected @endif @endif>{{$project->headline['en']}}</option>  
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Event</label>
                  <div class="col-sm-9">
                    <select name="event" class="form-control">
                      <option value="">Select a Event</option> 
                      @foreach ($events as $event)
                      <option value="{{$event->id}}" @isset($slider) @if($slider->event_id==$event->id) selected @endif @endif>{{$event->headline['en']}}</option>  
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <p class="card-description"> Add Content </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Image</label>
                  <div class="col-sm-9">
                    <input name="image" type="file" class="dropify" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">English Title</label>
                  <div class="col-sm-9">
                    <input name="en_title" value="{{old('en_title')}}" type="text" class="form-control @error('en_title') is-invalid @enderror" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Bangali Title</label>
                  <div class="col-sm-9">
                    <input name="bn_title" value="{{old('bn_title')}}" type="text" class="form-control  @error('bn_title') is-invalid @enderror" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Deutsch Title</label>
                  <div class="col-sm-9">
                    <input name="de_title" value="{{old('de_title')}}" type="text" class="form-control  @error('de_title') is-invalid @enderror" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">English Description</label>
              <div class="col-sm-10">
                <textarea name="en_description" value="{{old('en_description')}}" class="form-control  @error('en_description') is-invalid @enderror"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Bangali Description</label>
              <div class="col-sm-10">
                <textarea name="bn_description" value="{{old('bn_description')}}" class="form-control  @error('bn_description') is-invalid @enderror"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Deutsch Description</label>
              <div class="col-sm-10">
                <textarea name="de_description" value="{{old('de_description')}}" class="form-control  @error('de_description') is-invalid @enderror"></textarea>
              </div>
            </div>
            <div class="row">
              <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
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
<script src="{{asset('assets/vendors/dropify/dropify.min.js')}}"></script>
    <!-- plugin js for this page -->
<script src="{{asset('assets/js/dropify.js')}}"></script>

@endpush



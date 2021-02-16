@extends('layouts.backend.app')

@section('title')
@isset($gallery)Update gallery @else Create gallery @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendors/dropify/dropify.min.css')}}">
@endpush
@section('header-title')
@isset($gallery)Update gallery @else Create gallery @endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
@if(isset($gallery))
@if(count($gallery->images))
<div class='row'>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th> # </th>
                <th> Image </th>
                <th class="text-center"> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($gallery->images as $key=>$image)
              <tr>
                <td>
                  {{ $image->$key+1 }}
                </td>
                <td class="py-1">
                  <img src="{{ Storage::url($image->image) }}" alt="image" />
                </td>
                <td style="text-align: center">                                      
                  <a data-toggle="modal" href="" data-target="#delete{{ $image->id }}" class="badge badge-danger">Delete</a>                    
                  </td>          
                   <!-- Modal -->
                   <div class="modal fade" id="delete{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Gallery content</h5>
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
          <form class="form-sample" action="{{isset($gallery)?route('app.galleries.update',$gallery->id):route('app.galleries.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($gallery)
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Project</label>
                  <div class="col-sm-9">
                    <select name="project" class="form-control">
                      <option value="">Select a Program</option> 
                      @foreach ($projects as $project)
                      <option value="{{$project->id}}" @isset($gallery) @if($gallery->project_id==$project->id) selected @endif @endif>{{$project->headline['en']}}</option>  
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
                      <option value="{{$event->id}}" @isset($gallery) @if($gallery->event_id==$event->id) selected @endif @endif>{{$event->headline['en']}}</option>  
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pages</label>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          @isset($about)
                          @if(!$about->hasGallery())
                          <input type="radio" class="form-check-input" name="pages[]" value="about"> About us </label>
                          @else
                          @if(isset($gallery) && $about->gallery->id==$gallery->id)
                          <input type="radio" class="form-check-input" name="pages[]" value="about" @if($about->hasGallery())checked @endif> About us </label>
                          @endif
                          @endif
                          @endif
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="pages[]" value="none" >None</label>
                      </div>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-1 col-form-label">Image</label>
                  <div class="col-sm-11">
                    <input name="image" type="file" class="dropify" />
                  </div>
                </div>
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



@extends('layouts.backend.app')

@section('title')
Happy Faces
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('header-title')
Happy Faces
@endsection

@section('add-menu')
<a  class="float-right" href="{{ route('app.faces.create') }}">
  <label class="badge badge-success">Create Happy face</label>
</a>
@endsection

@section('content')
<div class='row'>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            
          </div>
        </div>
        <table id="order-listing" class="table">
          <thead>
            <tr>
              <th> #</th>
              <th>Image</th>
              <th>Description</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($faces as $key=>$face)
            <tr>
              <td>{{$key+1}}</td>
              <td class="py-1">
                <img src="{{ Storage::url($face->image) }}" alt="image" />
              </td>
              <td>{{Str::limit($face->description['en'],30)}}</td>
              <td>{{$face->created_at}}</td>
              <td>
                <a href="{{route('app.faces.edit',$face->id)}}">
                  <button class="btn btn-outline-primary">Edit</button>
                </a>
                <a data-toggle="modal" href="" data-target="#delete{{ $face->id }}" class="btn btn-outline-danger">Delete</a>
                
              </td>
              <div class="modal fade" id="delete{{ $face->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete face </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      <button id="delete" type="button" class="btn btn-danger" onclick="deleteForm('{{ $face->id }}')">Delete</button>
                      <form id="deleteform{{ $face->id }}"
                        action="{{ route('app.faces.destroy',$face->id) }}" method="POST"
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
        <div class="mt-4">
      </div>
      </div>
    </div>
  </div>
</div>  
@endsection
@push('custom-scripts')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready( function () {
    $('#ttt').DataTable();
} );
</script>
@endpush  
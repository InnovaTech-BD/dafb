@extends('layouts.backend.app')

@section('title')
Scholarships
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('header-title')
All Requests
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
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>gender</th>
              <th>Status</th>
              <th>date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($scholarships as $key=>$scholarship)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$scholarship->firstname}}</td>
              <td>{{$scholarship->phone}}</td>
              <td>{{$scholarship->email}}</td>
              <td>{{$scholarship->gender}}</td>
              @if($scholarship->status)
              <td>
                <label class="badge badge-success">accepted</label>
              </td>
              @else
              <td>
              <label class="badge badge-danger">on hold</label>
              </td>
              @endif
              <td>{{$scholarship->created_at}}</td>
              <td>
                <a href="{{route('app.scholarships.show',$scholarship->id)}}">
                  <button class="btn btn-outline-success">View</button>
                </a>
                <a data-toggle="modal" href="" data-target="#delete{{ $scholarship->id }}" class="btn btn-outline-danger">Delete</a>
                
              </td>
              <div class="modal fade" id="delete{{ $scholarship->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete scholarship </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      <button id="delete" type="button" class="btn btn-danger" onclick="deleteForm('{{ $scholarship->id }}')">Delete</button>
                      <form id="deleteform{{ $scholarship->id }}"
                        action="{{ route('app.scholarships.destroy',$scholarship->id) }}" method="POST"
                        style="display: none;">
                        @csrf()
                        @method('DELETE')
                      </form>
                    </div> 
                  </div>
                </div>
              </div>
            </tr> 
            @empty
                
            @endforelse

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
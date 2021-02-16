@extends('layouts.backend.app')

@section('title')
Member
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('header-title')
All Members
@endsection

@section('add-menu')
<a  class="float-right" href="{{ route('app.teams.create') }}">
  <label class="badge badge-success">Create Member</label>
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
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th> Image </th>
              <th> Name </th>
              <th> Designation</th>
              <th> email </th>
              <th class="text-center"> Action </th>
            </tr>
          </thead>
          <tbody>
            @forelse($members as $key => $member)
            <tr>
              <td class="py-1">
                <img src="{{ Storage::url($member->image) }}" alt="image" />
              </td>
              <td> {{ $member->name['en'] }}</td>
              <td>
                {{ $member->designation['en'] }}
              </td>
              <td>
                {{ $member->email }}
              </td>
              <td style="text-align: center"> 
                <a href="{{ route('app.teams.edit',$member->id) }}" class="badge badge-info">Edit</a>              
                <a data-toggle="modal" href="" data-target="#delete{{ $member->id }}" class="badge badge-danger">Delete</a>
                </td>
                 <!-- Modal -->
                 <div class="modal fade" id="delete{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete member - {{ $member->name['en'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button id="delete" type="button" class="btn btn-danger" onclick="deleteForm('{{ $member->id }}')">Delete</button>
                        <form id="deleteform{{ $member->id }}"
                          action="{{ route('app.teams.destroy',$member->id) }}" method="POST"
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
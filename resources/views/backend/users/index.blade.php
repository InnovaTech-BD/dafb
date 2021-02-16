@extends('layouts.backend.app')

@section('title')
User List
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('header-title')
All Users
@endsection

@section('add-menu')
<a  class="float-right" href="{{ route('app.users.user.create') }}">
  <label class="badge badge-success">Create user</label>
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
              <th> User </th>
              <th> Name </th>
              <th> email </th>
              <th> phone </th>
              <th> Role </th>
              <th class="text-center"> Action </th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $key => $user)
            <tr>
              <td class="py-1">
                <img src="{{ Storage::url($user->profile->avatar) }}" alt="image" />
              </td>
              <td> {{ $user->name }}</td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                {{ $user->profile->phone }}
              </td>
              <td>{{ $user->role->title }}</td>
              <td style="text-align: center"> 
                
                <a href="{{ route('app.users.user.show',$user->id) }}" class="badge badge-info">Profile</a>
                
                <a href="{{ route('app.users.user.edit',$user->id) }}" class="badge badge-success">Edit</a>
                
                
                <a data-toggle="modal" href="" data-target="#delete{{ $user->id }}" class="badge badge-danger">Delete</a>
                
               
                </td>
               
                 <!-- Modal -->
                 <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User - {{ $user->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button id="delete" type="button" class="btn btn-danger" onclick="deleteForm('{{ $user->id }}')">Delete</button>
                        <form id="deleteform{{ $user->id }}"
                          action="{{ route('app.users.user.destroy',$user->id) }}" method="POST"
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
@extends('layouts.backend.app')

@section('title')
Reports
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('header-title')
All Reports
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
              <th>Type</th>
              <th>Headline</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reports as $key=>$report)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$report->type}}</td>
              <td>{{$report->headline['en']}}</td>
              <td>{{$report->created_at}}</td>
              <td>
                <a href="{{route('app.reports.edit',$report->id)}}">
                  <button class="btn btn-outline-primary">Edit</button>
                </a>               
              </td>
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
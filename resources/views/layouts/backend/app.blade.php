<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    @stack('css')
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('layouts.backend.partials.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.backend.partials.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('extra-content')
            <div class="page-header">
              <h3 class="page-title"> @yield('header-title')</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @yield('add-menu')
                </ol>
              </nav>
            </div>
            @include('layouts.backend.partials.alert')
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          @include('layouts.backend.partials.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   <!-- plugins:js -->
   <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
   <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('assets/js/misc.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page -->
   <script src="{{ asset('assets/js/dashboard.js') }}"></script>
   <script src="{{ asset('assets/js/todolist.js') }}"></script>
   <script src="{{ asset('assets/js/custom.js') }}"></script>
   <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
   <!-- End custom js for this page -->
   @stack('custom-scripts')
   <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
  </body>
</html>
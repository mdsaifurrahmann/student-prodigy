@extends('layouts/contentLayoutMaster')

@section('title', 'Applicant List')

@section('vendor-style')
   {{-- vendor css files --}}
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

   <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@stop

@section('page-style')
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@stop

@section('content')
   <!-- Basic table -->
   <section id="basic-datatable">
      <div class="row">
         <div class="col-12">

            {{-- Notice --}}
            @if (session('destroy-success'))
               <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('update-success') || session('delete-success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
         </div>
         {{-- Export Option Closed --}}


         <div class="card">
            <table class="datatables-basic table">
               <thead>
                  <tr>
                     <th></th>
                     <th>id</th>
                     <th></th>
                     @foreach ($titles as $title)
                        <th>{{ $title }}</th>
                     @endforeach
                     <th>Actions</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
      </div>
   </section>
   <!--/ Basic table -->

@stop


@section('vendor-script')
   {{-- vendor files --}}
   <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
   {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script> --}}
   <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@stop
@section('page-script')
   {{-- Page js files --}}
   <script src="{{ asset(mix('js/core/user-list-table.js')) }}"></script>

   <script>
      function swal(id) {
         Swal.fire({
            title: 'Are you sure?',
            text: "This user will be deleted permanently. You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
               confirmButton: 'btn btn-danger',
               cancelButton: 'btn btn-outline-primary ms-1'
            },
            buttonsStyling: false
         }).then(function(result) {
            if (result.value) {
               // form.submit();

               console.log(id);
               Swal.fire({
                  icon: 'info',
                  title: 'Deletion in Progress!',
                  text: 'This user will be deleted.',
                  customClass: {
                     confirmButton: 'btn btn-success'
                  }
               })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
               Swal.fire({
                  title: 'Cancelled',
                  text: 'User is safe :)',
                  icon: 'error',
                  customClass: {
                     confirmButton: 'btn btn-success'
                  }
               })
            }
         })
      };
   </script>
@stop

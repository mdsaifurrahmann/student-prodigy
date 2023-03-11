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
            @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('update-success') || session('delete-success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            @if (session('error'))
               <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('update-success') || session('delete-success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
         </div>
         {{-- Export Option Closed --}}



         <div class="card table-responsive px-0">
            <div class="card-header">
               <div class="head-label"><h4 class="mb-0">All Users</h4></div>
            </div>
            <table class="table ">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Username</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Mobile</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($users as $user)
                     <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>
                           <form method="POST" action="{{ route('destroy-user', $user->id) }}" class="destroyUser">
                              @csrf
                              @method("DELETE")
                              <button class="create-new btn btn-danger" type="submit" id="confirm-destroy">
                              <span>
                                 Delete
                              </span>
                              </button>
                           </form>
                        </td>
                     </tr>


                  @endforeach
               </tbody>
            </table>
            <hr class="divider mb-0">
            {{ $users->links('vendor.pagination.bootstrap-5') }}
         </div>
      </div>


   </section>
   <!--/ Basic table -->

   <form method="POST" id="destroyUser">
      @csrf
      @method('DELETE')
   </form>

@stop


@section('vendor-script')
   <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@stop
@section('page-script')
   {{-- Page js files --}}
   <script src="{{ asset(mix('js/core/user-list-table.js')) }}"></script>
   <script src="{{ asset(mix('js/core/delete-alert.js')) }}"></script>
@stop

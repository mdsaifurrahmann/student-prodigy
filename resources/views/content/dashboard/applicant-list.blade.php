@extends('layouts/contentLayoutMaster')

@section('title', 'Applicant List')

@section('vendor-style')
   {{-- vendor css files --}}
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
   <!-- Basic table -->
   <section id="basic-datatable">
      <div class="row">
         <div class="col-12">

            {{-- Filter Being --}}
            <div class="card p-2 pt-0">
               <div class="card-header p-2 px-0 pb-0" id="filter">
                  <div class="head-labelx">
                     <h6 class="mb-0">Filter</h6>
                  </div>
                  <div class="dt-action-buttons text-end">
                     <div class="dt-buttons d-inline-flex">
                        <button class="dt-button create-new btn btn-primary" type="button" id="showFilter">
                           <span>
                              Hide Filter
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
               <form class="dt_adv_search d-none mt-1 pb-1" method="POST" id="filterForm">
                  <div class="row g-1 mb-md-1">
                     <div class="col-md-4">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control dt-input dt-full-name" data-column="3" placeholder="Alaric Beslier" data-column-index="0" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Email:</label>
                        <input type="text" class="form-control dt-input" data-column="4" placeholder="demo@example.com" data-column-index="1" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Post:</label>
                        <input type="text" class="form-control dt-input" data-column="3" placeholder="Web designer" data-column-index="2" />
                     </div>
                  </div>
                  <div class="row g-1">
                     <div class="col-md-4">
                        <label class="form-label">City:</label>
                        <input type="text" class="form-control dt-input" data-column="4" placeholder="Balky" data-column-index="3" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Date:</label>
                        <div class="mb-0">
                           <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate"
                              data-column-index="4" name="dt_date" />
                           <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4"
                              name="value_from_start_date" />
                           <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                        </div>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Salary:</label>
                        <input type="text" class="form-control dt-input" data-column="6" placeholder="10000" data-column-index="5" />
                     </div>
                  </div>
               </form>
            </div>
            {{-- Filter Closed --}}

            {{-- Export Option Being --}}
            <div class="card p-2 pt-0">
               <div class="card-header p-2 px-0 pb-0" id="exportOption">
                  <div class="head-labelx">
                     <h6 class="mb-0">Export Option</h6>
                  </div>
                  <div class="dt-action-buttons text-end">
                     <div class="dt-buttons d-inline-flex">
                        <button class="dt-button create-new btn btn-primary" type="button" id="showExOp">
                           <span>
                              Show Option
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
               <form class="d-none mt-1 pb-1" id="exportForm">
                  <div class="row g-1 mb-md-1">
                     <div class="col-12">
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox1" value="3">
                              <label class="form-check-label" for="inlineCheckbox1">Name</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox2" value="4">
                              <label class="form-check-label" for="inlineCheckbox2">Email</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox3" value="5">
                              <label class="form-check-label" for="inlineCheckbox3">Date</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox4" value="6">
                              <label class="form-check-label" for="inlineCheckbox4">Salary</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox5" value="7">
                              <label class="form-check-label" for="inlineCheckbox5">Status</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            {{-- Export Option Closed --}}


            <div class="card">
               <table class="datatables-basic table-responsive table">
                  <thead>
                     <tr>
                        <th></th>
                        <th>id</th>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </section>
   <!--/ Basic table -->

@endsection


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
@endsection
@section('page-script')
   {{-- Page js files --}}
   <script src="{{ asset(mix('js/core/applicant-list-table.js')) }}"></script>
@endsection

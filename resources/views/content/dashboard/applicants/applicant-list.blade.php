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
                  <strong> {{ session('destroy-success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif


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
                              Show Filter
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
               <form class="dt_adv_search d-none mt-1 pb-1" method="POST" id="filterForm">
                  <div class="row g-1 mb-md-1">
                     <div class="col-md-4">
                        <label class="form-label">Student Name:</label>
                        <input type="text" class="form-control dt-input dt-full-name" data-column="3" placeholder="Alaric Beslier" data-column-index="0" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Roll No:</label>
                        <input type="text" class="form-control dt-input" data-column="6" placeholder="181467" data-column-index="1" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Reg No:</label>
                        <input type="text" class="form-control dt-input" data-column="7" placeholder="1500943651542" data-column-index="2" />
                     </div>
                  </div>
                  <div class="row g-1">
                     <div class="col-md-4">
                        <label class="form-label">Semester:</label>
                        <select class="form-select dt-input" data-column="8" data-column-index="3">
                           <option selected value="">Select Semester</option>
                           <option value="1st">1st</option>
                           <option value="2nd">2nd</option>
                           <option value="3rd">3rd</option>
                           <option value="4th">4th</option>
                           <option value="5th">5th</option>
                           <option value="6th">6th</option>
                           <option value="7th">7th</option>
                           <option value="8th">8th</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Technology:</label>
                        <select class="form-select dt-input" data-column="9" data-column-index="3">
                           <option selected value=""> Select Technology/Trade</option>
                           <option value="textile">Textile</option>
                           <option value="textile machine design & maintenance">Textile Machine Design & Maintenance</option>
                           <option value="yarn manufacturing">Yarn Manufacturing</option>
                           <option value="wet processing">Wet Processing</option>
                           <option value="apparel manufacturing">Apparel Manufacturing</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select dt-input" data-column="14" data-column-index="3">
                           <option selected value="">Please Select Blood Group</option>
                           <option value="A Positive (A+)">A Positive (A+)</option>
                           <option value="A Negative (A-)">A Negative (A-)</option>
                           <option value="B Positive (B+)">B Positive (B+)</option>
                           <option value="B Negative (B-)">B Negative (B-)</option>
                           <option value="O Positive (O+)">O Positive (O+)</option>
                           <option value="O Negative (O-)">O Negative (O-)</option>
                           <option value="AB Positive (AB+)">AB Positive (AB+)</option>
                           <option value="AB Negative (AB-)">AB Negative (AB-)</option>
                        </select>
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Session Year</label>
                        <input type="text" class="form-control dt-input" data-column="53" placeholder="18-19" data-column-index="1" />
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
                        <button class="create-new btn btn-primary me-1" type="button" id="selectAll">
                           <span>
                              Select All
                           </span>
                        </button>
                        <button class="create-new btn btn-primary me-1" type="button" id="unSelectAll">
                           <span>
                              Unselect All
                           </span>
                        </button>
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
                        <div class="grid-cols-3">
                           @foreach ($titles as $key => $title)
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}"
                                    value="{{ $key + 3 }}">
                                 <label class="form-check-label" for="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}">
                                    {{ $title }}
                                 </label>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </form>
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
   <script src="{{ asset(mix('js/core/applicant-list-table.js')) }}"></script>
@stop

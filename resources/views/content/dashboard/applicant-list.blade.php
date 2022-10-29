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
                              Show Filter
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
                        <label class="form-label">Roll No:</label>
                        <input type="text" class="form-control dt-input" data-column="6" placeholder="demo@example.com" data-column-index="1" />
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Reg No:</label>
                        <input type="text" class="form-control dt-input" data-column="7" placeholder="Web designer" data-column-index="2" />
                     </div>
                  </div>
                  <div class="row g-1">
                     <div class="col-md-4">
                        <label class="form-label">Semester:</label>
                        <input type="text" class="form-control dt-input" data-column="8" placeholder="Balky" data-column-index="3" />
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

                           @foreach ($titles as $title)
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}">
                                 <label class="form-check-label" for="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}">
                                    {{ $title }}
                                 </label>
                              </div>
                           @endforeach



                           {{-- <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox1" value="3">
                              <label class="form-check-label" for="inlineCheckbox1">Name</label>
                           </div> --}}
                           {{-- <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox2" value="4">
                              <label class="form-check-label" for="inlineCheckbox2">Father's Name</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox3" value="5">
                              <label class="form-check-label" for="inlineCheckbox3">Mother's Name</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox4" value="6">
                              <label class="form-check-label" for="inlineCheckbox4">Roll</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox5" value="7">
                              <label class="form-check-label" for="inlineCheckbox5">Reg</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox6" value="8">
                              <label class="form-check-label" for="inlineCheckbox6">Semester</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox7" value="9">
                              <label class="form-check-label" for="inlineCheckbox7">Technology</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input export_col" type="checkbox" id="inlineCheckbox7" value="9">
                              <label class="form-check-label" for="inlineCheckbox7">Technology</label>
                           </div> --}}
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


                        {{-- <th>Name</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Roll</th>
                        <th>Reg</th>
                        <th>Semester</th>
                        <th>Technology</th>
                        <th>Student Name (Bengali)</th>
                        <th>Birth Certificate Number</th>
                        <th>Birth Date</th>
                        <th>Student's Mobile No.</th>
                        <th>Blood Group</th>
                        <th>Gender</th>
                        <th>Marital Status</th>
                        <th>Father's Name (Bengali)</th>
                        <th>Mother's Name (Bengali)</th>
                        <th>Father's Mobile No.</th>
                        <th>Mother's Mobile No.</th>
                        <th>Father's NID</th>
                        <th>Mother's NID</th>
                        <th>Father's Birth Date</th>
                        <th>Mother's Birth Date</th>
                        <th>Present Division</th>
                        <th>Present District</th>
                        <th>Present Upozilla</th>
                        <th>Present City Corp/Municipality</th>
                        <th>Present Post Code</th>
                        <th>Present Address</th>
                        <th>Permanent Division</th>
                        <th>Permanent District</th>
                        <th>Permanent Upozilla</th>
                        <th>Permanent City Corp/Municipality</th>
                        <th>Permanent Post Code</th>
                        <th>Permanent Address</th>
                        <th>Previous Education Board Division</th>
                        <th>Previous Education Board District</th>
                        <th>Previous Education Board Upozilla</th>
                        <th>Previous Education Board</th>
                        <th>Previous Exam Passing Year</th>
                        <th>Previous Exam Roll</th>
                        <th>Previous Institute Name</th>
                        <th>Previous Exam GPA</th>
                        <th>Previous Exam Name</th>
                        <th>Previous Technology/Trade</th>
                        <th>Previous Attendance Rate</th>
                        <th>Current Education Board Division</th>
                        <th>Current Education Board District</th>
                        <th>Current Education Board Upozilla</th>
                        <th>Current Institute Name</th>
                        <th>Semester</th>
                        <th>Shift</th>
                        <th>Group</th>
                        <th>Guardian Name (Bengali)</th>
                        <th>Guardian Name (English)</th>
                        <th>Guardian Mobile No.</th>
                        <th>Guardian NID No.</th>
                        <th>Guardian's Birth Date</th>
                        <th>Relationship with Guardian</th>
                        <th>Cost Borne</th>
                        <th>Disabilities</th>
                        <th>Ethnicity</th>
                        <th>Freedom Fighter Quota</th>
                        <th>Scholarship</th>
                        <th>Payment Method</th>
                        <th>Mobile Banking Service Provider</th>
                        <th>Mobile Banking Account Number</th>
                        <th>Bank Name</th>
                        <th>Branch</th>
                        <th>Bank Account Number</th>
                        <th>Bank Account Name</th>
                        <th>Bank Account Type</th>
                        <th>Bank Routing Number</th> --}}
                        <th>Actions</th>
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

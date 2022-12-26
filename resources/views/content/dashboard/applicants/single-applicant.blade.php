@extends('layouts/contentLayoutMaster')

@section('title', 'Details of ' . $applicant->student_name_english)

@section('vendor-style')
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@stop
@section('page-style')
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@stop

@section('content')
   {{-- content --}}


   <div class="container-lg">
      <div class="row" id="table-responsive" style="margin: 0 auto">
         <div class="col-12">

            @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif

            @if (!file_exists(public_path('/student-images/formal-images/' . $applicant->formal_image_path)))
               <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                  <strong>Formal Image associated with this application is not found on server. Please update this
                     application or contact with developer for more assistance.</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif

            @if (!file_exists(public_path('/student-images/signature-images/' . $applicant->signature_image_path)))
               <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                  <strong>Signature Image associated with this application is not found on server. Please update
                     this application or contact with developer for more assistance.</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif


            @if (session('destroy-error'))
               <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('destroy-error') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif

            <div class="card p-2 pt-0">
               <div class="card-header p-2 px-0 pb-0" id="">
                  <div class="head-labelx">
                     <h6 class="mb-0">Quick Action</h6>
                  </div>
                  <div class="dt-action-buttons text-end">
                     <div class="dt-buttons d-inline-flex">
                        <a class="dt-button create-new btn btn-primary me-1" href="{{ route('applicant-list') }}">
                           <span>
                              Back to Applicant List
                           </span>
                        </a>

                        <a class="dt-button create-new btn btn-primary me-1" href="{{ route('download', $applicant->id) }}">
                           <span>
                              Download
                           </span>
                        </a>

                        <a class="create-new btn btn-warning me-1" id="edit" href="{{ route('applicant-modify', $applicant->id) }}">
                           <span>
                              Edit
                           </span>
                        </a>


                        <form method="GET" action="{{ route('applicant-destroy', $applicant->id) }}" id="destroy">
                           @csrf
                           <button class="create-new btn btn-danger" type="submit" id="confirm-destroy">
                              <span>
                                 Delete
                              </span>
                           </button>
                        </form>

                     </div>
                  </div>
               </div>
            </div>

            <div class="card p-2 pt-0">
               <div class="card-header p-2 px-0 pb-0" id="hideOption">
                  <div class="head-labelx">
                     <h6 class="mb-0">Hide Data</h6>
                  </div>
                  <div class="dt-action-buttons text-end">
                     <div class="dt-buttons d-inline-flex">
                        <button class="create-new btn btn-primary me-1" type="button" id="unSelectAll">
                           <span>
                              Show All
                           </span>
                        </button>
                        <button class="create-new btn btn-primary me-1" type="button" id="selectAll">
                           <span>
                              Hide All
                           </span>
                        </button>
                        <button class="dt-button create-new btn btn-primary me-1" type="button" id="showOp">
                           <span>
                              Show Option
                           </span>
                        </button>
                        <button class="dt-button create-new btn btn-primary" form="hideItem" type="submit" id="">
                           <span>
                              Go
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
               <form class="d-none mt-1 pb-1" id="hideItem" method="GET" action="{{ route('applicant-details', $applicant->id) }}">
                  @csrf
                  <div class="row g-1 mb-md-1">
                     <div class="col-12">
                        <div class="grid-cols-3">
                           @foreach ($titles as $key => $title)
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input hide_col" type="checkbox" id="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}"
                                    name="{{ str_replace([' ', '\'', '.', '(', ')'], '', $title) }}"
                                    {{ Request::get(str_replace([' ', '\'', '.', '(', ')'], '', $title)) ? 'checked' : '' }}>
                                 <label class="form-check-label" for="inlineCheckbox{{ str_replace([' ', '\''], '', $title) }}">
                                    {{ $title }}
                                 </label>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>

                  <div class="border-top mb-1"></div>
                  <input type="submit" class="dt-button create-new btn btn-primary float-end" value="Go">
               </form>
            </div>



            <div class="card">
               <div class="card-body">
                  <h2 class="card-title text-uppercase mb-0 text-center">Student Database - Textile Institute Dinajpur</h2>
               </div>
            </div>

            <div class="table-responsive">
               <table class="table-bordered table">
                  <thead>
                     <tr>
                        <th colspan="4" class="text-center">Personal Information</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th class="w-25">Student's Name (Bengali):</th>
                        <td colspan="2">{{ !Request::get('StudentNameBengali') ? $applicant->student_name_bangla : '' }}</td>
                        <td rowspan="5">
                           <img
                              src="
                           @if (file_exists(public_path('/student-images/formal-images/' . $applicant->formal_image_path))) data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/student-images/formal-images/' . $applicant->formal_image_path))) }} @endif
                           "
                              alt="Formal Image" class="w-100" style="object-fit: cover;">
                        </td>

                     </tr>
                     <tr>
                        <th class="w-25">Student's Name (English):</th>
                        <td colspan="2">{{ !Request::get('StudentNameEnglish') ? $applicant->student_name_english : '' }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Birth Certificate Number:</th>
                        <td colspan="2">{{ !Request::get('BirthCertificateNumber') ? $applicant->birth_certificate_number : '' }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Birth Date:</th>
                        <td colspan="2">{{ !Request::get('StudentsBirthDate') ? $applicant->birth_date : '' }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Blood Group:</th>
                        <td colspan="2">{{ !Request::get('BloodGroup') ? $applicant->blood_group : '' }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Mobile Number:</th>
                        <td colspan="3">{{ !Request::get('StudentsMobileNo') ? $applicant->student_mobile : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Gender:</th>
                        <td>{{ !Request::get('Gender') ? $applicant->gender : '' }}</td>
                        <th class="w-25">Marital Status:</th>
                        <td>{{ !Request::get('MaritalStatus') ? $applicant->marital_status : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Name (Bengali):</th>
                        <td>{{ !Request::get('FathersNameBengali') ? $applicant->father_name_bangla : '' }}</td>
                        <th class="w-25">Mother's Name (Bengali):</th>
                        <td>{{ !Request::get('MothersNameBengali') ? $applicant->mother_name_bangla : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Name (English):</th>
                        <td>{{ !Request::get('FathersNameEnglish') ? $applicant->father_name_english : '' }}</td>
                        <th class="w-25">Mother's Name (English):</th>
                        <td>{{ !Request::get('MothersNameEnglish') ? $applicant->mother_name_english : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's NID:</th>
                        <td>{{ !Request::get('FathersNID') ? $applicant->father_nid : '' }}</td>
                        <th class="w-25">Mother's NID:</th>
                        <td>{{ !Request::get('MothersNID') ? $applicant->mother_nid : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Birth Date:</th>
                        <td>{{ !Request::get('FathersBirthDate') ? $applicant->father_birth_date : '' }}</td>
                        <th class="w-25">Mother's Birth Date:</th>
                        <td>{{ !Request::get('MothersBirthDate') ? $applicant->mother_birth_date : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Mobile Number:</th>
                        <td>{{ !Request::get('FathersMobileNo') ? $applicant->father_mobile : '' }}</td>
                        <th class="w-25">Mother's Mobile Number:</th>
                        <td>{{ !Request::get('MothersMobileNo') ? $applicant->mother_mobile : '' }}</td>
                     </tr>
                  </tbody>
                  <thead>
                     <tr>
                        <th colspan="2" class="text-center">Permanent Address</th>
                        <th colspan="2" class="text-center">Present Address</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th class="w-25">Division:</th>
                        <td>{{ !Request::get('PermanentDivision') ? $applicant->perm_division : '' }} </td>
                        <th class="w-25">Division:</th>
                        <td>{{ !Request::get('PresentDivision') ? $applicant->pres_division : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">District:</th>
                        <td>{{ !Request::get('PermanentDistrict') ? $applicant->perm_district : '' }} </td>
                        <th class="w-25">District:</th>
                        <td>{{ !Request::get('PresentDistrict') ? $applicant->pres_district : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ !Request::get('PermanentUpozilla') ? $applicant->perm_upozilla : '' }} </td>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ !Request::get('PresentUpozilla') ? $applicant->pres_upozilla : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Municipality/Union/City Corp.:</th>
                        <td>{{ !Request::get('PermanentCityCorp/Municipality') ? $applicant->perm_city_corp : '' }} </td>
                        <th class="w-25">Municipality/Union/City Corp.:</th>
                        <td>{{ !Request::get('PresentCityCorp/Municipality') ? $applicant->pres_city_corp : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Post Code:</th>
                        <td>{{ !Request::get('PermanentPostCode') ? $applicant->perm_post_code : '' }} </td>
                        <th class="w-25">Post Code:</th>
                        <td>{{ !Request::get('PresentPostCode') ? $applicant->pres_post_code : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Address/Village:</th>
                        <td>{{ !Request::get('PermanentAddress') ? $applicant->perm_address : '' }} </td>
                        <th class="w-25">Address/Village:</th>
                        <td>{{ !Request::get('PresentAddress') ? $applicant->pres_address : '' }} </td>
                     </tr>
                  </tbody>
                  <thead>
                     <tr>
                        <th colspan="2" class="text-center">Previous Educational Information</th>
                        <th colspan="2" class="text-center">Present Educational Information</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th class="w-25">Division:</th>
                        <td>{{ !Request::get('PreviousEducationBoardDivision') ? $applicant->pe_division : '' }} </td>
                        <th class="w-25">Division:</th>
                        <td>{{ !Request::get('CurrentEducationBoardDivision') ? $applicant->ce_division : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">District:</th>
                        <td>{{ !Request::get('PreviousEducationBoardDistrict') ? $applicant->pe_district : '' }} </td>
                        <th class="w-25">District:</th>
                        <td>{{ !Request::get('CurrentEducationBoardDistrict') ? $applicant->ce_district : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ !Request::get('PreviousEducationBoardUpozilla') ? $applicant->pe_upozilla : '' }} </td>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ !Request::get('CurrentEducationBoardUpozilla') ? $applicant->ce_upozilla : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Institute Name:</th>
                        <td>{{ !Request::get('PreviousInstituteName') ? $applicant->pe_institute : '' }} </td>
                        <th class="w-25">Institute Name:</th>
                        <td>{{ !Request::get('CurrentInstituteName') ? $applicant->ce_institute_name : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Passing Year:</th>
                        <td>{{ !Request::get('PreviousExamPassingYear') ? $applicant->pe_passing_year : '' }} </td>
                        <th class="w-25">Semester:</th>
                        <td>{{ !Request::get('Semester') ? $applicant->ce_semester : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Board:</th>
                        <td>{{ !Request::get('PreviousEducationBoard') ? $applicant->pe_board : '' }} </td>
                        <th class="w-25">Technology/Trade:</th>
                        <td>{{ !Request::get('CurrentTechnology') ? $applicant->ce_technology_trade : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Technology/Trade:</th>
                        <td>{{ !Request::get('PreviousTechnology/Trade') ? $applicant->pe_technology_trade : '' }} </td>
                        <th class="w-25">Shift:</th>
                        <td>{{ !Request::get('Shift') ? $applicant->ce_shift : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Previous Exam Name:</th>
                        <td>{{ !Request::get('PreviousExamName') ? $applicant->pe_exam_name : '' }} </td>
                        <th class="w-25">Roll:</th>
                        <td>{{ !Request::get('CurrentRoll') ? $applicant->ce_roll : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Roll:</th>
                        <td>{{ !Request::get('PreviousExamRoll') ? $applicant->pe_roll : '' }} </td>
                        <th class="w-25">Reg:</th>
                        <td>{{ !Request::get('CurrentReg') ? $applicant->ce_reg : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Result (GPA):</th>
                        <td>{{ !Request::get('PreviousExamGPA') ? $applicant->pe_gpa : '' }} </td>
                        <th class="w-25">Group:</th>
                        <td>{{ !Request::get('Group') ? $applicant->ce_group : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Attendance Rate:</th>
                        <td>{{ !Request::get('PreviousAttendanceRate') ? $applicant->pe_att_rate : '' }} </td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                  </tbody>
                  <thead>
                     <tr>
                        <th colspan="2" class="text-center">Guardian's Information</th>
                        <th colspan="2" class="text-center">Eligibility Conditions and Attachment</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th class="w-25">Relation:</th>
                        <td>{{ !Request::get('RelationshipwithGuardian') ? $applicant->relationship : '' }} </td>
                        <th class="w-25">Cost Borne By:</th>
                        <td>{{ !Request::get('CostBorne') ? $applicant->cost_borne : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian Name (Bengali):</th>
                        <td>{{ !Request::get('GuardianNameBengali') ? $applicant->guardian_name_bangla : '' }} </td>
                        <th class="w-25">Belongs to minority/ethnic groups:</th>
                        <td>{{ !Request::get('Ethnicity') ? $applicant->ethnic : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian Name (English):</th>
                        <td>{{ !Request::get('GuardianNameEnglish') ? $applicant->guardian_name_english : '' }} </td>
                        <th class="w-25">Freefom Fighter Quota:</th>
                        <td>{{ !Request::get('FreedomFighterQuota') ? $applicant->ffq : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's NID:</th>
                        <td>{{ !Request::get('GuardianNIDNo') ? $applicant->guardian_nid : '' }} </td>
                        <th class="w-25">Any Other Scholarships:</th>
                        <td>{{ !Request::get('Scholarship') ? $applicant->scholarship : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's Birth Date:</th>
                        <td>{{ !Request::get('GuardiansBirthDate') ? $applicant->guardian_birth_date : '' }} </td>
                        <th class="w-25">Any Disabilities:</th>
                        <td>{{ !Request::get('Disabilities') ? $applicant->disabilities : '' }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's Mobile:</th>
                        <td>{{ !Request::get('GuardianMobileNo') ? $applicant->guardian_mobile : '' }} </td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                  </tbody>
                  <thead>
                     <tr>
                        <th colspan="4" class="text-center">Payment Information</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th class="w-25">Payment Method:</th>
                        <td colspan="3">{{ !Request::get('PaymentMethod') ? $applicant->payment_method : '' }}</td>
                     </tr>
                     <tr>
                        <th colspan="2" class="w-50 text-center">Banking</th>
                        <th colspan="2" class="w-50 text-center">Mobile Banking</th>
                     </tr>

                     <tr>
                        <th class="w-25">Bank Name:</th>
                        <td>{{ !Request::get('BankName') ? $applicant->bank_name : '' }}</td>
                        <th class="w-25">Mobile Banking Service Provider:</th>
                        <td>{{ !Request::get('MobileBankingServiceProvider') ? $applicant->mobile_bank_provider : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Branch Name:</th>
                        <td>{{ !Request::get('Branch') ? $applicant->bank_branch : '' }}</td>
                        <th class="w-25">Mobile Banking Account Number:</th>
                        <td>{{ !Request::get('MobileBankingAccountNumber') ? $applicant->mobile_bank_account : '' }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Bank Routing Number:</th>
                        <td>{{ !Request::get('BankRoutingNumber') ? $applicant->bank_routing : '' }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Type:</th>
                        <td>{{ !Request::get('BankAccountType') ? $applicant->bank_acc_type : '' }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Holder Name:</th>
                        <td>{{ !Request::get('BankAccountName') ? $applicant->bank_acc_name : '' }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Number:</th>
                        <td>{{ !Request::get('BankAccountNumber') ? $applicant->bank_acc_number : '' }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                  </tbody>
               </table>
            </div>

            <table class="table-borderless my-2 table">
               <tbody>
                  <tr class="mx-auto">
                     <td class="text-center">
                        <img
                           src="
                        @if (file_exists(public_path('/student-images/signature-images/' . $applicant->signature_image_path))) data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/student-images/signature-images/' . $applicant->signature_image_path))) }} @endif
                        "
                           alt="Applicant's Signature" class="mx-auto" style="width: 13rem; object-fit: cover; display: block;">
                     </td>
                     <td></td>
                     <td></td>
                  </tr>
                  <tr class="mx-auto">
                     <td class="font-small-2 text-center">Applicant's Signature</td>
                     <td class="font-small-2 text-center">Signature of acceptor</td>
                     <td class="font-small-2 text-center">Signature and seal of the head of the institution</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
@stop


@section('vendor-script')
   {{-- vendor files --}}
   <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@stop
@section('page-script')
   {{-- Page js files --}}
   <script src="{{ asset(mix('js/core/hide-option.js')) }}"></script>
   <script src="{{ asset(mix('js/core/delete-alert.js')) }}"></script>
@stop

@extends('layouts/contentLayoutMaster')

@section('title', 'Applicant Details')

@section('vendor-style')
   {{-- vendor css files --}}

@endsection

@section('content')
   {{-- content --}}

   <div class="container-lg">
      <div class="row" id="table-responsive" style="margin: 0 auto">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h2 class="card-title text-uppercase mb-0 text-center">Student Database - Textile Institute Dinajpur</h2>
               </div>
            </div>


            @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                  <strong> {{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif


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
                        <td colspan="2">{{ $applicant->student_name_bangla }}</td>
                        <td rowspan="5">
                           <img src="{{ '/student-images/formal-images/' . $applicant->formal_image_path }}" alt="Formal Image" class="w-100"
                              style="object-fit: cover;">
                        </td>

                     </tr>
                     <tr>
                        <th class="w-25">Student's Name (English):</th>
                        <td colspan="2">{{ $applicant->student_name_english }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Birth Certificate Number:</th>
                        <td colspan="2">{{ $applicant->birth_certificate_number }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Birth Date:</th>
                        <td colspan="2">{{ $applicant->birth_date }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Blood Group:</th>
                        <td colspan="2">{{ $applicant->blood_group }}</td>

                     </tr>
                     <tr>
                        <th class="w-25">Mobile Number:</th>
                        <td colspan="3">{{ $applicant->student_mobile }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Gender:</th>
                        <td>{{ $applicant->gender }}</td>
                        <th class="w-25">Marital Status:</th>
                        <td>{{ $applicant->marital_status }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Name (Bengali):</th>
                        <td>{{ $applicant->father_name_bangla }}</td>
                        <th class="w-25">Mother's Name (Bengali):</th>
                        <td>{{ $applicant->mother_name_bangla }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Name (English):</th>
                        <td>{{ $applicant->father_name_english }}</td>
                        <th class="w-25">Mother's Name (English):</th>
                        <td>{{ $applicant->mother_name_english }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's NID:</th>
                        <td>{{ $applicant->father_nid }}</td>
                        <th class="w-25">Mother's NID:</th>
                        <td>{{ $applicant->mother_nid }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Birth Date:</th>
                        <td>{{ $applicant->father_birth_date }}</td>
                        <th class="w-25">Mother's Birth Date:</th>
                        <td>{{ $applicant->mother_birth_date }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Father's Mobile Number:</th>
                        <td>{{ $applicant->father_mobile }}</td>
                        <th class="w-25">Mother's Mobile Number:</th>
                        <td>{{ $applicant->mother_mobile }}</td>
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
                        <td>{{ $applicant->perm_division }} </td>
                        <th class="w-25">Division:</th>
                        <td>{{ $applicant->pres_division }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">District:</th>
                        <td>{{ $applicant->perm_district }} </td>
                        <th class="w-25">District:</th>
                        <td>{{ $applicant->pres_district }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ $applicant->perm_upozilla }} </td>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ $applicant->pres_upozilla }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Municipality/Union/City Corp.:</th>
                        <td>{{ $applicant->perm_city_corp }} </td>
                        <th class="w-25">Municipality/Union/City Corp.:</th>
                        <td>{{ $applicant->pres_city_corp }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Post Code:</th>
                        <td>{{ $applicant->perm_post_code }} </td>
                        <th class="w-25">Post Code:</th>
                        <td>{{ $applicant->pres_post_code }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Address/Village:</th>
                        <td>{{ $applicant->perm_address }} </td>
                        <th class="w-25">Address/Village:</th>
                        <td>{{ $applicant->pres_address }} </td>
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
                        <td>{{ $applicant->pe_division }} </td>
                        <th class="w-25">Division:</th>
                        <td>{{ $applicant->ce_division }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">District:</th>
                        <td>{{ $applicant->pe_district }} </td>
                        <th class="w-25">District:</th>
                        <td>{{ $applicant->ce_district }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ $applicant->pe_upozilla }} </td>
                        <th class="w-25">Sub District/Upozilla:</th>
                        <td>{{ $applicant->ce_upozilla }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Institute Name:</th>
                        <td>{{ $applicant->pe_institute }} </td>
                        <th class="w-25">Institute Name:</th>
                        <td>{{ $applicant->ce_institute_name }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Passing Year:</th>
                        <td>{{ $applicant->perm_division }} </td>
                        <th class="w-25">Semester:</th>
                        <td>{{ $applicant->perm_division }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Board:</th>
                        <td>{{ $applicant->pe_board }} </td>
                        <th class="w-25">Technology/Trade:</th>
                        <td>{{ $applicant->ce_technology_trade }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Technology/Trade:</th>
                        <td>{{ $applicant->pe_technology_trade }} </td>
                        <th class="w-25">Shift:</th>
                        <td>{{ $applicant->ce_shift }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Previous Exam Name:</th>
                        <td>{{ $applicant->pe_exam_name }} </td>
                        <th class="w-25">Roll:</th>
                        <td>{{ $applicant->ce_roll }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Roll:</th>
                        <td>{{ $applicant->pe_roll }} </td>
                        <th class="w-25">Shift:</th>
                        <td>{{ $applicant->ce_shift }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Result (GPA):</th>
                        <td>{{ $applicant->pe_gpa }} </td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Attendance Rate:</th>
                        <td>{{ $applicant->pe_att_rate }} </td>
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
                        <td>{{ $applicant->relationship }} </td>
                        <th class="w-25">Cost Borne By:</th>
                        <td>{{ $applicant->cost_borne }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Name (Bengali):</th>
                        <td>{{ $applicant->guardian_name_bangla }} </td>
                        <th class="w-25">Belongs to minority/ethnic groups:</th>
                        <td>{{ $applicant->ethnic }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Name (English):</th>
                        <td>{{ $applicant->guardian_name_english }} </td>
                        <th class="w-25">Freefom Fighter Quota:</th>
                        <td>{{ $applicant->ffq }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's NID:</th>
                        <td>{{ $applicant->guardian_nid }} </td>
                        <th class="w-25">Any Other Scholarships:</th>
                        <td>{{ $applicant->scholarship }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's Birth Date:</th>
                        <td>{{ $applicant->guardian_birth_date }} </td>
                        <th class="w-25">Any Disabilities:</th>
                        <td>{{ $applicant->disabilities }} </td>
                     </tr>
                     <tr>
                        <th class="w-25">Guardian's Mobile:</th>
                        <td>{{ $applicant->guardian_mobile }} </td>
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
                        <th colspan="2" class="w-25">Payment Method:</th>
                        <td colspan="2">{{ $applicant->payment_method }}</td>
                     </tr>
                     <tr>
                        <th colspan="2" class="w-50 text-center">Banking</th>
                        <th colspan="2" class="w-50 text-center">Mobile Banking</th>
                     </tr>

                     <tr>
                        <th class="w-25">Bank Name:</th>
                        <td>{{ $applicant->bank_name }}</td>
                        <th class="w-25">Mobile Banking Service Provider:</th>
                        <td>{{ $applicant->mobile_bank_provider }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Branch Name:</th>
                        <td>{{ $applicant->bank_branch }}</td>
                        <th class="w-25">Mobile Banking Account Number:</th>
                        <td>{{ $applicant->mobile_bank_account }}</td>
                     </tr>
                     <tr>
                        <th class="w-25">Bank Routing Number:</th>
                        <td>{{ $applicant->bank_routing }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Type:</th>
                        <td>{{ $applicant->bank_acc_type }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Holder Name:</th>
                        <td>{{ $applicant->bank_acc_name }}</td>
                        <th class="w-25"></th>
                        <td></td>
                     </tr>
                     <tr>
                        <th class="w-25">Account Number:</th>
                        <td>{{ $applicant->bank_acc_number }}</td>
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
                        <img src="{{ '/student-images/signature-images/' . $applicant->signature_image_path }}" alt="Applicant's Signature" class="mx-auto"
                           style="width: 13rem; object-fit: cover; display: block;">
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
@endsection


@section('vendor-script')
   {{-- vendor files --}}

@endsection
@section('page-script')
   {{-- Page js files --}}

@endsection

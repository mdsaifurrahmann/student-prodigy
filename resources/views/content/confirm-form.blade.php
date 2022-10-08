@extends('layouts/fullLayoutMaster')

@section('title', 'Confirmation')

@section('page-style')
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
   <div class="row no-print">
      <div class="col-12 d-flex align-items-md-center justify-content-center flex-column py-3 px-2">

         {{-- Success Message --}}
         @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0">
               <div class="alert-body">
                  <h2 class="text-success text-center">{{ session('success') }}</h2>
                  <p class="text-success text-center">Your registration with the registration number {{ old('ce-reg') }} is successful.</p>
                  <p class="text-warning text-center">Here is your submitted Data. If you find any mistake, Please Contact with your responsible Teacher.</p>
               </div>

            </div>
         @else
            <div class="vh-60 align-items-center d-flex flex-column justify-content-center">
               <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 0">
                  <div class="alert-body">
                     <h2 class="text-danger text-center">{{ session('success') }} Failed!</h2>
                     <p class="text-center">
                        Your registration is not successful. Or, Maybe you are trying to access a page that is not available. Please contact the administrator.
                     </p>
                  </div>
               </div>
               {{-- Go to home button --}}
               <div>
                  <a href="{{ route('root') }}" class="btn btn-primary btn-lg mt-2">Go to Home</a>
               </div>
            </div>
         @endif
      </div>
   </div>

   @if (session('success'))
      <div class="container">
         <div class="row" id="table-responsive" style="margin: 0 auto">
            <div class="col-12">
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
                           <td colspan="3">{{ old('student-name-bangla') }} lol</td>
                        </tr>
                        <tr>
                           <th class="w-25">Student's Name (English):</th>
                           <td colspan="3">{{ old('student-name-english') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Birth Certificate Number:</th>
                           <td colspan="3">{{ old('birth-certificate-number') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Birth Date:</th>
                           <td colspan="3">{{ old('birth-date') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Blood Group:</th>
                           <td colspan="3">{{ old('blood-group') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Mobile Number:</th>
                           <td colspan="3">{{ old('student-mobile') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Gender:</th>
                           <td>{{ old('gender') }}</td>
                           <th class="w-25">Marital Status:</th>
                           <td>{{ old('marital-status') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Father's Name (Bengali):</th>
                           <td>{{ old('father-name-bangla') }}</td>
                           <th class="w-25">Mother's Name (Bengali):</th>
                           <td>{{ old('mother-name-bangla') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Father's Name (English):</th>
                           <td>{{ old('father-name-english') }}</td>
                           <th class="w-25">Mother's Name (English):</th>
                           <td>{{ old('mother-name-english') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Father's NID:</th>
                           <td>{{ old('father-nid') }}</td>
                           <th class="w-25">Mother's NID:</th>
                           <td>{{ old('mother-nid') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Father's Birth Date:</th>
                           <td>{{ old('father-birth-date') }}</td>
                           <th class="w-25">Mother's Birth Date:</th>
                           <td>{{ old('mother-birth-date') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Father's Mobile Number:</th>
                           <td>{{ old('father-mobile') }}</td>
                           <th class="w-25">Mother's Mobile Number:</th>
                           <td>{{ old('mother-mobile') }}</td>
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
                           <td>{{ old('perm_division') }} </td>
                           <th class="w-25">Division:</th>
                           <td>{{ old('pres_division') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">District:</th>
                           <td>{{ old('perm_district') }} </td>
                           <th class="w-25">District:</th>
                           <td>{{ old('pres_district') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Sub District/Upozilla:</th>
                           <td>{{ old('perm_upozilla') }} </td>
                           <th class="w-25">Sub District/Upozilla:</th>
                           <td>{{ old('pres_upozilla') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Municipality/Union/City Corp.:</th>
                           <td>{{ old('perm-city-corp') }} </td>
                           <th class="w-25">Municipality/Union/City Corp.:</th>
                           <td>{{ old('pres-city-corp') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Post Code:</th>
                           <td>{{ old('perm-post-code') }} </td>
                           <th class="w-25">Post Code:</th>
                           <td>{{ old('pres-post-code') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Address/Village:</th>
                           <td>{{ old('perm-address') }} </td>
                           <th class="w-25">Address/Village:</th>
                           <td>{{ old('pres-address') }} </td>
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
                           <td>{{ old('pe_division') }} </td>
                           <th class="w-25">Division:</th>
                           <td>{{ old('ce_division') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">District:</th>
                           <td>{{ old('pe_district') }} </td>
                           <th class="w-25">District:</th>
                           <td>{{ old('ce_district') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Sub District/Upozilla:</th>
                           <td>{{ old('pe_upozilla') }} </td>
                           <th class="w-25">Sub District/Upozilla:</th>
                           <td>{{ old('ce_upozilla') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Institute Name:</th>
                           <td>{{ old('pe-institute') }} </td>
                           <th class="w-25">Institute Name:</th>
                           <td>{{ old('ce-institute-name') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Passing Year:</th>
                           <td>{{ old('perm_division') }} </td>
                           <th class="w-25">Semester:</th>
                           <td>{{ old('perm_division') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Board:</th>
                           <td>{{ old('pe-board') }} </td>
                           <th class="w-25">Technology/Trade:</th>
                           <td>{{ old('ce-technology-trade') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Technology/Trade:</th>
                           <td>{{ old('pe-technology-trade') }} </td>
                           <th class="w-25">Shift:</th>
                           <td>{{ old('ce-shift') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Previous Exam Name:</th>
                           <td>{{ old('pe-exam-name') }} </td>
                           <th class="w-25">Roll:</th>
                           <td>{{ old('ce-roll') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Roll:</th>
                           <td>{{ old('pe-roll') }} </td>
                           <th class="w-25">Shift:</th>
                           <td>{{ old('ce-shift') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Result (GPA):</th>
                           <td>{{ old('pe-gpa') }} </td>
                           <th class="w-25"></th>
                           <td></td>
                        </tr>
                        <tr>
                           <th class="w-25">Attendance Rate:</th>
                           <td>{{ old('pe-att-rate') }} </td>
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
                           <td>{{ old('relationship') }} </td>
                           <th class="w-25">Cost Borne By:</th>
                           <td>{{ old('cost-borne') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Name (Bengali):</th>
                           <td>{{ old('guardian-name-bangla') }} </td>
                           <th class="w-25">Belongs to minority/ethnic groups:</th>
                           <td>{{ old('ethnic') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Name (English):</th>
                           <td>{{ old('guardian-name-english') }} </td>
                           <th class="w-25">Freefom Fighter Quota:</th>
                           <td>{{ old('ffq') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Guardian's NID:</th>
                           <td>{{ old('guardian-nid') }} </td>
                           <th class="w-25">Any Other Scholarships:</th>
                           <td>{{ old('scholarship') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Guardian's Birth Date:</th>
                           <td>{{ old('guardian-birth-date') }} </td>
                           <th class="w-25">Any Disabilities:</th>
                           <td>{{ old('disabilities') }} </td>
                        </tr>
                        <tr>
                           <th class="w-25">Guardian's Mobile:</th>
                           <td>{{ old('guardian-mobile') }} </td>
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
                           <td colspan="2">{{ old('payment-method') }}</td>
                        </tr>
                        <tr>
                           <th colspan="2" class="w-50 text-center">Banking</th>
                           <th colspan="2" class="w-50 text-center">Mobile Banking</th>
                        </tr>

                        <tr>
                           <th class="w-25">Bank Name:</th>
                           <td>{{ old('bank-name') }}</td>
                           <th class="w-25">Mobile Banking Service Provider:</th>
                           <td>{{ old('mobile-bank-provider') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Branch Name:</th>
                           <td>{{ old('bank-branch') }}</td>
                           <th class="w-25">Mobile Banking Account Number:</th>
                           <td>{{ old('mobile-bank-account') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Bank Routing Number:</th>
                           <td>{{ old('bank-routing') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Account Type:</th>
                           <td>{{ old('bank-acc-type') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Account Holder Name:</th>
                           <td>{{ old('bank-acc-name') }}</td>
                        </tr>
                        <tr>
                           <th class="w-25">Account Number:</th>
                           <td>{{ old('bank-acc-number') }}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   @endif

   <div class="row" style="position:sticky; width: 100%; bottom:0;">
      <div class="col-12 px-4">
         <p class="text-center">
            Copyright © 2022 <a href="/">Textile Institute Dinajpur</a> | Powered by <a href="https://codebumble.net" rel="dofollow">Codebumble
               Inc.</a>
         </p>
      </div>
   </div>
@endsection

@section('vendor-script')
   <!-- vendor files -->

@endsection

@section('page-script')
   <!-- Page js files -->

@endsection

@extends('layouts/contentLayoutMaster')

@section('title', 'Update Applicant Details')

@section('vendor-style')
   <!-- vendor css files -->
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
   <div class="row">
      <div class="col-12">
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
      </div>

      <div class="col-12 d-flex align-items-md-center justify-content-center">
         <div class="card">
            <div class="card-body font-solaimanlipi">
               <p class="text-warning text-center">Fill the form with correct information. Each field of the form must be filled.</p>
               <p class="fw-bold text-danger text-center">All the fields are <strong><em>required</em></strong> and will be validate from the server!!!</p>

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

               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif
               <form class="form needs-validation @if ($errors->any()) invalid was-validated @endif" novalidate method="POST"
                  action='{{ route('applicant-modifier', $applicant->id) }}' enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="row">
                     <div class="divider divider-primary">
                        <div class="divider-text">Personal Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_name_bangla-column">Student Name (In Bengali)</label>
                           <input type="text" id="student_name_bangla-column" class="form-control" placeholder="শাকিল আহমেদ" name="student_name_bangla" required
                              pattern="[\s\u0980-\u09FF]+$" value="{{ $applicant->student_name_bangla }}">

                           <div class="invalid-feedback">Please enter your name in Bengali.</div>
                           @error('student_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_name_english-column">Student Name (In English)</label>
                           <input type="text" id="student_name_english-column" class="form-control" placeholder="Shakil Ahmed" name="student_name_english"
                              required value="{{ $applicant->student_name_english }}">

                           <div class="invalid-feedback">Please enter your name in English.</div>
                           @error('student_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth_certificate_number">Birth Certificate Number</label>
                           <input type="text" id="birth_certificate_number" class="form-control" placeholder="20072722000000008" name="birth_certificate_number"
                              pattern="[0-9]{15,17}" required value="{{ $applicant->birth_certificate_number }}">

                           <div class="invalid-feedback">Please enter your birth certificate number.</div>
                           @error('birth_certificate_number')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth_date">Date of Birth</label>
                           <input type="text" id="birth_date" name="birth_date" class="form-control picker flatpickr-basic flatpickr-input active"
                              placeholder="YYYY-MM-DD" readonly="readonly" required value="{{ $applicant->birth_date }}">

                           <div class="invalid-feedback">Please enter your date of birth.</div>
                           @error('birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_mobile">Student's Mobile Number</label>
                           <input type="text" id="student_mobile" class="form-control" placeholder="017xxxxxxxx" name="student_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ $applicant->student_mobile }}">

                           <div class="invalid-feedback">Please enter your mobile number.</div>
                           @error('student_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="blood_group">Blood Group</label>
                           <select name="blood_group" id="blood_group" class="form-select" required>
                              <option selected="" value="{{ $applicant->blood_group ? $applicant->blood_group : '' }}"
                                 {{ $applicant->blood_group ? '' : 'disabled' }}>
                                 {{ $applicant->blood_group ? $applicant->blood_group : 'Select your Blood group' }} </option>
                              <option value="A Positive (A+)">A Positive (A+)</option>
                              <option value="A Negative (A-)">A Negative (A-)</option>
                              <option value="B Positive (B+)">B Positive (B+)</option>
                              <option value="B Negative (B-)">B Negative (B-)</option>
                              <option value="O Positive (O+)">O Positive (O+)</option>
                              <option value="O Negative (O-)">O Negative (O-)</option>
                              <option value="AB Positive (AB+)">AB Positive (AB+)</option>
                              <option value="AB Negative (AB-)">AB Negative (AB-)</option>
                           </select>

                           <div class="invalid-feedback">Please select your blood group.</div>
                           @error('blood_group')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">Gender</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="male" class="form-check-input" type="radio" name="gender" value="male" required
                                    {{ $applicant->gender == 'male' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="male">Male</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="female" class="form-check-input" type="radio" name="gender" value="female" required
                                    {{ $applicant->gender == 'female' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="female">Female</label>
                              </div>

                           </div>
                           @error('gender')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">Marital Status</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="married" class="form-check-input" type="radio" name="marital_status" value="married" required
                                    {{ $applicant->marital_status == 'married' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="married">Married</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="unmarried" class="form-check-input" type="radio" name="marital_status" value="unmarried" required
                                    {{ $applicant->marital_status == 'unmarried' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="unmarried">Unmarried</label>
                              </div>

                           </div>
                           @error('marital_status')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>




                     <div class="divider divider-primary">
                        <div class="divider-text">Parents Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_name_bangla-column">Father's Name (In Bengali)</label>
                           <input type="text" id="father_name_bangla-column" class="form-control" placeholder="শাকিল আহমেদ" name="father_name_bangla"
                              pattern="[\s\u0980-\u09FF]+$" required value="{{ $applicant->father_name_bangla }}">

                           <div class="invalid-feedback">Please enter your father's name in Bengali.</div>
                           @error('father_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_name_english-column">Father's Name (In English)</label>
                           <input type="text" id="father_name_english-column" class="form-control" placeholder="Shakil Ahmed" name="father_name_english"
                              required value="{{ $applicant->father_name_english }}">
                           <div class="invalid-feedback">Please enter your father's name in English.</div>
                           @error('father_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_name_bangla-column">Mother's Name (In Bengali)</label>
                           <input type="text" id="mother_name_bangla-column" class="form-control" placeholder="শাকিলা আহমেদ" name="mother_name_bangla"
                              required pattern="[\s\u0980-\u09FF]+$" value="{{ $applicant->mother_name_bangla }}">
                           <div class="invalid-feedback">Please enter your mother's name in Bengali.</div>
                           @error('mother_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_name_english-column">Mother's Name (In English)</label>
                           <input type="text" id="mother_name_english-column" class="form-control" placeholder="Shakila Ahmed" name="mother_name_english"
                              required value="{{ $applicant->mother_name_english }}">
                           <div class="invalid-feedback">Please enter your mother's name in English.</div>
                           @error('mother_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_nid">Father's NID Number</label>
                           <input type="text" id="father_nid" class="form-control" placeholder="132 456 6789" name="father_nid" required
                              pattern="[0-9]{10,18}" value="{{ $applicant->father_nid }}">
                           <div class="invalid-feedback">Please enter your father's NID no.</div>
                           @error('father_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_nid">Mother's NID Number</label>
                           <input type="text" id="mother_nid" class="form-control" placeholder="132 456 6789" name="mother_nid" required
                              pattern="[0-9]{10,18}" value="{{ $applicant->mother_nid }}">
                           <div class="invalid-feedback">Please enter your mother's NID no.</div>
                           @error('mother_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_birth_date">Father's Date of Birth</label>
                           <input type="text" id="father_birth_date" name="father_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ $applicant->father_birth_date }}">
                           <div class="invalid-feedback">Please select your father's date of birth.</div>
                           @error('father_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_birth_date">Mother's Date of Birth</label>
                           <input type="text" id="mother_birth_date" name="mother_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ $applicant->mother_birth_date }}">
                           <div class="invalid-feedback">Please select your mother's date of birth.</div>
                           @error('mother_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_mobile">Father's Mobile Number</label>
                           <input type="text" id="father_mobile" class="form-control" placeholder="017xxxxxxxx" name="father_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ $applicant->father_mobile }}">
                           <div class="invalid-feedback">Please enter your father's mobile number.</div>
                           @error('father_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_mobile">Mother's Mobile Number</label>
                           <input type="text" id="mother_mobile" class="form-control" placeholder="017xxxxxxxx" name="mother_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ $applicant->mother_mobile }}">
                           <div class="invalid-feedback">Please enter your mother's mobile number.</div>
                           @error('mother_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">Present Address</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_division" class="form-label">Division</label>
                           <select name="pres_division" id="pres_division" class="form-select" required>
                              <option {{ $applicant->pres_division ? '' : 'disabled' }} selected value="{{ $applicant->pres_division }}">
                                 {{ $applicant->pres_division ? $applicant->pres_division : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select division.</div>
                           @error('pres_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_district" class="form-label">District</label>
                           <select name="pres_district" id="pres_district" class="form-select" required>
                              <option {{ $applicant->pres_division ? '' : 'disabled' }} selected value="{{ $applicant->pres_district }}">
                                 {{ $applicant->pres_district ? $applicant->pres_district : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select District.</div>
                           @error('pres_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_upozilla" class="form-label">Sub-District</label>
                           <select name="pres_upozilla" id="pres_upozilla" class="form-select" required>
                              <option {{ $applicant->pres_upozilla ? '' : 'disabled' }} selected value="{{ $applicant->pres_upozilla }}">
                                 {{ $applicant->pres_upozilla ? $applicant->pres_upozilla : 'Select Sub District' }}</option>
                           </select>

                           <div class="invalid-feedback">Please select sub district.</div>
                           @error('pres_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres_city_corp" class="form-label">Municipality/Union/City Corporation </label>
                           <input type="text" name="pres_city_corp" id="pres_city_corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ $applicant->pres_city_corp }}">

                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                           @error('pres_city_corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres_post_code" class="form-label">Post Code</label>
                           <input type="text" name="pres_post_code" id="pres_post_code" class="form-control" placeholder="5200" required
                              pattern="[0-9]{4}" value="{{ $applicant->pres_post_code }}">

                           <div class="invalid-feedback">Please enter zip/post code.</div>
                           @error('pres_post_code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="pres_address" class="form-label">Address (Village, House, Road Etc.)</label>
                           <textarea name="pres_address" id="pres_address" class="form-control" rows="2" required>{{ $applicant->pres_address }}</textarea>

                           <div class="invalid-feedback">Please enter your address.</div>
                           @error('pres_address')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">Permanent Address</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_division" class="form-label">Division</label>
                           <select name="perm_division" id="perm_division" class="form-select" required>
                              <option {{ $applicant->perm_division ? '' : 'disabled' }} selected value="{{ $applicant->perm_division }}">
                                 {{ $applicant->perm_division ? $applicant->perm_division : 'Select Division' }} </option>
                           </select>

                           <div class="invalid-feedback">Please select division.</div>
                           @error('perm_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_district" class="form-label">District</label>
                           <select name="perm_district" id="perm_district" class="form-select" required>
                              <option {{ $applicant->perm_district ? '' : 'disabled' }} selected value="{{ $applicant->perm_district }}">
                                 {{ $applicant->perm_district ? $applicant->perm_district : 'Select District' }} </option>
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select district.</div>
                           @error('perm_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_upozilla" class="form-label">Sub-District</label>
                           <select name="perm_upozilla" id="perm_upozilla" class="form-select" required>
                              <option {{ $applicant->perm_upozilla ? '' : 'disabled' }} selected value="{{ $applicant->perm_upozilla }}">
                                 {{ $applicant->perm_upozilla ? $applicant->perm_upozilla : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select sub district.</div>
                           @error('perm_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm_city_corp" class="form-label">Municipality/Union/City Corporation </label>
                           <input type="text" name="perm_city_corp" id="perm_city_corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ $applicant->perm_city_corp }}">

                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                           @error('perm_city_corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm_post_code" class="form-label">Post Code</label>
                           <input type="text" name="perm_post_code" id="perm_post_code" class="form-control" placeholder="5200" required
                              pattern="[0-9]{4}" value="{{ $applicant->perm_post_code }}">

                           <div class="invalid-feedback">Please enter zip/post code.</div>
                           @error('perm_post_code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="perm_address" class="form-label">Address (Village, House, Road Etc.)</label>
                           <textarea name="perm_address" id="perm_address" class="form-control" rows="2" required>{{ $applicant->perm_address }}</textarea>

                           <div class="invalid-feedback">Please enter address.</div>
                           @error('perm_address')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Previous Educational Information</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_division" class="form-label">Division</label>
                           <select name="pe_division" id="pe_division" class="form-select" required>
                              <option {{ $applicant->pe_division ? '' : 'disabled' }} selected value="{{ $applicant->pe_division }}">
                                 {{ $applicant->pe_division ? $applicant->pe_division : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select division.</div>
                           @error('pe_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_district" class="form-label">District</label>
                           <select name="pe_district" id="pe_district" class="form-select" required>
                              <option {{ $applicant->pe_district ? '' : 'disabled' }} selected value="{{ $applicant->pe_district }}">
                                 {{ $applicant->pe_district ? $applicant->pe_district : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select district.</div>
                           @error('pe_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_upozilla" class="form-label">Sub-District</label>
                           <select name="pe_upozilla" id="pe_upozilla" class="form-select" required>
                              <option {{ $applicant->pe_upozilla ? '' : 'disabled' }} selected value="{{ $applicant->pe_upozilla }}">
                                 {{ $applicant->pe_upozilla ? $applicant->pe_upozilla : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select sub district.</div>
                           @error('pe_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_board" class="form-label">Board</label>
                           <select name="pe_board" id="pe_board" class="form-select" required>
                              <option {{ $applicant->pe_board ? '' : 'disabled' }} selected value="{{ $applicant->pe_board }}">
                                 {{ $applicant->pe_board ? $applicant->pe_board : 'Select Board' }}
                              </option>
                              <option value="Barisal" class="text-uppercase">Barisal</option>
                              <option value="Chittagong" class="text-uppercase">Chittagong</option>
                              <option value="Dhaka" class="text-uppercase">Dhaka</option>
                              <option value="Comilla" class="text-uppercase">Comilla</option>
                              <option value="Dinajpur" class="text-uppercase">Dinajpur</option>
                              <option value="Jessore" class="text-uppercase">Jessore</option>
                              <option value="Mymensingh" class="text-uppercase">Mymensingh</option>
                              <option value="Rajshahi" class="text-uppercase">Rajshahi</option>
                              <option value="Sylhet" class="text-uppercase">Sylhet</option>
                              <option value="Bangladesh Madrasah Education Board" class="text-uppercase">Bangladesh Madrasah Education Board</option>
                              <option value="Bangladesh Technical Education Board" class="text-uppercase">Bangladesh Technical Education Board</option>
                           </select>

                           <div class="invalid-feedback">Please select education board.</div>
                           @error('pe_board')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_institute" class="form-label">Institute Name</label>
                           <input type="text" name="pe_institute" id="pe_institute" class="form-control" placeholder="Dinajpur Govt. College" required
                              value="{{ $applicant->pe_institute }}">

                           <div class="invalid-feedback">Please enter institute name.</div>
                           @error('pe_institute')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_passing_year" class="form-label">Passing Year</label>
                           <select type="number" name="pe_passing_year" id="pe_passing_year" class="form-select" required>
                              <option {{ $applicant->pe_passing_year ? '' : 'disabled' }} selected value="{{ $applicant->pe_passing_year }}">
                                 {{ $applicant->pe_passing_year ? $applicant->pe_passing_year : 'Select Passing Year' }}
                              </option>
                              @for ($i = 2001; $i <= date('Y'); $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                           </select>

                           <div class="invalid-feedback">Please enter passing year.</div>
                           @error('pe_passing_year')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_gpa" class="form-label">GPA</label>
                           <input type="text" name="pe_gpa" id="pe_gpa" class="form-control" placeholder="4.00" required
                              value="{{ $applicant->pe_gpa }}">

                           <div class="invalid-feedback">Please enter your CGPA.</div>
                           @error('pe_gpa')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_exam_name" class="form-label">Name of previous Exam:</label>
                           <input type="text" name="pe_exam_name" id="pe_exam_name" class="form-control" placeholder="SSC" required
                              value="{{ $applicant->pe_exam_name }}">

                           <div class="invalid-feedback">Please enter previous exam name.</div>
                           @error('pe_exam_name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_technology_trade" class="form-label">Technology/Trade</label>
                           <input type="text" name="pe_technology_trade" id="pe_technology_trade" class="form-control" placeholder="Computer Science"
                              required value="{{ $applicant->pe_technology_trade }}">

                           <div class="invalid-feedback">Please select technology/trade.</div>
                           @error('pe_technology_trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe_roll" class="form-label">Roll</label>
                           <input type="number" name="pe_roll" id="pe_roll" class="form-control" placeholder="181457" required
                              value="{{ $applicant->pe_roll }}">

                           <div class="invalid-feedback">Please enter your roll no.</div>
                           @error('pe_roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe_att_rate" class="form-label">Attendance rate:</label>
                           <input type="text" name="pe_att_rate" id="pe_att_rate" class="form-control disabled" value="75%" readonly="readonly"
                              required value="{{ $applicant->pe_att_rate }}">

                           <div class="invalid-feedback">Please enter attendance rate.</div>
                           @error('pe_att_rate')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Present Educational Information</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_division" class="form-label">Division</label>
                           <select name="ce_division" id="ce_division" class="form-select" required>
                              <option {{ $applicant->ce_division ? '' : 'disabled' }} selected value="{{ $applicant->ce_division }}">
                                 {{ $applicant->ce_division ? $applicant->ce_division : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select division.</div>
                           @error('ce_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_district" class="form-label">District</label>
                           <select name="ce_district" id="ce_district" class="form-select" required>
                              <option {{ $applicant->ce_district ? '' : 'disabled' }} selected value="{{ $applicant->ce_district }}">
                                 {{ $applicant->ce_district ? $applicant->ce_district : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select district.</div>
                           @error('ce_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_upozilla" class="form-label">Sub-District</label>
                           <select name="ce_upozilla" id="ce_upozilla" class="form-select" required>
                              <option {{ $applicant->ce_upozilla ? '' : 'disabled' }} selected value="{{ $applicant->ce_upozilla }}">
                                 {{ $applicant->ce_upozilla ? $applicant->ce_upozilla : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">Please select sub district.</div>
                           @error('ce_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_institute_name" class="form-label">Institute Name</label>
                           <input type="text" name="ce_institute_name" id="ce_institute_name" class="form-control" placeholder="Textile Institute Dinajpur"
                              required value="{{ $applicant->ce_institute_name }}">

                           <div class="invalid-feedback">Please enter institute name.</div>
                           @error('ce_institute_name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_semester" class="form-label">Semester</label>
                           <select name="ce_semester" id="ce_semester" class="form-select" required>
                              <option selected {{ $applicant->ce_semester ? '' : 'disabled' }} value="{{ $applicant->ce_semester }}">
                                 {{ $applicant->ce_semester ? $applicant->ce_semester : 'Select Semester' }}
                              </option>
                              <option value="1st">1st</option>
                              <option value="2nd">2nd</option>
                              <option value="3rd">3rd</option>
                              <option value="4th">4th</option>
                              <option value="5th">5th</option>
                              <option value="6th">6th</option>
                              <option value="7th">7th</option>
                              <option value="8th">8th</option>
                           </select>

                           <div class="invalid-feedback">Please select your semester.</div>

                           @error('ce_semester')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_technology_trade" class="form-label">Technology/Trade</label>
                           <select name="ce_technology_trade" id="ce_technology_trade" class="form-select" required>
                              <option selected {{ $applicant->ce_technology_trade ? '' : 'disabled' }} value="{{ $applicant->ce_technology_trade }}">
                                 {{ $applicant->ce_technology_trade ? $applicant->ce_technology_trade : 'Select Technology/Trade' }}
                              </option>
                              <option value="textile machine design & maintenance">Textile Machine Design & Maintenance</option>
                              <option value="yarn manufacturing">Yarn Manufacturing</option>
                              <option value="wet processing">Wet Processing</option>
                              <option value="apparel manufacturing">Apparel Manufacturing</option>
                           </select>

                           <div class="invalid-feedback">Please select technology/trade.</div>
                           @error('ce_technology_trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_shift" class="form-label">Shift</label>
                           <select name="ce_shift" id="ce_shift" class="form-select" required>
                              <option selected {{ $applicant->ce_shift ? '' : 'disabled' }} value="{{ $applicant->ce_shift }}">
                                 {{ $applicant->ce_shift ? $applicant->ce_shift : 'Select Shift' }}
                              </option>
                              <option value="morning">Morning</option>
                              <option value="day">Day</option>
                           </select>

                           <div class="invalid-feedback">Please select shift.</div>
                           @error('ce_shift')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_group" class="form-label">Group</label>
                           <input type="text" id="ce_group" name="ce_group" class="form-control" required value="{{ $applicant->ce_group }}">

                           <div class="invalid-feedback">Please enter group.</div>
                           @error('ce_group')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_roll" class="form-label">Roll</label>
                           <input type="number" id="ce_roll" name="ce_roll" class="form-control" placeholder="174213" required
                              value="{{ $applicant->ce_roll }}">

                           <div class="invalid-feedback">Please enter roll.</div>
                           @error('ce_roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_reg" class="form-label">Registration</label>
                           <input type="number" id="ce_reg" name="ce_reg" class="form-control" placeholder="1500943651542" required
                              value="{{ $applicant->ce_reg }}">

                           <div class="invalid-feedback">Please enter your reg no.</div>
                           @error('ce_reg')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Presents in Absence</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="relationship" class="form-label">Select Relationship</label>
                           <select name="relationship" id="relationship" class="form-select" required>
                              <option selected {{ $applicant->relationship ? '' : 'disabled' }} value="{{ $applicant->relationship }}">
                                 {{ $applicant->relationship ? $applicant->relationship : 'Select Relationship' }}
                              </option>
                              <option value="father">Father</option>
                              <option value="mother">Mother</option>
                              <option value="brother">Brother</option>
                              <option value="sister">Sister</option>
                              <option value="other">Other</option>
                           </select>

                           <div class="invalid-feedback">Please select relationship.</div>
                           @error('relationship')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_name_bangla" class="form-label">Guardian's Name (in Bengali)</label>
                           <input type="text" id="guardian_name_bangla" name="guardian_name_bangla" class="form-control" placeholder="ফজলে রাব্বি" required
                              pattern="[\s\u0980-\u09FF]+$" value="{{ $applicant->guardian_name_bangla }}">

                           <div class="invalid-feedback">Please enter guardian's name in Bengali.</div>
                           @error('guardian_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_name_english" class="form-label">Guardian's Name (in English)</label>
                           <input type="text" id="guardian_name_english" name="guardian_name_english" class="form-control" placeholder="Fazlay Rabbbi"
                              required value="{{ $applicant->guardian_name_english }}">

                           <div class="invalid-feedback">Please enter guardian's name in English.</div>
                           @error('guardian_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_nid" class="form-label">Guardian's NID</label>
                           <input type="text" id="guardian_nid" name="guardian_nid" class="form-control" placeholder="123 456 6789" required
                              pattern="[0-9]{10,18}" value="{{ $applicant->guardian_nid }}">

                           <div class="invalid-feedback">Please enter guardian's NID.</div>
                           @error('guardian_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian_birth_date">Date of Birth</label>
                           <input type="text" id="guardian_birth_date" name="guardian_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ $applicant->guardian_birth_date }}">

                           <div class="invalid-feedback">Please select guardian's date of birth.</div>
                           @error('guardian_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian_mobile">Guardian's Mobile Number</label>
                           <input type="text" id="guardian_mobile" class="form-control" placeholder="017xxxxxxxx" name="guardian_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ $applicant->guardian_mobile }}">

                           <div class="invalid-feedback">Please enter guardian's mobile number.</div>
                           @error('guardian_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Eligibility Conditions and Attachment</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">The cost of education will be borne by</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="cost-father" class="form-check-input" type="radio" name="cost_borne" value="Father" required
                                    {{ $applicant->cost_borne == 'Father' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-father">Father</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-mother" class="form-check-input" type="radio" name="cost_borne" value="Mother" required
                                    {{ $applicant->cost_borne == 'Mother' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-mother">Mother</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-guardian" class="form-check-input" type="radio" name="cost_borne" value="Guardian" required
                                    {{ $applicant->cost_borne == 'Guardian' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-guardian">Guardian</label>


                              </div>

                           </div>
                           @error('cost_borne')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Applicant ethnic groups include</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-yes" class="form-check-input" type="radio" name="ethnic" value="yes" required
                                    {{ $applicant->ethnic == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ethnic-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-no" class="form-check-input" type="radio" name="ethnic" value="no" required
                                    {{ $applicant->ethnic == 'no' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ethnic-no">No</label>
                              </div>
                           </div>
                           @error('ethnic')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Freedom Fighter Quota</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ffq-yes" class="form-check-input" type="radio" name="ffq" value="yes" required
                                    {{ $applicant->ffq == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ffq-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ffq-no" class="form-check-input" type="radio" name="ffq" value="no" required
                                    {{ $applicant->ffq == 'no' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ffq-no">No</label>
                              </div>
                           </div>
                           @error('ffq')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Any other Scholarship</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-yes" class="form-check-input" type="radio" name="scholarship" value="yes" required
                                    {{ $applicant->scholarship == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="scholarship-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-no" class="form-check-input" type="radio" name="scholarship" value="no" required
                                    {{ $applicant->scholarship == 'no' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="scholarship-no">No</label>
                              </div>
                           </div>
                           @error('scholarship')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Physical Disabilities</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-yes" class="form-check-input" type="radio" name="disabilities" value="yes" required
                                    {{ $applicant->disabilities == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="disabilities-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-no" class="form-check-input" type="radio" name="disabilities" value="no" required
                                    {{ $applicant->disabilities == 'no' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="disabilities-no">No</label>
                              </div>
                           </div>
                           @error('disabilities')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Payment Details</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Select payment method:</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="payment-mobile" class="form-check-input" type="radio" name="payment_method" value="mobile banking" required
                                    checked {{ $applicant->payment_method == 'mobile-banking' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="payment-mobile">Mobile Banking</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="payment-bank" class="form-check-input" type="radio" name="payment_method" value="banking" required
                                    {{ $applicant->payment_method == 'banking' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="payment-bank">Banking</label>
                              </div>
                           </div>
                           @error('payment_method')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div id="payment-mobile-info" class="row">
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile_bank_provider">Mobile banking service providers</label>
                              <select name="mobile_bank_provider" id="mobile_bank_provider" class="form-select mobile-unchecked">
                                 <option selected {{ $applicant->mobile_bank_provider ? '' : 'disabled' }} value="{{ $applicant->mobile_bank_provider }}">
                                    {{ $applicant->mobile_bank_provider ? $applicant->mobile_bank_provider : 'Select mobile banking service provider' }}
                                 </option>
                                 @foreach ($mobile_banking_providers as $mobile_bank)
                                    <option value="{{ $mobile_bank }}" class="text-uppercase">{{ $mobile_bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">Please select mobile banking service provider.</div>
                              @error('mobile_bank_provider')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror

                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile_bank_account">Mobile banking account number</label>
                              <input type="text" id="mobile_bank_account" class="form-control mobile-unchecked" name="mobile_bank_account"
                                 placeholder="017xxxxxxxx" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" value="{{ $applicant->mobile_bank_account }}">

                              <div class="invalid-feedback">Please enter mobile banking account number.</div>
                              @error('mobile_bank_account')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>

                     </div>


                     <div id="payment-bank-info" class="row" style="display: none">
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_name">Bank Name</label>
                              <select name="bank_name" id="bank_name" class="form-select banking-unchecked" required>
                                 <option selected {{ $applicant->bank_name ? '' : 'disabled' }} value="{{ $applicant->bank_name }}">
                                    {{ $applicant->bank_name ? $applicant->bank_name : 'Select Bank' }}
                                 </option>
                                 @foreach ($banks as $bank)
                                    <option value="{{ $bank }}" class="text-uppercase">{{ $bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">Please select bank name.</div>
                              @error('bank_name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_branch">Branch</label>
                              <input type="text" id="bank_branch" class="form-control banking-unchecked" name="bank_branch" placeholder="Dinajpur" required
                                 value="{{ $applicant->bank_branch }}">

                              <div class="invalid-feedback">Please enter branch.</div>
                              @error('bank_branch')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_routing">Routing No.</label>
                              <input type="text" id="bank_routing" class="form-control banking-unchecked" name="bank_routing" placeholder="070280676"
                                 required value="{{ $applicant->bank_routing }}">

                              <div class="invalid-feedback">Please enter bank routing number.</div>
                              @error('bank_routing')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_type">Account Type</label>
                              <select name="bank_acc_type" id="bank_acc_type" class="form-select banking-unchecked" required>
                                 <option selected {{ $applicant->bank_acc_type ? '' : 'disabled' }} value="{{ $applicant->bank_acc_type }}">
                                    {{ $applicant->bank_acc_type ? $applicant->bank_acc_type : 'Select Account Type' }}
                                 </option>
                                 <option value="savings">Savings</option>
                                 <option value="current">Current</option>
                              </select>

                              <div class="invalid-feedback">Please select account type.</div>
                              @error('bank_acc_type')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_name">Account Holder Name</label>
                              <input type="text" id="bank_acc_name" class="form-control banking-unchecked" name="bank_acc_name"
                                 placeholder="Shakil Ahmed" required value="{{ $applicant->bank_acc_name }}">

                              <div class="invalid-feedback">Please enter bank account holder name.</div>
                              @error('bank_acc_name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_number">Account Number</label>
                              <input type="number" id="bank_acc_number" class="form-control banking-unchecked" name="bank_acc_number"
                                 placeholder="200154655xxxxx" required value="{{ $applicant->bank_acc_number }}">

                              <div class="invalid-feedback">Please enter bank account number.</div>
                              @error('bank_acc_number')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">Photo & Signature</div>
                     </div>
                     <p class="text-warning fw-bold">Each image size is maximum 512KB.</p>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="formal-photo">Select your Formal Photo</label>
                           <input type="file" id="formal-photo" class="form-control" name="formal_image" accept="image/png, image/jpeg, .jpg">

                           <div class="invalid-feedback">Please select your formal image.</div>
                           @error('formal-photo')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="signature">Select your Formal Photo</label>
                           <input type="file" id="signature" class="form-control" name="signature_image" accept="image/png, image/jpeg, .jpg">

                           <div class="invalid-feedback">Please select signature image.</div>
                           @error('signature')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>



                     {{--                            submit button --}}
                     <div class="col-12 d-flex justify-content-center flex-column flex-md-row mt-2">
                        <button type="reset" class="btn btn-outline-secondary me-md-1 mb-md-0 waves-effect mb-1">Reset</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection


@section('vendor-script')
   <!-- vendor files -->
   <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
   <!-- Page js files -->
   <script src="{{ asset(mix('js/scripts/forms/pickers/student-form-pickers.js')) }}"></script>
   <script src="{{ asset(mix('js/core/forms.js')) }}"></script>
@endsection

@extends('layouts/fullLayoutMaster')

@section('title', 'Student Form')

@section('vendor-style')
   <!-- vendor css files -->
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
   <div class="row vh-100">
      <div class="col-12 d-flex align-items-md-center justify-content-center py-3 px-2">
         <div class="card w-lg-75 w-100">
            <div class="card-body">
               <h2 class="card-title text-uppercase text-center">Student Database - Textile Institute Dinajpur</h2>
               <p class="text-warning text-center">Fill the form with correct information. Each field of the form must be filled.</p>
               <p class="fw-bold text-danger text-center">All the fields are <strong><em>required</em></strong> and will be validate from the server!!!</p>
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
                  action='{{ route('form') }}' enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="divider divider-primary">
                        <div class="divider-text">Personal Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-name-bangla-column">Student Name (In Bengali)</label>
                           <input type="text" id="student-name-bangla-column" class="form-control" placeholder="শাকিল আহমেদ" name="student-name-bangla" required
                              value="{{ old('student-name-bangla') }}">

                           <div class="invalid-feedback">Please enter your name in Bengali.</div>
                           @error('student-name-bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-name-english-column">Student Name (In English)</label>
                           <input type="text" id="student-name-english-column" class="form-control" placeholder="Shakil Ahmed" name="student-name-english"
                              required value="{{ old('student-name-english') }}">

                           <div class="invalid-feedback">Please enter your name in English.</div>
                           @error('student-name-english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth-certificate-number">Birth Certificate Number</label>
                           <input type="number" id="birth-certificate-number" class="form-control" placeholder="20072722000000008" name="birth-certificate-number"
                              minlength="13" required value="{{ old('birth-certificate-number') }}">

                           <div class="invalid-feedback">Please enter your birth certificate number.</div>
                           @error('birth-certificate-number')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth-date">Date of Birth</label>
                           <input type="text" id="birth-date" name="birth-date" class="form-control picker flatpickr-basic flatpickr-input active"
                              placeholder="YYYY-MM-DD" readonly="readonly" required value="{{ old('birth-date') }}">

                           <div class="invalid-feedback">Please enter your date of birth.</div>
                           @error('birth-date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-mobile">Student's Mobile Number</label>
                           <input type="number" id="student-mobile" class="form-control" placeholder="017xxxxxxxx" name="student-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('student-mobile') }}">

                           <div class="invalid-feedback">Please enter your mobile number.</div>
                           @error('student-mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="blood-group">Blood Group</label>
                           <select name="blood-group" id="blood-group" class="form-select" required>
                              <option selected="" value="{{ old('blood-group') ? old('blood-group') : '' }}" {{ old('blood-group') ? '' : 'disabled' }}>
                                 {{ old('blood-group') ? old('blood-group') : 'Select your Blood group' }} </option>
                              <option value="A Positive (A+)">A Positive (A+)</option>
                              <option value="A Megative (A-)">A Megative (A-)</option>
                              <option value="B Positive (B+)">B Positive (B+)</option>
                              <option value="B Negative (B-)">B Negative (B-)</option>
                              <option value="O Positive (O+)">O Positive (O+)</option>
                              <option value="O Negative (O-)">O Negative (O-)</option>
                              <option value="AB Positive (AB+)">AB Positive (AB+)</option>
                              <option value="AB Negative (AB-)">AB Negative (AB-)</option>
                           </select>

                           <div class="invalid-feedback">Please select your blood group.</div>
                           @error('blood-group')
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
                                    {{ old('gender') == 'male' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="male">Male</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="female" class="form-check-input" type="radio" name="gender" value="female" required
                                    {{ old('gender') == 'female' ? 'checked' : '' }}>
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
                                 <input id="married" class="form-check-input" type="radio" name="marital-status" value="married" required
                                    {{ old('marital-status') == 'married' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="married">Married</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="unmarried" class="form-check-input" type="radio" name="marital-status" value="unmarried" required
                                    {{ old('marital-status') == 'unmarried' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="unmarried">Unmarried</label>
                              </div>

                           </div>
                           @error('marital-status')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>




                     <div class="divider divider-primary">
                        <div class="divider-text">Parents Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-name-bangla-column">Father's Name (In Bengali)</label>
                           <input type="text" id="father-name-bangla-column" class="form-control" placeholder="শাকিল আহমেদ" name="father-name-bangla"
                              required value="{{ old('father-name-bangla') }}">

                           <div class="invalid-feedback">Please enter your father's name in Bengali.</div>
                           @error('father-name-bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-name-english-column">Father's Name (In English)</label>
                           <input type="text" id="father-name-english-column" class="form-control" placeholder="Shakil Ahmed" name="father-name-english"
                              required value="{{ old('father-name-english') }}">
                           <div class="invalid-feedback">Please enter your father's name in English.</div>
                           @error('father-name-english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-name-bangla-column">Mother's Name (In Bengali)</label>
                           <input type="text" id="mother-name-bangla-column" class="form-control" placeholder="শাকিলা আহমেদ" name="mother-name-bangla"
                              required value="{{ old('mother-name-bangla') }}">
                           <div class="invalid-feedback">Please enter your mother's name in Bengali.</div>
                           @error('mother-name-bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-name-english-column">Mother's Name (In English)</label>
                           <input type="text" id="mother-name-english-column" class="form-control" placeholder="Shakila Ahmed" name="mother-name-english"
                              required value="{{ old('mother-name-english') }}">
                           <div class="invalid-feedback">Please enter your mother's name in English.</div>
                           @error('mother-name-english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-nid">Father's NID Number</label>
                           <input type="number" id="father-nid" class="form-control" placeholder="132 456 6789" name="father-nid" required
                              value="{{ old('father-nid') }}">
                           <div class="invalid-feedback">Please enter your father's NID no.</div>
                           @error('father-nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-nid">Mother's NID Number</label>
                           <input type="number" id="mother-nid" class="form-control" placeholder="132 456 6789" name="mother-nid" required
                              value="{{ old('mother-nid') }}">
                           <div class="invalid-feedback">Please enter your mother's NID no.</div>
                           @error('mother-nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-birth-date">Father's Date of Birth</label>
                           <input type="text" id="father-birth-date" name="father-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('father-birth-date') }}">
                           <div class="invalid-feedback">Please select your father's date of birth.</div>
                           @error('father-birth-date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-birth-date">Mother's Date of Birth</label>
                           <input type="text" id="mother-birth-date" name="mother-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('mother-birth-date') }}">
                           <div class="invalid-feedback">Please select your mother's date of birth.</div>
                           @error('mother-birth-date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-mobile">Father's Mobile Number</label>
                           <input type="text" id="father-mobile" class="form-control" placeholder="017xxxxxxxx" name="father-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('father-mobile') }}">
                           <div class="invalid-feedback">Please enter your father's mobile number.</div>
                           @error('father-mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-mobile">Mother's Mobile Number</label>
                           <input type="text" id="mother-mobile" class="form-control" placeholder="017xxxxxxxx" name="mother-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('mother-mobile') }}">
                           <div class="invalid-feedback">Please enter your mother's mobile number.</div>
                           @error('mother-mobile')
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
                              <option {{ old('pres_division') ? '' : 'disabled' }} selected value="{{ old('pres_division') }}">
                                 {{ old('pres_division') ? old('pres_division') : 'Select Division' }}
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
                              <option {{ old('pres_division') ? '' : 'disabled' }} selected value="{{ old('pres_district') }}">
                                 {{ old('pres_district') ? old('pres_district') : 'Select District' }}
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
                              <option {{ old('pres_upozilla') ? '' : 'disabled' }} selected value="{{ old('pres_upozilla') }}">
                                 {{ old('pres_upozilla') ? old('pres_upozilla') : 'Select Sub District' }}</option>
                           </select>

                           <div class="invalid-feedback">Please select sub district.</div>
                           @error('pres_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres-city-corp" class="form-label">Municipality/Union/City Corporation </label>
                           <input type="text" name="pres-city-corp" id="pres-city-corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ old('pres-city-corp') }}">

                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                           @error('pres-city-corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres-post-code" class="form-label">Post Code</label>
                           <input type="number" name="pres-post-code" id="pres-post-code" class="form-control" placeholder="5200" required
                              value="{{ old('pres-post-code') }}">

                           <div class="invalid-feedback">Please enter zip/post code.</div>
                           @error('pres-post-code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="pres-address" class="form-label">Address (Village, House, Road Etc.)</label>
                           <textarea name="pres-address" id="pres-address" class="form-control" rows="2" required>{{ old('pres-address') }}</textarea>

                           <div class="invalid-feedback">Please enter your address.</div>
                           @error('pres-address')
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
                              <option {{ old('perm_division') ? '' : 'disabled' }} selected value="{{ old('perm_division') }}">
                                 {{ old('perm_division') ? old('perm_division') : 'Select Division' }} </option>
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
                              <option {{ old('perm_district') ? '' : 'disabled' }} selected value="{{ old('perm_district') }}">
                                 {{ old('perm_district') ? old('perm_district') : 'Select District' }} </option>
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
                              <option {{ old('perm_upozilla') ? '' : 'disabled' }} selected value="{{ old('perm_upozilla') }}">
                                 {{ old('perm_upozilla') ? old('perm_upozilla') : 'Select Sub-District' }}
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
                           <label for="perm-city-corp" class="form-label">Municipality/Union/City Corporation </label>
                           <input type="text" name="perm-city-corp" id="perm-city-corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ old('perm-city-corp') }}">

                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                           @error('perm-city-corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm-post-code" class="form-label">Post Code</label>
                           <input type="number" name="perm-post-code" id="perm-post-code" class="form-control" placeholder="5200" required
                              value="{{ old('perm-post-code') }}">

                           <div class="invalid-feedback">Please enter zip/post code.</div>
                           @error('perm-post-code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="perm-address" class="form-label">Address (Village, House, Road Etc.)</label>
                           <textarea name="perm-address" id="perm-address" class="form-control" rows="2" required>{{ old('perm-address') }}</textarea>

                           <div class="invalid-feedback">Please enter address.</div>
                           @error('perm-address')
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
                              <option {{ old('pe_division') ? '' : 'disabled' }} selected value="{{ old('pe_division') }}">
                                 {{ old('pe_division') ? old('pe_division') : 'Select Division' }}
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
                              <option {{ old('pe_district') ? '' : 'disabled' }} selected value="{{ old('pe_district') }}">
                                 {{ old('pe_district') ? old('pe_district') : 'Select District' }}
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
                              <option {{ old('pe_upozilla') ? '' : 'disabled' }} selected value="{{ old('pe_upozilla') }}">
                                 {{ old('pe_upozilla') ? old('pe_upozilla') : 'Select Sub-District' }}
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
                           <select name="pe-board" id="pe_board" class="form-select" required>
                              <option {{ old('pe-board') ? '' : 'disabled' }} selected value="{{ old('pe-board') }}">
                                 {{ old('pe-board') ? old('pe-board') : 'Select Board' }}
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
                           @error('pe-board')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-institute" class="form-label">Institute Name</label>
                           <input type="text" name="pe-institute" id="pe-institute" class="form-control" placeholder="Dinajpur Govt. College" required
                              value="{{ old('pe-institute') }}">

                           <div class="invalid-feedback">Please enter institute name.</div>
                           @error('pe-institute')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-passing-year" class="form-label">Passing Year</label>
                           <select type="number" name="pe-passing-year" id="pe-passing-year" class="form-select" required>
                              <option {{ old('pe-passing-year') ? '' : 'disabled' }} selected value="{{ old('pe-passing-year') }}">
                                 {{ old('pe-passing-year') ? old('pe-passing-year') : 'Select Passing Year' }}
                              </option>
                              @for ($i = 2001; $i <= date('Y'); $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                           </select>

                           <div class="invalid-feedback">Please enter passing year.</div>
                           @error('pe-passing-year')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-gpa" class="form-label">GPA</label>
                           <input type="number" name="pe-gpa" id="pe-gpa" class="form-control" placeholder="4.00" required
                              value="{{ old('pe-gpa') }}">

                           <div class="invalid-feedback">Please enter your CGPA.</div>
                           @error('pe-gpa')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-exam-name" class="form-label">Name of previous Exam:</label>
                           <input type="text" name="pe-exam-name" id="pe-exam-name" class="form-control" placeholder="SSC" required
                              value="{{ old('pe-exam-name') }}">

                           <div class="invalid-feedback">Please enter previous exam name.</div>
                           @error('pe-exam-name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-technology-trade" class="form-label">Technology/Trade</label>
                           <input type="text" name="pe-technology-trade" id="pe-technology-trade" class="form-control" placeholder="Computer Science"
                              required value="{{ old('pe-technology-trade') }}">

                           <div class="invalid-feedback">Please select technology/trade.</div>
                           @error('pe-technology-trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe-roll" class="form-label">Roll</label>
                           <input type="number" name="pe-roll" id="pe-roll" class="form-control" placeholder="181457" required
                              value="{{ old('pe-roll') }}">

                           <div class="invalid-feedback">Please enter your roll no.</div>
                           @error('pe-roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe-att-rate" class="form-label">Attendance rate:</label>
                           <input type="text" name="pe-att-rate" id="pe-att-rate" class="form-control disabled" value="75%" readonly="readonly"
                              required value="{{ old('pe-att-rate') }}">

                           <div class="invalid-feedback">Please enter attendance rate.</div>
                           @error('pe-att-rate')
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
                              <option {{ old('ce_division') ? '' : 'disabled' }} selected value="{{ old('ce_division') }}">
                                 {{ old('ce_division') ? old('ce_division') : 'Select Division' }}
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
                              <option {{ old('ce_district') ? '' : 'disabled' }} selected value="{{ old('ce_district') }}">
                                 {{ old('ce_district') ? old('ce_district') : 'Select District' }}
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
                              <option {{ old('ce_upozilla') ? '' : 'disabled' }} selected value="{{ old('ce_upozilla') }}">
                                 {{ old('ce_upozilla') ? old('ce_upozilla') : 'Select Sub-District' }}
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
                           <label for="ce-institute-name" class="form-label">Institute Name</label>
                           <input type="text" name="ce-institute-name" id="ce-institute-name" class="form-control" placeholder="Textile Institute Dinajpur"
                              required value="{{ old('ce-institute-name') }}">

                           <div class="invalid-feedback">Please enter institute name.</div>
                           @error('ce-institute-name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce-semester" class="form-label">Semester</label>
                           <select name="ce-semester" id="ce-semester" class="form-select" required>
                              <option selected {{ old('ce-semester') ? '' : 'disabled' }} value="{{ old('ce-semester') }}">
                                 {{ old('ce-semester') ? old('ce-semester') : 'Select Semester' }}
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

                           @error('ce-semester')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce-technology-trade" class="form-label">Technology/Trade</label>
                           <select name="ce-technology-trade" id="ce-technology-trade" class="form-select" required>
                              <option selected {{ old('ce-technology-trade') ? '' : 'disabled' }} value="{{ old('ce-technology-trade') }}">
                                 {{ old('ce-technology-trade') ? old('ce-technology-trade') : 'Select Technology/Trade' }}
                              </option>
                              <option value="textile">Textile</option>
                           </select>

                           <div class="invalid-feedback">Please select technology/trade.</div>
                           @error('ce-technology-trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-shift" class="form-label">Shift</label>
                           <select name="ce-shift" id="ce-shift" class="form-select" required>
                              <option selected {{ old('ce-shift') ? '' : 'disabled' }} value="{{ old('ce-shift') }}">
                                 {{ old('ce-shift') ? old('ce-shift') : 'Select Shift' }}
                              </option>
                              <option value="morning">Morning</option>
                              <option value="day">Day</option>
                           </select>

                           <div class="invalid-feedback">Please select shift.</div>
                           @error('ce-shift')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-group" class="form-label">Group</label>
                           <input type="text" id="ce-group" name="ce-group" class="form-control" required value="{{ old('ce-group') }}">

                           <div class="invalid-feedback">Please enter group.</div>
                           @error('ce-group')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-roll" class="form-label">Roll</label>
                           <input type="number" id="ce-roll" name="ce-roll" class="form-control" placeholder="174213" required
                              value="{{ old('ce-roll') }}">

                           <div class="invalid-feedback">Please enter roll.</div>
                           @error('ce-roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-reg" class="form-label">Registration</label>
                           <input type="number" id="ce-reg" name="ce-reg" class="form-control" placeholder="1500943651542" required
                              value="{{ old('ce-reg') }}">

                           <div class="invalid-feedback">Please enter your reg no.</div>
                           @error('ce-reg')
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
                              <option selected {{ old('relationship') ? '' : 'disabled' }} value="{{ old('relationship') }}">
                                 {{ old('relationship') ? old('relationship') : 'Select Relationship' }}
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
                           <label for="guardian-name-bangla" class="form-label">Guardian's Name (in Bengali)</label>
                           <input type="text" id="guardian-name-bangla" name="guardian-name-bangla" class="form-control" placeholder="ফজলে রাব্বি" required
                              value="{{ old('guardian-name-bangla') }}">

                           <div class="invalid-feedback">Please enter guardian's name in Bengali.</div>
                           @error('guardian-name-bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian-name-english" class="form-label">Guardian's Name (in English)</label>
                           <input type="text" id="guardian-name-english" name="guardian-name-english" class="form-control" placeholder="Fazlay Rabbbi"
                              required value="{{ old('guardian-name-english') }}">

                           <div class="invalid-feedback">Please enter guardian's name in English.</div>
                           @error('guardian-name-english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian-nid" class="form-label">Guardian's NID</label>
                           <input type="text" id="guardian-nid" name="guardian-nid" class="form-control" placeholder="123 456 6789" required
                              value="{{ old('guardian-nid') }}">

                           <div class="invalid-feedback">Please enter guardian's NID.</div>
                           @error('guardian-nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian-birth-date">Date of Birth</label>
                           <input type="text" id="guardian-birth-date" name="guardian-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('guardian-birth-date') }}">

                           <div class="invalid-feedback">Please select guardian's date of birth.</div>
                           @error('guardian-birth-date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian-mobile">Guardian's Mobile Number</label>
                           <input type="number" id="guardian-mobile" class="form-control" placeholder="017xxxxxxxx" name="guardian-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('guardian-mobile') }}">

                           <div class="invalid-feedback">Please enter guardian's mobile number.</div>
                           @error('guardian-mobile')
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
                                 <input id="cost-father" class="form-check-input" type="radio" name="cost-borne" value="Father" required
                                    {{ old('cost-borne') == 'Father' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-father">Father</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-mother" class="form-check-input" type="radio" name="cost-borne" value="Mother" required
                                    {{ old('cost-borne') == 'Mother' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-mother">Mother</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-guardian" class="form-check-input" type="radio" name="cost-borne" value="Guardian" required
                                    {{ old('cost-borne') == 'Guardian' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-guardian">Guardian</label>


                              </div>

                           </div>
                           @error('cost-borne')
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
                                    {{ old('ethnic') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ethnic-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-no" class="form-check-input" type="radio" name="ethnic" value="no" required
                                    {{ old('ethnic') == 'no' ? 'checked' : '' }}>
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
                                    {{ old('ffq') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ffq-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ffq-no" class="form-check-input" type="radio" name="ffq" value="no" required
                                    {{ old('ffq') == 'no' ? 'checked' : '' }}>
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
                                    {{ old('scholarship') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="scholarship-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-no" class="form-check-input" type="radio" name="scholarship" value="no" required
                                    {{ old('scholarship') == 'no' ? 'checked' : '' }}>
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
                                    {{ old('disabilities') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="disabilities-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-no" class="form-check-input" type="radio" name="disabilities" value="no" required
                                    {{ old('disabilities') == 'no' ? 'checked' : '' }}>
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
                                 <input id="payment-mobile" class="form-check-input" type="radio" name="payment-method" value="mobile banking" required
                                    checked {{ old('payment-method') == 'mobile-banking' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="payment-mobile">Mobile Banking</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="payment-bank" class="form-check-input" type="radio" name="payment-method" value="banking" required
                                    {{ old('payment-method') == 'banking' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="payment-bank">Banking</label>
                              </div>
                           </div>
                           @error('payment-method')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div id="payment-mobile-info" class="row">
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile-bank-provider">Mobile banking service providers</label>
                              <select name="mobile-bank-provider" id="mobile-bank-provider" class="form-select mobile-unchecked">
                                 <option selected {{ old('mobile-bank-provider') ? '' : 'disabled' }} value="{{ old('mobile-bank-provider') }}">
                                    {{ old('mobile-bank-provider') ? old('mobile-bank-provider') : 'Select mobile banking service provider' }}
                                 </option>
                                 @foreach ($mobile_banks as $mobile_bank)
                                    <option value="{{ $mobile_bank }}" class="text-uppercase">{{ $mobile_bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">Please select mobile banking service provider.</div>
                              @error('mobile-bank-provider')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror

                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile-bank-account">Mobile banking account number</label>
                              <input type="number" id="mobile-bank-account" class="form-control mobile-unchecked" name="mobile-bank-account"
                                 placeholder="017xxxxxxxx" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" value="{{ old('mobile-bank-account') }}">

                              <div class="invalid-feedback">Please enter mobile banking account number.</div>
                              @error('mobile-bank-account')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>

                     </div>


                     <div id="payment-bank-info" class="row" style="display: none">
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-name">Bank Name</label>
                              <select name="bank-name" id="bank-name" class="form-select banking-unchecked" required>
                                 <option selected {{ old('bank-name') ? '' : 'disabled' }} value="{{ old('bank-name') }}">
                                    {{ old('bank-name') ? old('bank-name') : 'Select Bank' }}
                                 </option>
                                 @foreach ($banks as $bank)
                                    <option value="{{ $bank }}" class="text-uppercase">{{ $bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">Please select bank name.</div>
                              @error('bank-name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-branch">Branch</label>
                              <input type="text" id="bank-branch" class="form-control banking-unchecked" name="bank-branch" placeholder="Dinajpur" required
                                 value="{{ old('bank-branch') }}">

                              <div class="invalid-feedback">Please enter branch.</div>
                              @error('bank-branch')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-routing">Routing No.</label>
                              <input type="text" id="bank-routing" class="form-control banking-unchecked" name="bank-routing" placeholder="070280676"
                                 required value="{{ old('bank-routing') }}">

                              <div class="invalid-feedback">Please enter bank routing number.</div>
                              @error('bank-routing')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-type">Account Type</label>
                              <select name="bank-acc-type" id="bank-acc-type" class="form-select banking-unchecked" required>
                                 <option selected {{ old('bank-acc-type') ? '' : 'disabled' }} value="{{ old('bank-acc-type') }}">
                                    {{ old('bank-acc-type') ? old('bank-acc-type') : 'Select Account Type' }}
                                 </option>
                                 <option value="savings">Savings</option>
                                 <option value="current">Current</option>
                              </select>

                              <div class="invalid-feedback">Please select account type.</div>
                              @error('bank-acc-type')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-name">Account Holder Name</label>
                              <input type="text" id="bank-acc-name" class="form-control banking-unchecked" name="bank-acc-name" placeholder="Shakil Ahmed"
                                 required value="{{ old('bank-acc-name') }}">

                              <div class="invalid-feedback">Please enter bank account holder name.</div>
                              @error('bank-acc-name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-number">Account Number</label>
                              <input type="number" id="bank-acc-number" class="form-control banking-unchecked" name="bank-acc-number"
                                 placeholder="200154655xxxxx" required value="{{ old('bank-acc-number') }}">

                              <div class="invalid-feedback">Please enter bank account number.</div>
                              @error('bank-acc-number')
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
                           <input type="file" id="formal-photo" class="form-control" name="formal_image" accept="image/png, image/jpeg, .jpg" required>

                           <div class="invalid-feedback">Please select your formal image.</div>
                           @error('formal-photo')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="signature">Select your Formal Photo</label>
                           <input type="file" id="signature" class="form-control" name="signature_image" accept="image/png, image/jpeg, .jpg"
                              required>

                           <div class="invalid-feedback">Please select signature image.</div>
                           @error('signature')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>



                     {{--                            submit button --}}
                     <div class="col-12 d-flex justify-content-center flex-column flex-md-row mt-2">
                        <a href="/" class="btn btn-outline-secondary waves-effect me-md-1 mb-md-0 mb-1">Back to Home</a>
                        <button type="reset" class="btn btn-outline-secondary me-md-1 mb-md-0 waves-effect mb-1">Reset</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
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
   <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
   <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
   <!-- Page js files -->
   <script src="{{ asset(mix('js/scripts/forms/pickers/student-form-pickers.js')) }}"></script>
   <script src="{{ asset(mix('js/core/forms.js')) }}"></script>
@endsection

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
               <p class="text-warning text-center">Fill the form with correct information. Each field of the form must
                  be filled.</p>
               <p class="fw-bold text-danger text-center">All the fields are <strong><em>required</em></strong> and
                  will be validate from the server!!!</p>
               <form class="form needs-validation" novalidate>
                  @csrf
                  <div class="row">
                     <div class="divider divider-primary">
                        <div class="divider-text">Personal Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-name-bangla-column">Student Name (In
                              Bengali)</label>
                           <input id="student-name-bangla-column" type="text" class="form-control" placeholder="শাকিল আহমেদ" name="student-name-bangla"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your name in Bengali.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-name-english-column">Student Name (In
                              English)</label>
                           <input id="student-name-english-column" type="text" class="form-control" placeholder="Shakil Ahmed" name="student-name-english"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your name in English.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth-certificate-number">Birth Certificate
                              Number</label>
                           <input id="birth-certificate-number" type="number" class="form-control" placeholder="20072722000000008" name="birth-certificate-number"
                              minlength="13" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your birth certificate number.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth-date">Date of Birth</label>
                           <input id="birth-date" type="text" name="birth-date" class="form-control picker flatpickr-basic flatpickr-input active"
                              placeholder="YYYY-MM-DD" readonly="readonly" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your date of birth.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student-mobile">Student's Mobile Number</label>
                           <input id="student-mobile" type="number" class="form-control" placeholder="017xxxxxxxx" name="student-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your mobile number.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="blood-group">Blood Group</label>
                           <select id="blood-group" name="blood-group" class="form-select" required>
                              <option disabled="" selected="" value="">Select your Blood group
                              </option>
                              <option value="(A+)">A Positive (A+)</option>
                              <option value="(A-)">A Megative (A-)</option>
                              <option value="(B+)">B Positive (B+)</option>
                              <option value="(B-)">B Negative (B-)</option>
                              <option value="(O+)">O Positive (O+)</option>
                              <option value="(O-)">O Negative (O-)</option>
                              <option value="(AB+)">AB Positive (AB+)</option>
                              <option value="(AB-)">AB Negative (AB-)</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select your blood group.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">Gender</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="male" class="form-check-input" type="radio" name="gender" value="male" required>
                                 <label class="form-check-label" for="male">Male</label>
                                 <div class="invalid-feedback">Please select your gender.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="female" class="form-check-input" type="radio" name="gender" value="female" required>
                                 <label class="form-check-label" for="female">Female</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">Marital Status</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="married" class="form-check-input" type="radio" name="marital-status" value="married" required>
                                 <label class="form-check-label" for="married">Married</label>
                                 <div class="invalid-feedback">Please select your marital status.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="unmarried" class="form-check-input" type="radio" name="marital-status" value="unmarried" required>
                                 <label class="form-check-label" for="unmarried">Unmarried</label>
                              </div>
                           </div>
                        </div>
                     </div>




                     <div class="divider divider-primary">
                        <div class="divider-text">Parents Information</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-name-bangla-column">Father's Name (In
                              Bengali)</label>
                           <input id="father-name-bangla-column" type="text" class="form-control" placeholder="শাকিল আহমেদ" name="father-name-bangla"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your father's name in Bengali.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-name-english-column">Father's Name (In
                              English)</label>
                           <input id="father-name-english-column" type="text" class="form-control" placeholder="Shakil Ahmed" name="father-name-english"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your father's name in English.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-name-bangla-column">Mother's Name (In
                              Bengali)</label>
                           <input id="mother-name-bangla-column" type="text" class="form-control" placeholder="শাকিলা আহমেদ" name="mother-name-bangla"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your mother's name in Bengali.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-name-english-column">Mother's Name (In
                              English)</label>
                           <input id="mother-name-english-column" type="text" class="form-control" placeholder="Shakila Ahmed" name="mother-name-english"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your mother's name in English.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-nid">Father's NID Number</label>
                           <input id="father-nid" type="number" class="form-control" placeholder="132 456 6789" name="father-nid" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your father's NID no.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-nid">Mother's NID Number</label>
                           <input id="mother-nid" type="number" class="form-control" placeholder="132 456 6789" name="mother-nid" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your mother's NID no.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-birth-date">Father's Date of Birth</label>
                           <input id="father-birth-date" type="text" name="father-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select your father's date of birth.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-birth-date">Mother's Date of Birth</label>
                           <input id="mother-birth-date" type="text" name="mother-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select your mother's date of birth.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father-mobile">Father's Mobile Number</label>
                           <input id="father-mobile" type="text" class="form-control" placeholder="017xxxxxxxx" name="father-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your father's mobile number.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother-mobile">Mother's Mobile Number</label>
                           <input id="mother-mobile" type="text" class="form-control" placeholder="017xxxxxxxx" name="mother-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your mother's mobile number.</div>
                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">Present Address</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_division" class="form-label">Division</label>
                           <select id="pres_division" name="pres_division" class="form-select" required>
                              <option disabled selected value="">Select Division</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select division.</div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_district" class="form-label">District</label>
                           <select id="pres_district" name="pres_district" class="form-select" required>
                              <option disabled selected value="">Select District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select District.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_upozilla" class="form-label">Sub-District</label>
                           <select id="pres_upozilla" name="pres_upozilla" class="form-select" required>
                              <option disabled selected value="">Select Sub District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select sub district.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres-city-corp" class="form-label">Municipality/Union/City Corporation
                           </label>
                           <input id="pres-city-corp" type="text" name="pres-city-corp" class="form-control" placeholder="Dinajpur" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres-post-code" class="form-label">Post Code</label>
                           <input id="pres-post-code" type="number" name="pres-post-code" class="form-control" placeholder="5200" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter zip/post code.</div>
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="pres-address" class="form-label">Address (Village, House, Road
                              Etc.)</label>
                           <textarea id="pres-address" name="pres-address" class="form-control" rows="2" required></textarea>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your address.</div>
                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">Permanent Address</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_division" class="form-label">Division</label>
                           <select id="perm_division" name="perm_division" class="form-select" required>
                              <option disabled selected value="">Select Division</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select division.</div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_district" class="form-label">District</label>
                           <select id="perm_district" name="perm_district" class="form-select" required>
                              <option disabled selected value="">Select District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select district.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_upozilla" class="form-label">Sub-District</label>
                           <select id="perm_upozilla" name="perm_upozilla" class="form-select" required>
                              <option disabled selected value="">Select Sub District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select sub district.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm-city-corp" class="form-label">Municipality/Union/City Corporation
                           </label>
                           <input id="perm-city-corp" type="text" name="perm-city-corp" class="form-control" placeholder="Dinajpur" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter Municipality/Union/City Corporation.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm-post-code" class="form-label">Post Code</label>
                           <input id="perm-post-code" type="number" name="perm-post-code" class="form-control" placeholder="5200" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter zip/post code.</div>
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="perm-address" class="form-label">Address (Village, House, Road
                              Etc.)</label>
                           <textarea id="perm-address" name="perm-address" class="form-control" rows="2" required></textarea>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter address.</div>
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Previous Educational Information</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_division" class="form-label">Division</label>
                           <select id="pe_division" name="pe_division" class="form-select" required>
                              <option disabled selected value="">Select Division</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select division.</div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_district" class="form-label">District</label>
                           <select id="pe_district" name="pe_district" class="form-select" required>
                              <option disabled selected value="">Select District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select district.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_upozilla" class="form-label">Sub-District</label>
                           <select id="pe_upozilla" name="pe_upozilla" class="form-select" required>
                              <option disabled selected value="">Select Sub District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select sub district.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_board" class="form-label">Board</label>
                           <select id="pe_board" name="pe-board" class="form-select" required>
                              <option disabled selected value="">Select Board</option>
                              <option value="Barisal" class="text-uppercase">Barisal</option>
                              <option value="Chittagong" class="text-uppercase">Chittagong</option>
                              <option value="Dhaka" class="text-uppercase">Dhaka</option>
                              <option value="Comilla" class="text-uppercase">Comilla</option>
                              <option value="Dinajpur" class="text-uppercase">Dinajpur</option>
                              <option value="Jessore" class="text-uppercase">Jessore</option>
                              <option value="Mymensingh" class="text-uppercase">Mymensingh</option>
                              <option value="Rajshahi" class="text-uppercase">Rajshahi</option>
                              <option value="Sylhet" class="text-uppercase">Sylhet</option>
                              <option value="Bangladesh Madrasah Education Board" class="text-uppercase">
                                 Bangladesh Madrasah Education Board</option>
                              <option value="Bangladesh Technical Education Board" class="text-uppercase">
                                 Bangladesh Technical Education Board</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select education board.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-institute" class="form-label">Institute Name</label>
                           <input id="pe-institute" type="text" name="pe-institute" class="form-control" placeholder="Dinajpur Govt. College" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter institute name.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-passing-year" class="form-label">Passing Year</label>
                           <input id="pe-passing-year" type="number" name="pe-passing-year" class="form-control" placeholder="2015" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter passing year.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-gpa" class="form-label">GPA</label>
                           <input id="pe-gpa" type="number" name="pe-gpa" class="form-control" placeholder="4.00" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your CGPA.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-exam-name" class="form-label">Name of previous Exam:</label>
                           <input id="pe-exam-name" type="text" name="pe-exam-name" class="form-control" placeholder="SSC" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter previous exam name.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe-technology-trade" class="form-label">Technology/Trade</label>
                           <input id="pe-technology-trade" type="text" name="pe-technology-trade" class="form-control" placeholder="Computer Science"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select technology/trade.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe-roll" class="form-label">Roll</label>
                           <input id="pe-roll" type="number" name="pe-roll" class="form-control" placeholder="181457" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your roll no.</div>
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe-att-rate" class="form-label">Attendance rate:</label>
                           <input id="pe-att-rate" type="text" name="pe-att-rate" class="form-control disabled" value="75%" readonly="readonly"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter attendance rate.</div>
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Present Educational Information</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_division" class="form-label">Division</label>
                           <select id="ce_division" name="ce_division" class="form-select" required>
                              <option disabled selected value="">Select Division</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select division.</div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_district" class="form-label">District</label>
                           <select id="ce_district" name="ce_district" class="form-select" required>
                              <option disabled selected value="">Select District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select district.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_upozilla" class="form-label">Sub-District</label>
                           <select id="ce_upozilla" name="ce_upozilla" class="form-select" required>
                              <option disabled selected value="">Select Sub District</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select sub district.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce-institute-name" class="form-label">Institute Name</label>
                           <input id="ce-institute-name" type="text" name="ce-institute-name" class="form-control" placeholder="Textile Institute Dinajpur"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter institute name.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce-semester" class="form-label">Semester</label>
                           <select id="ce-semester" name="ce-semester" class="form-select" required>
                              <option selected disabled value="">Select Semester</option>
                              <option value="1st">1st</option>
                              <option value="2nd">2nd</option>
                              <option value="3rd">3rd</option>
                              <option value="4th">4th</option>
                              <option value="5th">5th</option>
                              <option value="6th">6th</option>
                              <option value="7th">7th</option>
                              <option value="8th">8th</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select your semester.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce-technology-trade" class="form-label">Technology/Trade</label>
                           <select id="ce-technology-trade" name="ce-technology-trade" class="form-select" required>
                              <option selected disabled value="">Select Technology/Trade</option>
                              <option value="textile">Textile</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select technology/trade.</div>
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-shift" class="form-label">Shift</label>
                           <select id="ce-shift" name="ce-shift" class="form-select" required>
                              <option selected disabled value="">Select shift</option>
                              <option value="morning">Morning</option>
                              <option value="day">Day</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select shift.</div>
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-group" class="form-label">Group</label>
                           <input id="ce-group" type="text" name="ce-group" class="form-control" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter group.</div>
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-roll" class="form-label">Roll</label>
                           <input id="ce-roll" type="number" name="ce-roll" class="form-control" placeholder="174213" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter roll.</div>
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce-reg" class="form-label">Registration</label>
                           <input id="ce-reg" type="number" name="ce-reg" class="form-control" placeholder="1500943651542" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter your reg no.</div>
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">Presents in Absence</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="relationship" class="form-label">Select Relationship</label>
                           <select id="relationship" name="relationship" class="form-select" required>
                              <option selected disabled value="">Select Relationship</option>
                              <option value="father">Father</option>
                              <option value="mother">Mother</option>
                              <option value="brother">Brother</option>
                              <option value="sister">Sister</option>
                              <option value="other">Other</option>
                           </select>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select relationship.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian-name-bangla" class="form-label">Guardian's Name (in
                              Bengali)</label>
                           <input id="guardian-name-bangla" type="text" name="guardian-name-bangla" class="form-control" placeholder="ফজলে রাব্বি"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter guardian's name in Bengali.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian-name-english" class="form-label">Guardian's Name (in
                              English)</label>
                           <input id="guardian-name-english" type="text" name="guardian-name-english" class="form-control" placeholder="Fazlay Rabbbi"
                              required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter guardian's name in English.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian-nid" class="form-label">Guardian's NID</label>
                           <input id="guardian-nid" type="text" name="guardian-nid" class="form-control" placeholder="123 456 6789" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter guardian's NID.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian-birth-date">Date of Birth</label>
                           <input id="guardian-birth-date" type="text" name="guardian-birth-date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select guardian's date of birth.</div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian-mobile">Guardian's Mobile Number</label>
                           <input id="guardian-mobile" type="number" class="form-control" placeholder="017xxxxxxxx" name="guardian-mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please enter guardian's mobile number.</div>
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
                                 <input id="cost-father" class="form-check-input" type="radio" name="cost-borne" value="Father" required>
                                 <label class="form-check-label" for="cost-father">Father</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-mother" class="form-check-input" type="radio" name="cost-borne" value="Mother" required>
                                 <label class="form-check-label" for="cost-mother">Mother</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-guardian" class="form-check-input" type="radio" name="cost-borne" value="Guardian" required>
                                 <label class="form-check-label" for="cost-guardian">Guardian</label>
                                 <div class="invalid-feedback">Please select who will borne your education cost.
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Applicant ethnic groups include</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-yes" class="form-check-input" type="radio" name="ethnic" value="yes" required>
                                 <label class="form-check-label" for="ethnic-yes">Yes</label>
                                 <div class="invalid-feedback">Please select ethnicity.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-no" class="form-check-input" type="radio" name="ethnic" value="no" checked required>
                                 <label class="form-check-label" for="ethnic-no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Freedom Fighter Quota</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ffq-yes" class="form-check-input" type="radio" name="ffq" value="yes" required>
                                 <label class="form-check-label" for="ffq-yes">Yes</label>
                                 <div class="invalid-feedback">Please select your freedom fighter quota
                                    availability.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ffq-no" class="form-check-input" type="radio" name="ffq" value="no" checked required>
                                 <label class="form-check-label" for="ffq-no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Any other Scholarship</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-yes" class="form-check-input" type="radio" name="scholarship" value="yes" required>
                                 <label class="form-check-label" for="scholarship-yes">Yes</label>
                                 <div class="invalid-feedback">Please select available scholarship.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-no" class="form-check-input" type="radio" name="scholarship" value="no" checked required>
                                 <label class="form-check-label" for="scholarship-no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">Physical Disabilities</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-yes" class="form-check-input" type="radio" name="disabilities" value="yes" required>
                                 <label class="form-check-label" for="disabilities-yes">Yes</label>
                                 <div class="invalid-feedback">Please select disabilities status.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-no" class="form-check-input" type="radio" name="disabilities" value="no" checked required>
                                 <label class="form-check-label" for="disabilities-no">No</label>
                              </div>
                           </div>
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
                                 <input id="payment-mobile" class="form-check-input" type="radio" name="payment-method" value="mobile-banking"
                                    checked="" required>
                                 <label class="form-check-label" for="payment-mobile">Mobile Banking</label>
                                 <div class="invalid-feedback">Please select payment method.</div>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="payment-bank" class="form-check-input" type="radio" name="payment-method" value="banking" required>
                                 <label class="form-check-label" for="payment-bank">Banking</label>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div id="payment-mobile-info" class="row">
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile-bank-provider">Mobile banking service
                                 providers</label>
                              <select id="mobile-bank-provider" name="mobile-bank-provider" class="form-select" required>
                                 <option selected disabled value="">Select Mobile Banking Service Provider
                                 </option>
                                 @foreach ($mobile_banks as $mobile_bank)
                                    <option value="{{ $mobile_bank }}" class="text-uppercase">
                                       {{ $mobile_bank }}</option>
                                 @endforeach
                              </select>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please select mobile banking service provider.</div>
                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile-bank-account">Mobile banking account
                                 number</label>
                              <input id="mobile-bank-account" type="number" class="form-control" name="mobile-bank-account" placeholder="017xxxxxxxx"
                                 required>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter mobile banking account number.</div>
                           </div>
                        </div>

                     </div>


                     <div id="payment-bank-info" class="row" style="display: none">
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-name">Bank Name</label>
                              <select id="bank-name" name="bank-name" class="form-select" required>
                                 <option selected disabled value="">Select Bank</option>
                                 @foreach ($banks as $bank)
                                    <option value="{{ $bank }}" class="text-uppercase">
                                       {{ $bank }}</option>
                                 @endforeach
                              </select>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please select bank name.</div>
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-branch">Branch</label>
                              <input id="bank-branch" type="text" class="form-control" name="bank-branch" placeholder="Dinajpur" required>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter branch.</div>
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-routing">Routing No.</label>
                              <input id="bank-routing" type="text" class="form-control" name="bank-routing" placeholder="070280676" required>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter bank routing number.</div>
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-type">Account Type</label>
                              <select id="bank-acc-type" name="bank-acc-type" class="form-select" required>
                                 <option selected disabled value="">Select Account Type</option>
                                 <option value="savings">Savings</option>
                                 <option value="current">Current</option>
                              </select>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please select account type.</div>
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-name">Account Holder Name</label>
                              <input id="bank-acc-name" type="text" class="form-control" name="bank-acc-name" placeholder="Shakil Ahmed" required>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter bank account holder name.</div>
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank-acc-number">Account Number</label>
                              <input id="bank-acc-number" type="number" class="form-control" name="bank-acc-number" placeholder="200154655xxxxx" required>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter bank account number.</div>
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
                           <input id="formal-photo" type="file" class="form-control" name="formal-photo" accept="image/png, image/jpeg, .jpg" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select your formal image.</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="signature">Select your Formal Photo</label>
                           <input id="signature" type="file" class="form-control" name="signature" accept="image/png, image/jpeg, .jpg" required>
                           <div class="valid-feedback">Looks good!</div>
                           <div class="invalid-feedback">Please select signature image.</div>
                        </div>
                     </div>



                     {{--                            submit button --}}
                     <div class="col-12 d-flex justify-content-center mt-2">
                        <a href="/" class="btn btn-outline-secondary waves-effect me-1">Back to Home</a>
                        <button type="reset" class="btn btn-outline-secondary me-1 waves-effect">Reset</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-12 px-4">
         <p class="text-center">
            Copyright © 2022 <a href="/">Textile Institute Dinajpur</a> | Powered by <a href="https://codebumble.net" rel="dofollow">Codebumble Inc.</a>
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
   <script src="{{ asset(mix('js/core/dropdowns.js')) }}"></script>
@endsection

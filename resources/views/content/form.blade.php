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
      <div class="col-12 d-flex align-items-md-center justify-content-center px-2 py-3">
         <div class="card w-lg-75 w-100">
            <div class="card-body font-solaimanlipi">
               <h2 class="card-title text-uppercase text-center">Student Database - Textile Institute Dinajpur</h2>
               <p class="text-warning text-center">ফর্মটি সঠিক তথ্য দিয়ে পূরণ করুন। প্রতিটি ফিল্ড অবশ্যই পূরণ করতে হবে।</p>
               <p class="fw-bold text-danger text-center">আপনার ইনপুটকৃত প্রতিটি তথ্য একাধিক ধাপে যাচাই করা হবে এবং সংরক্ষণ করা হবে।</p>
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
                        <div class="divider-text">ব‍্যক্তিগত তথ্য</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_name_bangla-column">শিক্ষার্থীর নাম (বাংলায়)</label>
                           <input type="text" id="student_name_bangla-column" class="form-control bn" placeholder="শাকিল আহমেদ" name="student_name_bangla"
                              required pattern="[\s\u0980-\u09FF]+$" value="{{ old('student_name_bangla') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার নামটি বাংলায় লিখুন।</div>
                           @error('student_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_name_english-column">শিক্ষার্থীর নাম (ইংরেজিতে)</label>
                           <input type="text" id="student_name_english-column" class="form-control" placeholder="Shakil Ahmed" name="student_name_english"
                              required value="{{ old('student_name_english') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার নামটি ইংরেজিতে লিখুন।</div>
                           @error('student_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth_certificate_number">জন্ম নিবন্ধন নম্বর</label>
                           <input type="text" id="birth_certificate_number" class="form-control" placeholder="20072722000000008" name="birth_certificate_number"
                              pattern="[0-9]{15,17}" required value="{{ old('birth_certificate_number') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে ইংরেজিতে আপনার জন্মনিবন্ধন নম্বরটি লিখুন।</div>
                           @error('birth_certificate_number')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="birth_date">জন্ম তারিখ</label>
                           <input type="text" id="birth_date" name="birth_date" class="form-control picker flatpickr-basic flatpickr-input active"
                              placeholder="YYYY-MM-DD" readonly="readonly" required value="{{ old('birth_date') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার জম্ন তারিখ নির্বাচন করুন।</div>
                           @error('birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="student_mobile">শিক্ষার্থীর মোবাইল নম্বর</label>
                           <input type="text" id="student_mobile" class="form-control" placeholder="017xxxxxxxx" name="student_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('student_mobile') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে শিক্ষার্থীর মোবাইল নম্বরটি লিখুন।</div>
                           @error('student_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="blood_group">রক্তের গ্রুপ</label>
                           <select name="blood_group" id="blood_group" class="form-select" required>
                              <option selected="" value="{{ old('blood_group') ? old('blood_group') : '' }}" {{ old('blood_group') ? '' : 'disabled' }}>
                                 {{ old('blood_group') ? old('blood_group') : 'Select your Blood group' }} </option>
                              <option value="A POSITIVE (A+)">A POSITIVE (A+)</option>
                              <option value="A NEGATIVE (A-)">A NEGATIVE (A-)</option>
                              <option value="B POSITIVE (B+)">B POSITIVE (B+)</option>
                              <option value="B NEGATIVE (B-)">B NEGATIVE (B-)</option>
                              <option value="O POSITIVE (O+)">O POSITIVE (O+)</option>
                              <option value="O NEGATIVE (O-)">O NEGATIVE (O-)</option>
                              <option value="AB POSITIVE (AB+)">AB POSITIVE (AB+)</option>
                              <option value="AB NEGATIVE (AB-)">AB NEGATIVE (AB-)</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার রক্তের গ্রুপ নির্বাচন করুন।</div>
                           @error('blood_group')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">লিঙ্গ</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="male" class="form-check-input" type="radio" name="gender" value="MALE" required
                                    {{ old('gender') == 'male' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="male">ছেলে</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="female" class="form-check-input" type="radio" name="gender" value="FEMALE" required
                                    {{ old('gender') == 'female' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="female">মেয়ে</label>
                              </div>

                           </div>
                           @error('gender')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label">বৈবাহিক অবস্থা</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="married" class="form-check-input" type="radio" name="marital_status" value="MARRIED" required
                                    {{ old('marital_status') == 'married' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="married">বিবাহিত</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="unmarried" class="form-check-input" type="radio" name="marital_status" value="UNMARRIED" required
                                    {{ old('marital_status') == 'unmarried' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="unmarried">অবিবাহিত</label>
                              </div>

                           </div>
                           @error('marital_status')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>




                     <div class="divider divider-primary">
                        <div class="divider-text">পিতা-মাতার তথ্য</div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_name_bangla-column">পিতার নাম (বাংলায়)</label>
                           <input type="text" id="father_name_bangla-column" class="form-control bn" placeholder="সাইমন হাসান সানি"
                              name="father_name_bangla" pattern="[\s\u0980-\u09FF]+$" required value="{{ old('father_name_bangla') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে বাংলায় আপনার পিতার নাম লিখুন।</div>
                           @error('father_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_name_english-column">পিতার নাম (ইংরেজিতে)</label>
                           <input type="text" id="father_name_english-column" class="form-control" placeholder="Saimon Hasan Sunny"
                              name="father_name_english" required value="{{ old('father_name_english') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পিতার নাম ইংরেজিতে লিখুন।</div>
                           @error('father_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_name_bangla-column">মাতার নাম (বাংলায়)</label>
                           <input type="text" id="mother_name_bangla-column" class="form-control bn" placeholder="তটিনি" name="mother_name_bangla" required
                              pattern="[\s\u0980-\u09FF]+$" value="{{ old('mother_name_bangla') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে বাংলায় আপনার মাতার নাম লিখুন।</div>
                           @error('mother_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_name_english-column">মাতার নাম (ইংরেজিতে)</label>
                           <input type="text" id="mother_name_english-column" class="form-control" placeholder="Totini" name="mother_name_english" required
                              value="{{ old('mother_name_english') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে ইংরেজিতে আপনার মাতার নাম লিখুন।</div>
                           @error('mother_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_nid">পিতার NID নম্বর</label>
                           <input type="text" id="father_nid" class="form-control" placeholder="132 456 6789" name="father_nid" required
                              pattern="[0-9]{10,18}" value="{{ old('father_nid') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পিতার NID নম্বরটি লিখুন।</div>
                           @error('father_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_nid">মাতার NID নম্বর</label>
                           <input type="text" id="mother_nid" class="form-control" placeholder="132 456 6789" name="mother_nid" required
                              pattern="[0-9]{10,18}" value="{{ old('mother_nid') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার মাতার NID নম্বরটি লিখুন।</div>
                           @error('mother_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_birth_date">পিতার জন্ম তারিখ</label>
                           <input type="text" id="father_birth_date" name="father_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('father_birth_date') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পিতার জন্ম তারিখ নির্বাচন করুন।</div>
                           @error('father_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_birth_date">মাতার জন্ম তারিখ</label>
                           <input type="text" id="mother_birth_date" name="mother_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('mother_birth_date') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার মাতার জন্ম তারিখ নির্বাচন করুন।</div>
                           @error('mother_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="father_mobile">পিতার মোবাইল নম্বর</label>
                           <input type="text" id="father_mobile" class="form-control" placeholder="017xxxxxxxx" name="father_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('father_mobile') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পিতার মোবাইল নম্বরটি লিখুন।</div>
                           @error('father_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="mother_mobile">মাতার মোবাইল নম্বর</label>
                           <input type="text" id="mother_mobile" class="form-control" placeholder="017xxxxxxxx" name="mother_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('mother_mobile') }}">
                           <div class="invalid-feedback">অনুগ্রহ করে আপনার মাতার মোবাইল নম্বরটি লিখুন।</div>
                           @error('mother_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">বর্তমান ঠিকানা</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_division" class="form-label">বিভাগ</label>
                           <select name="pres_division" id="pres_division" class="form-select" required>
                              <option {{ old('pres_division') ? '' : 'disabled' }} selected value="{{ old('pres_division') }}">
                                 {{ old('pres_division') ? old('pres_division') : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">বিভাগ নির্বাচন করুন।</div>
                           @error('pres_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_district" class="form-label">জেলা</label>
                           <select name="pres_district" id="pres_district" class="form-select" required>
                              <option {{ old('pres_division') ? '' : 'disabled' }} selected value="{{ old('pres_district') }}">
                                 {{ old('pres_district') ? old('pres_district') : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">জেলা নির্বাচন করুন।</div>
                           @error('pres_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pres_upozilla" class="form-label">উপজেলা</label>
                           <select name="pres_upozilla" id="pres_upozilla" class="form-select" required>
                              <option {{ old('pres_upozilla') ? '' : 'disabled' }} selected value="{{ old('pres_upozilla') }}">
                                 {{ old('pres_upozilla') ? old('pres_upozilla') : 'Select Sub District' }}</option>
                           </select>

                           <div class="invalid-feedback">উপজেলা নির্বাচন করুন।</div>
                           @error('pres_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres_city_corp" class="form-label">পৌরসভা/সিটি কর্পোরেশন/ইউনিয়ন</label>
                           <input type="text" name="pres_city_corp" id="pres_city_corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ old('pres_city_corp') }}">

                           <div class="invalid-feedback">আপনার পৌরসভা/সিটি কর্পোরেশন/ইউনিয়ন লিখুন।</div>
                           @error('pres_city_corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pres_post_code" class="form-label">পোষ্ট কোড</label>
                           <input type="text" name="pres_post_code" id="pres_post_code" class="form-control" placeholder="5200" required
                              pattern="[0-9]{4}" value="{{ old('pres_post_code') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে পোষ্ট কোড লিখুন।</div>
                           @error('pres_post_code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="pres_address" class="form-label">ঠিকানা (গ্রাম, বাসা, রাস্তা.)</label>
                           <textarea name="pres_address" id="pres_address" class="form-control" rows="2" required>{{ old('pres_address') }}</textarea>

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার ঠিকানা লিখুন।</div>
                           @error('pres_address')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">স্থায়ী ঠিকানা</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_division" class="form-label">বিভাগ</label>
                           <select name="perm_division" id="perm_division" class="form-select" required>
                              <option {{ old('perm_division') ? '' : 'disabled' }} selected value="{{ old('perm_division') }}">
                                 {{ old('perm_division') ? old('perm_division') : 'Select Division' }} </option>
                           </select>

                           <div class="invalid-feedback">বিভাগ নির্বাচন করুন</div>
                           @error('perm_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_district" class="form-label">জেলা</label>
                           <select name="perm_district" id="perm_district" class="form-select" required>
                              <option {{ old('perm_district') ? '' : 'disabled' }} selected value="{{ old('perm_district') }}">
                                 {{ old('perm_district') ? old('perm_district') : 'Select District' }} </option>
                              </option>
                           </select>

                           <div class="invalid-feedback">জেলা নির্বাচন করুন।</div>
                           @error('perm_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="perm_upozilla" class="form-label">উপজেলা</label>
                           <select name="perm_upozilla" id="perm_upozilla" class="form-select" required>
                              <option {{ old('perm_upozilla') ? '' : 'disabled' }} selected value="{{ old('perm_upozilla') }}">
                                 {{ old('perm_upozilla') ? old('perm_upozilla') : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">উপজেলা নির্বাচন করুন।</div>
                           @error('perm_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm_city_corp" class="form-label">পৌরসভা/সিটি কর্পোরেশন/ইউনিয়ন </label>
                           <input type="text" name="perm_city_corp" id="perm_city_corp" class="form-control" placeholder="Dinajpur" required
                              value="{{ old('perm_city_corp') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পৌরসভা/সিটি কর্পোরেশন/ইউনিয়ন লিখুন।</div>
                           @error('perm_city_corp')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="perm_post_code" class="form-label">পোষ্ট কোড</label>
                           <input type="text" name="perm_post_code" id="perm_post_code" class="form-control" placeholder="5200" required
                              pattern="[0-9]{4}" value="{{ old('perm_post_code') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার পোষ্ট কোড লিখুন।</div>
                           @error('perm_post_code')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-12">
                        <div class="mb-1">
                           <label for="perm_address" class="form-label">ঠিকানা (গ্রাম, বাসা, রাস্তা.)</label>
                           <textarea name="perm_address" id="perm_address" class="form-control" rows="2" required>{{ old('perm_address') }}</textarea>

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার ঠিকানা লিখুন।</div>
                           @error('perm_address')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">পূর্ববর্তী শিক্ষা তথ্য</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_division" class="form-label">বিভাগ</label>
                           <select name="pe_division" id="pe_division" class="form-select" required>
                              <option {{ old('pe_division') ? '' : 'disabled' }} selected value="{{ old('pe_division') }}">
                                 {{ old('pe_division') ? old('pe_division') : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">বিভাগ নির্বাচন করুন।</div>
                           @error('pe_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_district" class="form-label">জেলা</label>
                           <select name="pe_district" id="pe_district" class="form-select" required>
                              <option {{ old('pe_district') ? '' : 'disabled' }} selected value="{{ old('pe_district') }}">
                                 {{ old('pe_district') ? old('pe_district') : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">জেলা নির্বাচন করুন।</div>
                           @error('pe_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_upozilla" class="form-label">উপজেলা</label>
                           <select name="pe_upozilla" id="pe_upozilla" class="form-select" required>
                              <option {{ old('pe_upozilla') ? '' : 'disabled' }} selected value="{{ old('pe_upozilla') }}">
                                 {{ old('pe_upozilla') ? old('pe_upozilla') : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">উপজেলা নির্বাচন করুন।</div>
                           @error('pe_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_board" class="form-label">বোর্ড</label>
                           <select name="pe_board" id="pe_board" class="form-select" required>
                              <option {{ old('pe_board') ? '' : 'disabled' }} selected value="{{ old('pe_board') }}">
                                 {{ old('pe_board') ? old('pe_board') : 'Select Board' }}
                              </option>
                              <option value="BARISAL" class="text-uppercase">BARISAL</option>
                              <option value="CHITTAGONG" class="text-uppercase">CHITTAGONG</option>
                              <option value="DHAKA" class="text-uppercase">DHAKA</option>
                              <option value="COMILLA" class="text-uppercase">COMILLA</option>
                              <option value="DINAJPUR" class="text-uppercase">DINAJPUR</option>
                              <option value="JESSORE" class="text-uppercase">JESSORE</option>
                              <option value="MYMENSINGH" class="text-uppercase">MYMENSINGH</option>
                              <option value="RAJSHAHI" class="text-uppercase">RAJSHAHI</option>
                              <option value="SYLHET" class="text-uppercase">SYLHET</option>
                              <option value="BANGLADESH MADRASAH EDUCATION BOARD" class="text-uppercase">BANGLADESH MADRASAH EDUCATION BOARD</option>
                              <option value="BANGLADESH TECHNICAL EDUCATION BOARD" class="text-uppercase">BANGLADESH TECHNICAL EDUCATION BOARD</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে বোর্ড নির্বাচন করুন।</div>
                           @error('pe_board')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_institute" class="form-label">প্রতিষ্ঠানের নাম</label>
                           <input type="text" name="pe_institute" id="pe_institute" class="form-control" placeholder="Dinajpur Govt. College" required
                              value="{{ old('pe_institute') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে প্রতিষ্ঠানের নাম লিখুন।</div>
                           @error('pe_institute')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_passing_year" class="form-label">উর্তীন্ন হওয়ার বছর</label>
                           <select type="number" name="pe_passing_year" id="pe_passing_year" class="form-select" required>
                              <option {{ old('pe_passing_year') ? '' : 'disabled' }} selected value="{{ old('pe_passing_year') }}">
                                 {{ old('pe_passing_year') ? old('pe_passing_year') : 'Select Passing Year' }}
                              </option>
                              @for ($i = 2001; $i <= date('Y'); $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে উত্তীর্ণ হওয়ার বছর নির্বাচন করুন।</div>
                           @error('pe_passing_year')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_gpa" class="form-label">জিপিএ</label>
                           <input type="text" name="pe_gpa" id="pe_gpa" class="form-control" placeholder="4.00" required
                              value="{{ old('pe_gpa') }}">

                           <div class="invalid-feedback">আপনার জিপিএ লিখুন।</div>
                           @error('pe_gpa')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_exam_name" class="form-label">পূর্ববর্তী পরীক্ষার নাম</label>
                           <input type="text" name="pe_exam_name" id="pe_exam_name" class="form-control" placeholder="SSC" required
                              value="{{ old('pe_exam_name') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে পূর্ববর্তী পরীক্ষার নাম লিখুন।</div>
                           @error('pe_exam_name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="pe_technology_trade" class="form-label">টেকনোলজি/ট্রেড</label>
                           <input type="text" name="pe_technology_trade" id="pe_technology_trade" class="form-control" placeholder="Computer Science"
                              required value="{{ old('pe_technology_trade') }}">

                           <div class="invalid-feedback">টেকনোলজি/ট্রেড নির্বাচন করুন।</div>
                           @error('pe_technology_trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe_roll" class="form-label">রোল</label>
                           <input type="number" name="pe_roll" id="pe_roll" class="form-control" placeholder="181457" required
                              value="{{ old('pe_roll') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে রোল লিখুন।</div>
                           @error('pe_roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label for="pe_att_rate" class="form-label">উপস্থিতির হার</label>
                           <input type="text" name="pe_att_rate" id="pe_att_rate" class="form-control disabled" value="75%" readonly="readonly"
                              required value="{{ old('pe_att_rate') }}">

                           <div class="invalid-feedback">এটি প্রতিষ্ঠান কর্তৃক পূরণীয়।</div>
                           @error('pe_att_rate')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">বর্তমান শিক্ষা তথ্য</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_division" class="form-label">বিভাগ</label>
                           <select name="ce_division" id="ce_division" class="form-select" required>
                              <option {{ old('ce_division') ? '' : 'disabled' }} selected value="{{ old('ce_division') }}">
                                 {{ old('ce_division') ? old('ce_division') : 'Select Division' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">বিভাগ নির্বাচন করুন।</div>
                           @error('ce_division')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_district" class="form-label">জেলা</label>
                           <select name="ce_district" id="ce_district" class="form-select" required>
                              <option {{ old('ce_district') ? '' : 'disabled' }} selected value="{{ old('ce_district') }}">
                                 {{ old('ce_district') ? old('ce_district') : 'Select District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">জেলা নির্বাচন করুন।</div>
                           @error('ce_district')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="ce_upozilla" class="form-label">উপজেলা নির্বাচন করুন।</label>
                           <select name="ce_upozilla" id="ce_upozilla" class="form-select" required>
                              <option {{ old('ce_upozilla') ? '' : 'disabled' }} selected value="{{ old('ce_upozilla') }}">
                                 {{ old('ce_upozilla') ? old('ce_upozilla') : 'Select Sub-District' }}
                              </option>
                           </select>

                           <div class="invalid-feedback">উপজেলা নির্বাচন করুন।</div>
                           @error('ce_upozilla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_institute_name" class="form-label">প্রতিষ্ঠানের নাম</label>
                           <input type="text" name="ce_institute_name" id="ce_institute_name" class="form-control" placeholder="Textile Institute Dinajpur"
                              required value="{{ old('ce_institute_name') }}">

                           <div class="invalid-feedback">প্রতিষ্ঠানের নাম লিখুন।</div>
                           @error('ce_institute_name')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_semester" class="form-label">সেমিস্টার</label>
                           <select name="ce_semester" id="ce_semester" class="form-select" required>
                              <option selected {{ old('ce_semester') ? '' : 'disabled' }} value="{{ old('ce_semester') }}">
                                 {{ old('ce_semester') ? old('ce_semester') : 'Select Semester' }}
                              </option>
                              <option value="1ST">1ST</option>
                              <option value="2ND">2ND</option>
                              <option value="3RD">3RD</option>
                              <option value="4TH">4TH</option>
                              <option value="5TH">5TH</option>
                              <option value="6TH">6TH</option>
                              <option value="7TH">7TH</option>
                              <option value="8TH">8TH</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে সেমিষ্টার নির্বাচন করুন।</div>

                           @error('ce_semester')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_technology_trade" class="form-label">টেকনোলজি/ট্রেড</label>
                           <select name="ce_technology_trade" id="ce_technology_trade" class="form-select" required>
                              <option selected {{ old('ce_technology_trade') ? '' : 'disabled' }} value="{{ old('ce_technology_trade') }}">
                                 {{ old('ce_technology_trade') ? old('ce_technology_trade') : 'Select Technology/Trade' }}
                              </option>
                              <option value="TEXTILE MACHINE DESIGN & MAINTENANCE">TEXTILE MACHINE DESIGN & MAINTENANCE</option>
                              <option value="YARN MANUFACTURING">YARN MANUFACTURING</option>
                              <option value="WET PROCESSING">WET PROCESSING</option>
                              <option value="APPAREL MANUFACTURING">APPAREL MANUFACTURING</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে টেকনোলজি/ট্রেড নির্বাচন করুন।</div>
                           @error('ce_technology_trade')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_session" class="form-label">সেশন বছর</label>
                           <input type="text" id="ce_session" name="ce_session" class="form-control" required placeholder="18-19" pattern="\d{2}-\d{2}"
                              value="{{ old('ce_session') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার সেশন বছর লিখুন।</div>
                           @error('ce_session')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_shift" class="form-label">শিফট</label>
                           <select name="ce_shift" id="ce_shift" class="form-select" required>
                              <option selected {{ old('ce_shift') ? '' : 'disabled' }} value="{{ old('ce_shift') }}">
                                 {{ old('ce_shift') ? old('ce_shift') : 'Select Shift' }}
                              </option>
                              <option value="MORNING">MORNING</option>
                              <option value="DAY">DAY</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে শিফট নির্বাচন করুন।</div>
                           @error('ce_shift')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_group" class="form-label">গ্রুপ</label>
                           <input type="text" id="ce_group" name="ce_group" class="form-control" required value="{{ old('ce_group') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে গ্রুপ লিখুন।</div>
                           @error('ce_group')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_roll" class="form-label">রোল</label>
                           <input type="number" id="ce_roll" name="ce_roll" class="form-control" placeholder="174213" required
                              value="{{ old('ce_roll') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে রোল লিখুন।</div>
                           @error('ce_roll')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <label for="ce_reg" class="form-label">রেজিস্ট্রেশন নং</label>
                           <input type="number" id="ce_reg" name="ce_reg" class="form-control" placeholder="1500943651542" required
                              value="{{ old('ce_reg') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে রেজিস্ট্রেশন নং লিখুন।</div>
                           @error('ce_reg')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">পিতা-মাতার অনুপস্থিতিতে অভিভাবক</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="relationship" class="form-label">অভিভাবকের সাথে সম্পর্ক</label>
                           <select name="relationship" id="relationship" class="form-select" required>
                              <option selected {{ old('relationship') ? '' : 'disabled' }} value="{{ old('relationship') }}">
                                 {{ old('relationship') ? old('relationship') : 'Select Relationship' }}
                              </option>
                              <option value="FATHER">FATHER</option>
                              <option value="MOTHER">MOTHER</option>
                              <option value="BROTHER">BROTHER</option>
                              <option value="SISTER">SISTER</option>
                              <option value="OTHER">OTHER</option>
                           </select>

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের সাথে সম্পর্ক নির্বাচন করুন।</div>
                           @error('relationship')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_name_bangla" class="form-label">অভিভাবকের নাম (বাংলায়)</label>
                           <input type="text" id="guardian_name_bangla" name="guardian_name_bangla" class="form-control bn" placeholder="ফজলে রাব্বি"
                              required pattern="[\s\u0980-\u09FF]+$" value="{{ old('guardian_name_bangla') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের নাম বাংলায় লিখুন।</div>
                           @error('guardian_name_bangla')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_name_english" class="form-label">অভিভাবকের নাম (ইংরেজিতে)</label>
                           <input type="text" id="guardian_name_english" name="guardian_name_english" class="form-control" placeholder="Fazlay Rabbbi"
                              required value="{{ old('guardian_name_english') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের নাম ইংরেজিতে লিখুন।</div>
                           @error('guardian_name_english')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label for="guardian_nid" class="form-label">অভিভাবকের NID নং</label>
                           <input type="text" id="guardian_nid" name="guardian_nid" class="form-control" placeholder="123 456 6789" required
                              pattern="[0-9]{10,18}" value="{{ old('guardian_nid') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের NID নং লিখুন।</div>
                           @error('guardian_nid')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian_birth_date">অভিভাবকের জন্ম তারিখ</label>
                           <input type="text" id="guardian_birth_date" name="guardian_birth_date"
                              class="form-control picker flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" required
                              value="{{ old('guardian_birth_date') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের জন্ম তারিখ লিখুন।</div>
                           @error('guardian_birth_date')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="guardian_mobile">অভিভাবকের মোবাইল নং</label>
                           <input type="text" id="guardian_mobile" class="form-control" placeholder="017xxxxxxxx" name="guardian_mobile"
                              pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required value="{{ old('guardian_mobile') }}">

                           <div class="invalid-feedback">অনুগ্রহ করে অভিভাবকের মোবাইল নং লিখুন।</div>
                           @error('guardian_mobile')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror

                        </div>
                     </div>

                     <div class="divider divider-primary">
                        <div class="divider-text">যোগ্যতার শর্ত এবং সংযুক্তি</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">পড়াশোনার খরচ বহন করবে - </label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="cost-father" class="form-check-input" type="radio" name="cost_borne" value="FATHER" required
                                    {{ old('cost_borne') == 'Father' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-father">Father</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-mother" class="form-check-input" type="radio" name="cost_borne" value="MOTHER" required
                                    {{ old('cost_borne') == 'Mother' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cost-mother">Mother</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="cost-guardian" class="form-check-input" type="radio" name="cost_borne" value="GUARDIAN" required
                                    {{ old('cost_borne') == 'Guardian' ? 'checked' : '' }}>
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
                           <label class="form-label">ক্ষুদ্র নৃ-গোষ্ঠীর অন্তর্ভুক্ত -</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-yes" class="form-check-input" type="radio" name="ethnic" value="YES" required
                                    {{ old('ethnic') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ethnic-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ethnic-no" class="form-check-input" type="radio" name="ethnic" value="NO" required
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
                           <label class="form-label">মুক্তিযোদ্ধা প্রজন্ম -</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="ffq-yes" class="form-check-input" type="radio" name="ffq" value="YES" required
                                    {{ old('ffq') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="ffq-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="ffq-no" class="form-check-input" type="radio" name="ffq" value="NO" required
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
                           <label class="form-label">অন্য কোনো বৃত্তি/উপবৃত্তি পান?</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-yes" class="form-check-input" type="radio" name="scholarship" value="YES" required
                                    {{ old('scholarship') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="scholarship-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="scholarship-no" class="form-check-input" type="radio" name="scholarship" value="NO" required
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
                           <label class="form-label">কোনো শারীরিক প্রতিবন্ধকতা আছে?</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-yes" class="form-check-input" type="radio" name="disabilities" value="YES" required
                                    {{ old('disabilities') == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="disabilities-yes">Yes</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="disabilities-no" class="form-check-input" type="radio" name="disabilities" value="NO" required
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
                        <div class="divider-text">পেমেন্টের বিবরণ</div>
                     </div>

                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                           <label class="form-label">পেমেন্ট মেথড</label>
                           <div class="demo-inline-spacing">
                              <div class="form-check form-check-inline">
                                 <input id="payment-mobile" class="form-check-input" type="radio" name="payment_method" value="MOBILE BANKING" required
                                    checked {{ old('payment_method') == 'mobile-banking' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="payment-mobile">Mobile Banking</label>

                              </div>
                              <div class="form-check form-check-inline">
                                 <input id="payment-bank" class="form-check-input" type="radio" name="payment_method" value="BANKING" required
                                    {{ old('payment_method') == 'banking' ? 'checked' : '' }}>
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
                              <label class="form-label" for="mobile_bank_provider">মোবাইল ব্যাংকিং সেবাদানকারী প্রতিষ্ঠান</label>
                              <select name="mobile_bank_provider" id="mobile_bank_provider" class="form-select mobile-unchecked">
                                 <option selected {{ old('mobile_bank_provider') ? '' : 'disabled' }} value="{{ old('mobile_bank_provider') }}">
                                    {{ old('mobile_bank_provider') ? old('mobile_bank_provider') : 'Select mobile banking service provider' }}
                                 </option>
                                 @foreach ($mobile_banks as $mobile_bank)
                                    <option value="{{ $mobile_bank }}" class="text-uppercase">{{ $mobile_bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">অনুগ্রহ করে মোবাইল ব্যাংকিং সেবাদানকারী প্রতিষ্ঠান নির্বাচন করুন।</div>
                              @error('mobile_bank_provider')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror

                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile_bank_account">মোবাইল ব্যাংকিং এর মোবাইল নম্বর</label>
                              <input type="text" id="mobile_bank_account" class="form-control mobile-unchecked" name="mobile_bank_account"
                                 placeholder="017xxxxxxxx" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" value="{{ old('mobile_bank_account') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে মোবাইল ব্যাংকিং এর মোবাইল নম্বরটি লিখুন।</div>
                              @error('mobile_bank_account')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile_bank_account_holder">এ্যাকাউন্টধারীর নাম</label>
                              <input type="text" id="mobile_bank_account_holder" class="form-control" name="mobile_bank_account_holder"
                                 placeholder="Abdus Salam" value="{{ old('mobile_bank_account_holder') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে মোবাইল ব্যাংকিং এ্যাকাউন্টধারীর নাম লিখুন।</div>
                              @error('mobile_bank_account_holder')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror

                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="mobile_bank_holder_nid">এ্যাকাউন্টধারীর NID নম্বর</label>
                              <input type="text" id="mobile_bank_holder_nid" class="form-control" name="mobile_bank_holder_nid" placeholder="123 123 1234"
                                 pattern="[0-9]{9,20}" value="{{ old('mobile_bank_holder_nid') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে মোবাইল ব্যাংকিং এ্যাকাউন্টধারীর NID নম্বরটি লিখুন।</div>
                              @error('mobile_bank_holder_nid')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>

                     </div>


                     <div id="payment-bank-info" class="row" style="display: none">
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_name">ব্যাংকের নাম</label>
                              <select name="bank_name" id="bank_name" class="form-select banking-unchecked" required>
                                 <option selected {{ old('bank_name') ? '' : 'disabled' }} value="{{ old('bank_name') }}">
                                    {{ old('bank_name') ? old('bank_name') : 'Select Bank' }}
                                 </option>
                                 @foreach ($banks as $bank)
                                    <option value="{{ $bank }}" class="text-uppercase">{{ $bank }}</option>
                                 @endforeach
                              </select>

                              <div class="invalid-feedback">অনুগ্রহ করে ব্যাংক নির্বাচন করুন।</div>
                              @error('bank_name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_branch">ব্রাঞ্চ</label>
                              <input type="text" id="bank_branch" class="form-control banking-unchecked" name="bank_branch" placeholder="Dinajpur" required
                                 value="{{ old('bank_branch') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে ব্রাঞ্চ এর নাম লিখুন।</div>
                              @error('bank_branch')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_routing">রাউটিং নং</label>
                              <input type="text" id="bank_routing" class="form-control banking-unchecked" name="bank_routing" placeholder="070280676"
                                 required value="{{ old('bank_routing') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে ব্যাংকিং রাউট নং লিখুন।</div>
                              @error('bank_routing')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_type">এ্যাকাউন্ট এর ধরন</label>
                              <select name="bank_acc_type" id="bank_acc_type" class="form-select banking-unchecked" required>
                                 <option selected {{ old('bank_acc_type') ? '' : 'disabled' }} value="{{ old('bank_acc_type') }}">
                                    {{ old('bank_acc_type') ? old('bank_acc_type') : 'Select Account Type' }}
                                 </option>
                                 <option value="SAVINGS">SAVINGS</option>
                                 <option value="CURRENT">CURRENT</option>
                              </select>

                              <div class="invalid-feedback">এ্যাকাউন্ট এর ধরন নির্বাচন করুন।</div>
                              @error('bank_acc_type')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_name">এ্যাকাউন্টধারীর নাম</label>
                              <input type="text" id="bank_acc_name" class="form-control banking-unchecked" name="bank_acc_name"
                                 placeholder="Shakil Ahmed" required value="{{ old('bank_acc_name') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে এ্যাকাউন্ট ধারীর নাম লিখুন।</div>
                              @error('bank_acc_name')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-12">
                           <div class="mb-1">
                              <label class="form-label" for="bank_acc_number">এ্যাকাউন্ট নম্বর</label>
                              <input type="number" id="bank_acc_number" class="form-control banking-unchecked" name="bank_acc_number"
                                 placeholder="200154655xxxxx" required value="{{ old('bank_acc_number') }}">

                              <div class="invalid-feedback">অনুগ্রহ করে এ্যাকাউন্ট নম্বর লিখুন।</div>
                              @error('bank_acc_number')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                     </div>


                     <div class="divider divider-primary">
                        <div class="divider-text">ছবি এবং স্বাক্ষর</div>
                     </div>
                     <p class="text-warning fw-bold">প্রতিটি ছবির সর্বোচ্চ সাইজ ৫১২ কিলোবাইট।</p>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="formal-photo">আপনার ফরমাল ছবি সিলেক্ট করুন।</label>
                           <input type="file" id="formal-photo" class="form-control" name="formal_image" accept="image/png, image/jpeg, .jpg"
                              required>

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার ফরমাল ছবি সিলেক্ট করুন।</div>
                           @error('formal-photo')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                           <label class="form-label" for="signature">স্বাক্ষরের ছবি সিলেক্ট করুন।</label>
                           <input type="file" id="signature" class="form-control" name="signature_image" accept="image/png, image/jpeg, .jpg"
                              required>

                           <div class="invalid-feedback">অনুগ্রহ করে আপনার স্বাক্ষরের ছবি সিলেক্ট করুন।</div>
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
   <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
   <!-- Page js files -->
   <script src="{{ asset(mix('js/scripts/forms/pickers/student-form-pickers.js')) }}"></script>
   <script src="{{ asset(mix('js/core/forms.js')) }}"></script>

@endsection

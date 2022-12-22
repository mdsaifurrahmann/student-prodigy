<html lang="bn">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >


   <style>

      @font-face {
         font-family: 'Nikosh';
         src: url({{ storage_path('fonts\Nikosh.ttf') }}) format("truetype");
         font-style: normal;
         font-weight: normal;
      }

      @page{
         margin: 2rem;
      }

      .bold{
         font-weight: bold;
      }

      table{
         border: 1px solid black;
         border-collapse: collapse;
         font-size: 18px;
         width: 70%;
      }

      .text-center {
         text-align: center;
      }

      th{
         border: 1px solid black;
         text-align: left;
         padding: .3rem;
         width: 40%;
         font-weight: normal;
         text-transform: uppercase;
      }



      tr{

      }

      td{
         border: 1px solid black;
         padding: 0.3rem;
         text-transform: uppercase;
         width: 60%;
      }


      .bn{
         font-family: solaimanlipi;
         font-weight: normal;
      }

      .my-2{
         margin: 2rem 0;
      }

      .table-borderless{
         border: none;
      }

      .table-borderless td,
      .table-borderless th,
      .table-borderless tr{
         border: none;
      }

      .page-break {
         page-break-after: always;
      }

      #header{
         margin: .2rem;
      }

   </style>


</head>
<body>


<div class="container-lg">
   <div class="row" id="table-responsive" style="margin: 0 auto">
      <div class="col-12">

         <div class="card">
            <div class="card-body">
               <h2 class="card-title text-uppercase mb-0 text-center">Student Database - Textile Institute
                  Dinajpur</h2>
            </div>
         </div>
         <div class="table-responsive">
            <table class="table-bordered table">
               <tr>
                  <th colspan="4" class="text-center bold">Personal Information</th>
               </tr>
               <tr>
                  <th class="w-25 bn">শিক্ষার্থীর নাম (বাংলা)</th>
                  <td
                     colspan="2" class="bn">{{ !Request::get('StudentNameBengali') ? $applicant->student_name_bangla :
                      ''
                     }}</td>
                  <td rowspan="5">
                     <img src="{{public_path('/student-images/formal-images/'. $applicant->formal_image_path)}}"
                          alt="" class="w-100" width="200" height="200" style="margin: 0 3rem">
                  </td>
               </tr>
               <tr>
                  <th class="w-25">Student's Name (English):</th>
                  <td colspan="2">{{ !Request::get('StudentName') ? $applicant->student_name_english : '' }}</td>

               </tr>
               <tr>
                  <th class="w-25">Birth Certificate Number:</th>
                  <td
                     colspan="2">{{ !Request::get('BirthCertificateNumber') ? $applicant->birth_certificate_number : '' }}</td>

               </tr>
               <tr>
                  <th class="w-25">Birth Date:</th>
                  <td colspan="2">{{ !Request::get('BirthDate') ? $applicant->birth_date : '' }}</td>

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
                  <td class="bn">{{ !Request::get('FathersNameBengali') ? $applicant->father_name_bangla : '' }}</td>
                  <th class="w-25">Mother's Name (Bengali):</th>
                  <td>{{ !Request::get('MothersNameBengali') ? $applicant->mother_name_bangla : '' }}</td>
               </tr>
               <tr>
                  <th class="w-25">Father's Name (English):</th>
                  <td>{{ !Request::get('FathersName') ? $applicant->father_name_english : '' }}</td>
                  <th class="w-25">Mother's Name (English):</th>
                  <td>{{ !Request::get('MothersName') ? $applicant->mother_name_english : '' }}</td>
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
               <tr>
                  <th colspan="2" class="text-center bold">Permanent Address</th>
                  <th colspan="2" class="text-center bold">Present Address</th>
               </tr>
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
               <tr>
                  <th colspan="2" class="text-center bold">Previous Educational Information</th>
                  <th colspan="2" class="text-center bold">Present Educational Information</th>
               </tr>
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
                  <td>{{ !Request::get('Technology') ? $applicant->ce_technology_trade : '' }} </td>
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
                  <td>{{ !Request::get('Roll') ? $applicant->ce_roll : '' }} </td>
               </tr>
               <tr>
                  <th class="w-25">Roll:</th>
                  <td>{{ !Request::get('PreviousExamRoll') ? $applicant->pe_roll : '' }} </td>
                  <th class="w-25">Reg:</th>
                  <td>{{ !Request::get('Reg') ? $applicant->ce_reg : '' }}</td>
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
               <tr>
                  <th colspan="2" class="text-center bold">Guardian's Information</th>
                  <th colspan="2" class="text-center bold">Eligibility Conditions and Attachment</th>
               </tr>
               <tr>
                  <th class="w-25">Relation:</th>
                  <td>{{ !Request::get('RelationshipwithGuardian') ? $applicant->relationship : '' }} </td>
                  <th class="w-25">Cost Borne By:</th>
                  <td>{{ !Request::get('CostBorne') ? $applicant->cost_borne : '' }} </td>
               </tr>
               <tr>
                  <th class="w-25">Name (Bengali):</th>
                  <td>{{ !Request::get('GuardianNameBengali') ? $applicant->guardian_name_bangla : '' }} </td>
                  <th class="w-25">Belongs to minority/ethnic groups:</th>
                  <td>{{ !Request::get('Ethnicity') ? $applicant->ethnic : '' }} </td>
               </tr>
               <tr>
                  <th class="w-25">Name (English):</th>
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
               <tr>
                  <th colspan="4" class="text-center bold">Payment Information</th>
               </tr>
               <tr>
                  <th colspan="2" class="w-25">Payment Method:</th>
                  <td colspan="2">{{ !Request::get('PaymentMethod') ? $applicant->payment_method : '' }}</td>
               </tr>
               <tr>
                  <th colspan="2" class="w-50 text-center bold">Banking</th>
                  <th colspan="2" class="w-50 text-center bold">Mobile Banking</th>
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
               </table>
         </div>

         <table class="table-borderless my-2 table">
            <tr class="mx-auto">
               <td class="text-center">
                  <img src="{{public_path('/student-images/signature-images/'. $applicant->signature_image_path)}}"
                       alt="" class="w-100" width="200" height="200" style="margin: 0 3rem">
               </td>
               <td></td>
               <td></td>
            </tr>
            <tr class="mx-auto">
               <td class="font-small-2 text-center">Applicant's Signature</td>
               <td class="font-small-2 text-center">Signature of acceptor</td>
               <td class="font-small-2 text-center">Signature and seal of the head of the institution</td>
            </tr>
         </table>
      </div>
   </div>
</div>

</body>
</html>


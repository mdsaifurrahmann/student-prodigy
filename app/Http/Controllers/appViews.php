<?php

namespace App\Http\Controllers;


class appViews extends Controller
{
   // home
   public function root()
   {
      return view('/content/root');
   }

   // welcome
   public function welcome()
   {
      return view('/content/dashboard/welcome');
   }

   // welcome
   public function applicantList()
   {

      $titles = [
         "Name",
         "Father's Name",
         "Mother's Name",
         "Roll",
         "Reg",
         "Semester",
         "Technology",
         "Student Name (Bengali)",
         "Birth Certificate Number",
         "Birth Date",
         "Student's Mobile No.",
         "Blood Group",
         "Gender",
         "Marital Status",
         "Father's Name (Bengali)",
         "Mother's Name (Bengali)",
         "Father's Mobile No.",
         "Mother's Mobile No.",
         "Father's NID",
         "Mother's NID",
         "Father's Birth Date",
         "Mother's Birth Date",
         "Present Division",
         "Present District",
         "Present Upozilla",
         "Present City Corp/Municipality",
         "Present Post Code",
         "Present Address",
         "Permanent Division",
         "Permanent District",
         "Permanent Upozilla",
         "Permanent City Corp/Municipality",
         "Permanent Post Code",
         "Permanent Address",
         "Previous Education Board Division",
         "Previous Education Board District",
         "Previous Education Board Upozilla",
         "Previous Education Board",
         "Previous Exam Passing Year",
         "Previous Exam Roll",
         "Previous Institute Name",
         "Previous Exam GPA",
         "Previous Exam Name",
         "Previous Technology/Trade",
         "Previous Attendance Rate",
         "Current Education Board Division",
         "Current Education Board District",
         "Current Education Board Upozilla",
         "Current Institute Name",
         "Semester",
         "Shift",
         "Group",
         "Guardian Name (Bengali)",
         "Guardian Name (English)",
         "Guardian Mobile No.",
         "Guardian NID No.",
         "Guardian's Birth Date",
         "Relationship with Guardian",
         "Cost Borne",
         "Disabilities",
         "Ethnicity",
         "Freedom Fighter Quota",
         "Scholarship",
         "Payment Method",
         "Mobile Banking Service Provider",
         "Mobile Banking Account Number",
         "Bank Name",
         "Branch",
         "Bank Account Number",
         "Bank Account Name",
         "Bank Account Type",
         "Bank Routing Number",
      ];

      return view('/content/dashboard/applicant-list', compact('titles'));
   }

   // form
   public function form()
   {
   }

   public function confirm()
   {
      return view('/content/confirm-form');
   }

   // login
   public function logout()
   {
      return view('/content/auth/auth-login');
   }
}

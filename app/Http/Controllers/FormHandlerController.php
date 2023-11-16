<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\formHandler;
use App\Http\Requests\StoreformHandlerRequest;
use App\Http\Requests\UpdateformHandlerRequest;
use Mpdf\MpdfException;

class FormHandlerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return RedirectResponse
    */
   public function index()
   {
      if (!Auth::check()) {
         return redirect()->route('login');
      }

      return json_encode(['data' => formHandler::all()]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

      $mobile_banking_providers = [
         'ROCKET',
         'BKASH',
         'NAGAD',
         'M-CASH',
         'UPAY',
         'MY CASH',
         'OK MOBILE BANKING',
         'TRUST AXIATA PAY',
         'RUPALI BANK SURE CASH'
      ];

      $banks = [
         'AGRANI BANK LIMITED',
         'BANGLADESH DEVELOPMENT BANK',
         'BASIC BANK LIMITED',
         'JANATA BANK LIMITED',
         'RUPALI BANK LIMITED',
         'SONALI BANK LIMITED',
         'BANGLADESH KRISHI BANK',
         'RAJSHAHI KRISHI UNNAYAN BANK',
         'PROBASHI KALLYAN BANK',
         'AB BANK LIMITED',
         'BANGLADESH COMMERCE BANK LIMITED',
         'BANK ASIA LIMITED',
         'BENGAL COMMERCIAL BANK LTD',
         'BRAC BANK LIMITED',
         'CITIZENS BANK PLC',
         'CITY BANK LIMITED',
         'COMMUNITY BANK BANGLADESH LIMITED',
         'DHAKA BANK LIMITED',
         'DUTCH-BANGLA BANK LIMITED',
         'EASTERN BANK LIMITED',
         'IFIC BANK LIMITED',
         'JAMUNA BANK LIMITED',
         'MEGHNA BANK LIMITED',
         'MERCANTILE BANK LIMITED',
         'MIDLAND BANK LIMITED',
         'MODHUMOTI BANK LIMITED',
         'MUTUAL TRUST BANK LIMITED',
         'NATIONAL BANK LIMITED',
         'NATIONAL CREDIT & COMMERCE BANK LIMITED',
         'NRB BANK LIMITED',
         'NRB COMMERCIAL BANK LTD',
         'ONE BANK LIMITED',
         'PADMA BANK LIMITED',
         'PREMIER BANK LIMITED',
         'PRIME BANK LIMITED',
         'PUBALI BANK LIMITED',
         'SHIMANTO BANK LTD',
         'SOUTHEAST BANK LIMITED',
         'SOUTH BANGLA AGRICULTURE AND COMMERCE BANK LIMITED',
         'TRUST BANK LIMITED',
         'UNITED COMMERCIAL BANK LTD',
         'UTTARA BANK LIMITED',
         'AL-ARAFAH ISLAMI BANK LIMITED',
         'EXIM BANK LIMITED',
         'FIRST SECURITY ISLAMI BANK LIMITED',
         'GLOBAL ISLAMIC BANK LTD',
         'ICB ISLAMIC BANK LIMITED',
         'ISLAMI BANK BANGLADESH LIMITED',
         'SHAHJALAL ISLAMI BANK LIMITED',
         'SOCIAL ISLAMI BANK LIMITED',
         'UNION BANK LTD',
         'STANDARD BANK LIMITED',
      ];

      return view('/content/form', ['mobile_banks' => $mobile_banking_providers], ['banks' => $banks]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreformHandlerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreformHandlerRequest $request)
   {
      $request->validated();

      // Hanfle the file name for Database
      $formal_image_name_handler = time() . Str::upper(Str::random(16)) . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_roll') . '.' .  $request->formal_image->extension();
      // move the file
      $request->formal_image->move(public_path('/student-images/formal-images/'), $formal_image_name_handler);


      // Handle the file name for Database
      $signature_image_name_handler = time() . Str::upper(Str::random(16)) . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_reg') . '.' .  $request->signature_image->extension();

      // Insert data to database
      formHandler::create($request->all() + ['formal_image_path' => $formal_image_name_handler] + ['signature_image_path' => $signature_image_name_handler]);

      // move the file
      $request->signature_image->move(public_path('student-images/signature-images/'), $signature_image_name_handler);

      // redirect to confirmation page
      return redirect()->route('confirm', ['id' => $request->input('ce_reg')])->with('success', 'Data saved successfully!')->withInput();
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\formHandler  $formHandler
    * @return \Illuminate\Http\Response
    */
   public function show(formHandler $formHandler, $id)
   {
      // show single applicant data
      $applicant = formHandler::findOrFail($id);

      $titles = [
         "Student Name (English)",
         "Father's Name (English)",
         "Mother's Name (English)",
         "Current Roll",
         "Current Reg",
         "Current Technology",
         "Student Name (Bengali)",
         "Birth Certificate Number",
         "Student's Birth Date",
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
         "Session Year",
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
         "Mobile Banking Account Holder Name",
         "Mobile Banking Account Holder NID number",
         "Bank Name",
         "Branch",
         "Bank Account Number",
         "Bank Account Name",
         "Bank Account Type",
         "Bank Routing Number",
      ];

      // foreach ($titles as $key => $value) {
      //    $key = Str::replace(' ', '\'', $value);

      //    if (isset($request->$key)) {
      //       dd($request->$key);
      //    }
      // }

      return view('content.dashboard.applicants.single-applicant', compact('applicant', 'titles'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\formHandler  $formHandler
    * @return \Illuminate\Http\Response
    */
   public function edit(formHandler $formHandler, $id)
   {

      $mobile_banking_providers = [
         'ROCKET',
         'BKASH',
         'NAGAD',
         'M-CASH',
         'UPAY',
         'MY CASH',
         'OK MOBILE BANKING',
         'TRUST AXIATA PAY',
         'RUPALI BANK SURE CASH'
      ];

      $banks = [
         'AGRANI BANK LIMITED',
         'BANGLADESH DEVELOPMENT BANK',
         'BASIC BANK LIMITED',
         'JANATA BANK LIMITED',
         'RUPALI BANK LIMITED',
         'SONALI BANK LIMITED',
         'BANGLADESH KRISHI BANK',
         'RAJSHAHI KRISHI UNNAYAN BANK',
         'PROBASHI KALLYAN BANK',
         'AB BANK LIMITED',
         'BANGLADESH COMMERCE BANK LIMITED',
         'BANK ASIA LIMITED',
         'BENGAL COMMERCIAL BANK LTD',
         'BRAC BANK LIMITED',
         'CITIZENS BANK PLC',
         'CITY BANK LIMITED',
         'COMMUNITY BANK BANGLADESH LIMITED',
         'DHAKA BANK LIMITED',
         'DUTCH-BANGLA BANK LIMITED',
         'EASTERN BANK LIMITED',
         'IFIC BANK LIMITED',
         'JAMUNA BANK LIMITED',
         'MEGHNA BANK LIMITED',
         'MERCANTILE BANK LIMITED',
         'MIDLAND BANK LIMITED',
         'MODHUMOTI BANK LIMITED',
         'MUTUAL TRUST BANK LIMITED',
         'NATIONAL BANK LIMITED',
         'NATIONAL CREDIT & COMMERCE BANK LIMITED',
         'NRB BANK LIMITED',
         'NRB COMMERCIAL BANK LTD',
         'ONE BANK LIMITED',
         'PADMA BANK LIMITED',
         'PREMIER BANK LIMITED',
         'PRIME BANK LIMITED',
         'PUBALI BANK LIMITED',
         'SHIMANTO BANK LTD',
         'SOUTHEAST BANK LIMITED',
         'SOUTH BANGLA AGRICULTURE AND COMMERCE BANK LIMITED',
         'TRUST BANK LIMITED',
         'UNITED COMMERCIAL BANK LTD',
         'UTTARA BANK LIMITED',
         'AL-ARAFAH ISLAMI BANK LIMITED',
         'EXIM BANK LIMITED',
         'FIRST SECURITY ISLAMI BANK LIMITED',
         'GLOBAL ISLAMIC BANK LTD',
         'ICB ISLAMIC BANK LIMITED',
         'ISLAMI BANK BANGLADESH LIMITED',
         'SHAHJALAL ISLAMI BANK LIMITED',
         'SOCIAL ISLAMI BANK LIMITED',
         'UNION BANK LTD',
         'STANDARD BANK LIMITED',
      ];


      // edit single applicant data page
      $applicant = formHandler::findOrFail($id);

      return view('content.dashboard.applicants.edit-applicant', compact('applicant', 'banks', 'mobile_banking_providers'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateformHandlerRequest  $request
    * @param  \App\Models\formHandler  $formHandler
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateformHandlerRequest $request, formHandler $formHandler, $id)
   {

      Auth::check();

      $request->validated();

      $applicant = formHandler::where('id', $id)->first();
      $formal_image_path = $applicant->formal_image_path;
      $signature_image_path = $applicant->signature_image_path;
      // Hanfle the file name for Database

      if ($request->hasFile('formal_image')) {
         if (File::exists(public_path('student-images/formal-images/') . $formal_image_path)) {
            File::delete(public_path('student-images/formal-images/') . $formal_image_path);
         }

         // Handle the file name for Database
         $formal_image_name_handler = time() . Str::upper(Str::random(16)) . '_' . 'student-' . Str::replace(
            ' ',
            '_',
            $request->input('student_name_english')
         ) . '-' . $request->input('ce_roll') . '.' .  $request->formal_image->extension();
         // move the file
         // $request->formal_image->move(public_path('/student-images/formal-images/'), $formal_image_name_handler);
      } else {
         $formal_image_name_handler = $formal_image_path;
      }


      if ($request->hasFile('signature_image')) {
         if (File::exists(public_path('student-images/signature-images/') . $signature_image_path)) {
            File::delete(public_path('student-images/signature-images/') . $signature_image_path);
         }

         // Handle the file name for Database
         $signature_image_name_handler = time() . Str::upper(Str::random(16)) . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_reg') . '.' .  $request->signature_image->extension();
         // move the file
         // $request->signature_image->move(public_path('student-images/signature-images/'), $signature_image_name_handler);
      } else {
         $signature_image_name_handler = $signature_image_path;
      }


      // update data to database
      formHandler::findOrFail($id)->update($request->all() + ['formal_image_path' => $formal_image_name_handler] + ['signature_image_path' => $signature_image_name_handler]);

      if ($request->hasFile('formal_image')) {
         $request->formal_image->move(public_path('/student-images/formal-images/'), $formal_image_name_handler);
      }

      if ($request->hasFile('signature_image')) {
         $request->signature_image->move(public_path('student-images/signature-images/'), $signature_image_name_handler);
      }

      // redirect to confirmation page
      return redirect()->route('applicant-details', ['id' => $id])->with('success', 'Data updated successfully!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\formHandler  $formHandler
    * @return \Illuminate\Http\Response
    */
   public function destroy(formHandler $formHandler, $id)
   {
      // delete the applicant
      if (Auth::check()) {
         if (formHandler::where('id', $id)->exists()) {
            // remove file from storage
            $applicant = formHandler::where('id', $id)->first();
            $formal_image_path = $applicant->formal_image_path;
            $signature_image_path = $applicant->signature_image_path;


            if (File::exists(public_path('student-images/formal-images/') . $formal_image_path) && File::exists(public_path('student-images/signature-images/') . $signature_image_path)) {
               File::delete(public_path('student-images/formal-images/') . $formal_image_path);
               File::delete(public_path('student-images/signature-images/') . $signature_image_path);
            } else {
               return redirect()->back()->with('destroy-error', 'Images are not found associated with this Applicant! We can not delete this applicant record at this time. Please update or Contact with the developer as soon as possible.');
            }

            formHandler::where('id', $id)->delete();
            return redirect()->route('applicant-list')->with('destroy-success', 'Applicant deleted successfully!');
         } else {
            return redirect()->route('applicant-list')->with('destroy-error', 'Applicant does not exist! So can not delete!');
         }
      } else {
         return redirect()->route('root')->with('destroy-error', 'You are not authorized to delete this applicant!');
      }
   }


   /**
    * @param formHandler $formHandler
    * @param $id
    * @return Application|Factory|View
    * @throws MpdfException
    */
   public function download(formHandler $formHandler, $id)
   {
      // show single applicant data
      $applicant = formHandler::findOrFail($id);

      $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
      $fontDirs = $defaultConfig['fontDir'];

      $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
      $fontData = $defaultFontConfig['fontdata'];


      $pdf = new \Mpdf\Mpdf([
         'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/fonts',
         ]),
         'fontdata' => $fontData + [ // lowercase letters only in font key
            'solaimanlipi' => [
               'R' => 'SolaimanLipi.ttf',
               'useOTL' => 0xFF,
            ]
         ],


         'mode' => 'utf-8',
         'format' => 'A4',
         'orientation' => 'P',
         'default_font' => 'freeserif'

      ]);

      $previousUrl = \URL::previous();

      $content = view('content.dashboard.applicants.pdf', compact('applicant', 'previousUrl'))->render();
      $pdf->WriteHTML($content);
      $pdf->Output($applicant->student_name_english . '-' . Str::upper(Str::random(16)) . '.pdf', 'D');
   }

   public function formalImageDownload($formal)
   {
      $path = public_path('student-images/formal-images/' . $formal);
      return response()->download($path);
   }

   public function signatureImageDownload($signature)
   {
      $path = public_path('student-images/signature-images/' . $signature);
      return response()->download($path);
   }
}

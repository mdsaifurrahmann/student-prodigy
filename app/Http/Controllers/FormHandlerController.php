<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\formHandler;
use App\Http\Requests\StoreformHandlerRequest;
use App\Http\Requests\UpdateformHandlerRequest;

class FormHandlerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      if (!Auth::check()) {
         return redirect()->route('login');
      }

      $formHandlers = json_encode(['data' => formHandler::all()]);

      return $formHandlers;
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

      $mobile_banking_providers = [
         'Rocket',
         'bKash',
         'Nagad',
         'M-cash',
         'Upay',
         'My Cash',
         'OK Mobile Banking',
         'Trust Axiata Pay',
         'Rupali Bank Sure Cash'
      ];

      $banks = [
         'Agrani Bank Limited',
         'Bangladesh Development Bank',
         'BASIC Bank Limited',
         'Janata Bank Limited',
         'Rupali Bank Limited',
         'Sonali Bank Limited',
         'Bangladesh Krishi Bank',
         'Rajshahi Krishi Unnayan Bank',
         'Probashi Kallyan Bank',
         'AB Bank Limited',
         'Bangladesh Commerce Bank Limited',
         'Bank Asia Limited',
         'Bengal Commercial bank ltd',
         'BRAC Bank Limited',
         'Citizens Bank PLC',
         'City Bank Limited',
         'Community Bank Bangladesh Limited',
         'Dhaka Bank Limited',
         'Dutch-Bangla Bank Limited',
         'Eastern Bank Limited',
         'IFIC Bank Limited',
         'Jamuna Bank Limited',
         'Meghna Bank Limited',
         'Mercantile Bank Limited',
         'Midland Bank Limited',
         'Modhumoti Bank Limited',
         'Mutual Trust Bank Limited',
         'National Bank Limited',
         'National Credit & Commerce Bank Limited',
         'NRB Bank Limited',
         'NRB Commercial Bank Ltd',
         'One Bank Limited',
         'Padma Bank Limited',
         'Premier Bank Limited',
         'Prime Bank Limited',
         'Pubali Bank Limited',
         'Shimanto Bank Ltd',
         'Southeast Bank Limited',
         'South Bangla Agriculture and Commerce Bank Limited',
         'Trust Bank Limited',
         'United Commercial Bank Ltd',
         'Uttara Bank Limited',
         'Al-Arafah Islami Bank Limited',
         'EXIM Bank Limited',
         'First Security Islami Bank Limited',
         'Global Islamic Bank Ltd',
         'ICB Islamic Bank Limited',
         'Islami Bank Bangladesh Limited',
         'Shahjalal Islami Bank Limited',
         'Social Islami Bank Limited',
         'Union Bank Ltd',
         'Standard Bank Limited',
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
      $formal_image_name_handler = time() . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_roll') . '.' .  $request->formal_image->extension();
      // move the file
      $request->formal_image->move(public_path('/student-images/formal-images/'), $formal_image_name_handler);


      // Handle the file name for Database
      $signature_image_name_handler = time() . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_reg') . '.' .  $request->signature_image->extension();
      // move the file
      $request->signature_image->move(public_path('student-images/signature-images/'), $signature_image_name_handler);


      // Insert data to database
      formHandler::create($request->all() + ['formal_image_path' => $formal_image_name_handler] + ['signature_image_path' => $signature_image_name_handler]);

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

      return view('content.dashboard.applicants.single-applicant', ['applicant' => $applicant]);
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
         'Rocket',
         'bKash',
         'Nagad',
         'M-cash',
         'Upay',
         'My Cash',
         'OK Mobile Banking',
         'Trust Axiata Pay',
         'Rupali Bank Sure Cash'
      ];

      $banks = [
         'Agrani Bank Limited',
         'Bangladesh Development Bank',
         'BASIC Bank Limited',
         'Janata Bank Limited',
         'Rupali Bank Limited',
         'Sonali Bank Limited',
         'Bangladesh Krishi Bank',
         'Rajshahi Krishi Unnayan Bank',
         'Probashi Kallyan Bank',
         'AB Bank Limited',
         'Bangladesh Commerce Bank Limited',
         'Bank Asia Limited',
         'Bengal Commercial bank ltd',
         'BRAC Bank Limited',
         'Citizens Bank PLC',
         'City Bank Limited',
         'Community Bank Bangladesh Limited',
         'Dhaka Bank Limited',
         'Dutch-Bangla Bank Limited',
         'Eastern Bank Limited',
         'IFIC Bank Limited',
         'Jamuna Bank Limited',
         'Meghna Bank Limited',
         'Mercantile Bank Limited',
         'Midland Bank Limited',
         'Modhumoti Bank Limited',
         'Mutual Trust Bank Limited',
         'National Bank Limited',
         'National Credit & Commerce Bank Limited',
         'NRB Bank Limited',
         'NRB Commercial Bank Ltd',
         'One Bank Limited',
         'Padma Bank Limited',
         'Premier Bank Limited',
         'Prime Bank Limited',
         'Pubali Bank Limited',
         'Shimanto Bank Ltd',
         'Southeast Bank Limited',
         'South Bangla Agriculture and Commerce Bank Limited',
         'Trust Bank Limited',
         'United Commercial Bank Ltd',
         'Uttara Bank Limited',
         'Al-Arafah Islami Bank Limited',
         'EXIM Bank Limited',
         'First Security Islami Bank Limited',
         'Global Islamic Bank Ltd',
         'ICB Islamic Bank Limited',
         'Islami Bank Bangladesh Limited',
         'Shahjalal Islami Bank Limited',
         'Social Islami Bank Limited',
         'Union Bank Ltd',
         'Standard Bank Limited',
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

      if ($request->hasFIle('formal_image')) {
         if (File::exists(public_path('student-images/formal-images/') . $formal_image_path)) {
            File::delete(public_path('student-images/formal-images/') . $formal_image_path);
         }

         // Handle the file name for Database
         $formal_image_name_handler = time() . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_roll') . '.' .  $request->formal_image->extension();
         // move the file
         $request->formal_image->move(public_path('/student-images/formal-images/'), $formal_image_name_handler);
      } else {
         $formal_image_name_handler = $formal_image_path;
      }


      if ($request->hasFIle('signature_image')) {
         if (File::exists(public_path('student-images/signature-images/') . $signature_image_path)) {
            File::delete(public_path('student-images/signature-images/') . $signature_image_path);
         }

         // Handle the file name for Database
         $signature_image_name_handler = time() . '_' . 'student-' . Str::replace(' ', '_', $request->input('student_name_english')) . '-' . $request->input('ce_reg') . '.' .  $request->signature_image->extension();
         // move the file
         $request->signature_image->move(public_path('student-images/signature-images/'), $signature_image_name_handler);
      } else {
         $signature_image_name_handler = $signature_image_path;
      }


      // update data to database
      formHandler::findOrFail($id)->update($request->all() + ['formal_image_path' => $formal_image_name_handler] + ['signature_image_path' => $signature_image_name_handler]);

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


            if (File::exists(public_path('student-images/formal-images/') . $formal_image_path)) {
               File::delete(public_path('student-images/formal-images/') . $formal_image_path);
            } else {
               return redirect()->back()->with('destroy-error', 'Formal Image File not found associated with this Applicant! So, We can not delete this applicant record at this time. Please Contact with the developer as soon as possible.');
            }

            if (File::exists(public_path('student-images/signature-images/') . $signature_image_path)) {
               File::delete(public_path('student-images/signature-images/') . $signature_image_path);
            } else {
               return redirect()->back()->with('destroy-error', 'Signature Image File not found associated with this Applicant! So, We can not delete this applicant record at this time. Please Contact with the developer as soon as possible.');
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
}

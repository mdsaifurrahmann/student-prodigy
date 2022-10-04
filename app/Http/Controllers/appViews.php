<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appViews extends Controller
{
   // home
   public function root()
   {
      return view('/content/root');
   }

   // form
   public function form()
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

   // login
   public function login()
   {
      return view('/content/auth/auth-login');
   }

   // register
   public function register()
   {
      return view('/content/auth/auth-register');
   }

   // forgot password
   public function forgot()
   {
      return view('/content/auth/auth-forgot-password');
   }

   // reset password
   public function reset()
   {
      return view('/content/auth/auth-reset-password');
   }

   // verify email
   public function verify()
   {
      return view('/content/auth/auth-verify-email');
   }
}

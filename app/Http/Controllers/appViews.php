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
   }

   public function confirm()
   {
      return view('/content/confirm-form');
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

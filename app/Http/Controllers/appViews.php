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

   // welcome
   public function welcome()
   {
      return view('/content/dashboard/welcome');
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

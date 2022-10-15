<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
      //
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      Fortify::loginView(function () {
         return view('content.auth.auth-login');
      });

      Fortify::registerView(function () {
         return view('content.auth.auth-register');
      });

      Fortify::verifyEmailView(function () {
         return view('content.auth.auth-verify-email');
      });

      Fortify::resetPasswordView(function () {
         return view('content.auth.auth-reset-password');
      });

      Fortify::requestPasswordResetLinkView(function () {
         return view('content.auth.auth-forgot-password');
      });
   }
}

<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Str;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;


class FortifyServiceProvider extends ServiceProvider
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
      Fortify::createUsersUsing(CreateNewUser::class);
      Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
      Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
      Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

      RateLimiter::for('login', function (Request $request) {
         $email = (string) $request->email;

         return Limit::perMinute(5)->by($email . $request->ip());
      });

      RateLimiter::for('two-factor', function (Request $request) {
         return Limit::perMinute(5)->by($request->session()->get('login.id'));
      });

      Fortify::authenticateUsing(function (Request $request) {
         if (!$this->checkTooManyFailedAttempts()) {
            return session()->put(['attemp-failed' => 'Too many attemps failed. IP Blocked for 1 Hours', 'end_time' => time() + 3600]);
         }

         $user = User::where('email', $request->email)
            ->orWhere('username', $request->email)
            ->first();

         if ($user && Hash::check($request->password, $user->password)) {
            RateLimiter::clear($this->throttleKey());
            return $user;
         }

         RateLimiter::hit($this->throttleKey(), $seconds = 3600);

         // return session()->put('attemp-failed', 'Too many attemps failed. IP Blocked for 1 Hours');
      });

      Fortify::authenticateThrough(function (Request $request) {
         return array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            // RedirectIfTwoFactorAuthenticatable::class,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
         ]);
      });
   }

   /**
    * Get the rate limiting throttle key for the request.
    *
    * @return string
    */
   public function throttleKey()
   {
      return Str::lower(request('email')) . '|' . request()->ip();
   }

   /**
    * Ensure the login request is not rate limited.
    *
    * @return void
    */
   public function checkTooManyFailedAttempts()
   {
      if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
         return true;
      } else {
         return false;
      }
   }
}

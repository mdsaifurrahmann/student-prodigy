<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\appViews;
use App\Http\Controllers\FormHandlerController;
use App\Http\Controllers\Users;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [appViews::class, 'root'])->name('root');
Route::get('/confirmation/{id}', [appViews::class, 'confirm'])->name('confirm');
Route::get('/student-form', [FormHandlerController::class, 'create'])->name('form');
Route::get('/privacy-policy-and-terms-and-condition', [FormHandlerController::class, 'create'])->name('ppt');
Route::post('/student-form', [FormHandlerController::class, 'store'])->name('formHandler');

Route::group(['prefix' => 'authenticated/dash'], function () {
   Route::get('welcome', [appViews::class, 'welcome'])->name('welcome')->middleware('verified');

   //users
   Route::get('api/user-list', [Users::class, 'index'])->name('user-api')->middleware('verified');
   Route::get('user-list', [Users::class, 'showUsers'])->name('user-list')->middleware('verified');
   Route::get('profile', [appViews::class, 'profile'])->name('profile')->middleware('verified');
   Route::get('settings', [appViews::class, 'settings'])->name('settings')->middleware('verified');

   //applicant
   Route::get('applicant-list', [appViews::class, 'applicantList'])->name('applicant-list')->middleware('verified');
   Route::get('api/applicant-list', [FormHandlerController::class, 'index'])->middleware('verified');
   Route::get('applicant-detail/{id}', [FormHandlerController::class, 'show'])->name('applicant-details')->middleware('verified');
   Route::get('applicant-destroy/{id}', [FormHandlerController::class, 'destroy'])->name('applicant-destroy')->middleware('verified');
   Route::get('applicant-modify/{id}', [FormHandlerController::class, 'edit'])->name('applicant-modify')->middleware('verified');
   Route::patch('applicant-modifier/{id}', [FormHandlerController::class, 'update'])->name('applicant-modifier')->middleware('verified');
   Route::get('applicant/download/{id}', [FormHandlerController::class, 'download'])->name('download')
      ->middleware('verified');
});

Route::group(['prefix' => 'authenticate'], function () {
   Route::get('register', [RegisteredUserController::class, 'create'])->name('register')->middleware('verified');
   Route::post('register', [RegisteredUserController::class, 'store'])->middleware('verified');
   Route::get('logout', function () {
      return redirect()->route('welcome');
   })->middleware('auth');
});

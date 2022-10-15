<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\appViews;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('login', [appViews::class, 'login'])->name('loginx');
// Route::get('register', [appViews::class, 'register'])->name('registerx');
Route::get('forgot-password', [appViews::class, 'forgot'])->name('forgot-password');
Route::get('reset-password', [appViews::class, 'reset'])->name('reset-password');
// Route::get('verify-email', [appViews::class, 'verify'])->name('verify-email');

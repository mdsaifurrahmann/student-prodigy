<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\appViews;
use App\Http\Controllers\FormHandlerController;
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
Route::get('/student-form', [FormHandlerController::class, 'create'])->name('form')->middleware('verified');
Route::post('/student-form', [FormHandlerController::class, 'store'])->name('formHandler');


Route::get('authenticate/register', [RegisteredUserController::class, 'create'])
   ->middleware('verified')
   ->name('register');

Route::post('authenticate/register', [RegisteredUserController::class, 'store'])
   ->middleware('verified');

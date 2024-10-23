<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
  use App\Http\Controllers\AboutController;
  use App\Http\Controllers\ContactController;
  use App\Http\Controllers\PasswordController;
  use App\Http\Controllers\ProfileController;
  use App\Http\Controllers\VacancyController;
  Route::get('/account', [AccountController::class, 'home'])->name('account.home');

Route::get('/account/index', [AccountController::class, 'index'])->name('account.index');

Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');

Route::post('/account/register', [AccountController::class, 'register'])->name('account.register');

Route::get('/account/login1', [AccountController::class, 'login1'])->name('account.login1');
Route::post('/account/signin', [AccountController::class, 'signin'])->name('account.signin');


// Route::get('/account/forgot-password1', [AccountController::class, 'request'])->name('password.request');
// Route::post('/account/verify-email', [AccountController::class, 'email'])->name('password.email');
// Route::get('reset-password/{token}', [AccountController::class, 'reset'])->name('password.reset');
// Route::post('reset-password', [AccountController::class, 'update'])->name('password.update');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'update']) ->name('password.update');

// Route for login (accessible to all users)
//Route::get('/account/login1', [AccountController::class, 'login1']) ->name('account.login1'); // 

Route::get('/logout', [AccountController::class, 'logout'])->middleware('web')->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/account/edit1', [ProfileController::class, 'edit'])->name('account.edit1');
    Route::post('/account/update', [ProfileController::class, 'update'])->name('account.update');
});



Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('/vacancies/index', [VacancyController::class, 'index'])->name('vacancies.index');//for admin
Route::post('/vacancies/post', [VacancyController::class, 'post'])->name('vacancies.post');

Route::get('/vacancies', [VacancyController::class, 'index1'])->name('vacancies.index1');//for gust page 



Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/apply/{id}', [VacancyController::class, 'showApplicationForm'])->name('vacancies.apply');
Route::post('/apply/{id}', [VacancyController::class, 'submitApplication'])->name('vacancies.submit');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

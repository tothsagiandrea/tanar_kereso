<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
USE App\Http\Controllers\UserAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouteController::class, 'showIndex'])->name('indexPage');
Route::get('/contacts', [RouteController::class, 'showContacts'])->name('contactsPage');
Route::get('/services', [RouteController::class, 'showServices'])->name('servicesPage');
Route::get('/forum', [RouteController::class, 'showForum'])->name('forumPage');
Route::get('/teacher', [RouteController::class, 'showTeacherPage'])->name('teacherPage');

Route::post('/login', [UserAuthController::class, 'loginUser'])->name('loginUser');
Route::post('/register', [UserAuthController::class, 'registerUser'])->name('registerUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/teacherdata', [RouteController::class, 'showTeacherDataPage'])->name('teacherDataPage');
    Route::post('/teacherdata', [RouteController::class, 'setTeacherData'])->name('setTeacherData');
    Route::get('/emailverification', [UserAuthController::class, 'showVerifyEmailPage'])->name('verification.notice');
    Route::get('/verifiedemail', [UserAuthController::class, 'showVerifiedEmailPage'])->name('verifiedEmailPage');
    Route::get('/logout', [UserAuthController::class, 'logoutUser'])->name('logoutUser');
});

Route::middleware(['auth', 'signed'])->group(function () {
    Route::get('/emailverification/{id}/{hash}', [UserAuthController::class, 'verifyEmail'])->name('verification.verify');
});

Route::middleware(['auth', 'throttle:6,1'])->group(function () {
    Route::post('/emailnotification', [UserAuthController::class, 'sendEmailNotification'])->name('verification.send');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLogin'])->name('loginPage');
    Route::get('/register', [UserAuthController::class, 'showRegistration'])->name('registrationPage');
    Route::get('/forgotten_password', [UserAuthController::class, 'showForgottenPasswordPage'])->name('passwordPage');
    Route::post('/forgotten_password', [UserAuthController::class, 'forgottenPassword'])->name('forgottenpassword');
    Route::get('/reset-password/{token}', [UserAuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [UserAuthController::class, 'resetPassword'])->name('password.update');
});
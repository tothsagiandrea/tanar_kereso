<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

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
Route::post('/login', [RouteController::class, 'loginUser'])->name('loginUser');
Route::post('/register', [RouteController::class, 'registerUser'])->name('registerUser');
Route::get('/teacher', [RouteController::class, 'showTeacherPage'])->name('teacherPage');

Route::middleware(['auth'])->group(function () {
    Route::get('/teacherdata', [RouteController::class, 'showTeacherDataPage'])->name('teacherDataPage');
    Route::post('/teacherdata', [RouteController::class, 'setTeacherData'])->name('setTeacherData');
    Route::get('/logout', [RouteController::class, 'logoutUser'])->name('logoutUser');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [RouteController::class, 'showLogin'])->name('loginPage');
    Route::get('/register', [RouteController::class, 'showRegistration'])->name('registrationPage');
    Route::get('/forgotten_password', [RouteController::class, 'showForgottenPasswordPage'])->name('passwordPage');
    Route::post('/forgotten_password', [RouteController::class, 'forgottenPassword'])->name('forgottenpassword');
    Route::get('/reset-password/{token}',[RouteController::class, 'resetpassword'])->name('password.reset');
});
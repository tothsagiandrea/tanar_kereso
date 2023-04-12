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
Route::get('/login', [RouteController::class, 'showLogin'])->name('loginPage');
Route::post('/login', [RouteController::class, 'loginUser'])->name('loginUser');
Route::get('/forgotten_password', [RouteController::class, 'showForgottenPasswordPage'])->name('passwordPage');
Route::get('/register', [RouteController::class, 'showRegistration'])->name('registrationPage');
Route::post('/register', [RouteController::class, 'registerUser'])->name('registerUser');
Route::get('/teacher', [RouteController::class, 'showTeacherPage'])->name('teacherPage');
Route::get('/teacherdata', [RouteController::class, 'showTeacherDataPage'])->name('teacherDataPage');
Route::get('/logout', [RouteController::class, 'logoutUser'])->name('logoutUser');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TeacherController;

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
Route::get('/forum', [ForumController::class, 'showForum'])->name('forumPage');
Route::get('/teacher/{id}', [RouteController::class, 'showTeacherPage'])->name('teacherPage');
Route::get('/aszf', [RouteController::class, 'showAszf'])->name('aszfPage');
Route::get('/gdpr', [RouteController::class, 'showGdpr'])->name('gdprPage');
Route::post('/sendemail', [RouteController::class, 'sendEmail'])->name('sendEmail');
Route::post('/filterteacher', [TeacherController::class, 'showFilteredTeacherPage'])->name('filteredTeacherPage');
Route::get('/forumtopic/{id}', [ForumController::class, 'showForumTopicPage'])->name('forumTopicPage');


Route::post('/login', [UserAuthController::class, 'loginUser'])->name('loginUser');
Route::post('/register', [UserAuthController::class, 'registerUser'])->name('registerUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/changeuserdata', [UserAuthController::class, 'showChangeUserDataPage'])->name('changeUserDataPage');
    Route::post('/changeuserdata', [UserAuthController::class, 'changeUserData'])->name('changeUserData');
    Route::post('/changeuserpassowrd', [UserAuthController::class, 'changeUserPassowrd'])->name('changeUserPassword');
    Route::get('/teacherdata', [RouteController::class, 'showTeacherDataPage'])->name('teacherDataPage');
    Route::post('/teacherdata', [TeacherController::class, 'insertTeacherData'])->name('setTeacherData');
    Route::post('/teacherdata/update', [TeacherController::class, 'updateTeacherData'])->name('updateTeacherData');
    Route::get('/emailverification', [UserAuthController::class, 'showVerifyEmailPage'])->name('verification.notice');
    Route::get('/verifiedemail', [UserAuthController::class, 'showVerifiedEmailPage'])->name('verifiedEmailPage');
    Route::post('/forumtopic/create', [ForumController::class, 'createForumTopic'])->name('createForumTopic');
    Route::get('/logout', [UserAuthController::class, 'logoutUser'])->name('logoutUser');
    Route::get('/deleteuser', [UserAuthController::class, 'showDeleteUserPage'])->name('deleteUserPage');
    Route::post('/deleteuser', [UserAuthController::class, 'deleteUser'])->name('deleteUser');
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

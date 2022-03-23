<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUsersController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Conrollers\ChangePasswordController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PsiNoticeFormController;
use App\Http\Controllers\PsiScheduleController;
use App\Http\Controllers\RequisitionVoucherController;
use App\Http\Controllers\FullCalendarController;

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

Route::get('/', function () {
    return view('login');
});

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/login', [LoginUserController::class, 'index'])->name('userlogin');
Route::post('/save', [LoginUserController::class, 'customlogin'])->name('customlogin');
Route::post('/signout', [LoginUserController::class, 'signout'])->name('signout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswwordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::resource('/register', RegisteredUsersController::class);

Route::post('email-validate', [EmailController::class, 'checkEmail'])->name('checkEmail');

Route::group(['middleware' => ['auth']], function () {
    // SIDEBAR//
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/member', [DashboardController::class, 'index'])->name('dashboard.member');
    Route::get('/PsiSchedule', [DashboardController::class, 'PsiSchedule'])->name('dashboard.PsiSchedule');
    Route::get('/myprofile', [DashboardController::class, 'users_profile'])->name('dashboard.myprofile');

    Route::group(['middleware' => ['role:admin_admin']], function () {
        //routes for PSI
        Route::get('/PsiSchedule', [DashboardController::class, 'PsiSchedule'])->name('dashboard.PsiSchedule');
        Route::resource('/PsiSchedule', PsiScheduleController::class);
    });
    //route for myprofile page//
    Route::resource('/myprofile', MyProfileController::class);

    //route for changing current user's password //
    Route::get('/profile', [ChangePasswordController::class, 'profile'])->name('yourprofile');
    Route::post('/change/password',  [ChangePasswordController::class, 'changePassword'])->name('profile.change.password');
    Route::post('change-profile-picture', [AdminController::class, 'updatePicture'])->name('PictureUpdate');


    //routes for events//
    Route::get('/events', [FullCalendarController::class, 'index'])->name('events.view');
    Route::post('events/action', [FullCalendarController::class, 'action'])->name('events.action');
});

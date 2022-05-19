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
use App\Http\Controllers\GenerateNoticeController;
use App\Http\Controllers\MailController;

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
    return view('auth.login');
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
    Route::get('/PsiSchedule', [DashboardController::class, 'PsiSchedule'])->name('dashboard.PsiSchedule');
    Route::get('/myprofile', [DashboardController::class, 'users_profile'])->name('dashboard.myprofile');
    // Route::get('/rv', [DashboardController::class, 'RequisitionVoucher'])->name('dashboard.RequisitionVoucher');

    ///  Route::group(['middleware' => ['role:admin_admin']], function () {
    //routes for PSI
    Route::resource('/PsiSchedule', PsiScheduleController::class);
    Route::get('/PsiSchedule', [DashboardController::class, 'PsiSchedule'])->name('dashboard.PsiSchedule');
    Route::get('Psischedule/destroy/{id}', [PsiScheduleController::class, 'destroy'])->name('Psischedule.destroy');
    // Route::delete('/destroy', 'App\Http\Controllers\PsiScheduleController@destroy')->name('Psischedule.destroy');
    //   });

    //route for myprofile page//
    Route::resource('/myprofile', MyProfileController::class);

    //route for changing current user's password //
    Route::get('/profile', [ChangePasswordController::class, 'profile'])->name('yourprofile');
    Route::post('/change/password',  [ChangePasswordController::class, 'changePassword'])->name('profile.change.password');
    Route::post('change-profile-picture', [AdminController::class, 'updatePicture'])->name('PictureUpdate');

    //routes for events//
    Route::get('/events', [FullCalendarController::class, 'index'])->name('events.view');
    Route::post('events/action', [FullCalendarController::class, 'action'])->name('events.action');

    //routes for mail
    // Route::get('send', 'PsiScheduleController@store');
    // Route::get('send', [PsiScheduleController::class, 'send']);
    // Route::post('send', [PsiScheduleController::class, 'store']);
    // Route::get('send', [PsiScheduleController::class, 'store']);
    Route::get('/PsiSchedule', [PsiScheduleController::class, 'modals.PsiSchedule.Add'])->name('PsiSchedule');
    Route::post('/PsiSchedule', [PsiScheduleController::class, 'store'])->name('PsiSchedule.store');


    //route to Generate notice
    // Route::get('/generatenotice', [GenerateNoticeController::class, 'generatenotice'])->name('navigation_links.generatenotice');
    Route::get('/generatenotice', [PsiScheduleController::class, 'generatenotice'])->name('navigation_links.generatenotice');

    //Route for crud
    // Route::group(['prefix' => 'PsiSSchedule'], function(){
    //     Route::delete('/{PsiSchedule}/delete', 'PsiSchedule@destroy')->name('Psischedule.destroy');
    // })
});

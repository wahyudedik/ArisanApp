<?php

use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;

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

Route::middleware(['guest'])->group(function () {
    //Route Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    //Route Register
    Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
    
    // Password reset routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    // route logout
    Route::get('/logout', [LogoutController::class, 'logout']);
    
    // route default
    Route::get('/', [SessionController::class, 'role']);

    // route superadmin
    Route::get('/superadmin', [SessionController::class, 'role'])->name('superadmin')->middleware('userAkses:superadmin');

    // ===================================================================================================

    // route admin
    Route::get('/admin', [SessionController::class, 'role'])->name('admin')->middleware('userAkses:admin');
    // Menampilkan form tambah grup baru
    Route::get('/groupsadd', [GroupController::class, 'create'])->name('admin.groupsAdd')->middleware('userAkses:admin');
    // Menyimpan data grup baru
    Route::post('/groupsadd', [GroupController::class, 'store'])->name('groups.store')->middleware('userAkses:admin');
    //group chat link
    Route::get('/groupchat', [GroupChatController::class, 'index'])->name('groups.chat')->middleware('userAkses:admin');
    //route profile
    Route::get('/profile', [MemberController::class, 'adminProfile'])->name('admin.profile')->middleware('userAkses:admin');

    // ===================================================================================================

    // route member
    Route::get('/', [MemberController::class, 'index'])->name('member.index')->middleware('userAkses:member');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('member.profile')->middleware('userAkses:member');
    Route::put('/profile/{member}', [ProfileController::class, 'profileUpdate'])->name('member.update.profile')->middleware('userAkses:member');
    Route::put('/profile/{id}', [ProfileController::class, 'profilePhotoUpdate'])->name('member.update.photo')->middleware('userAkses:member');

    // ===================================================================================================

});

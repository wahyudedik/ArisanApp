<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SessionController;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
    Route::get('/register', [SessionController::class, 'registerForm'])->name('register');
    Route::post('/register', [SessionController::class, 'register'])->name('register.submit');
    // Password reset routes
    Route::get('/forgot-password', [SessionController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [SessionController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [SessionController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [SessionController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth'])->group(function(){
    // route default
    Route::get('/home', [SessionController::class, 'role'])->name('index');
    // route superadmin
    Route::get('/superadmin', [SessionController::class, 'role'])->name('superadmin')->middleware('userAkses:superadmin');
    // route admin
    Route::get('/admin', [SessionController::class, 'role'])->name('admin')->middleware('userAkses:admin');
    // route member
    Route::get('/member', [SessionController::class, 'role'])->name('member')->middleware('userAkses:member');
    Route::get('/profile', [MemberController::class, 'profile'])->name('member.profile')->middleware('userAkses:member');
    Route::put('/profile/{member}', [MemberController::class, 'update'])->name('member.update')->middleware('userAkses:member');
    Route::put('/member/{id}', [MemberController::class, 'updateProfile'])->name('member.updateProfile')->middleware('userAkses:member');

    // route logout
    Route::get('/logout', [SessionController::class, 'logout']);
});


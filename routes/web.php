<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;




Route::get('/ticket', function () {
    return view('layouts.app', ['sidebar' => view('sidebar'), 'container' => view('container')]);
})->middleware(['auth', 'verified'])->name('ticket');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', action: function () {
    return view('dashboard', ['main-sidebar' => view('main-sidebar'), 'main-container' => view('main-container')]);})->middleware(middleware: ['auth', 'verified'])->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/verifyRegister', function () {
    return view('auth.verifyRegister');
});
Route::get('/registerForm', function () {
    return view('auth.register-form');
});

Route::post('/logincontrol', [AuthController::class, 'login']);

Route::post('/register-email', [AuthController::class, 'registerEmail'])->name('register.email');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('register.verify');
Route::post('/complete-registration', [AuthController::class, 'completeRegistration'])->name('register.complete');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



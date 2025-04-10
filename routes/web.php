<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\panoController;
use Illuminate\Support\Facades\Auth;




// Route::get('/board/{id}', function () { return view('layouts.app', ['sidebar' => view('sidebar'), 'container' => view('container')]); })->middleware(['auth', 'verified'])->name('boards');

Route::get('/board/{id}', [panoController::class, 'listPano'])
    ->middleware(['auth', 'verified'])
    ->name('boards');


Route::get('/', function () {
    return view('welcome');
});
Route::post('/card/update-list', [panoController::class, 'updateList']);
Route::post('/getCards', [panoController::class, 'getCards']);



    Route::get('/dashboard', [panoController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::get('/login', function () {
    return view('auth.login');
});
 
Route::post("/panoAdd", [panoController::class, 'panoEkle'])->name('pano.add');
Route::post("/ListAdd", [panoController::class, 'ListAdd']);
Route::post("/cardAdd", [panoController::class, 'cardAdd']);

Route::get('/register', function () { return view('auth.register'); })->name('register.view');
Route::post('/register-email', [AuthController::class, 'registerEmail'])->name('register.email');

Route::get('/verify-register', function () { return view('auth.verifyRegister'); })->name('register.verify.view');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('register.verify');

Route::get('/register-form', function () { return view('auth.register-form'); })->name('register.form.view');
Route::post('/complete-registration', [AuthController::class, 'completeRegistration'])->name('register.complete');

Route::post('/logincontrol', [AuthController::class, 'login'])->name('logincontrol');



    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



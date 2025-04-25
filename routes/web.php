<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\favoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\panoController;
use App\Http\Middleware\RedirectIfNotAuthenticated; 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
})->name('register.view');

Route::post('/register-email', [AuthController::class, 'registerEmail'])->name('register.email');
Route::get('/verify-register', function () {
    return view('auth.verifyRegister');
})->name('register.verify.view');

Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('register.verify');
Route::get('/register-form', function () {
    return view('auth.register-form');
})->name('register.form.view');

Route::post('/complete-registration', [AuthController::class, 'completeRegistration'])->name('register.complete');
Route::post('/logincontrol', [AuthController::class, 'login'])->name('logincontrol');

Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    Route::delete('/pano/{id}', [panoController::class, 'destroy'])->name('pano.destroy');
    
    Route::get('/dashboard', [panoController::class, 'dashboard'])->name('dashboard');
    Route::get('/pano', [panoController::class, 'dashboard'])->name('dashboard');
    Route::get('/main', [panoController::class, 'home'])->name('home');
    Route::get('/profile', [panoController::class, 'profile'])->name('profile');
    Route::get('/highlights', [panoController::class, 'home'])->name('home');
    
    
    Route::get('/board/{id}', [panoController::class, 'listPano'])->name('boards');
    Route::delete('/list/delete/{id}', [App\Http\Controllers\panoController::class, 'deleleList'])->name('list.destroy');

    Route::post("/panoAdd", [panoController::class, 'panoEkle'])->name('pano.add');
    Route::post("/ListAdd", [panoController::class, 'ListAdd']);
    Route::post("/cardAdd", [panoController::class, 'cardAdd']);
    Route::post("/cardUpdate", [panoController::class, 'cardUpdate']);
    Route::post("/updateProfile", [panoController::class, 'profileUpdate']);
    Route::post("/listUpdate", [panoController::class, 'listUpdate']);
    Route::post("/cardDelete", [panoController::class, 'cardDelete']);
    Route::post('/update-pano-name', [panoController::class, 'updatePanoName']);
    Route::post('/card/update-list', [panoController::class, 'updateList']);
    Route::post('/getCards', [panoController::class, 'getCards']);

    Route::post('/favori-ekle', [favoriController::class, 'ekle']);
    Route::post('/favori-sil', [favoriController::class, 'sil']);;
    


});

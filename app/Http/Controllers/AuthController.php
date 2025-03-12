<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Hatalı giriş bilgileri!'])->withInput();
    }
    public function registerEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $verificationCode = rand(100000, 999999);

        Session::put('verification_code', $verificationCode);
        Session::put('email', $request->email);

        Mail::raw("Doğrulama kodunuz: $verificationCode", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('E-posta Doğrulama Kodu');
        });

        return back()->with('success', 'Doğrulama kodu e-posta adresinize gönderildi.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        // Oturumdan kodu al
        $storedCode = Session::get('verification_code');

        if ($request->code == $storedCode) {
            Session::put('email_verified', true);
            return redirect()->route('register.password');
        }

        return back()->withErrors(['code' => 'Yanlış doğrulama kodu!']);
    }

    public function completeRegistration(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        if (!Session::get('email_verified')) {
            return back()->withErrors(['email' => 'E-posta doğrulaması yapılmadı!']);
        }

        // Kullanıcıyı oluştur
        $user = User::create([
            'email' => Session::get('email'),
            'password' => Hash::make($request->password),
        ]);

        // Oturumu temizle
        Session::forget(['verification_code', 'email', 'email_verified']);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}


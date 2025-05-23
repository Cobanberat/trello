<?php
namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect('/login');
        }

        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $verificationCode = rand(100000, 999999);

        Session::put('verification_code', $verificationCode);
        Session::put('email', $request->email);

        Mail::raw("Doğrulama kodunuz: $verificationCode", function ($message) use ($request) {
            $message->to($request->email)->subject('E-posta Doğrulama Kodu');
        });

        return redirect()->route('register.verify.view')->with('success', 'Doğrulama kodu e-posta adresinize gönderildi.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'full_code' => 'required|digits:6',
        ]);

        if ($request->full_code == Session::get('verification_code')) {
            Session::put('email_verified', true);
            return redirect()->route('register.form.view');
        }

        return redirect()->back()->withErrors(['msg' => 'The Message']);

    }

    public function completeRegistration(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if (! Session::get('email_verified')) {
            return back()->withErrors(['email' => 'E-posta doğrulaması yapılmadı!']);
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => Session::get('email'),
            'password' => Hash::make($request->password),
        ]);

        Theme::create([
            'user_id' => $user->id,
            'type'    => 0, 
        ]);

        Session::forget(['verification_code', 'email', 'email_verified']);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function login(request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'E-posta veya şifre hatalı!'])->withInput();
    }

}

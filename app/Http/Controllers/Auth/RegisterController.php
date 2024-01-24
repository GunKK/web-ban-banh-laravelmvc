<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.sign_up');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|ends_with:gmail.com|unique:users',
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);
        $msg = 'Đăng kí tài khoản thành công, vui lòng xác thực tài khoản và đăng nhập';
        $user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', $msg);
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function sendMail(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/')->with('success','Xác thực tài khoản thành công');
    }

    public function resendMail(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
}

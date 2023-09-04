<?php
namespace App\UseCases\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUseCase {
    public function execute(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->access !== 'S') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('sales');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
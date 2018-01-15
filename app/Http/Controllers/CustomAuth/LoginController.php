<?php

namespace App\Http\Controllers\CustomAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('admin.home');
        }

        return view('admin.login');
    }

    public function auth()
    {
        $email = request('email');
        $password = request('password');

        $loginAttempt = Auth::attempt(['email' => $email, 'password' => $password]);

        if($loginAttempt) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('login')->with('flash', [
            'type' => 'danger',
            'message' => 'Invalid username or password'
        ]);
    }

    public function logout()
    {
        $result = Auth::logout();

        return redirect()->route('login')->with('flash', [
            'type' => 'success',
            'message' => 'You are successfully Logged out.'
        ]);
    }
}
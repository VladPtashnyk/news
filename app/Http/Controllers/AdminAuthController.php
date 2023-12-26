<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginView()
    {
        if (!Session::get('user.id')) {
            return view('admin.auth.login');
        } else {
            return redirect()->route('user.dashboard')->with('warning', 'Вийдіть спершу з user');
        }
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // dd('dsa');
            Session::put('admin.id', Auth::guard('admin')->id());
            Session::put('admin.name', Auth::guard('admin')->name);

            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::forget('admin');

        return redirect()->route('user.dashboard');
    }
}

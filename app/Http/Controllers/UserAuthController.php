<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class UserAuthController extends Controller
{
    public function showLoginView()
    {
        if (!Session::get('admin.id')) {
            return view('user.auth.login');
        } else {
            return redirect()->route('admin.dashboard')->with('warning', 'Вийдіть спершу з адмінки');
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // dd(Auth::user()->id);
            // $name = Auth::user()->name;

            Session::put('user.id', Auth::user()->id);
            Session::put('user.name', Auth::user()->name);

            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function showRegisterView()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);

        return redirect()->route('user.showLogin');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('user');

        return redirect()->route('user.showLogin');
    }
}

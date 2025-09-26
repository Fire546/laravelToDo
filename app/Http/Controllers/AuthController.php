<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function showLogin() {
        return view("auth.login");
    }

    public function showReg() {
        return view("auth.reg");
    }
    public function reg(Request $request) {
        $data = $request->validate([
            "email"=> "string",
            "name"=> "string",
            "password"=> "string|confirmed|min:8",
        ]);

        $user = User::create($data);
        Auth::login($user);

        return view('dashboard');
    }

    public function login(Request $request) {
        $data = $request->validate([
            "email"=> "string",
            "password"=> "string",
        ]);


        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error','Неправильный логин или пароль');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
    }

    public function dashboard() {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        // $todos = $user->todos();

        return view('dashboard', ['user'=> $user]);
    }
}

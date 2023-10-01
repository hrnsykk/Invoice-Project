<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    public function login() : RedirectResponse|Response
    {
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return Inertia::render('Login');
        }
    }

    public function login_check(): RedirectResponse
    {
        if(Auth::attempt(request()->all()))
            return redirect()->route('home');
        return redirect()->back()->withErrors(['msg' => "User Not Found"]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

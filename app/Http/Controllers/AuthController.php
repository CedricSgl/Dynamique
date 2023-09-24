<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login() //:View
    {
        return view('administrator.auth.login');
    }

    public function auth(AuthRequest $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->intended(route('wine.index'));
        }
        return to_route('administrator.auth.login')->withErrors(['email' => 'Somethings when wrong'])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('administrator.auth.login'));
        //return redirect()->intended(route('auth.login'));
    }

}

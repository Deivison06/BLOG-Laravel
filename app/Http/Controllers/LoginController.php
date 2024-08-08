<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            // 'active' => 'login'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $logged = Auth::attempt($validated);
        if ($logged) {
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Ocorreu um erro ao fazer login, verifique os dados e tente novamente');

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}

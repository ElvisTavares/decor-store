<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('login.index');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('usuario ou senha inválidos');
        }

        return view ('products.index');
    }

    public function destroy()
    {
        Auth::logout();

        return view('login.index');
    }
}

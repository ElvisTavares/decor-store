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
        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors('Usuario ou senha inválidos');
        }

        return redirect()->route('.index');

        //        if (!Auth::attempt($request->only(['email', 'password']))) {
//            return redirect()->back()->withErrors('usuario ou senha inválidos');
//        }

//        return redirect()->route('.index');
    }

    public function destroy()
    {
        Auth::logout();

        return view('login.index');
    }
}

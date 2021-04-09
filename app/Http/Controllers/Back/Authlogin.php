<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class Authlogin extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }
    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            toastr()->success('Tekrardan hoş geldiniz '.Auth::user()->name);
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors('Miyavvv, doğru gir tırnaklarım!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

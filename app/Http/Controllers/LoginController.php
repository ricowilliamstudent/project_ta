<?php

namespace App\Http\Controllers;

use Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function postlogin(Request $request){

        $data = $request->validate([
                'username' => 'required',
                'password' => 'required',
        ]);

        if (Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect ()->route('beranda');
        }
        return back()->with('error', 'username atau password salah');
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect ('login');

    }

}

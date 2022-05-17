<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        if(\Auth::attempt(
            [
                'username' => $request-> username,
                'password' => $request -> password
                ]
                )){
                    $user = \Auth::user();
                    $token = $user->createToken('user')->accessToken;
                    $data['user']   = $user;
                    $data['token']  = $token;
                    return response () ->json (
                        [
                        'success'   => true,
                        'data'      => $data,
                        'pesan'     => 'Login Berhasil'
                    ],200
                    );
        } else {
                    return response () ->json ([
                        'success'   => false,
                        'data'      => '',
                        'pesan'     => 'Login Gagal'
                    ], 401
                    );
        }
    }
}

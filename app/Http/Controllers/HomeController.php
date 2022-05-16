<?php

namespace App\Http\Controllers;

use Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index() {
        $title = "Beranda";

        return view('beranda', compact('title'));
    }

    public function beranda() {
        $title = "Beranda";

        return view('beranda', compact('title'));
    }

    public function log_serangan() {
        $title = "Log Serangan";

        return view('log_serangan', compact('title'));
    }

    public function notifikasi() {
        $title = "Notifikasi";

        return view('notifikasi', compact('title'));
    }

    public function sensor() {
        $title = "Sensor";

        return view('sensor', compact('title'));
    }

    public function ranges() {
        $title = "Range";

        return view('ranges', compact('title'));
    }

    public function logout() {
        $title = "Logout";

        return view('logout', compact('title'));
    }
}
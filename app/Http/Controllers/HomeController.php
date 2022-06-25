<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sensor;
use App\Models\Iptables;
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

        $serangan = Iptables::all()-> count();
        $ICMP = Iptables::where('tipe', 'ICMP')->get()->count();
        $TCP = Iptables::where('tipe', 'TCP')->get()->count();
        // Grafik highchart tcp
        $bulantcp = [];
        for ($i=0; $i < 12; $i++) {
            $bulantcp[$i] = Iptables::whereMonth("created_at",$i+1) -> where('tipe', 'TCP') -> count();
        }
        // Grafik highchart icmp
        $bulanyicmp = [];
        for ($i=0; $i < 12; $i++) {
            $bulanicmp[$i] = Iptables::whereMonth("created_at",$i+1) -> where('tipe', 'ICMP') -> count();
        }

        $sensor = Sensor::latest()->take(20)->get();

        return view('beranda', compact('title', 'serangan', 'ICMP', 'TCP' ,'sensor', 'bulantcp', 'bulanicmp'));
    }

    public function log_serangan() {
        $title = "Log Serangan";
        //Call Python File
        $command = escapeshellcmd('python3 normalisasi.py');
        $output = explode(",",shell_exec($command));
        // dd($output);
        $log = json_decode(file_get_contents(public_path() . "/data.json"), true);
        $log = array_reverse($log);
        return view('log_serangan', compact('title','log'));
    }

    public function iptables() {
        $title = "iptables";

        $iptables = iptables::latest() -> get();

        return view('iptables', compact('title','iptables'));
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

    public function accept($ip, $time, $tipe){
        $time = str_replace('.',' ', $time);
        $time = Carbon::parse($time);
        $iptables = Iptables::where('sumberip', $ip)->where ('tipe', $tipe) -> first() ?? null;
        if($iptables==null ){
            $iptables = new Iptables();
            $iptables -> sumberip = $ip;
        }
        $iptables -> waktu = $time;
        $iptables -> status = "accept";
        $iptables -> tipe = $tipe;
        $iptables -> save();

        $command = escapeshellcmd('python3 iptables.py '.$ip.' ACCEPT');
        $output = explode(",",shell_exec($command));
        $title = "iptables";

        $iptables = iptables::latest() -> get();


        return view('iptables', compact('title','iptables'));
    }

    public function reject($ip, $time, $tipe){
        $time = str_replace('.',' ', $time);
        $time = Carbon::parse($time);
        $iptables = Iptables::where('sumberip', $ip)->where ('tipe', $tipe) -> first() ?? null;
        if($iptables==null ){
            $iptables = new Iptables();
            $iptables -> sumberip = $ip;
        }
        $iptables -> waktu = $time;
        $iptables -> status = "reject";
        $iptables -> tipe = $tipe;
        $iptables -> save();

        $command = escapeshellcmd('python3 iptables.py '.$ip.' REJECT');
        $output = explode(",",shell_exec($command));

        $title = "iptables";

        $iptables = iptables::latest() -> get();

        return view('iptables', compact('title','iptables'));
    }

    public function drop($ip, $time, $tipe){
        $time = str_replace('.',' ', $time);
        $time = Carbon::parse($time);
        $iptables = Iptables::where('sumberip', $ip)->where ('tipe', $tipe) -> first() ?? null;
        if($iptables==null ){
            $iptables = new Iptables();
            $iptables -> sumberip = $ip;
        }
        $iptables -> waktu = $time;
        $iptables -> status = "drop";
        $iptables -> tipe = $tipe;
        $iptables -> save();

        $command = escapeshellcmd('python3 iptables.py '.$ip.' DROP');
        $output = explode(",",shell_exec($command));

        $title = "iptables";

        $iptables = iptables::latest() -> get();

        return view('iptables', compact('title','iptables'));
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Iptables;
use DateTime;

class ApiController extends Controller
{

    public function getConServer(){

        $command = escapeshellcmd("python3 sensor.py");
        $output = explode(",",shell_exec($command));

        return $output;
    }

    public function getlog(){
        //Call Python File
        $command = escapeshellcmd('python3 normalisasi.py');
        $output = explode(",",shell_exec($command));
        // dd($output);
        $log = json_decode(file_get_contents(public_path() . "/data.json"), true);
        $log = array_reverse($log);

        $logs = array();
        foreach ($log as $item){
            array_push($logs, $item);
        }
        return response()->json($logs, 200);
    }

    public function getiptables (){
        $iptables = iptables::latest() -> get();
        return response()->json($iptables, 200);
    }

    public function accept($ip, $time, $tipe){
        // return response()->json($time, 200);
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

        // waktu aksi awal
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_awal = iptables::where('sumberip', $ip)->update(['aksi_awal' => $d->format('H:i:s.u')]);

        $command = escapeshellcmd('python3 iptables.py '.$ip.' ACCEPT');
        $output = explode(",",shell_exec($command));
        $title = "iptables";

        // waktu aksi akhir
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d2 = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_akhir = iptables::where('sumberip', $ip)->update(['aksi_akhir' => $d2->format('H:i:s.u')]);

        $iptables = iptables::latest() -> get();

        return response()->json("success", 200);
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

        // waktu aksi awal
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_awal = iptables::where('sumberip', $ip)->update(['aksi_awal' => $d->format('H:i:s.u')]);

        $command = escapeshellcmd('python3 iptables.py '.$ip.' REJECT');
        $output = explode(",",shell_exec($command));
        $title = "iptables";

        // waktu aksi akhir
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d2 = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_akhir = iptables::where('sumberip', $ip)->update(['aksi_akhir' => $d2->format('H:i:s.u')]);

        $iptables = iptables::latest() -> get();

        return response()->json("success", 200);
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

        // waktu aksi awal
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_awal = iptables::where('sumberip', $ip)->update(['aksi_awal' => $d->format('H:i:s.u')]);

        $command = escapeshellcmd('python3 iptables.py '.$ip.' DROP');
        $output = explode(",",shell_exec($command));
        $title = "iptables";

        // waktu aksi akhir
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) *1000000);
        $d2 = new DateTime(date ('H:i:s.'.$micro, $t) );
        $aksi_akhir = iptables::where('sumberip', $ip)->update(['aksi_akhir' => $d2->format('H:i:s.u')]);

        $iptables = iptables::latest() -> get();

        return response()->json("success", 200);
    }

}

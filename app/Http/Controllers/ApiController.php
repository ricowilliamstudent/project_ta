<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getConServer(){

        $command = escapeshellcmd("python3 sensor.py");
        $output = explode(",",shell_exec($command));

        return $output;
    }

}

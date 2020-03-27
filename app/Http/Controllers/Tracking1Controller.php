<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Returns;
use App\Booking;
use App\Client;
use App\Car;
use App\Tracking;
use DateTime;



class Tracking1Controller extends Controller
{
    public function index()
    {

        $data['title'] = 'Tracking1';
        $data['no'] = 1;
        return view('tracking1', $data);
    }
}

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


class TrackingController extends Controller
{
    public function index()
    {
        $data['menu'] = 8;
        $data['title'] = 'Tracking';
        $data['no'] = 1;
        return view('tracking', $data);
    }
}

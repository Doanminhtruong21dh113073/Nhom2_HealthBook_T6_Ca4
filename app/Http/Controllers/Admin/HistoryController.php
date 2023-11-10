<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function history()
    {
        $data['booking'] = DB::table('booking')
        ->join('users', 'booking.barber', '=', 'users.id')
        ->join('services', 'booking.service', '=', 'services.id')
        ->select('booking.*', 'users.name as barber_name', 'services.service as service_name')
        ->where('booking.ischeckout', 2)
        ->get();

        return view('admin.history.history', $data);
    }

    
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashController extends Controller
{
    public function check($id)
    {
        DB::table('booking')->where('id', $id)->update(['status' => 2]);
        return redirect()->route('admin.history.history');
    }

    public function index()
    {
        $data['bill'] = DB::table('bill')
            ->join('booking', 'bill.name', '=', 'booking.id')
            ->join('categories', 'bill.service', '=', 'categories.id')
            ->join('services', 'bill.product', '=', 'services.id')
            ->select('booking.customer', 'categories.category', 'services.service', 'bill.price', 'bill.id', 'bill.name')
            ->where('booking.role', '=', 'doctor')
            ->get();

        return view('admin.cash.index', $data);
    }

    public function create($id)
    {
        $data['barber'] = DB::table('barbers')->get();
        $data['category'] = DB::table('categories')->get();
        $data['service'] = DB::table('services')->get();

        $data['booking'] = DB::table('booking')->where('id', $id)->first();
        $barber = $data['booking']->barber;
        $name = $data['booking']->id;

        // Update status to 2

        DB::table('booking')->where('id', $id)->update(['ischeckout' => 2]);

        $data['bill'] = DB::table('bill')->where('name', '=', $name)->get();
        $data['tct'] = DB::table('users')->where('id', '=', $barber)->get();

        return view('admin.cash.create', $data);
    }

    public function store(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = now();

        DB::table('booking')->where('id', $id)->update($data);
        return redirect()->route('admin.history.history')->with('success', 'Đã thanh toán thành công');
    }
}

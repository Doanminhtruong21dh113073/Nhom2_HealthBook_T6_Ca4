<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Date_off\StoreRequest;

class DateOffController extends Controller
{
    public function index()
    {
        $data['dates'] = DB::table('date_off')
            ->join('users', 'date_off.barber', '=', 'users.id')
            ->select('date_off.*', 'users.name')
            ->get();

        return view('admin.day_off_barber.index', $data);
    }

    public function create()
    {
        $data['users'] = DB::table('users')
            ->where('role', '=', 'doctor')
            ->where('status', '=', 'active')
            ->get();

        return view('admin.day_off_barber.create', $data);
    }

    public function store(StoreRequest $request)
    {
        $startDay = $request->input('start_day');
        $endDay = $request->input('end_day');

        if ($startDay > $endDay) {
            return redirect()->back()->withErrors('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
        }

        $data = $request->except('_token', 'phone', 'email');
        $data['start_day'] = $startDay;
        $data['end_day'] = $endDay;
        $data['created_at'] = now();

        DB::table('date_off')->insert($data);

        return redirect()->route('admin.date_off.index');
    }

    public function edit($id)
    {
        $data['users'] = DB::table('users')->where('role', '=', 'doctor')->get();
        $data['start_date'] = DB::table('date_off')->where('id', $id)->first();
        $data['end_date'] = DB::table('date_off')->where('id', $id)->first();
        $barber = $data['start_date']->barber;
        $barber = $data['end_date']->barber;

        $data['admins'] = DB::table('users')
            ->where('role', '=', 'admin')
            ->where('status', '=', '1')
            ->where('id', '=', $barber)
            ->get();

        return view('admin.day_off_barber.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $startDay = $request->input('start_day');
        $endDay = $request->input('end_day');

        if ($startDay > $endDay) {
            return redirect()->back()->withErrors('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
        }

        $data = $request->except('_token', 'phone', 'email');
        $data['updated_at'] = now();

        DB::table('date_off')->where('id', $id)->update($data);

        return redirect()->route('admin.date_off.index');
    }

    public function destroy($id)
    {
        DB::table('date_off')->where('id', $id)->delete();

        return redirect()->route('admin.date_off.index')->with('success', 'Delete Successfully');
    }

    public function approve($id)
    {
        DB::table('date_off')->where('id', $id)->update(['status' => 1]);

        return redirect()->route('admin.date_off.index');
    }
}

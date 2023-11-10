<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Barber\StoreRequest;
use App\Http\Requests\Admin\Barber\UpdateRequest;
use Illuminate\Support\Facades\DB;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = DB::table('barbers')
            ->join('users', 'barbers.name', '=', 'users.id')
            ->join('categories', 'barbers.category', '=', 'categories.id')
            ->select('users.*', 'categories.category', 'barbers.id')
            ->get();

        return view('admin.barber.index', compact('barbers'));
    }

    public function create()
    {
        $doctors = DB::table('users')->where('role', 'doctor')->get();
        $categories = DB::table('categories')->get();

        return view('admin.barber.create', compact('doctors', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $name = $request->name;
        $category = $request->category;

        $barbers = DB::table('barbers')
            ->where('name', $name)
            ->where('category', $category)
            ->get();

        foreach ($barbers as $barber) {
            if ($barber->id != 0) {
                return redirect()->route('admin.barber.create')
                    ->with('error', 'Bạn đã đăng ký dịch vụ này cho Barber');
            }
        }

        $data = $request->except('_token', 'phone', 'email');
        $data['created_at'] = now();

        DB::table('barbers')->insert($data);

        return redirect()->route('admin.barber.create');
    }

    public function edit($id)
    {
        $barber = DB::table('barbers')->where('id', $id)->first();
        $doctor = DB::table('users')->where('role', 'admin')->get();
        $barberUser = DB::table('users')->where('id', $barber->name)->get();
        $categories = DB::table('categories')->get();

        return view('admin.barber.edit', compact('barber', 'doctor', 'barberUser', 'categories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token', 'phone', 'email');
        $data['updated_at'] = now();

        DB::table('barbers')->where('id', $id)->update($data);

        return redirect()->route('admin.barber.index')->with('success', 'Update thành công');
    }

    public function getPhone_Email_Barber(Request $request)
    {
        $idU = $request->idbarber;
        $barber = DB::table('users')->where('id', $idU)->get();

        return view('admin.getdata.phone_barber', compact('barber'));
    }

    public function destroy($id)
    {
        DB::table('barbers')->where('id', $id)->delete();

        return redirect()->route('admin.barber.index')->with('success', 'Xóa thành công');
    }
}

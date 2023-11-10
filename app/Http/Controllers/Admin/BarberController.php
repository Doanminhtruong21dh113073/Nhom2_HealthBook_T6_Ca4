<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Barber\StoreRequest;
use App\Http\Requests\Admin\Barber\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarberController extends Controller
{
    public function index()
    {
        $data['barber'] = DB::table('barbers')
            ->join('users', 'barbers.name', '=', 'users.id')
            ->join('categories', 'barbers.category', '=', 'categories.id')
            ->select('users.*', 'categories.category', 'barbers.id')
            ->get();
        return view('admin.barber.index', $data);

    }
    public function create()
    {
        $data['user'] = DB::table('users')
        ->where('role', '=', 'doctor')->get();
        $data['category'] = DB::table('categories')
        ->get();
        return view('admin.barber.create', $data);

    }
    public function store(StoreRequest $request)
    {
        $name = $request->name;
        $category = $request->category;
        $duy['user'] = DB::table('barbers')
        ->where('name', '=', $name)
        ->where('category', '=', $category)
        ->get();
        foreach ($duy['user'] as $item) {
            if ($item->id != 0) {
                return redirect()->route('admin.barber.create')
                ->with('error', 'Bạn đã đăng ký dịch vụ này cho Barber');
            }
        }
        $data = $request->except('_token', 'phone', 'email');
        $data['created_at'] = new \DateTime();
        DB::table('barbers')->insert($data);
        return redirect()->route('admin.barber.create');
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $data['barber'] = DB::table('barbers')->where('id', $id)->first();
        $an = $data['barber']->name;
        $data['user'] = DB::table('users')->where('role', '=', 'admin')->get();
        $data['barber'] = DB::table('users')->where('id', '=', $an)->get();
        $data['category'] = DB::table('categories')->get();
        return view('admin.barber.edit', $data);
    }


    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token', 'phone', 'email');
        $data['updated_at'] = new \DateTime();
        DB::table('barbers')->where('id', $id)->update($data);
        return redirect()->route('admin.barber.index')->with('success', 'Update thành công');
    }

    public function getPhone_Email_Barber(Request $request){
        $idU=$request->idbarber;
        $data['barber']=DB::table('users')->where('id',$idU)->get();
        return view('admin.getdata.phone_barber',$data);
    }
    public function destroy($id)
    {
        DB::table('barbers')->where('id', $id)->delete();
        return redirect()->route('admin.barber.index')->with('success', 'Xóa thành công');
    }

}
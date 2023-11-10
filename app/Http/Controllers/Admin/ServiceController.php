<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function index()
    {
        $data['service'] = DB::table('services')->join('categories', 'services.category', '=', 'categories.id')->select('services.id', 'services.service', 'services.price', 'services.des', 'categories.category', 'services.created_at')->get();
        return view('admin.service.index', $data);
    }

    public function create()
    {
        $data['category'] = DB::table('categories')->get();
        return view('admin.service.create', $data)->with('success', 'Tạo thành công');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime ();
        DB::table('services')->insert($data);
        return redirect()->route('admin.service.index')->with('success', 'Tạo thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['category'] = DB::table('categories')->get();
        $data['service'] = DB::table('services')->where('id', $id)->first();
        return view('admin.service.edit', $data);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime ();
        DB::table('services')->where('id', $id)->update($data);
        return redirect()->route('admin.service.index')->with('success', 'Tạo thành công');
    }

    public function destroy($id)
    {
        // Kiểm tra xem dịch vụ có lịch đặt nào liên quan hay không
        $bookingCount = DB::table('booking')->where('service', $id)->count();

        if ($bookingCount > 0) {
            // Nếu có lịch đặt liên quan, hiển thị thông báo lỗi
            return redirect()->route('admin.service.index')->with('error', 'Dịch vụ không thể xóa do có lịch đặt liên quan');
        }

        // Nếu không có lịch đặt liên quan, tiến hành xóa dịch vụ
        DB::table('services')->where('id', $id)->delete();

        return redirect()->route('admin.service.index')->with('success', 'Xóa thành công');
    }

}

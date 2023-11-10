<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = DB::table('categories')->get();
        return view('admin.category.index', $data);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = now();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.category.index')->with('success', 'Tạo thành công');
    }

    public function show($id)
    {
        // You can implement this if needed.
    }

    public function edit($id)
    {
        $data['category'] = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', $data);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = now();
        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        // Check if the category is related to services, bookings, or barbers
        $serviceCount = DB::table('services')->where('category', $id)->count();
        $bookingCount = DB::table('booking')->join('services', 'booking.service', '=', 'services.id')->where('services.category', $id)->count();
        $barberCount = DB::table('barbers')->where('category', $id)->count();

        if ($serviceCount > 0 || $bookingCount > 0 || $barberCount > 0) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không thể xóa do có liên kết với dịch vụ, lịch đặt hoặc Bác Sĩ');
        }

        // If no links exist, delete the category
        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
    }
}

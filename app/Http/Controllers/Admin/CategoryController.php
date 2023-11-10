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
        $data['category']=DB::table('categories')->get();
        return view('admin.category.index',$data);
    }
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(StoreRequest $request)
    {
        $data=$request->except('_token');
        $data['created_at']=new \DateTime();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.category.index')->with('success','Tạo thành công');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['category']=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',$data);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data=$request->except('_token');
        $data['updated_at']=new \DateTime();
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('admin.category.index')->with('success','Tạo thành công');
    }

    public function destroy($id)
    {
        // Kiểm tra xem danh mục có dịch vụ, lịch đặt hoặc thợ hớt tóc liên quan không
        $serviceCount = DB::table('services')->where('category', $id)->count();
        $bookingCount = DB::table('booking')->join('services', 'booking.service', '=', 'services.id')->where('services.category', $id)->count();
        $barberCount = DB::table('barbers')->where('category', $id)->count();
    
        if ($serviceCount > 0 || $bookingCount > 0 || $barberCount > 0) {
            // Nếu có dịch vụ, lịch đặt hoặc thợ hớt tóc liên quan, hiển thị thông báo lỗi
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không thể xóa do có liên kết với dịch vụ, lịch đặt hoặc Bác Sĩ');
        }
    
        // Nếu không có liên kết, tiến hành xóa danh mục
        DB::table('categories')->where('id', $id)->delete();
    
        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
    }
    
}
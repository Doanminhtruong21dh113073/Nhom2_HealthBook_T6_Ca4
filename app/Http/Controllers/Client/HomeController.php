<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Booking\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Truy vấn tất cả người dùng từ bảng 'users'
        $allUsers = DB::table('users')->get();

        // Truy vấn danh mục (categories) của tất cả người dùng từ bảng 'categories'
        $allUserCategories = DB::table('categories')
            ->join('doctor_categories', 'categories.id', '=', 'doctor_categories.category_id')
            ->join('users', 'users.id', '=', 'doctor_categories.user_id')
            ->select('users.id as user_id', 'users.name as user_name', 'categories.category_name')
            ->get();

        // Truyền dữ liệu vào view 'client.pages.home'
        return view('client.pages.home', ['allUsers' => $allUsers, 'allUserCategories' => $allUserCategories]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime ();
        DB::table('bookings')->insert($data);
        return redirect()->route('client.page.home')->with('success', 'Đặt lịch thành công!');
    }

}

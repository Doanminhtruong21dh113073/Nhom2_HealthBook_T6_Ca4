<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Date_off\StoreRequest;
class DateOffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['date']=DB::table('date_off')
        ->join('users','date_off.barber','=','users.id')
        ->select('date_off.*','users.name')->get();
        return view('admin.day_off_barber.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user']=DB::table('users')
        ->where('role','=','doctor')
        ->where('status', '=', 'active')
        ->get();
        return view('admin.day_off_barber.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $startDay = $request->input('start_day');
        $endDay = $request->input('end_day');
    
        if ($startDay > $endDay) {
            // Xử lý khi ngày kết thúc nhỏ hơn ngày bắt đầu, ví dụ: hiển thị thông báo lỗi
            return redirect()->back()->withErrors('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
        }
    
        $data = $request->except('_token', 'phone', 'email');
        $data['start_day'] = $startDay;
        $data['end_day'] = $endDay;
        $data['created_at'] = new \DateTime();
    
        DB::table('date_off')->insert($data);
        return redirect()->route('admin.date_off.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user1']=DB::table('users')->where('role','=','doctor')->get();
        $data['start_day']=DB::table('date_off')->where('id',$id)->first();
        $data['end_day']=DB::table('date_off')->where('id',$id)->first();

        $barber=$data['start_day']->barber;
        $barber=$data['end_day']->barber;

        $data['user']=DB::table('users')
        ->where('role','=','admin')
        ->where('status', '=', '1')
        ->where('id','=',$barber)
        ->get();
        return view('admin.day_off_barber.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $startDay = $request->input('start_day');
        $endDay = $request->input('end_day');
    
        if ($startDay > $endDay) {
            // Xử lý khi ngày kết thúc nhỏ hơn ngày bắt đầu, ví dụ: hiển thị thông báo lỗi
            return redirect()->back()->withErrors('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
        }
    
        $data = $request->except('_token', 'phone', 'email');
        $data['updated_at'] = new \DateTime();
    
        DB::table('date_off')->where('id', $id)->update($data);
        return redirect()->route('admin.date_off.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('date_off')->where('id',$id)->delete();
        return redirect()->route('admin.date_off.index')->with('success','Delete Successfully');
    }
    public function approve($id)
    {
        DB::table('date_off')->where('id', $id)->update(['status' => 1]);
        return redirect()->route('admin.date_off.index');
    }
}
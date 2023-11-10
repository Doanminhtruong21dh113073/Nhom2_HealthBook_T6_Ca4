<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bill\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index()
    {
        $data['booking'] = DB::table('booking')
            ->join('users', 'booking.barber', '=', 'users.id')
            ->join('services', 'booking.service', '=', 'services.id')
            ->select('booking.*', 'users.name as barber_name', 'services.service as service_name')
            ->where('booking.level', '=', 1)
            ->where('booking.status', 'active')
            ->get();

        $data['category'] = DB::table('categories')->get();

        return view('admin.bill.index', $data);
    }

    public function create($id)
    {
        $data['booking'] = DB::table('booking')
            ->join('services', 'booking.service', '=', 'services.id')
            ->join('users', 'booking.barber', '=', 'users.id')
            ->select('booking.*', 'users.name as barber_name', 'services.service as service_name')
            ->where('booking.id', $id)
            ->first();

        $data['category'] = DB::table('categories')->get();

        $data['product'] = DB::table('booking')
            ->join('services', 'booking.service', '=', 'services.id')
            ->join('users', 'booking.barber', '=', 'users.id')
            ->select('services.*')
            ->where('booking.id', $id)
            ->get();

        return view('admin.bill.create', $data);
    }

    public function store(StoreRequest $request, $id)
    {
        $bill = $request->except('_token', 'service', 'product', 'name', 'price');

        if (empty($bill)) {
            $data = $request->except('_token');
            $data['created_at'] = now();
            DB::table('bill')->insert($data);
        }

        return redirect()->route('admin.cash.index');
    }

    public function bill()
    {
        $data['bill'] = DB::table('bill')
            ->join('booking', 'bill.name', '=', 'booking.id')
            ->join('categories', 'bill.service', '=', 'categories.id')
            ->join('services', 'bill.product', '=', 'services.id')
            ->select('booking.customer', 'categories.category', 'services.service', 'bill.price', 'bill.id', 'bill.name', 'bill.created_at')
            ->get();

        return view('admin.bill.bill', $data);
    }

    public function destroy($id)
    {
        DB::table('bill')->where('id', $id)->delete();

        return redirect()->route('admin.cash.index')->with('success', 'Delete Successfully');
    }

    public function getPrice(Request $request)
    {
        $product = $request->idproduct;
        $data['sp'] = DB::table('services')->where('id', $product)->get();

        foreach ($data['sp'] as $item) {
            $priceFormatted = number_format(floatval($item->price), 0, '.', ',');
            $sp = '<label for="">Tổng tiền</label>';
            $sp .= '<input type="text" class="form-control" name="price" value="' . $priceFormatted . ' VND">';
        }

        echo $sp;
    }

    public function getProduct(Request $request)
    {
        $category = $request->idcategory;
        $data['sp'] = DB::table('services')->where('category', $category)->get();
        echo '<option  value="" ></option>';

        foreach ($data['sp'] as $item) {
            echo '<option  value="' . $item->id . '" >' . $item->service . '</option>';
        }
    }
}

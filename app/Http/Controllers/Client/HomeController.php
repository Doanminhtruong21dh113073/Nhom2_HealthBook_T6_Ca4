<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Booking\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barber'] = DB::table('barbers')
        ->get();
    $data['category'] = DB::table('categories')
        ->get();
    $data['service'] = DB::table('services')
        ->get();
    $data['user'] = DB::table('users')
        ->where('role', '=', 'doctor')
        ->where('status', '=', 'active')
        ->get();
        $data['allUsers'] = DB::table('users')->get();        
        return view('client.home.index',$data);
    }


  
    public function getTime(Request $request)
    {
        $barber = $request->barber;
        $value = $request->value;
        $values = $request->value;

        $value = str_replace('/', '-', $value);

        $timeValue = strtotime($value);
        $timeCheck = Carbon::parse($timeValue)->format('Y-m-d');

        $check = DB::table('date_off')
            ->where('barber', $barber)
            ->where('status', 1)
            ->whereDate('start_day', '<=', $timeCheck)
            ->whereDate('end_day', '>', $timeCheck)
            ->first();

        if ($check) {
            echo " Từ ngày " . $check->start_day . " đến ngày " . $check->end_day . ' Bác Sĩ có lịch nghỉ';
        } else {

            $booking = DB::table('booking')
                ->where('barber', '=', $barber)
                ->where('date', '=', $values)
                ->get();
            $sl = count($booking);

            $data = json_decode(json_encode($booking), true);
            for ($m = 0; $m < $sl; $m++) {
                $a[$m] = $data[$m]['time'];
            }

            for ($i = 7; $i <= 18; $i++) {
                $t = true;
                for ($j = 0; $j < $sl; $j++) {
                    if ($i == $a[$j]) {
                        $t = false;
                    };
                };
                if ($t == true) {
                    $xhtml = '<label class="col-2" for="' . $i . '">';
                    $xhtml .= '<div class="">';
                    $xhtml .= '<input class="radio-time" type="radio" name="time" id="' . $i . '" value="' . $i . '">';
                    $xhtml .= '<div class="time-card">';
                    $xhtml .= '<div class="time-text">' . $i . ':00' . '</div>';
                    $xhtml .= '</div>';
                    $xhtml .= '</div>';
                    $xhtml .= '</label>';
                    echo $xhtml;
                }
            }
        }
    }
    public function getDate(Request $request)
    {
        return view('admin.getdata.date');
    }
    public function getPhone_Email(Request $request)
    {
        $idU = $request->iduser;
        $data['user'] = DB::table('users')->where('id', $idU)->get();
        return view('admin.getdata.phone_email', $data);
    }
    public function getValue(Request $request)
    {
        $value = $request->value;
        echo $value;
    }
    public function getBarber(Request $request)
    {
        $idcate = $request->idcategory;
        $data['barber'] = DB::table('barbers')
            ->join('users', 'barbers.name', '=', 'users.id')
            ->join('services', 'services.category', '=', 'barbers.category')
            ->select('users.*', 'services.*', 'barbers.name as bb')
            ->where('services.id', $idcate)
            ->where('users.status', 'active')
            ->get();
        return view('admin.getdata.barber', $data);
    }
    public function getPrice(Request $request)
    {
        $service = $request->idservice;
        $data['sp'] = DB::table('services')
            ->join('categories', 'services.category', '=', 'categories.id')
            ->where('services.id', $service)
            ->select('services.*', 'categories.category')
            ->get();
        foreach ($data['sp'] as $item) {
            $priceFormatted = number_format(floatval($item->price), 0, '.', ',');
            $sp = '<label for="">Tổng tiền</label>';
            $sp .= '<input type="text" class="form-control" name="price" value="' . $priceFormatted . ' VND">';
            $sp .= '<label for="">Thuộc Combo</label>';
            $sp .= '<input class="form-control" name="category" value="' . $item->category . '">';
        }
        echo $sp;
    } 

}
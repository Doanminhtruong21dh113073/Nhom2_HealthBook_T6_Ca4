<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\Client\Booking\StoreRequest;

use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class BarbersController extends Controller
{
    public function Home()
    {
        return view('client.master');
    }

    public function booking_create()
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

        return view('client.pages.booking', $data);
    }

    public function booking_store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $bookingDate = Carbon::createFromFormat('d/m/Y', $data['date']);
        $now = Carbon::now();
        if ($bookingDate->lt($now)) {
            return redirect()->back()->withErrors(['date' => 'Ngày đặt lịch phải lớn hơn ngày hiện tại']);
        }

        $user = DB::table('users')
            ->where('id', '=', $request->barber)
            ->value('name');

        $service = DB::table('services')
            ->where('id', '=', $request->service)
            ->value('service');
        $price = DB::table('services')
            ->where('id', '=', $request->service)
            ->value('price');

        $formattedPrice = number_format(floatval($price), 0, '.', ',');

        $request->validate([
            'phone' => 'required',
            'barber' => 'required',
            'service' => 'required',
            'category' => 'required',
            'date' => 'required',
            'customer' => 'required',
            'email' => 'required',
            'time' => 'required',
        ]);

        

        $data['created_at'] = new \DateTime();
        DB::table('booking')->insert($data);
        return redirect()->route('client.home.index', $data)->with('success', 'Đăng Kí Lịch Thành Công');
    }
    // public function getTime(Request $request)
    // {
    //     $barber = $request->barber;
    //     $value = $request->value;
    //     $values = $request->value;

    //     $value = str_replace('/', '-', $value);

    //     $timeValue = strtotime($value);
    //     $timeCheck = Carbon::parse($timeValue)->format('Y-m-d');

    //     $check = DB::table('date_off')
    //         ->where('barber', $barber)
    //         ->whereDate('start_day', '<=', $timeCheck)
    //         ->whereDate('end_day', '>', $timeCheck)
    //         ->first();

    //     if ($check) {
    //         echo " Từ ngày " . $check->start_day . " đến ngày " . $check->end_day . ' Barber có lịch nghỉ';
    //     } else {

    //         $booking = DB::table('booking')
    //             ->where('barber', '=', $barber)
    //             ->where('date', '=', $values)
    //             ->get();
    //         $sl = count($booking);

    //         $data = json_decode(json_encode($booking), true);
    //         for ($m = 0; $m < $sl; $m++) {
    //             $a[$m] = $data[$m]['time'];
    //         }

    //         for ($i = 7; $i <= 18; $i++) {
    //             $t = true;
    //             for ($j = 0; $j < $sl; $j++) {
    //                 if ($i == $a[$j]) {
    //                     $t = false;
    //                 }
    //                 ;
    //             }
    //             ;
    //             if ($t == true) {
    //                 $xhtml = '<label class="col-2" for="' . $i . '">';
    //                 $xhtml .= '<div class="">';
    //                 $xhtml .= '<input class="radio-time" type="radio" name="time" id="' . $i . '" value="' . $i . '">';
    //                 $xhtml .= '<div class="time-card">';
    //                 $xhtml .= '<div class="time-text">' . $i . ':00' . '</div>';
    //                 $xhtml .= '</div>';
    //                 $xhtml .= '</div>';
    //                 $xhtml .= '</label>';
    //                 echo $xhtml;
    //             }
    //         }
    //     }

    // }
    // public function getDate(Request $request)
    // {
    //     return view('client.getdata.date');
    // }
    // public function getPhone_Email(Request $request)
    // {
    //     $idU = $request->iduser;
    //     $data['user'] = DB::table('users')->where('id', $idU)->get();
    //     return view('client.getdata.phone_email', $data);
    // }
    // public function getValue(Request $request)
    // {
    //     $value = $request->value;
    //     echo $value;
    // }
    // public function getBarber(Request $request)
    // {
    //     $idcate = $request->idcategory;
    //     $data['barber'] = DB::table('barbers')
    //         ->join('users', 'barbers.name', '=', 'users.id')
    //         ->join('services', 'services.category', '=', 'barbers.category')
    //         ->select('users.*', 'services.*', 'barbers.name as bb')
    //         ->where('services.id', $idcate)
    //         ->where('users.status', 1)
    //         ->get();
    //     return view('client.getdata.barber', $data);
    // }
    // public function getPrice(Request $request)
    // {
    //     $service = $request->idservice;
    //     $data['sp'] = DB::table('services')
    //         ->join('categories', 'services.category', '=', 'categories.id')
    //         ->where('services.id', $service)
    //         ->select('services.*', 'categories.category')
    //         ->get();
    //     foreach ($data['sp'] as $item) {
    //         $priceFormatted = number_format(floatval($item->price), 0, '.', ',');
    //         $sp = '<label for="">Tổng tiền</label>';
    //         $sp .= '<input type="text" class="form-control" name="price" value="' . $priceFormatted .  ' VND">';
    //         $sp .= '<label for="">Thuộc Combo</label>';
    //         $sp .= '<input class="form-control" name="category" value="' . $item->category . '">';
    //     }
    //     echo $sp;
    // }
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
        return view('client.getdata.date');
    }
    public function getPhone_Email(Request $request)
    {
        $idU = $request->iduser;
        $data['user'] = DB::table('users')->where('id', $idU)->get();
        return view('client.getdata.phone_email', $data);
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
            ->where('users.status', 1)
            ->get();
        return view('client.getdata.barber', $data);
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
            $sp ='<div class="col-6">';
            $sp .= '<div class="mb-3">';
            $sp .= '<label for="" class="form-label">Tổng tiền</label>';
            $sp .= '<input type="text" class="form-control" name="price" value="' . $priceFormatted . ' VND">';
            $sp .= '</div>';

            $sp .= '<div class="mb-3">';
            $sp .= '<label class="form-label" for="">Thuộc Chuyen6 Khoa</label>';
            $sp .= '<input class="form-group" name="category" value="' . $item->category . '">';
            $sp .= '</div>';
            $sp .= '</div>';

        }
        echo $sp;
    }
}
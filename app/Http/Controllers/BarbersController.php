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
        $data['barber'] = DB::table('barbers')->get();
        $data['category'] = DB::table('categories')->get();
        $data['service'] = DB::table('services')->get();
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
            ->first();

        if (!$service) {
            return redirect()->back()->withErrors(['service' => 'Dịch vụ không tồn tại']);
        }

        $formattedPrice = number_format(floatval($service->price), 0, '.', ',');

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

        $text = "<b>Thông tin đặt lịch của khách hàng :</b>\n\n"
            . "<b>Customer: </b>\n"
            . "$request->customer\n"
            . "<b>Email Address: </b>\n"
            . "$request->email\n"
            . "<b>Phone: </b>\n"
            . "$request->phone\n"
            . "<b>Combo: </b>\n"
            . "$request->category\n"
            . "<b>Dịch Vụ: </b>\n"
            . "{$service->service}\n"
            . "<b>Total: </b>\n"
            . "$formattedPrice VND\n"
            . "<b>Bác Sĩ: </b>\n"
            . "$user\n"
            . "<b>Date: </b>\n"
            . "$request->date\n"
            . "<b>Time: </b>\n"
            . "$request->time:00 AM\n";

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text,
        ]);

        $data['created_at'] = new \DateTime();
        DB::table('booking')->insert($data);

        return redirect()->route('client.booking.booking_create', $data)->with('success', 'Đăng Ký Lịch Thành Công');
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
                    }
                }
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
            $sp = '<label for="">Tổng tiền</label>';
            $sp .= '<input type="text" class="form-control" name="price" value="' . $priceFormatted . ' VND">';
            $sp .= '<label for="">Thuộc Combo</label>';
            $sp .= '<input class="form-control" name="category" value="' . $item->category . '">';
        }
        echo $sp;
    }
}

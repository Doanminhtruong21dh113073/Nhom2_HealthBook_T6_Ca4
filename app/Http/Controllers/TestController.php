<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function test(){
        $booking=DB::table('booking')->where('date','=','08/04/2022')->get();
        $i=count($booking);
        $data=json_decode(json_encode($booking),true);
        for($m=0;$m<$i;$m++){
            $a[$m]=$data[$m]['time'];
            $n[]=json_encode($a[$m],true);
        }
        foreach($booking as $b){
            $l[]=json_encode($b->time,true);
        }
        dd($l);
        return view('test',['category'=>$data]);
    }
    public function test01() {
        return view('admin.getdata.time');
    }
    public function test02() {
        return view('admin.getdata.barber');
    }
}

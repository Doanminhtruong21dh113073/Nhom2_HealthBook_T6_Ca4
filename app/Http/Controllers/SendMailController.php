<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SendNoti;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send()
    {
        $data=[
            'name'=> 'anhkhoa',
            'school' =>'huflit'
            
        ];
        Mail::to('doanminhtruong0506@gmail.com')->send(new SendNoti($data));    
    }
}
<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailcontroller extends Controller
{
    function sendEmail(){
         $to = "aliakram4731@gmail.com";
         $msg = "dummy mail";
         $subject = "Code Step by Step";


         Mail::to($to)->send(new JobPosted($msg, $subject));

    }
}

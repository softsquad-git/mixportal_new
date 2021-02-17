<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Mail\ReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function index(Request $request){
        $topic = $request->get('title');
        return view('advert.report',['topic'=>"Zgłoszenie ogłoszenia o tytule: ".$topic]);

    }

    public function sendReport(Request $request){
        $topic = $request->get('topic');
        $email = $request->get('email');
        $content =$request->get('content');

        Mail::to('biuro@gacode.pl')->send(new ReportMail($topic,$content,$email));
        return view('advert.success');
    }
}

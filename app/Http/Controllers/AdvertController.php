<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Mail\QuestionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdvertController extends Controller
{
    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {

        $data = Advert::with(['location','mainphoto','category','payment','allphotos','user'])->get();
      //  die(var_dump($data));
        return view('advert.list',["list"=>$data]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByUser(Request $request)
    {
        $id = Auth::user()->id;

        $data = Advert::with(['location','mainphoto','category','payment','allphotos'])->where('user_id',$id)->get();
        //die(var_dump($data));
        return view('advert.list',["list"=>$data]);
    }




}

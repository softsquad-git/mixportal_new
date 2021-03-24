<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdvertController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
     //   $this->middleware('auth');
    }

    //Active Advert
    public function active(Request $request)
    {
        if($request->user()->admin ==1) {
            $id = $request->get('id');
            $advertData = Advert::find($id);
            $advertData->disactive = true;
            $advertData->save();

            return response($id, 200);
        }
        return response('',501);
    }

    //disActive Advert
    public function disactive(Request $request)
    {
        if($request->user()->admin ==1) {
        $id = $request->get('id');
        $advertData = Advert::find($id);
        $advertData->disactive =false ;
        $advertData->save();
        return response($id,200);
            }
        return response('',501);

    }

    //delete Advert
    public function delete(Request $request)
    {
        $id = $request->get('id');
        $advertData = Advert::find($id);
        if($request->user()->admin ==1 || $advertData->user_id == $request->user()->id ) {

            $advertData->delete();
            return response($id,200);
        }
        return response('error',501);
    }



}

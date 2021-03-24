<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth','admin']);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = null;
        if(isset($request->all()['id'])) {
            $id = $request->all()['id'];
            $data = News::find($id);
        }
        return view('news.addnews',["newsData"=>$data]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images/news'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/news/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            return  $response;
        }
    }
}
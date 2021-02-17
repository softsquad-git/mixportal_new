<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ImageUploadController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload()
    {
        // return view('imageUpload');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4068',
        ]);
        $image = $request->file('image');

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $location = public_path('images/adverts/' . $imageName);
        $img = Image::make($image->path());
        $img->resize(1024, 1024, function ($constraint) {
            $constraint->aspectRatio();
        })->save($location);


        return $imageName;
    }

    public function removeImageFromStorage(Request $request)
    {
        unlink(public_path('images/adverts/' . $request->get('name')));
        Photos::where('url', $request->get('name'))->delete();
        return response('', 200);

    }

    public function removeImageToNewsFromStorage(Request $request)
    {
        unlink(public_path('images/news/' . $request->get('name')));
        Photos::where('url', $request->get('name'))->delete();
        return response('ok', 200);
    }

    public function photoToNews(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8096',
        ]);
        $image = $request->file('image');

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $img = Image::make($image->path());
        $location = public_path('images/news/' . $imageName);
        $img->resize(1024, 1024, function ($constraint) {
            //    $constraint->aspectRatio();
        })->save($location);

        return $imageName;
    }
}



<?php

namespace App\Http\Controllers;

use App\Advert;
use App\PayuPayments;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Categories;
use App\Facility;
use App\Facility2Advert;
use App\Locations2Advert;
use App\Mail\RegisterMail;
use App\Mail\UserNotification;
use App\PaymentSetting;
use App\Photos;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Psr7\_caseless_remove;

class NewAdvertController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(Request $request){
        $typeOfAdvert = (int)$request->get('type');
        $existData =[];
        $advert_id = (int)$request->get('id');

        if($advert_id) {
            $existData = Advert::with(['location', 'allphotos', 'category', 'subcategory', 'payment'])->where('id', $advert_id)->get()[0];
            $typeOfAdvert = $existData['type'];
        }



       if($existData)$typeOfAdvert = $existData->category['main'];

       $CategoriesList = Categories::where('main',$typeOfAdvert)->get();


        $FacilitiesList = Facility::all();

        $paymentSetting = PaymentSetting::where('type',$typeOfAdvert)->get();
        if($advert_id)return view('advert.add', ['data'=>$existData,'type'=>$typeOfAdvert,'categories'=>$CategoriesList,'facilities'=>$FacilitiesList,'paymentSetting'=>$paymentSetting]);
        if($typeOfAdvert) {
            return view('advert.add', ['data'=>[],'type'=>$typeOfAdvert,'categories'=>$CategoriesList,'facilities'=>$FacilitiesList,'paymentSetting'=>$paymentSetting]);
        }else{
            return view('advert.add', ['data'=>[],'type'=>$typeOfAdvert,'categories'=>$CategoriesList,'facilities'=>$FacilitiesList,'paymentSetting'=>$paymentSetting]);
        }
    }

    public function create(Request $request){
        $data = $request->all();


        $FacilitiesCount = Facility::all()->count();
        $id = Auth::user()->id;

        if(isset($data['id'])){
            $updatedData = Advert::find($data['id']);
            $updatedData->id_category = $data['category'];
            $updatedData->id_subcategory = $data['subcategory'] ?? null;
            $updatedData->title = $data['title'];
            $updatedData->type = $data['type'];
            $updatedData->slug = Str::slug($data['title'], '-');
            $updatedData->content = $data['content'] ?? '';
            $updatedData->street = $data['street'] ?? null;
            $updatedData->price = $data['price'];
            $updatedData->www = $data['www'] ?? null;
            $updatedData->phone = $data['phone'];
            $updatedData->email = $data['email'] ?? null;
            $updatedData->emailVisible = $data['emailVisible'] ?? null;
            $updatedData->fb = $data['facebook'] ?? null;
            $updatedData->instagram = $data['instagram'] ?? null;
            $updatedData->yt = $data['youtube'] ?? null;
            $updatedData->soundcloud = $data['soundcloud'] ?? null;
            $updatedData->disactive = 0;

            $updatedData->save();

            $cityObject = json_decode($data['hiddenCity']);


            if(isset($cityObject)){
                // UPDATE LOCATIONS
                $location = Locations2Advert::where('id_advert',$data['id'])->update([
                    'place_id' => $cityObject->properties->osm_id,
                    'geocode' => new Point($cityObject->geometry->coordinates[0], $cityObject->geometry->coordinates[1]),
                    'text' => $cityObject->properties->display_name
                ]);

            }


            //save photo2advert
            for ($number = 0; $number < 5; $number++) {
                if (isset($data['image_' . $number]) && Photos::where('url',$data['image_' . $number])->first() == null)Photos::create([
                    'id_advert' => $data['id'],
                    'url' => $data['image_' . $number]
                ]);
            }


            //save facilities2advert
            if($data['type'] == 100)for($number = 1; $number < (int)$FacilitiesCount; $number++) {
                if ($data['fac_' . $number] == 1) {
                    if (Facility2Advert::where('id_facilities', '=', $number)->first() == null) {
                        Facility2Advert::create([
                            'id_advert' => $data['id'],
                            'id_facilities' => $number
                        ]);
                    }else{

                    }
                }
                   else{
                      // die(var_dump(Facility2Advert::where('id_facilities','=',$number)));
                       Facility2Advert::where('id_facilities','=',$number)->where('id_advert','=',$data['id'])->delete();}
                }


            return redirect()->route('ogloszenia');

        }else {

            $advertData = Advert::create([
                'user_id' => $id,
                'id_category' => $data['category'],
                'id_subcategory' => $data['subcategory'] ?? null,
                'title' => $data['title'],
                'type'=> $data['type'],
                'slug'=> $slug = Str::slug($data['title'], '-'),
                'content' => $data['content'] ?? '',
                'street'=>$data['street'] ?? null,
                'price' => $data['price'],
                'www' => $data['www'],
                'email' => $data['email'],
                'emailVisible' => $data['emailVisible'],
                'phone' => $data['phone'],
                'fb' => $data['facebook'],
                'instagram' => $data['instagram'],
                'yt' => $data['youtube'] ?? null,
                'soundcloud' => $data['soundcloud'] ?? null
            ]);


            $cityObject = json_decode($data['hiddenCity']);


            // SAVE LOCATIONS
            $location = Locations2Advert::create([
                'id_advert' => $advertData->id,
                'place_id' => $cityObject->properties->osm_id,
                'geocode' => new Point($cityObject->geometry->coordinates[0], $cityObject->geometry->coordinates[1]),
                'text' => $cityObject->properties->display_name
            ]);


            //save photo2advert
            for ($number = 0; $number < 5; $number++) {
                if (isset($data['image_' . $number])) Photos::create([
                    'id_advert' => $advertData->id,
                    'url' => $data['image_' . $number]
                ]);
            }

            //save facilities2advert

            if($data['type'] == 100)for($number = 1; $number < (int)$FacilitiesCount; $number++) {
                if ($data['fac_' . $number] == 1) {
                    Facility2Advert::create([
                        'id_advert' => $advertData['id'],
                        'id_facilities' => $number
                    ]);
                }
            }

          // die(var_dump("asd"));
            if($request->user()->admin ==1) {
                $paymentSetting = PaymentSetting::where('type',$data['type'])->get();

                $result = PayuPayments::create([
                    'user_id'=>$request->user()->id,
                    'id_advert'=>$advertData->id,
                    'payable_type'=>$data['type'],
                    'firstname'=>$request->user()->firstname,
                    'surname'=>$request->user()->surname,
                    'company'=>$request->user()->company,
                    'nip'=>$request->user()->nip,
                    'street'=>$request->user()->street,
                    'postcode'=>$request->user()->postcode,
                    'city'=>$request->user()->city,
                    'state'=>$request->user()->state,
                    'email'=>$request->user()->email,
                    'amount'=>$paymentSetting[0]['price'],
                    'status'=> 'SUCCESS' , // rozpoczęte
                ]);
                return redirect()->route('success');
            }else
            return redirect()->route('payment', ['type' => $data['type'], 'id' => $advertData->id]);
        }

    }
}

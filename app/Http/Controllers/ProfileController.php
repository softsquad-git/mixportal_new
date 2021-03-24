<?php

namespace App\Http\Controllers;

use App\Advert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $provinceInPoland = ["Dolnośląskie", "Kujawsko-pomorskie", "Lubelskie", "Lubuskie", "Łudzkie","Małopolskie","Mazowieckie","Opolskie","Podkarpackie","Podlaskie","Pomorskie","Śląskie","Świętokrzyskie","Warmińsko-mazurskie","Wielkopolskie","Zachodniopomorskie"];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
         $dataUser = $request->user();
         return view('profile',["data"=>$dataUser,'states' => $this->provinceInPoland]);
    }

    public function store(Request $request){
        $data = $request->all();
        $dataUserId = $request->user()->id;
        $user = User::find($dataUserId);
        $user->firstname = $data['firstname'] ?? '';
        $user->surname = $data['surname'] ?? '';
        $user->company = $data['company'] ?? '';
        $user->nip = $data['nip'] ?? null;
        $user->city = $data['city'] ?? '';
        $user->postcode = $data['postcode'] ?? '';
        $user->state = $data['state'] ?? '';
        $user->street = $data['street'] ?? '';
        $user->save();

        $dataUser = User::where("id","=",$dataUserId)->get()[0];

        return view('profile',["data"=>$dataUser,'states' => $this->provinceInPoland,"successData"=>true]);
    }
    public function changeEmail(Request $request){
        $data = $request->all();
        $dataUserId = $request->user()->id;
        $user = User::find($dataUserId);
        $user->email = $data["email"] ?? '';

        $user->save();
        $dataUser = User::where("id","=",$dataUserId)->get()[0];

        Auth::logout();
        return redirect('/login');
    }

    public function removeUser(Request $request){
        $user = User::find(Auth::user()->id);
        Auth::logout();

         if ($user->delete()){
           return redirect('/login');
        }

    }
}

<?php

namespace App\Http\Controllers\User\Adverts;

use App\Ads\Ad;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adverts\AdvertRequest;
use App\PayuPayments;
use App\Repositories\Adverts\AdvertRepository;
use App\Repositories\Adverts\AdvertsAmenityRepository;
use App\Repositories\Categories\CategoryRepository;
use App\Services\Adverts\AdvertService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use \Illuminate\View\View;
use Srmklive\PayPal\Services\ExpressCheckout;
use \Illuminate\Http\JsonResponse;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;
use \Exception;
use function GuzzleHttp\Promise\queue;

class AdvertController extends Controller
{
    /**
     * @var AdvertService $advertService
     */
    private $advertService;

    /**
     * @var AdvertsAmenityRepository $advertAmenityRepository
     */
    private $advertAmenityRepository;

    /**
     * @var AdvertRepository $advertRepository
     */
    private $advertRepository;

    /**
     * @var CategoryRepository $categoryRepository
     */
    private $categoryRepository;

    public function __construct(
        AdvertService $advertService,
        AdvertRepository $advertRepository,
        AdvertsAmenityRepository $advertAmenityRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->advertService = $advertService;
        $this->advertRepository = $advertRepository;
        $this->advertAmenityRepository = $advertAmenityRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $filters['user'] = Auth::id();
        $data = $this->advertRepository->findBy($filters);

        return view('user.adverts.index', [
            'title' => App::getLocale() == 'pl' ? 'Dodane ogłoszenia' : 'Added ads',
            'data' => $data
        ]);
    }


    public function create(AdvertRequest $request, string $type)
    {
        if ($request->isMethod('POST')) {
            $item = $this->advertService->save($request->all());

            return redirect()->route('user.advert.payment', ['adId' => $item->id]);
        }

        return view('user.adverts.form', [
            'title' => '',
            'item' => new Ad(),
            'type' => $type,
            'amenities' => $this->advertAmenityRepository->findBy(['lang' => App::getLocale()]),
            'categories' => $this->categoryRepository->findBy(['lang' => App::getLocale()])
        ]);
    }

    public function update(AdvertRequest $request, int $id)
    {
        $item = $this->advertRepository->find($id);
        if ($request->isMethod('POST')) {
            $this->advertService->save($request->all(), $item);

            return redirect()->route('user.advert.payment', ['adId' => $item->id]);
        }

        return view('user.adverts.form', [
            'title' => $item->title,
            'item' => $item,
            'type' => $item->type,
            'amenities' => $this->advertAmenityRepository->findBy(['lang' => App::getLocale()]),
            'categories' => $this->categoryRepository->findBy(['lang' => App::getLocale()])
        ]);
    }

    /**
     * @param int $adId
     * @return Application|Factory|View
     */
    public function payment(int $adId)
    {
        return view('user.adverts.payment', [
            'title' => 'Wybierz sposób płatności',
            'id' => $adId
        ]);
    }



    public function getPayment(int $adId, string $type)
    {
        $ad = $this->advertRepository->find($adId);
        $user = Auth::user();
        $result = PayuPayments::create([
            'user_id' => Auth::id(),
            'id_advert' => $adId,
            'payable_type' => $type,
            'firstname'=>$user->firstname,
            'surname'=>$user->surname,
            'company'=>$user->company,
            'nip'=>$user->nip,
            'street'=>$user->street,
            'postcode'=>$user->postcode,
            'city'=>$user->city,
            'state'=>$user->state,
            'email'=>$user->email,
            'amount' => 150*100,
            'status' => 0, // rozpoczęte
            'token' => Str::random(64)
        ]);

        if ($type == 'paypal') {
            return $this->paypal($ad, $type, $user, $result->token);
        }

        return redirect('/');

    }

    public function success(string $token)
    {
        $pay = PayuPayments::where('token', $token)->first();
        if ($pay) {
            $ad = $this->advertRepository->find($pay->id_advert);
            if ($ad) {
                //invoice

                //activate
                $ad->update(['status' => 1]);

                return redirect('/');
            }

            return redirect('/');
        }

        return redirect('/');
    }

    public function paypal($ad, $type, $user, $token)
    {
        $adId = $ad->id;
        $pay = [];
        $pay['items'] = [
            [
                'name' => 'Zakup tokenów - ',
                'price' => 150,
                'desc'  => 'Zakup tokenów na stronie internetowej',
                'qty' => 1
            ]
        ];
        $pay['invoice_id'] = Str::random(12);
        $pay['invoice_description'] = "Zakup tokenów. Zamówienia ID ${adId}";
        $pay['return_url'] = route('payment.success', ['token' => $token]);
        $pay['cancel_url'] = url('/');
        $pay['total'] = 150;


        $paypal = new ExpressCheckout();
        $paypal->setCurrency('PLN');
        $res = $paypal->setExpressCheckout($pay);
        return Redirect::to($res['paypal_link']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Categories;
use App\CategoryTranslate;
use App\ChildCategoriesAdvert;
use App\Facility;
use App\Locations2Advert;
use App\Mail\QuestionMail;
use App\News;
use App\Repositories\Adverts\AdvertRepository;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\News\NewsRepository;
use Couchbase\SearchSortGeoDistance;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use \Illuminate\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;

class HomeController extends Controller
{
    /**
     * @var NewsRepository $newsRepository
     */
    private $newsRepository;

    /**
     * @var AdvertRepository $adsRepository
     */
    private $adsRepository;

    /**
     * @var CategoryRepository $categoriesRepository
     */
    private $categoriesRepository;

    /**
     * @param NewsRepository $newsRepository
     * @param AdvertRepository $advertRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        NewsRepository $newsRepository,
        AdvertRepository $advertRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->adsRepository = $advertRepository;
        $this->categoriesRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $filters['pagination'] = 20;
        $filters['lang'] = App::getLocale();
        $data = $this->newsRepository->findBy($filters);

        return view('home', [
            'news' => $data
        ]);
    }

    /**
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $slug)
    {
        $item = $this->newsRepository->findOneBy(['slug' => $slug]);

        return view('news.news', [
            'item' => $item
        ]);
    }

    public function publicList(Request $request)
    {
        $filters = $request->all();
        $data = $this->adsRepository->findBy($filters);

        return view('advert.publicList', [
            'data' => $data,
            'categories' => $this->categoriesRepository->findBy(['lang' => App::getLocale()])
        ]);
    }

    public function talent($slug)
    {
        $data = Advert::with(['location', 'mainphoto', 'category', 'payment', 'allphotos', 'user', 'facility'])->where('slug', $slug)->where('disactive', '=', '0')->get();
        if (!empty($data[0])) return view('advert.item', ['data' => $data[0]]);

        else return abort(404, 'Page not found');
    }

    public function childCategories(Request $request)
    {

        return json_encode(ChildCategoriesAdvert::where('main', $request->get('id'))->get());

    }

    public function question(Request $request)
    {
        $data = $request->all();

        $messages = [
            'g-recaptcha-response.required' => 'Musisz potwierdzić reCAPTCHA',
            'g-recaptcha-response.captcha' => 'Błąd reCAPTCHA',
        ];

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Mail::to($data['emailToSend'])->send(new QuestionMail($data));
        if ($data['back'] ?? null != null) return redirect()->back()->with('sendQuestion', 'Twoje zapytanie zostało wysłane.');
        else  return view('advert.success', ['question' => true, 'slug' => $data['slug']]);
    }


}

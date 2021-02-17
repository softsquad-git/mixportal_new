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
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
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
        $advertList = [];

        $data = $request->all();

        $categoriesList = CategoryTranslate::where('lang', App::getLocale())
            ->whereHas('category', function ($q) use ($data) {
                $q->where('main', $data['type'])->with('childs');
            })->get();

        $facilityList = [];

        if ($data['type'] == 100) $facilityList = Facility::all();

        if (isset($data['hiddenCity'])) {

            $hiddenCity = json_decode($data['hiddenCity']);
            $point = new Point($hiddenCity->geometry->coordinates[0], $hiddenCity->geometry->coordinates[1]);

            $catQueryBuilder = [];
            $facQueryBuilder = [];

            for ($i = 0; $i < count($categoriesList); $i++) {
                if (isset($data['cat_' . $categoriesList[$i]->id]) && $data['cat_' . $categoriesList[$i]->id] == 1) {
                    array_push($catQueryBuilder, $categoriesList[$i]->id);
                }

            }

            if ($facilityList) {
                for ($i = 0; $i < count($facilityList); $i++) {
                    if (isset($data['cat_' . $facilityList[$i]->id]) && $data['cat_' . $facilityList[$i]->id] == 1) {
                        array_push($facQueryBuilder, $facilityList[$i]->id);
                    }

                }
            }

            if ($data['type'] == 1000) {
                $query = Advert::with(['location', 'mainphoto', 'category', 'payment', 'allphotos', 'user', 'facility'])
                    ->whereHas('location', function ($query) use ($hiddenCity, $data) {
                        $query->where(DB::raw('ST_DISTANCE(geocode,Point(' . $hiddenCity->geometry->coordinates[1] . ',' . $hiddenCity->geometry->coordinates[0] . '))* 111.38'), '<', $data['distance']);
                    })->whereHas('category', function ($query) use ($data, $catQueryBuilder) {
                        if ($catQueryBuilder) $query->whereIn('id', $catQueryBuilder)->where('main', '=', $data['type']);
                        else $query->where('main', '=', $data['type']);
                    });

                $textSubCategory = ChildCategoriesAdvert::find($data['subcategory']);

                $advertList = $query->where('disactive', '=', 0)->whereHas('payment', function ($query) {
                    $query->whereRaw('payu_payments.updated_at <= TIMESTAMPADD(year,1,CURRENT_TIMESTAMP) AND payu_payments.status = "SUCCESS"');
                })->where('id_subcategory', '=', $data['subcategory'])->get();

            } else {
                $query = Advert::with(['location', 'mainphoto', 'category', 'payment', 'allphotos', 'user', 'facility'])
                    ->whereHas('location', function ($query) use ($hiddenCity, $data) {
                        $query->where(DB::raw('ST_DISTANCE(geocode,Point(' . $hiddenCity->geometry->coordinates[1] . ',' . $hiddenCity->geometry->coordinates[0] . '))* 111.38'), '<', $data['distance']);
                    })->whereHas('category', function ($query) use ($data, $catQueryBuilder) {
                        if ($catQueryBuilder) $query->whereIn('id', $catQueryBuilder)->where('main', '=', $data['type']);
                        else $query->where('main', '=', $data['type']);
                    });

                if ($facQueryBuilder) $query->whereHas('facility', function ($query) use ($data, $facQueryBuilder) {
                    $query->whereIn('id', $facQueryBuilder);
                });


                $advertList = $query->where('disactive', '=', 0)->whereHas('payment', function ($query) {
                    $query->whereRaw('payu_payments.updated_at <= TIMESTAMPADD(year,1,CURRENT_TIMESTAMP) AND payu_payments.status = "SUCCESS"');
                })->get();
            }
        }


        return view('advert.publicList', [
            'textSubcategories' => $textSubCategory ?? null,
            'old' => $data,
            'list' => $advertList,
            'categories' => $categoriesList,
            'facility' => $facilityList
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

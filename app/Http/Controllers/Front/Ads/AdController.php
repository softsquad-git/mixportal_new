<?php

namespace App\Http\Controllers\Front\Ads;

use App\Ads\AdTranslate;
use App\Http\Controllers\Controller;
use App\Repositories\Adverts\AdvertRepository;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * @var AdvertRepository $adRepository
     */
    private $adRepository;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->adRepository = $advertRepository;
    }

    public function show(int $id)
    {
        $item = AdTranslate::find($id);

        return view('advert.show', [
            'item' => $item
        ]);
    }
}

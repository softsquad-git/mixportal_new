<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertsAmentityResource;
use App\Repositories\Adverts\AdvertsAmenityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdvertAmenityController extends Controller
{
    protected $advertsAmenityRepository;

    public function __construct(AdvertsAmenityRepository $advertsAmenityRepository)
    {
        $this->advertsAmenityRepository = $advertsAmenityRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        try {
            $data = $this->advertsAmenityRepository->findBy(['lang' => App::getLocale()]);
            return AdvertsAmentityResource::collection($data);
        } catch (\Exception $e) {
            return response()->json(['success' => 0]);
        }
    }
}

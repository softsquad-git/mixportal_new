<?php

namespace App\Http\Controllers\Api\Ads;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Repositories\Adverts\AdvertRepository;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * @var AdvertRepository $advertRepository
     */
    protected $advertRepository;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->advertRepository = $advertRepository;
    }

    public function all(Request $request)
    {
        try {
            $data = $this->advertRepository->findBy($request->all());

            return AdsResource::collection($data);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 1,
                'message' => $exception->getMessage()
            ]);
        }
    }
}

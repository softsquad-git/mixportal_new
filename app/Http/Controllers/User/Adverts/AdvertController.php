<?php

namespace App\Http\Controllers\User\Adverts;

use App\Ads\Ad;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adverts\AdvertRequest;
use App\Repositories\Adverts\AdvertRepository;
use App\Services\Adverts\AdvertService;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * @var AdvertService $advertService
     */
    private $advertService;

    /**
     * @var AdvertRepository $advertRepository
     */
    private $advertRepository;

    public function __construct(AdvertService $advertService, AdvertRepository $advertRepository)
    {
        $this->advertService = $advertService;
        $this->advertRepository = $advertRepository;
    }

    public function create(AdvertRequest $request, string $type)
    {
        if ($request->isMethod('POST')) {
            $this->advertService->save($request->all());

            return redirect()->route('home');
        }

        return view('user.adverts.form', [
            'title' => '',
            'item' => new Ad(),
            'type' => $type
        ]);
    }
}

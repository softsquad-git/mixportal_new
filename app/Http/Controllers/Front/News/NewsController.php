<?php

namespace App\Http\Controllers\Front\News;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use Illuminate\Http\Request;
use \Illuminate\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;
use \Exception;

class NewsController extends Controller
{
    /**
     * @var NewsRepository $newsRepository
     */
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     * @throws Exception
     */
    public function show(int $id)
    {
        $item = $this->newsRepository->findOneBy(['id' => $id]);
        if (!$item) {
            throw new Exception(trans('trans.exceptions.no_found'));
        }

        return view('front.pages.show', [
            'item' => $item
        ]);
    }
}

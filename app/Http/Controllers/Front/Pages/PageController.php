<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use App\Repositories\Pages\PageRepository;
use \Illuminate\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;
use \Exception;

class PageController extends Controller
{
    /**
     * @var PageRepository $pageRepository
     */
    private $pageRepository;

    /**
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param string $alias
     * @return Application|Factory|View
     * @throws Exception
     */
    public function findAlias(string $alias)
    {
        $item = $this->pageRepository->findByOne(['alias' => $alias]);

        return view('front.pages.show', [
            'item' => $item
        ]);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Repositories\Pages\PageRepository;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class GlobalComposer
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
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('pages', [
            'footer' => $this->pageRepository->findBy(['lang' => App::getLocale()])
        ]);
    }
}
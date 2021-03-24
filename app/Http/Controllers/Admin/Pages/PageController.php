<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Page;
use App\Repositories\Pages\PageRepository;
use App\Services\Pages\PageService;
use Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;
use \Exception;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;

class PageController extends Controller
{
    /**
     * @var PageRepository $pageRepository
     */
    private $pageRepository;

    /**
     * @var PageService $pageService
     */
    private $pageService;

    /**
     * @param PageRepository $pageRepository
     * @param PageService $pageService
     */
    public function __construct(PageRepository $pageRepository, PageService $pageService)
    {
        $this->pageRepository = $pageRepository;
        $this->pageService = $pageService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = $this->pageRepository->findBy([]);

        return view('admin.pages.index', [
            'data' => $data,
            'title' => 'Lista stron'
        ]);
    }

    /**
     * @param PageRequest $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function create(PageRequest $request)
    {
        if ($request->isMethod('POST')) {
            $this->pageService->save($request->all());

            return redirect()->route('admin.pages.index');
        }

        return view('admin.pages.form', [
            'item' => new Page(),
            'title' => 'Dodaj stronę'
        ]);
    }

    /**
     * @param PageRequest $request
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function update(PageRequest $request, int $id)
    {
        $item = $this->pageRepository->find($id);
        if ($request->isMethod('POST')) {
            $this->pageService->save($request->all(), $item);

            return redirect()->route('admin.pages.index');
        }

        return view('admin.pages.form', [
            'item' => $item,
            'title' => 'Edytuj stronę'
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(int $id): RedirectResponse
    {
        $item = $this->pageRepository->find($id);
        $this->pageService->delete($item);

        return redirect()->route('admin.pages.index');
    }
}

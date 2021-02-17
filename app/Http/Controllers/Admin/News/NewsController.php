<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\News;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\News\NewsRepository;
use App\Services\News\NewsService;
use Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;
use \Exception;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @var NewsService $newsService
     */
    private $newsService;

    /**
     * @var NewsRepository $newsRepository
     */
    private $newsRepository;

    /**
     * @var CategoryRepository $categoryRepository
     */
    private $categoryRepository;

    /**
     * @param NewsRepository $newsRepository
     * @param NewsService $newsService
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(NewsRepository $newsRepository, NewsService $newsService, CategoryRepository $categoryRepository)
    {
        $this->newsService = $newsService;
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->newsRepository->findBy(['pagination' => 20, 'lang' => 'pl']);

        return view('admin.news.index', [
            'data' => $data,
            'title' => 'Lista newsów'
        ]);
    }

    /**
     * @param NewsRequest $request
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function create(NewsRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $this->newsService->save($data);

            return redirect()->route('admin.news.index');
        }

        return view('admin.news.form', [
            'title' => 'Dodaj news',
            'item' => new News(),
            'categories' => $this->categoryRepository->findAll()
        ]);
    }

    /**
     * @param NewsRequest $request
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function update(NewsRequest $request, int $id)
    {
        $item = $this->newsRepository->find($id);
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $this->newsService->save($data, $item);

            return redirect()->route('admin.news.index');
        }

        return view('admin.news.form', [
            'title' => 'Edytuj news',
            'item' => $item,
            'categories' => $this->categoryRepository->findAll()
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(int $id): RedirectResponse
    {
        $item = $this->newsRepository->find($id);
        $this->newsService->remove($item);

        return redirect()->route('admin.news.index');
    }
}

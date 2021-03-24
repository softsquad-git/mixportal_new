<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\NewsRequest;
use App\News;
use App\Repositories\News\NewsRepository;
use App\Services\News\NewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Illuminate\View\View;
use \Illuminate\Contracts\Foundation\Application;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Http\RedirectResponse;
use \Exception;

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
     * @param NewsService $newsService
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsService $newsService, NewsRepository $newsRepository)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
        $this->newsRepository = $newsRepository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        return view('news.list', [
            'news' => $news
        ]);

    }

    /**
     * @param NewsRequest $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function create(NewsRequest $request)
    {
        if ($request->isMethod('POST')) {
            $this->newsService->save($request->all());

            return redirect()->route('listnews');
        }

        return view('news.form', [
            'item' => new News(),
            'title' => trans('trans.nav.news_create')
        ]);
    }

    /**
     * @param NewsRequest $request
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function edit(NewsRequest $request, int $id)
    {
        $item = $this->newsRepository->find($id);
        if ($request->isMethod('POST')) {
            $this->newsService->save($request->all(), $item);

            return redirect()->route('listnews');
        }

        return view('news.form', [
            'item' => $item,
            'title' => trans('trans.nav.news_edit')
        ]);
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        News::find($data['id'])->delete();

        $news = News::all();
        return redirect('listnews')->with(['news' => $news]);
    }
}

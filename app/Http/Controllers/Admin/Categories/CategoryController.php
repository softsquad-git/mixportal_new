<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Categories\CategoryRepository;
use App\Services\Categories\CategoryService;
use \Illuminate\View\View;
use \Exception;
use Illuminate\Http\RedirectResponse;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository $categoryRepository
     */
    private $categoryRepository;

    /**
     * @var CategoryService $categoryService
     */
    private $categoryService;

    /**
     * @param CategoryService $categoryService
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryService $categoryService, CategoryRepository $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = $this->categoryRepository->findBy(['pagination' => 20]);

        return view('admin.categories.index', [
            'title' => 'Lista kategorii',
            'data' => $data
        ]);
    }

    /**
     * @param CategoryRequest $request
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function create(CategoryRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $this->categoryService->save($data);

            return redirect()->route('admin.categories.index');
        }

        return view('admin.categories.form', [
            'title' => 'Dodaj kategorię',
            'item' => new Categories()
        ]);
    }

    /**
     * @param CategoryRequest $request
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function update(CategoryRequest $request, int $id)
    {
        $item = $this->categoryRepository->find($id);
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $this->categoryService->save($data, $item);

            return redirect()->route('admin.categories.index');
        }

        return view('admin.categories.form', [
            'item' => $item,
            'title' => 'Edytuj kategorię'
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(int $id): RedirectResponse
    {
        $item = $this->categoryRepository->find($id);
        $this->categoryService->delete($item);

        return redirect()->route('admin.categories.index');
    }
}

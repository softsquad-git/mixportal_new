<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Categories\SubCategoriesResource;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\SubCategoryRepository;
use \Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use \Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use \Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository $categoryRepository
     */
    protected $categoryRepository;

    /**
     * @var SubCategoryRepository $subCategoriesRepository
     */
    protected $subCategoriesRepository;

    public function __construct(CategoryRepository $categoryRepository, SubCategoryRepository $subCategoriesRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->subCategoriesRepository = $subCategoriesRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function getCategories(Request $request)
    {
        try {
            $data = $this->categoryRepository->findBy(['lang' => App::getLocale()]);

            return CategoryResource::collection($data);
        } catch (Exception $e) {
            return response()->json([
                'success' => 0,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function getSubCategories(Request $request)
    {
        try {
            $data = $this->subCategoriesRepository->getSubCategories($request->get('category_id'));

            return SubCategoriesResource::collection($data);
        } catch (Exception $e) {
            return response()->json([
                'success' => 0,
                'msg' => $e->getMessage()
            ]);
        }
    }
}

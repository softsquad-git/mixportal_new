<?php

namespace App\Repositories\Categories;

use App\ChildCategoriesAdvert;
use App\ChildCategoryTranslate;
use \Exception;

class SubCategoryRepository
{
    /**
     * @param int $id
     * @return ChildCategoriesAdvert|null
     * @throws Exception
     */
    public function find(int $id): ?ChildCategoriesAdvert
    {
        $item = ChildCategoriesAdvert::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception('Brak elementu');
    }

    /**
     * @param int $categoryId
     * @return mixed
     */
    public function getSubCategories(int $categoryId)
    {
        return ChildCategoryTranslate::orderBy('id', 'DESC')
            ->whereHas('category', function ($q) use ($categoryId) {
               $q->where('main', $categoryId);
            })->get();

    }
}
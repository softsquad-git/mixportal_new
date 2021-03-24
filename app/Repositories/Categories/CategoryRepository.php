<?php

namespace App\Repositories\Categories;

use App\Categories;
use App\CategoryTranslate;
use \Illuminate\Database\Eloquent\Collection;
use \Exception;

class CategoryRepository
{
    /**
     * @param bool $isTranslate
     * @return Categories[]|CategoryTranslate[]|Collection
     */
    public function findAll(bool $isTranslate = true)
    {
        if ($isTranslate) {
            return CategoryTranslate::all();
        }

        return Categories::all();
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function findBy(array $filters)
    {
        $data = CategoryTranslate::orderBy('category_id', 'DESC');

        if (isset($filters['lang']) && !empty($filters['lang'])) {
            $data->where('lang', $filters['lang']);
        }

        if (isset($filters['main']) && !empty($filters['main'])) {
            $data->whereHas('category', function ($q) use ($filters) {
                $q->where('main', $filters['main']);
            });
        }

        if (isset($filters['pagination']) && !empty($filters['pagination'])) {
            return $data->paginate($filters['pagination']);
        }

        return $data->get();
    }

    /**
     * @param int $id
     * @return Categories|null
     * @throws Exception
     */
    public function find(int $id): ?Categories
    {
        $item = Categories::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception('Kategoria nie istnieje');
    }
}
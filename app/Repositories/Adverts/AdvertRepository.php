<?php

namespace App\Repositories\Adverts;

use App\Ads\AdTranslate;
use Illuminate\Support\Facades\App;

class AdvertRepository
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function findBy(array $filters)
    {
        $data = AdTranslate::where('lang', App::getLocale())
            ->orderBy('id', 'DESC');

        if (isset($filters['title']) && !empty($filters['title'])) {
            $data->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['category']) && !empty($filters['category'])) {
            $data->whereHas('ad', function ($q) use ($filters) {
                $q->where('category_id', $filters['category']);
            });
        }

        if (isset($filters['subcategory']) && !empty($filters['subcategory'])) {
            $data->whereHas('ad', function ($q) use ($filters) {
                $q->where('subcategory_id', $filters['subcategory']);
            });
        }

        if (isset($filters['type']) && !empty($filters['type'])) {
            $data->whereHas('ad', function ($q) use ($filters) {
                $q->where('type', $filters['type']);
            });
        }

        return $data->paginate(20);
    }
}
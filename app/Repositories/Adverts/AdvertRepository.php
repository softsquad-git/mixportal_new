<?php

namespace App\Repositories\Adverts;

use App\Ads\Ad;
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

        if (isset($filters['user']) && !empty($filters['user'])) {
            $data->whereHas('ad', function ($q) use ($filters) {
                $q->where('user_id', $filters['user']);
            });
        }

        if (isset($filters['place_id']) && !empty($filters['place_id'])) {
            $data->whereHas('ad.location', function ($q) use ($filters) {
                $q->where('place_id', $filters['place_id']);
            });
        }

        return $data->paginate(20);
    }

    public function find(int $id)
    {
        return Ad::find($id);
    }
}
<?php

namespace App\Repositories\Adverts;
use App\AdAmenity;
use App\AdAmenityTranslate;
use \Exception;

class AdvertsAmenityRepository
{
    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function find(int $id)
    {
        $item = AdAmenity::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function findBy(array $filters)
    {
        $data = AdAmenityTranslate::orderBy('id', 'DESC');
        if (isset($filters['lang']) && !empty($filters['lang'])) {
            $data->where('lang', $filters['lang']);
        }

        return $data->get();
    }
}
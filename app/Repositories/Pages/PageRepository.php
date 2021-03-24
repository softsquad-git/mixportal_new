<?php

namespace App\Repositories\Pages;
use App\Page;
use \Exception;

class PageRepository
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function findBy(array $filters)
    {
        $data = Page::orderBy('id', isset($filters['ordering']) ? $filters['ordering'] : 'DESC');

        if (isset($filters['lang']) && !empty($filters['lang'])) {
            $data->where('lang', $filters['lang']);
        }

        return $data->get();
    }

    /**
     * @param int $id
     * @return Page|null
     * @throws Exception
     */
    public function find(int $id): ?Page
    {
        $item = Page::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }

    /**
     * @param array $filters
     * @return Page|null
     * @throws Exception
     */
    public function findByOne(array $filters): ?Page
    {
        $item = Page::where($filters)->first();
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }
}
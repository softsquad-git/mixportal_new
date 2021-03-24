<?php

namespace App\Repositories\News;

use App\News;
use App\NewsTranslation;
use \Exception;

class NewsRepository
{
    /**
     * @param int $id
     * @return News|null
     * @throws Exception
     */
    public function find(int $id): ?News
    {
        $item = News::find($id);
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
        $news = NewsTranslation::orderBy('news_id', 'DESC');

        if (isset($filters['lang']) && !empty($filters['lang'])) {
            $news->where('lang', $filters['lang']);
        }

        if (isset($filters['title']) && !empty($filters['title'])) {
            $news->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['pagination']) && !empty($filters['pagination'])) {
            return $news->paginate($filters['pagination']);
        }

        return $news;
    }

    /**
     * @param array $filters
     * @return NewsTranslation|null
     */
    public function findOneBy(array $filters): ?NewsTranslation
    {
        return NewsTranslation::where($filters)->first();
    }
}
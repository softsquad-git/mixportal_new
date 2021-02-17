<?php

namespace App\Services\Pages;
use App\Page;
use \Exception;
use Illuminate\Support\Str;

class PageService
{
    /**
     * @param array $data
     * @param Page|null $page
     * @return Page|null
     */
    public function save(array $data, Page $page = null): ?Page
    {
        if ($page) {
            $page->update($data);

            return $page;
        }

        $data['alias'] = Str::slug($data['title'], '-');

        return Page::create($data);
    }

    /**
     * @param Page $page
     * @return bool|null
     * @throws Exception
     */
    public function delete(Page $page): ?bool
    {
        return $page->delete();
    }
}
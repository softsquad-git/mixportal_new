<?php

namespace App\Services\Categories;

use App\Categories;
use App\CategoryTranslate;
use \Exception;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    /**
     * @param array $data
     * @param Categories|null $categories
     * @return Categories|null
     * @throws Exception
     */
    public function save(array $data, Categories $categories = null): ?Categories
    {
        $translations = $data['trans'];
        if ($categories) {
            foreach ($translations as $lang => $translation) {
                $trans = $categories->getLangTranslate($lang);
                if ($trans) {
                    $trans->update(['text' => $translation['text']]);
                } else {
                    if (!empty($translation['text'])) {
                        CategoryTranslate::create([
                            'category_id' => $categories->id,
                            'text' => $translation['text'],
                            'lang' => $lang
                        ]);
                    }
                }
            }

            return $categories;
        }

        DB::beginTransaction();
        try {
            $category = Categories::create($data);
            $data = [];
            foreach ($translations as $lang => $translation) {
                $data[] = [
                    'category_id' => $category->id,
                    'lang' => $lang,
                    'text' => $translation['text']
                ];
            }

            CategoryTranslate::insert($data);
            DB::commit();

            return $categories;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Nie udało się dodać kategorii');
        }
    }

    /**
     * @param Categories $categories
     * @return bool|null
     * @throws Exception
     */
    public function delete(Categories $categories): ?bool
    {
        return $categories->delete();
    }
}
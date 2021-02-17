<?php

namespace App\Services\News;

use App\News;
use App\NewsTranslation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Exception;
use Illuminate\Support\Str;

class NewsService
{
    /**
     * @var array
     */
    const IMAGE = [
        'path' => 'data/media/news/',
        'df' => 'default.png'
    ];

    /**
     * @param array $data
     * @param News|null $news
     * @return News|null
     * @throws Exception
     */
    public function save(array $data, News $news = null): ?News
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $data['src_image'] = $this->uploadImage($data['image']);
        }
        $translations = $data['trans'];
        if ($news) {
            foreach ($translations as $lang => $translation) {
                $trans = $news->getLangTranslate($lang);
                if ($trans) {
                    $trans->update([
                        'title' => $translation['title'],
                        'text' => $translation['wysiwyg-editor'],
                        'alias' => Str::slug($translation['title'], '-'),
                        'pretext' => $translation['pretext']
                    ]);
                } else {
                    NewsTranslation::create([
                        'lang' => $lang,
                        'news_id' => $news->id,
                        'title' => $translation['title'],
                        'text' => $translation['wysiwyg-editor'],
                        'alias' => Str::slug($translation['title'], '-'),
                        'pretext' => $translation['pretext']
                    ]);
                }
            }

            return $news;
        }

        DB::beginTransaction();
        try {
            $data['user_id'] = Auth::id();
            $news = News::create($data);
            $data = [];
            foreach ($translations as $lang => $translation) {
                $data[] = [
                    'title' => $translation['title'],
                    'lang' => $lang,
                    'alias' => Str::slug($translation['title'], '-'),
                    'text' => $translation['wysiwyg-editor'],
                    'news_id' => $news->id,
                    'pretext' => $translation['pretext']
                ];
            }

            NewsTranslation::insert($data);

            DB::commit();

            return $news;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param News $news
     * @return bool|null
     * @throws Exception
     */
    public function remove(News $news): ?bool
    {
        return $news->delete();
    }

    /**
     * @param UploadedFile $file
     * @return string|null
     * @throws Exception
     */
    protected function uploadImage(UploadedFile $file): ?string
    {
        $fileName = Str::random(32) . '.' . $file->getClientOriginalExtension();

        try {
            $file->move(self::IMAGE['path'], $fileName);

            return $fileName;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
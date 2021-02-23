<?php

namespace App\Services\Adverts;

use App\Ads\Ad;
use App\Ads\AdPhoto;
use App\Ads\AdTranslate;
use App\AdvertAmenity;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Exception;
use Illuminate\Support\Str;

class AdvertService
{
    /**
     * @var string
     */
    const AD_IMAGES_SRC = 'data/media/ad/';

    /**
     * @var UploadFileService $uploadService
     */
    protected $uploadService;

    public function __construct(UploadFileService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function save(array $data, Ad $ad = null): ?Ad
    {
        $translations = json_decode($data['trans']);
        //dd($data);
        $data['user_id'] = Auth::id();
        $images = [];
        if (isset($data['images']) && !empty($data['images'])) {
            $images = $this->uploadService->uploadFile(self::AD_IMAGES_SRC, $data['images']);
        }

        if ($ad) {

        }

        DB::beginTransaction();
        try {
            $ad = Ad::create($data);
            $data['amenities'] = json_decode($data['amenities']);
            if ($data['type'] == 'accommodation') {
                $data['amenities'] = json_decode($data['amenities'], true);
                $amenities = [];
                foreach ($data['amenities'] as $amenity) {
                    $amenities[] = [
                        'ad_id' => $ad->id,
                        'amenity_id' => $amenity
                    ];
                }
                AdvertAmenity::insert($amenities);
            }
            $data = [];
            foreach ($translations as $lang => $translation) {
                $data[] = [
                    'ad_id' => $ad->id,
                    'lang' => $lang,
                    'slug' => Str::slug($translation->title, '-'),
                    'title' => $translation->title,
                    'content' => $translation->content,
                    'price' => $translation->price
                ];
            }
            DB::commit();
            AdTranslate::insert($data);
            if (count($images) > 0) {
                $this->saveImages($images, $ad);
            }

            DB::commit();
            return $ad;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param array $images
     * @param Ad $ad
     */
    public function saveImages(array $images, Ad $ad)
    {
        $data = [];
        foreach ($images as $image) {
            $data[] = [
                'ad_id' => $ad->id,
                'src' => $image
            ];
        }

        return AdPhoto::insert($data);
    }

    /**
     * @param Ad $ad
     * @return bool|null
     * @throws Exception
     */
    public function remove(Ad $ad): ?bool
    {
        return $ad->delete();
    }
}
<?php

namespace App\Services\Adverts;

use App\AdImages;
use App\AdLocation;
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

    /**
     * @param UploadFileService $uploadService
     */
    public function __construct(UploadFileService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * @param array $data
     * @param Ad|null $ad
     * @return Ad|null
     * @throws Exception
     */
    public function save(array $data, Ad $ad = null): ?Ad
    {
        $data['user_id'] = Auth::id();
        $images = [];
        if (isset($data['images']) && !empty($data['images'])) {
            $images = $this->uploadService->uploadFile(self::AD_IMAGES_SRC, $data['images']);
        }

        $translations = $data['trans'];

        if ($ad) {

        }

        DB::beginTransaction();
        try {
            $data['status'] = 0;
            $ad = Ad::create($data);

            if (is_array($translations) && count($translations) > 0) {
                $dataTrans = [];
                foreach ($translations as $lang => $translation) {
                    $dataTrans[] = [
                        'ad_id' => $ad->id,
                        'title' => $translation['title'],
                        'lang' => $lang,
                        'slug' => Str::slug($translation['title'], '-'),
                        'content' => $translation['content'],
                        'price' => $translation['price']
                    ];
                }

                AdTranslate::insert($dataTrans);
            }

            if (
                $data['type'] == 'accommodation'
                && is_array($data['amenities'])
                && count($data['amenities']) > 0
            ) {
                foreach ($data['amenities'] as $amenity) {
                    AdvertAmenity::create([
                        'ad_id' => $ad->id,
                        'amenity_id' => $amenity
                    ]);
                }
            }

            if (is_array($images) && count($images) > 0) {
                $dataImages = [];
                foreach ($images as $image) {
                    $dataImages[] = [
                        'ad_id' => $ad->id,
                        'src' => $image
                    ];
                }

                AdImages::insert($dataImages);
            }

            if (
                isset($data['location_lat'])
                || isset($data['location_lng'])
                || isset($data['location_place_id']
                )) {
                AdLocation::create([
                    'ad_id' => $ad->id,
                    'lat' => $data['location_lat'],
                    'lng' => $data['location_lng'],
                    'place_id' => $data['location_place_id']
                ]);
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
     * @return mixed
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
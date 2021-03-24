<?php

namespace App;

use App\Ads\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertAmenity extends Model
{
    protected $table = 'advert_amenities';

    protected $fillable = [
        'ad_id',
        'amenity_id'
    ];

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    public function amenity(): BelongsTo
    {
        return $this->belongsTo(AdAmenityTranslate::class);
    }
}

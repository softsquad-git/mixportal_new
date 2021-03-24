<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdAmenityTranslate extends Model
{
    protected $table = 'ads_amenities_trans';

    protected $fillable = [
        'amenity_id',
        'name',
        'lang'
    ];

    public function amenity(): BelongsTo
    {
        return $this->belongsTo(AdAmenity::class);
    }
}

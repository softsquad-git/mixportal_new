<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdAmenity extends Model
{
    protected $table = 'ads_amenities';

    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this->hasMany(AdAmenityTranslate::class, 'amenity_id');
    }
}

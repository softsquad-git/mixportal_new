<?php

namespace App;

use App\Ads\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdAmenityPivot extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ad_amenity_pivot';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'ad_id',
        'amenity_id'
    ];

    /**
     * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    /**
     * @return BelongsTo
     */
    public function amenity(): BelongsTo
    {
        return $this->belongsTo(AdAmenityTranslate::class);
    }
}

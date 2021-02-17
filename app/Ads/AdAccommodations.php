<?php

namespace App\Ads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdAccommodations extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ads_accommodation';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'ad_id',
        'city',
        'address'
    ];

    /**
     * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}

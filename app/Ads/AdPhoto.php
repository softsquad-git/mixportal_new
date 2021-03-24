<?php

namespace App\Ads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdPhoto extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ads_photos';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'ad_id',
        'src'
    ];

    /**
     * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}

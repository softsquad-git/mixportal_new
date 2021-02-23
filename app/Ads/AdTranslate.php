<?php

namespace App\Ads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdTranslate extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ads_translate';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'ad_id',
        'lang',
        'title',
        'slug',
        'content',
        'price'
    ];

    /**
     * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}

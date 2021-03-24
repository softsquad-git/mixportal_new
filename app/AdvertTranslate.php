<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertTranslate extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'adverts_translate';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'lang',
        'advert_id',
        'title',
        'content',
        'price',
        'price_from',
        'price_to',
        'street'
    ];

    /**
     * @return BelongsTo
     */
    public function advert(): BelongsTo
    {
        return $this->belongsTo(Advert::class);
    }
}

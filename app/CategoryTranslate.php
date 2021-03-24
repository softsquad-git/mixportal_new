<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryTranslate extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'categories_advert_translate';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'category_id',
        'lang',
        'text'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}

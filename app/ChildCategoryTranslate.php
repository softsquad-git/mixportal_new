<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildCategoryTranslate extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'child_categories_advert_translate';

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
        return $this->belongsTo(ChildCategoriesAdvert::class);
    }
}

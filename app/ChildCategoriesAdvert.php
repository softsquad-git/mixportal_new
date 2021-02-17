<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChildCategoriesAdvert extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'child_categories_advert';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'main'
    ];

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * @return HasMany
     */
    public function translates(): HasMany
    {
        return $this->hasMany(ChildCategoryTranslate::class, 'category_id');
    }

}

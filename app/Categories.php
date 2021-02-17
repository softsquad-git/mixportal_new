<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories_advert';

    protected $primaryKey = 'id';

    protected $fillable = [
        'parent',
        'depth',
        'main'
    ];

    public function childs()
    {
        return $this->hasMany(ChildCategoriesAdvert::class,'main','id');
    }

    /**
     * @return HasMany
     */
    public function translates(): HasMany
    {
        return $this->hasMany(CategoryTranslate::class, 'category_id');
    }

    /**
     * @param string $lang
     * @return Model|HasMany|object|null
     */
    public function getLangTranslate(string $lang)
    {
        return $this->translates()->where('lang', $lang)->first();
    }
}

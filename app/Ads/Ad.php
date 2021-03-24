<?php

namespace App\Ads;

use App\AdImages;
use App\AdLocation;
use App\AdvertAmenity;
use App\Categories;
use App\Services\Adverts\AdvertService;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ad extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ads';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'subcategory_id',
        'type',
        'price',
        'phone',
        'email',
        'email_visible',
        'www',
        'fb',
        'ig',
        'yt',
        'soundcloud',
        'mixcloud',
        'beatport',
        'status',
        'address'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(AdTranslate::class, 'ad_id');
    }

    /**
     * @return HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(AdImages::class, 'ad_id');
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        $image = $this->photos()->first();
        if ($image) {
            return AdvertService::AD_IMAGES_SRC.$image->src;
        }

        return null;
    }

    /**
     * @return HasOne
     */
    public function accommodation(): HasOne
    {
        return $this->hasOne(AdAccommodations::class, 'ad_id');
    }

    public function amenities(): HasMany
    {
        return $this->hasMany(AdvertAmenity::class, 'ad_id');
    }

    /**
     * @return HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(AdLocation::class, 'ad_id');
    }

    /**
     * @param string $lang
     * @return Model|HasMany|object|null
     */
    public function getLangTranslate(string $lang)
    {
        return $this->translations()->where('lang', $lang)->first();
    }
}

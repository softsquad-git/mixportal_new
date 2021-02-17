<?php

namespace App;

use App\Services\News\NewsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'news';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'src_image',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(NewsTranslation::class, 'news_id');
    }

    /**
     * @param string $lang
     * @return Model|HasMany|object|null
     */
    public function getLangTranslate(string $lang)
    {
        return $this->translations()->where('lang', $lang)->first();
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        if ($this->src_image) {
            return asset(NewsService::IMAGE['path'].$this->src_image);
        }

        return asset(NewsService::IMAGE['path'].NewsService::IMAGE['df']);
    }
}

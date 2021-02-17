<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsTranslation extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'news_translation';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'news_id',
        'lang',
        'title',
        'text',
        'alias',
        'pretext'
    ];

    /**
     * @return BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}

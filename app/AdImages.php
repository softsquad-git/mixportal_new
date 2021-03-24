<?php

namespace App;

use App\Ads\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdImages extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'ad_images';

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

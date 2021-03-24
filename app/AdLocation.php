<?php

namespace App;

use App\Ads\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdLocation extends Model
{
    protected $table = 'ads_location';

    protected $fillable = [
        'ad_id',
        'lat',
        'lng',
        'address',
        'place_id',
        'text',
    ];

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteTabs extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'pages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'alias',
        'content'
    ];
}

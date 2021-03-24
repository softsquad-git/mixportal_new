<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'pages';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'title',
        'alias',
        'content',
        'lang'
    ];
}

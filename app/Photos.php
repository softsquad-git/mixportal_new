<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advert_photos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_advert','url','name'
    ];
}

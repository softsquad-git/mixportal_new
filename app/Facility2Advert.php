<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility2Advert extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'facilities2advert';
    protected $fillable = [
        'id_facilities','id_advert'
    ];
    public $timestamps = false;
}

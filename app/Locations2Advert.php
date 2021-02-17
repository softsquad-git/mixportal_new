<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Locations2Advert extends Model
{
    use SpatialTrait;
    protected $table = 'locations_advert';
    protected $fillable = [
        'id_advert','lan','log','address','place_id','text','geocode'
    ];
    protected $spatialFields = [
        'geocode'
    ];
    public $timestamps = false;
}

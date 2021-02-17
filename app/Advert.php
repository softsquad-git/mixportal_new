<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adverts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id','id_category','id_subcategory','type','title','slug','content','street','price','price_from','price_to', 'phone', 'email','emailVisible','www','fb','instagram','yt','soundcloud','disactive'
    ];

    /**
     * Get the post that owns the locations
     */
    public function location()
    {
        return $this->hasMany(Locations2Advert::class,'id_advert','id');
    }

    /**
     * Get the post that owns the locations
     */
    public function allphotos()
    {
        return $this->hasMany(Photos::class,'id_advert','id');
    }

    public function facility()
    {
       return $this->belongsToMany(Facility::class,'facilities2advert','id_advert','id_facilities');
    }

    /**
     * Get the post that owns the locations
     */
    public function mainphoto()
    {
        return $this->hasOne(Photos::class,'id_advert','id');
    }

    /**
 * Get the post that owns the locations
 */
    public function category()
    {
        return $this->hasOne(Categories::class,'id','id_category');
    }
    /**
     * Get the post that owns the locations
     */
    public function subcategory()
    {
        return $this->hasOne(ChildCategoriesAdvert::class,'id','id_subcategory');
    }

    /**
     * Get the post that owns the locations
     */
    public function payment()
    {
        return $this->hasOne(PayuPayments::class,'id_advert','id')->orderBy('created_at', 'desc');
    }

    /**
     * Get the post that owns the locations
     */
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($advert) { // before delete() method call this
            $advert->location()->delete();
            $advert->allphotos()->delete();
            $advert->payment()->delete();
            $f2a =Facility2Advert::where('id_advert','=',$advert->id);
            $f2a->delete();

        });
    }
}

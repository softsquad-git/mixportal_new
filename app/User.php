<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'firstname',
        'surname',
        'company',
        'nip',
        'street',
        'state',
        'city',
        'postcode',
        'email',
        'password',
        'admin',
        'country',
        'is_payer_vat',
        'type'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstname . ' ' . $this->surname;
    }

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adverts()
    {
        return $this->hasMany(Advert::class, 'user_id', 'id');
    }

    public function payu()
    {
        return $this->hasMany(PayuPayments::class, 'user_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($advert) { // before delete() method call this
            $advert->adverts()->each(function ($adv) {
                $adv->delete(); // <-- direct deletion
            });

        });
    }


}

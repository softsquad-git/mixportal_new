<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayuPayments extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'payu_payments';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'user_id',
        'id_advert',
        'account',
        'payable_id',
        'payable_type',
        'txnid',
        'firstname',
        'lastname',
        'company',
        'nip',
        'street',
        'city',
        'state',
        'postcode',
        'email',
        'phone',
        'amount',
        'discount',
        'data',
        'status', ''
    ];
}

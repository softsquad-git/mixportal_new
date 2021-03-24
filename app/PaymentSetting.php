<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_setting';
    protected $primaryKey = 'id';

    protected $fillable = [
       'name','description','price','type'
    ];
}

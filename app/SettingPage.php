<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingPage extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'settings_page';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'type',
        'value'
    ];

    /**
     * @param string $type
     * @return string|null
     */
    public function getNameType(string $type): ?string
    {
        switch ($type) {
            case 'service_name':
                return 'Nazwa serwisu';
                break;
            case 'facebook_url':
                return 'Link do fb';
                break;
            case 'payu_pos_id':
                return 'PayU PosId';
                break;
            case 'payu_signature_key':
                return 'PayU Signature Key';
                break;
            case 'payu_client_id':
                return 'PayU ClientId';
                break;
            case 'payu_client_secret':
                return 'PayU Client Secret';
                break;
            case 'paypal_client_id':
                return 'PayPal ClientId';
                break;
            case 'paypal_client_secret':
                return 'PayPal Client Secret';
                break;
            default:
                return $type;
                break;
        }
    }
}

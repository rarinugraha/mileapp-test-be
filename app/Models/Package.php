<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'transaction_id',
        'customer_name',
        'customer_code',
        'transaction_amount',
        'transaction_discount',
        'transaction_additional_field',
        'transaction_payment_type',
        'transaction_state',
        'transaction_code',
        'transaction_order',
        'location_id',
        'organization_id',
        'transaction_payment_type_name',
        'transaction_cash_amount',
        'transaction_cash_change',
        'customer_attribute',
        'origin_data',
        'destination_data',
        'custom_field',
        'currentLocation',
    ];

    public function connote()
    {
        return $this->hasOne(Connote::class, 'transaction_id', 'transaction_id');
    }
}

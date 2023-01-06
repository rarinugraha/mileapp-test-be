<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Connote extends Model
{
    use HasFactory;

    protected $primaryKey = 'connote_id';
    protected $fillable = [
        'connote_id',
        'connote_number',
        'connote_service',
        'connote_service_price',
        'connote_amount',
        'connote_code',
        'connote_booking_code',
        'connote_order',
        'connote_state',
        'connote_state_id',
        'zone_code_from',
        'zone_code_to',
        'surcharge_amount',
        'transaction_id',
        'actual_weight',
        'volume_weight',
        'chargeable_weight',
        'organization_id',
        'location_id',
        'connote_total_package',
        'connote_surcharge_amount',
        'connote_sla_day',
        'location_name',
        'location_type',
        'source_tariff_db',
        'id_source_tariff',
        'pod',
        'history',
    ];

    public function koli()
    {
        return $this->hasMany(Koli::class, 'connote_id', 'connote_id');
    }
}

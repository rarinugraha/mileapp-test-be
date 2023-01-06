<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'transaction_id' => $this->transaction_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
            'transaction_amount' => $this->transaction_amount,
            'transaction_discount' => $this->transaction_discount,
            'transaction_additional_field' => $this->transaction_additional_field,
            'transaction_payment_type' => $this->transaction_payment_type,
            'transaction_state' => $this->transaction_state,
            'transaction_code' => $this->transaction_code,
            'transaction_order' => $this->transaction_order,
            'location_id' => $this->location_id,
            'organization_id' => $this->organization_id,
            'created_at' => datetimeTz($this->created_at),
            'updated_at' => datetimeTz($this->updated_at),
            'transaction_payment_type_name' => $this->transaction_payment_type_name,
            'transaction_cash_amount' => $this->transaction_cash_amount,
            'transaction_cash_change' => $this->transaction_cash_change,
            'customer_attribute' => $this->customer_attribute,
            'connote' => [
                'connote_id' => $this->connote->connote_id,
                'connote_number' => $this->connote->connote_number,
                'connote_service' => $this->connote->connote_service,
                'connote_service_price' => $this->connote->connote_service_price,
                'connote_amount' => $this->connote->connote_amount,
                'connote_code' => $this->connote->connote_code,
                'connote_booking_code' => $this->connote->connote_booking_code,
                'connote_order' => $this->connote->connote_order,
                'connote_state' => $this->connote->connote_state,
                'connote_state_id' => $this->connote->connote_state_id,
                'zone_code_from' => $this->connote->zone_code_from,
                'zone_code_to' => $this->connote->zone_code_to,
                'surcharge_amount' => $this->connote->surcharge_amount,
                'transaction_id' => $this->connote->transaction_id,
                'actual_weight' => $this->connote->actual_weight,
                'volume_weight' => $this->connote->volume_weight,
                'chargeable_weight' => $this->connote->chargeable_weight,
                'created_at' => datetimeTz($this->created_at),
                'updated_at' => datetimeTz($this->updated_at),
                'organization_id' => $this->connote->organization_id,
                'location_id' => $this->connote->location_id,
                'connote_total_package' => $this->connote->connote_total_package,
                'connote_surcharge_amount' => $this->connote->connote_surcharge_amount,
                'connote_sla_day' => $this->connote->connote_sla_day,
                'location_name' => $this->connote->location_name,
                'location_type' => $this->connote->location_type,
                'source_tariff_db' => $this->connote->source_tariff_db,
                'id_source_tariff' => $this->connote->id_source_tariff,
                'pod' => $this->connote->pod,
                'history' => $this->connote->history,
            ],
            'connote_id' => $this->connote->connote_id,
            'origin_data' => $this->origin_data,
            'destination_data' => $this->destination_data,
            'koli_data' => $this->connote->koli->map(function ($item, $key) {
                return [
                    'koli_length' => $item->koli_length,
                    'awb_url' => $item->awb_url,
                    'created_at' => datetimeStd($item->created_at),
                    'koli_chargeable_weight' => $item->koli_chargeable_weight,
                    'koli_width' => $item->koli_width,
                    'koli_surcharge' => $item->koli_surcharge,
                    'koli_height' => $item->koli_height,
                    'updated_at' => datetimeStd($item->updated_at),
                    'koli_description' => $item->koli_description,
                    'koli_formula_id' => $item->koli_formula_id,
                    'connote_id' => $item->connote_id,
                    'koli_volume' => $item->koli_volume,
                    'koli_weight' => $item->koli_id,
                    'koli_id' => $item->koli_id,
                    'koli_custom_field' => $item->koli_custom_field,
                    'koli_code' => $item->koli_code,
                ];
            }),
            'custom_field' => $this->custom_field,
            'currentLocation' => $this->currentLocation,
        ];
    }
}

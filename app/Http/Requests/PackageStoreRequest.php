<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string => 'required', mixed>
     */
    public function rules()
    {
        if ($this->isMethod('POST') || $this->isMethod('PUT')) {
            return [
                'customer_name' => 'required',
                'customer_code' => 'required|numeric',
                'transaction_amount' => 'required|numeric',
                'transaction_discount' => 'required|numeric',
                'transaction_additional_field' => '',
                'transaction_payment_type' => 'required|numeric',
                'transaction_state' => 'required',
                'transaction_code' => 'required',
                'transaction_order' => 'required|numeric',
                'location_id' => 'required',
                'organization_id' => 'required|numeric',
                'transaction_payment_type_name' => 'required',
                'transaction_cash_amount' => 'required|numeric',
                'transaction_cash_change' => 'required|numeric',

                'customer_attribute.Nama_Sales' => 'required',
                'customer_attribute.TOP' => 'required',
                'customer_attribute.Jenis_Pelanggan' => 'required',

                'connote.connote_number' => 'required|numeric',
                'connote.connote_service' => 'required',
                'connote.connote_service_price' => 'required|numeric',
                'connote.connote_amount' => 'required|numeric',
                'connote.connote_code' => 'required',
                'connote.connote_booking_code' => '',
                'connote.connote_order' => 'required|numeric',
                'connote.connote_state' => 'required',
                'connote.connote_state_id' => 'required|numeric',
                'connote.zone_code_from' => 'required',
                'connote.zone_code_to' => 'required',
                'connote.surcharge_amount' => '',
                'connote.actual_weight' => 'required|numeric',
                'connote.volume_weight' => 'required|numeric',
                'connote.chargeable_weight' => 'required|numeric',
                'connote.organization_id' => 'required|numeric',
                'connote.location_id' => 'required',
                'connote.connote_total_package' => 'required|numeric',
                'connote.connote_surcharge_amount' => 'required|numeric',
                'connote.connote_sla_day' => 'required|numeric|min:1|max:7',
                'connote.location_name' => 'required',
                'connote.location_type' => 'required',
                'connote.source_tariff_db' => 'required',
                'connote.id_source_tariff' => 'required|numeric',
                'connote.pod' => '',
                'connote.history' => 'array',

                'origin_data.customer_name' => 'required',
                'origin_data.customer_address' => 'required',
                'origin_data.customer_email' => 'nullable|email',
                'origin_data.customer_phone' => 'required',
                'origin_data.customer_address_detail' => '',
                'origin_data.customer_zip_code' => 'required|numeric|digits_between:5,6',
                'origin_data.zone_code' => 'required',
                'origin_data.organization_id' => 'required|numeric',
                'origin_data.location_id' => 'required',

                'destination_data.customer_name' => 'required',
                'destination_data.customer_address' => 'required',
                'destination_data.customer_email' => 'nullable|email',
                'destination_data.customer_phone' => 'required',
                'destination_data.customer_address_detail' => '',
                'destination_data.customer_zip_code' => 'required|numeric|digits_between:5,6',
                'destination_data.zone_code' => 'required',
                'destination_data.organization_id' => 'required|numeric',
                'destination_data.location_id' => 'required',

                'koli_data.*.koli_length' => 'required|numeric',
                'koli_data.*.koli_chargeable_weight' => 'required|numeric',
                'koli_data.*.koli_width' => 'required|numeric',
                'koli_data.*.koli_surcharge' => 'array',
                'koli_data.*.koli_height' => 'required|numeric',
                'koli_data.*.koli_description' => 'required',
                'koli_data.*.koli_formula_id' => '',
                'koli_data.*.koli_volume' => 'required|numeric',
                'koli_data.*.koli_weight' => 'required|numeric',
                'koli_data.*.koli_custom_field' => '',

                'custom_field' => '',

                'currentLocation.name' => 'required',
                'currentLocation.code' => 'required',
                'currentLocation.type' => 'required',
            ];
        } else {
            return [
                'transaction_state' => 'required'
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}

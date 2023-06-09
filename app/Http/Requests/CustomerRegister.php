<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegister extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if (request()->role == 'user') {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'bussiness_name' => 'required',
                'bussiness_phone' => 'required',
                'bussiness_tax_id' => 'required',
                'bussiness_industry_type' => 'required',
                'shipping_street_address' => 'required',
                'shipping_department' => 'required',
                'shipping_country_id' => 'required',
                'shipping_city_id' => 'required',
                'shipping_state_id' => 'required',
                'shipping_zip_code' => 'required',
                'billing_street_address' => 'required',
                'billing_department' => 'required',
                'billing_country_id' => 'required',
                'billing_state_id' => 'required',
                'billing_city_id.required' => 'The billing city  field is required.',
                'billing_zip_code' => 'required',
            ];
        }else{
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'vendor_business_name' => 'required',
                'vendor_business_phone' => 'required',
                'vendor_vat' => 'required',
                // 'vendor_total_employee' => 'required',
                'vendor_tax_id' => 'required',
                // 'vendor_industry_type' => 'required',
                'vendor_street_address' => 'required',
                'vendor_department' => 'required',
                'vender_country_id' => 'required',
                'vender_state_id' => 'required',
                'vender_city_id' => 'required',
                'vender_zip_code' => 'required',
            ];
        }
    }
    public function messages()
    {
        if (request()->role == 'user') {
            return [
                'business_name.required' => 'The bussiness name field is required.',
                'business_phone.required' => 'The bussiness phone field is required.',
                'bussiness_tax_id.required' => 'The bussiness tax id field is required.',
                'business_industry_type.required' => 'The bussiness industry type field is required.',
                'shipping_street_address.required' => 'The shipping street address field is required.',
                'shipping_department.required' => 'The shipping department field is required.',
                'shipping_country_id.required' => 'The shipping country  field is required.',
                'shipping_city_id.required' => 'The shipping city  field is required.',
                'shipping_state_id.required' => 'The shipping state  field is required.',
                'shipping_zip_code.required' => 'The shipping zip code  field is required.',
                'billing_street_address.required' => 'The billing street address field is required.',
                'billing_department.required' => 'The billing department field is required.',
                'billing_country_id.required' => 'The billing country  field is required.',
                'billing_city_id.required' => 'The billing city  field is required.',
                'billing_state_id.required' => 'The billing state  field is required.',
                'billing_zip_code.required' => 'The billing zip code  field is required.',
            ];
        }else{
            return [
                'vendor_business_name.required' => 'The bussiness name field is required.',
                'vendor_business_phone.required' => 'The bussiness phone field is required.',
                'vendor_tax_id.required' => 'The bussiness tax id field is required.',
                'vendor_industry_type.required' => 'The bussiness industry type field is required.',
                'vendor_street_address.required' => 'The billing street address field is required.',
                'vendor_department.required' => 'The billing department field is required.',
                'vender_country_id.required' => 'The billing country  field is required.',
                'vender_state_id.required' => 'The billing state  field is required.',
                'vender_city_id.required' => 'The billing city  field is required.',
                'vender_zip_code.required' => 'The billing zip code  field is required.',
            ];
        }
    }
}

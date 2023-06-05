<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\BusinessInformation;
use Illuminate\Support\Facades\Hash;

class RegisterCustomer
{
    public static function userRegistration($request)
    {
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        // Business Information
        $bussiness_information = new BusinessInformation();
        $bussiness_information['name'] = $request->bussiness_phone;
        $bussiness_information['phone'] = $request->bussiness_phone;
        $bussiness_information['tax_id'] = $request->bussiness_tax_id;
        $bussiness_information['industry_type'] = $request->bussiness_industry_type;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information->save();

        // Shipping Address
        $shipping_address = new ShippingAddress();
        $shipping_address['user_id'] = $user->id;
        $shipping_address['street_address'] = $request->shipping_street_address;
        $shipping_address['department'] = $request->shipping_department;
        $shipping_address['country_id'] = $request->shipping_country_id;
        $shipping_address['state_id'] = $request->shipping_state_id;
        $shipping_address['city_id'] = $request->shipping_city_id;
        $shipping_address['zip_code'] = $request->shipping_zip_code;
        $shipping_address->save();

        // Billing Address
        $billing_address = new BillingAddress();
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->billing_street_address;
        $billing_address['department'] = $request->billing_department;
        $billing_address['country_id'] = $request->billing_country_id;
        $billing_address['state_id'] = $request->billing_state_id;
        $billing_address['city_id'] = $request->billing_city_id;
        $billing_address['zip_code'] = $request->billing_zip_code;
        $billing_address->save();
    }
    public static function vendorRegistration($request){

    }
}

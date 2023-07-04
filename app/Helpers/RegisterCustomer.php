<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\BillingAddress;
use App\Models\VendorCategory;
use App\Imports\ProductsImport;
use App\Models\ShippingAddress;
use App\Models\VendorSubCategory;
use App\Models\BusinessInformation;
use App\Models\VendorChildCategory;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class RegisterCustomer
{
    public static function userRegistration($request)
    {
        
        $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'role']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        // Business Information
        $bussiness_information = new BusinessInformation();
        $bussiness_information['name'] = $request->bussiness_phone;
        $bussiness_information['phone'] = $request->bussiness_phone;
        $bussiness_information['tax_id'] = $request->bussiness_tax_id;
        $bussiness_information['industry_id'] = $request->bussiness_industry_type_id;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information->save();

        // Shipping Address
        $shipping_address = new ShippingAddress();
        $shipping_address['user_id'] = $user->id;
        $shipping_address['street_address'] = $request->shipping_street_address;
        $shipping_address['department'] = $request->shipping_department;
        $shipping_address['country_id'] = $request->shipping_country_id;
        $shipping_address['state_id'] = $request->shipping_state_id;
        $shipping_address['city_name'] = $request->shipping_city_name;
        $shipping_address['zip_code'] = $request->shipping_zip_code;
        $shipping_address->save();

        // Billing Address
        $billing_address = new BillingAddress();
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->billing_street_address;
        $billing_address['department'] = $request->billing_department;
        $billing_address['country_id'] = $request->billing_country_id;
        $billing_address['state_id'] = $request->billing_state_id;
        $billing_address['city_name'] = $request->billing_city_name;
        $billing_address['zip_code'] = $request->billing_zip_code;
        $billing_address->save();
    }
    public static function vendorRegistration($request)
    {
        $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'role']);
        // $data['role'] = 'vendor';
        $data['password'] = Hash::make($request->password);
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $data['pdf_file'] = 'uploads/' . $filename;
        }
        $user = User::create($data);

        // Business Information
        $bussiness_information = new BusinessInformation();
        $bussiness_information['name'] = $request->vendor_business_name;
        $bussiness_information['phone'] = $request->vendor_business_phone;
        $bussiness_information['tax_id'] = $request->vendor_tax_id;
        $bussiness_information['industry_id'] = $request->bussiness_industry_type_id;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information['vat'] = $request->vendor_vat;
        $bussiness_information['total_employee'] = $request->vendor_total_employee;
        $bussiness_information->save();

        // Billing Address
        $billing_address = new BillingAddress();
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->vendor_street_address;
        $billing_address['department'] = $request->vendor_department;
        $billing_address['country_id'] = $request->vender_country_id;
        $billing_address['state_id'] = $request->vender_state_id;
        $billing_address['city_name'] = $request->vender_city_name;
        $billing_address['zip_code'] = $request->vender_zip_code;
        $billing_address->save();

        if (isset($request->category_id)) {
            for ($i = 0; $i < count($request->category_id); $i++) {
                $vendor_category = new VendorCategory;
                $vendor_category->category_id = $request->category_id[$i];
                $vendor_category->vendor_id = $user->id;
                $vendor_category->save();
                if (isset($request->subcategory_id)) {
                    for ($j = 0; $j < count($request->subcategory_id); $j++) {
                        $b =  SubCategory::where('id', $request->subcategory_id[$j])->where('category_id', $request->category_id[$i])->first();
                        if (isset($b)) {
                            $vendor_subcategory = new VendorSubCategory;
                            $vendor_subcategory->category_id = $request->category_id[$i];
                            $vendor_subcategory->sub_category_id = $b->id;
                            $vendor_subcategory->vendor_id = $user->id;
                            $vendor_subcategory->save();
                        }
                        if (isset($request->childcategory_id)) {
                            for ($k = 0; $k < count($request->childcategory_id); $k++) {
                                $c =  ChildCategory::where('id', $request->childcategory_id[$k])->where('category_id', $request->category_id[$i])->where('sub_category_id', $request->subcategory_id[$j])->first();
                                if (isset($c)) {
                                    $vendor_childcategory = new VendorChildCategory;
                                    $vendor_childcategory->category_id = $request->category_id[$i];
                                    $vendor_childcategory->sub_category_id = $c->sub_category_id;
                                    $vendor_childcategory->child_category_id = $c->id;
                                    $vendor_childcategory->vendor_id = $user->id;
                                    $vendor_childcategory->save();
                                }
                            }
                        }
                    }
                }
            }
        }
        $vendor = $user->id;
        $keyValue = json_decode($request->keyValue);
       $headerMapping = $keyValue;
        if (isset($request->file)) {
            $import = new ProductsImport($vendor,$keyValue,$headerMapping);
            $file = request()->file('file')->store('temp');
            Excel::import($import, $file);
        }
    }
}

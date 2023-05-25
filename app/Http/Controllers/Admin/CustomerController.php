<?php

namespace App\Http\Controllers\Admin;

use File;
use Mail;
use Image;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Wishlist;
use App\Mail\SendPassword;
use App\Helpers\MailHelper;
use App\Models\BannerImage;
use Illuminate\Support\Str;
use App\Models\CountryState;
use Illuminate\Http\Request;
use App\Models\ProductReport;
use App\Models\ProductReview;
use App\Models\BillingAddress;
use App\Mail\AccountActivation;
use App\Models\ShippingAddress;
use App\Mail\SendSingleSellerMail;
use App\Models\BusinessInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $customers = User::with('billingAddress', 'shippingAddress', 'businessInformation')->orderBy('id', 'desc')->where('status', 1)->where('role', 'user')->get();
        $defaultProfile = BannerImage::whereId('15')->first();
        $orders = Order::all();
        return view('admin.customer', compact('customers', 'defaultProfile', 'orders'));
    }

    public function pendingCustomerList()
    {
        $customers = User::orderBy('id', 'desc')->where('status', 0)->where('role', 'user')->get();
        $defaultProfile = BannerImage::whereId('15')->first();
        $orders = Order::all();
        return view('admin.customer', compact('customers', 'defaultProfile', 'orders'));
    }

    public function show($id)
    {
        $customer = User::with('billingAddress', 'shippingAddress', 'businessInformation')->find($id);
        if ($customer) {
            $defaultProfile = BannerImage::whereId('15')->first();
            return view('admin.show_customer', compact('customer', 'defaultProfile'));
        } else {
            $notification = 'Something went wrong';
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.customer-list')->with($notification);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user_image = $user->image;
        $user->delete();
        if ($user_image) {
            if (File::exists(public_path() . '/' . $user_image)) unlink(public_path() . '/' . $user_image);
        }
        ProductReport::where('user_id', $id)->delete();
        ProductReview::where('user_id', $id)->delete();
        ShippingAddress::where('user_id', $id)->delete();
        BillingAddress::where('user_id', $id)->delete();
        Wishlist::where('user_id', $id)->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id)
    {
        $customer = User::find($id);
        if ($customer->status == 1) {
            $customer->status = 0;
            $customer->save();
            $data['name'] = $customer->first_name;
            $data['status'] = $customer->status;
            $data['subject'] = 'Account Dectivation';
            Mail::to($customer->email)->send(new AccountActivation($data));
            $message = trans('admin_validation.Inactive Successfully');
        } else {
            $customer->status = 1;
            $customer->save();
            $data['name'] = $customer->first_name;
            $data['status'] = $customer->status;
            $data['subject'] = 'Account Activation';
            Mail::to($customer->email)->send(new AccountActivation($data));
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

    public function sendEmailToAllUser()
    {
        return view('admin.send_email_to_all_customer');
    }

    public function sendMailToAllUser(Request $request)
    {
        $rules = [
            'subject' => 'required',
            'message' => 'required'
        ];
        $customMessages = [
            'subject.required' => trans('admin_validation.Subject is required'),
            'message.required' => trans('admin_validation.Message is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $users = User::where('status', 1)->get();
        MailHelper::setMailConfig();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendSingleSellerMail($request->subject, $request->message));
        }

        $notification = trans('admin_validation.Email Send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function sendMailToSingleUser(Request $request, $id)
    {
        $rules = [
            'subject' => 'required',
            'message' => 'required'
        ];
        $customMessages = [
            'subject.required' => trans('admin_validation.Subject is required'),
            'message.required' => trans('admin_validation.Message is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $user = User::find($id);
        MailHelper::setMailConfig();
        Mail::to($user->email)->send(new SendSingleSellerMail($request->subject, $request->message));

        $notification = trans('admin_validation.Email Send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function addCustomer()
    {
        $city = City::get();
        $state = CountryState::get();
        $country = Country::get();
        return view('admin.create-customer', compact('city', 'state', 'country'));
    }
    public function createCustomer(Request $request)
    {


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
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
            'billing_city_id' => 'required',
            'billing_zip_code' => 'required',
        ], [
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
        ]);
        $password = Str::random(8);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['password'] = Hash::make($password);
        $user = User::create($data);
        $data['email'] = $user->email;
        $data['password'] = $password;
        Mail::to($request->email)->send(new SendPassword($data));

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

        $notification = trans('Customer Register Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/pending-customer-list')->with($notification);
    }

    public function edit($id)
    {
        $data = User::find($id);
        $country = Country::get();
        $state = CountryState::where('country_id', $data->shippingAddress->country->id)->get();
        $city = City::where('country_state_id', $data->shippingAddress->countryState->id)->get();
        $billingState = CountryState::where('country_id', $data->billingAddress->country->id)->get();
        $billingCity = City::where('country_state_id', $data->billingAddress->countryState->id)->get();
        return view('admin.edit-customer', compact('data', 'country', 'state', 'city', 'billingState', 'billingCity'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
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
            'billing_city_id' => 'required',
            'billing_zip_code' => 'required',
        ], [
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
        ]);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['role'] = 'user';
        User::find($request->id)->update($data);

        $user = User::find($request->id);
        // Business Information
        $bussiness_information = BusinessInformation::find($user->businessInformation->id);
        $bussiness_information['name'] = $request->bussiness_phone;
        $bussiness_information['phone'] = $request->bussiness_phone;
        $bussiness_information['tax_id'] = $request->bussiness_tax_id;
        $bussiness_information['industry_type'] = $request->bussiness_industry_type;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information->save();

        // Shipping Address
        $shipping_address = ShippingAddress::find($user->shippingAddress->id);
        $shipping_address['user_id'] = $user->id;
        $shipping_address['street_address'] = $request->shipping_street_address;
        $shipping_address['department'] = $request->shipping_department;
        $shipping_address['country_id'] = $request->shipping_country_id;
        $shipping_address['state_id'] = $request->shipping_state_id;
        $shipping_address['city_id'] = $request->shipping_city_id;
        $shipping_address['zip_code'] = $request->shipping_zip_code;
        $shipping_address->save();

        // Billing Address
        $billing_address = BillingAddress::find($user->billingAddress->id);
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->billing_street_address;
        $billing_address['department'] = $request->billing_department;
        $billing_address['country_id'] = $request->billing_country_id;
        $billing_address['state_id'] = $request->billing_state_id;
        $billing_address['city_id'] = $request->billing_city_id;
        $billing_address['zip_code'] = $request->billing_zip_code;
        $billing_address->save();

        $notification = trans('Customer Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/customer-list')->with($notification);
    }
    public function getStates(Request $request)
    {
        $data =  CountryState::where('country_id', $request->id)->get();
        return response()->json([
            'success' => 'States Against Country',
            'data' => $data,
        ]);
    }
    public function getCity(Request $request)
    {
        $data =  City::where('country_state_id', $request->id)->get();
        return response()->json([
            'success' => 'Cities Against State',
            'data' => $data,
        ]);
    }
}

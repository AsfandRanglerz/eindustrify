<?php

namespace App\Http\Controllers\Auth;

use Str;
use Auth;
use Mail;
use App\Models\City;
use App\Models\User;
use App\Rules\Captcha;
use App\Models\Country;
use App\Models\Category;
use App\Helpers\MailHelper;
use App\Models\CountryState;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Mail\UserRegistration;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\BusinessInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function storeRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'agree' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4|confirmed',
            'g-recaptcha-response' => new Captcha()
        ];
        $customMessages = [
            'name.required' => trans('user_validation.Email is required'),
            'email.required' => trans('user_validation.Email is required'),
            'email.unique' => trans('user_validation.Email already exist'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password must be 4 characters'),
            'password.confirmed' => trans('user_validation.Confirm password does not match'),
            'agree.required' => trans('user_validation.Consent filed is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->agree_policy = $request->agree ? 1 : 0;
        $user->password = Hash::make($request->password);
        $user->verify_token = Str::random(100);
        $user->save();

        MailHelper::setMailConfig();

        $template = EmailTemplate::where('id', 4)->first();
        $subject = $template->subject;
        $message = $template->description;
        $message = str_replace('{{user_name}}', $request->name, $message);
        Mail::to($user->email)->send(new UserRegistration($message, $subject, $user));

        $notification = trans('user_validation.Register Successfully. Please Verify your email');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function userVerification($token)
    {
        $user = User::where('verify_token', $token)->first();
        if ($user) {
            $user->verify_token = null;
            $user->status = 1;
            $user->email_verified = 1;
            $user->save();
            $notification = trans('user_validation.Verification Successfully');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('login')->with($notification);
        } else {
            $notification = trans('user_validation.Invalid token');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function Register()
    {
        $city = City::get();
        $state = CountryState::get();
        $country = Country::get();
        $categories = Category::with('subCategories.childCategories')->get();
        // dd($categories);
        return view('register', compact('city', 'state', 'country','categories'));
    }
    public function vendorGetStates(Request $request){
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
    public function customerRegister(Request $request)
    {
        dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
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

        

        $notification = trans('Registration Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

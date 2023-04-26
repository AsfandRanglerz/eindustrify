<?php

namespace App\Http\Controllers\Auth;

use Str;
use Auth;
use Mail;
use App\Models\City;
use App\Models\User;
use App\Rules\Captcha;
use App\Models\Country;
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
        return view('register',compact('city','state','country'));
    }
    public function customerRegister(Request $request){


        $data = $request->only(['first_name','last_name','email', 'phone']);
        // $data['password'] = Hash::make('123456');
        $user = User::create($data);
        // Business Information
        $bussiness_information = new BusinessInformation();
        $bussiness_information['name'] = $request->name;
        $bussiness_information['phone'] = $request->phone;
        $bussiness_information['tax_id'] = $request->tax_id;
        $bussiness_information['industry_type'] = $request->industry_type;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information->save();
        // Shipping Address
        // $shipping_address = $request->only(['user_id','street_address','department','country_id', 'state_id','city_id','zip_code']);
        $shipping_address = new ShippingAddress();
        $shipping_address['user_id'] = $user->id;
        $shipping_address['street_address'] = $request->street_address;
        $shipping_address['department'] = $request->department;
        $shipping_address['country_id'] = $request->country_id;
        $shipping_address['state_id'] = $request->state_id;
        $shipping_address['city_id'] = $request->city_id;
        $shipping_address['zip_code'] = $request->zip_code;
        $shipping_address->save();
        // $shipping = ShippingAddress::create($shipping_address);

        // $billing_address = $request->only(['street_address','department','country_id', 'state_id','city_id','zip_code']);
        $billing_address = new BillingAddress();
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->street_address;
        $billing_address['department'] = $request->department;
        $billing_address['country_id'] = $request->country_id;
        $billing_address['state_id'] = $request->state_id;
        $billing_address['city_id'] = $request->city_id;
        $billing_address['zip_code'] = $request->zip_code;
        $billing_address->save();
        // $billing_address = BillingAddress::create($billing_address);
        $notification = trans('Registration Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

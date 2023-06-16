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
use App\Models\Industry;
use App\Helpers\MailHelper;
use App\Models\CountryState;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Mail\UserRegistration;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Helpers\RegisterCustomer;
use App\Models\BusinessInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\Helper;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\CustomerRegister;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
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
        $industries = Industry::get();
        $state = CountryState::get();
        $country = Country::get();
        $categories = Category::with('subCategories.childCategories')->get();
        $tableName = 'products';
        $columns = Schema::getColumnListing($tableName);
        $selectedColumns = array_intersect($columns, ['name', 'short_name' , 'price','slug','qty','short_description','long_description']);
        // dd($selectedColumns);
        return view('register', compact('city', 'state', 'country','categories','industries','selectedColumns'));
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
    // CustomerRegister
    public function customerRegister(CustomerRegister $request)
    {
        if($request->role=='user'){
            RegisterCustomer::userRegistration($request);
        }else{
            RegisterCustomer::vendorRegistration($request);
        }
        if(Session::get('status')=='failed'){
            Session::forget('status');
            $notification = trans('Please correct file format');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        $notification = trans('Registration Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

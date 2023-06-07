<?php

namespace App\Http\Controllers\Auth;

use Str;
use Mail;
use Socialite;
use App\Models\User;
use App\Models\Vendor;
use App\Rules\Captcha;
use App\Helpers\MailHelper;
use App\Mail\ResetPassword;
use App\Models\BannerImage;
use Illuminate\Http\Request;


use App\Models\EmailTemplate;
use App\Models\BreadcrumbImage;
use App\Models\GoogleRecaptcha;
use App\Mail\UserForgetPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator, Redirect, Response, File;
use App\Models\SocialLoginInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/user/dashboard';

    public function __construct()
    {
        $this->middleware('guest:web')->except('userLogout');
    }

    public function loginPage()
    {
        $banner = BreadcrumbImage::where(['id' => 5])->first();
        $background = BannerImage::whereId('13')->first();
        $recaptchaSetting = GoogleRecaptcha::first();
        $socialLogin = SocialLoginInformation::first();
        return view('login', compact('banner', 'background', 'recaptchaSetting', 'socialLogin'));
    }

    public function storeLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
            'password.required' => trans('user_validation.Password is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->status == 1) {
                if (Hash::check($request->password, $user->password)) {
                    if (Auth::attempt($credential, $request->remember)) {
                        $notification = trans('user_validation.Login Successfully');
                        $notification = array('messege' => $notification, 'alert-type' => 'success');
                        if (Auth::user()->role == 'user') {
                            // dd('user');
                            // Auth::logout();
                            dd(Auth::id(), 'user');
                        } elseif (Auth::user()->role == 'vendor') {
                            dd('vendor');
                        }
                        // return redirect()->intended(route('user.dashboard'))->with($notification);
                    }
                } else {
                    $notification = trans('user_validation.Credentials does not exist');
                    $notification = array('messege' => $notification, 'alert-type' => 'error');
                    return redirect()->back()->with($notification);
                }
            } else {
                $notification = trans('user_validation.Disabled Account');
                $notification = array('messege' => $notification, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = trans('user_validation.Email does not exist');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    public function forgetPage()
    {
        $banner = BreadcrumbImage::where(['id' => 5])->first();
        $recaptchaSetting = GoogleRecaptcha::first();
        return view('forget_password', compact('banner', 'recaptchaSetting'));
    }

    public function sendForgetPassword(Request $request)
    {
        $rules = [
            'email' => 'required',
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            // $user->forget_password_token = Str::random(100);
            // $user->save();

            MailHelper::setMailConfig();
            // $template = EmailTemplate::where('id',1)->first();
            // $subject = $template->subject;
            // $message = $template->description;
            // $message = str_replace('{{name}}',$user->name,$message);
            $token = Str::random(30);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token
            ]);
            $data['url'] = url('/reset-password', $token);
            Mail::to($user->email)->send(new ResetPassword($data));

            $notification = trans('user_validation.Reset password link send to your email.');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = trans('user_validation.Email does not exist');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    public function resetPasswordPage($token)
    {
        $user = User::where('forget_password_token', $token)->first();
        $banner = BreadcrumbImage::where(['id' => 5])->first();
        $recaptchaSetting = GoogleRecaptcha::first();
        return view('reset_password', compact('banner', 'recaptchaSetting', 'user', 'token'));
    }

    public function storeResetPasswordPage(Request $request, $token)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:4|confirmed',
            'g-recaptcha-response' => new Captcha()
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password must be 4 characters'),
            'password.confirmed' => trans('user_validation.Confirm password does not match'),
        ];
        $this->validate($request, $rules, $customMessages);

        $user = User::where(['email' => $request->email, 'forget_password_token' => $token])->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->forget_password_token = null;
            $user->save();

            $notification = trans('user_validation.Password Reset successfully');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('login')->with($notification);
        } else {
            $notification = trans('user_validation.Something went wrong');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        $notification = trans('user_validation.Logout Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('login')->with($notification);
    }

    public function redirectToGoogle()
    {
        SocialLoginInformation::setGoogleLoginInfo();
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
        SocialLoginInformation::setGoogleLoginInfo();
        $user = Socialite::driver('google')->user();
        $user = $this->createUser($user, 'google');
        auth()->login($user);
        return redirect()->intended(route('user.dashboard'));
    }

    public function redirectToFacebook()
    {
        SocialLoginInformation::setFacebookLoginInfo();
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallBack()
    {
        SocialLoginInformation::setFacebookLoginInfo();
        $user = Socialite::driver('facebook')->user();
        $user = $this->createUser($user, 'facebook');
        auth()->login($user);
        return redirect()->intended(route('user.dashboard'));
    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'provider_avatar' => $getInfo->avatar,
                'status' => 1,
                'email_verified' => 1,
            ]);
        }
        return $user;
    }
}

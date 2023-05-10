<?php

namespace App\Http\Controllers\Admin;

use File;
use Mail;
use Image;
use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use App\Mail\SendPassword;
use App\Helpers\MailHelper;
use App\Models\BannerImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductReport;
use App\Models\ProductReview;
use App\Models\BillingAddress;
use App\Mail\AccountActivation;
use App\Models\ShippingAddress;
use App\Mail\SendSingleSellerMail;
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
        $customers = User::with('billingAddress', 'shippingAddress', 'businessInformation')->orderBy('id', 'desc')->where('status', 1)->where('role','user')->get();
        $defaultProfile = BannerImage::whereId('15')->first();
        $orders = Order::all();
        return view('admin.customer', compact('customers', 'defaultProfile', 'orders'));
    }

    public function pendingCustomerList()
    {
        $customers = User::orderBy('id', 'desc')->where('status', 0)->where('role','user')->get();
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
        return view('admin.create-customer');
    }
    public function createCustomer(Request $request)
    {


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
        ]);
        $password = Str::random(8);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['password'] = Hash::make($password);
        $user = User::create($data);
        $data['email'] = $user->email;
        $data['password'] = $password;
        Mail::to($request->email)->send(new SendPassword($data));
        $notification = trans('Customer Register Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/pending-customer-list')->with($notification);
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.edit-customer', compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['role'] = 'user';
        User::find($request->id)->update($data);
        $notification = trans('Customer Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/customer-list')->with($notification);
    }
}

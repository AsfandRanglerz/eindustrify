<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use Mail;
use Image;
use App\Models\City;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;
use App\Mail\SendPassword;
use App\Helpers\MailHelper;
use App\Models\BannerImage;
use Illuminate\Support\Str;
use App\Models\CountryState;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\ProductReview;
use App\Models\SellerMailLog;
use App\Models\SellerWithdraw;
use App\Models\WithdrawMethod;
use App\Mail\AccountActivation;
use App\Models\VendorSocialLink;
use App\Mail\SendSingleSellerMail;
use App\Mail\ApprovedSellerAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sellers = User::orderBy('id', 'desc')->where('status', 1)->where('role','vendor')->get();
        $defaultProfile = BannerImage::whereId('15')->first();
        $products = Product::all();
        $setting = Setting::first();
        return view('admin.seller', compact('sellers', 'defaultProfile', 'products', 'setting'));
    }

    public function pendingSellerList()
    {
        $sellers = User::orderBy('id', 'desc')->where('status', 0)->where('role','vendor')->get();
        $defaultProfile = BannerImage::whereId('15')->first();
        $products = Product::all();
        $setting = Setting::first();
        return view('admin.seller', compact('sellers', 'defaultProfile', 'products', 'setting'));
    }

    public function show($id)
    {
        $seller = Vendor::find($id);
        if ($seller) {
            $countries = Country::orderBy('name', 'asc')->where('status', 1)->get();
            $states = CountryState::orderBy('name', 'asc')->where(['status' => 1, 'country_id' => $seller->user->country_id])->get();
            $cities = City::orderBy('name', 'asc')->where(['status' => 1, 'country_state_id' => $seller->user->state_id])->get();
            $user = $seller->user;
            $totalWithdraw = SellerWithdraw::where('seller_id', $seller->id)->where('status', 1)->sum('total_amount');
            $totalPendingWithdraw = SellerWithdraw::where('seller_id', $seller->id)->where('status', 0)->sum('withdraw_amount');

            $totalAmount = 0;
            $totalSoldProduct = 0;
            $orderProducts = OrderProduct::with('order')->where('seller_id', $id)->get();
            foreach ($orderProducts as $orderProduct) {
                if ($orderProduct->order->payment_status == 1 && $orderProduct->order->order_status == 3) {
                    $price = ($orderProduct->unit_price * $orderProduct->qty) + $orderProduct->vat;
                    $totalAmount = $totalAmount + $price;
                    $totalSoldProduct = $totalSoldProduct + $orderProduct->qty;
                }
            }

            $defaultProfile = BannerImage::whereId('15')->first();
            $setting = Setting::first();
            return view('admin.show_seller', compact('seller', 'countries', 'cities', 'states', 'user', 'totalWithdraw', 'totalAmount', 'totalSoldProduct', 'totalPendingWithdraw', 'defaultProfile', 'setting'));
        } else {
            $notification = trans('admin_validation.Something went wrong');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.seller-list')->with($notification);
        }
    }

    public function stateByCountry($id)
    {
        $states = CountryState::where(['status' => 1, 'country_id' => $id])->get();
        $response = '<option value="">' . trans('admin_validation.Select a State') . '</option>';
        if ($states->count() > 0) {
            foreach ($states as $state) {
                $response .= "<option value=" . $state->id . ">" . $state->name . "</option>";
            }
        }
        return response()->json(['states' => $response]);
    }

    public function cityByState($id)
    {
        $cities = City::where(['status' => 1, 'country_state_id' => $id])->get();
        $response = '<option value="">' . trans('admin_validation.Select a City') . '</option>';
        if ($cities->count() > 0) {
            foreach ($cities as $city) {
                $response .= "<option value=" . $city->id . ">" . $city->name . "</option>";
            }
        }
        return response()->json(['cities' => $response]);
    }

    public function updateSeller(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'phone.required' => trans('admin_validation.Phone is required'),
            'country.required' => trans('admin_validation.Country is required'),
            'zip_code.required' => trans('admin_validation.Zip code is required'),
            'address.required' => trans('admin_validation.Address is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function sellerShopDetail($id)
    {
        $user = User::with('seller')->find($id);
        $seller = $user->seller;
        $setting = Setting::first();
        return view('admin.seller_shop', compact('seller', 'user', 'setting'));
    }

    public function removeSellerSocialLink($id)
    {
        $socialLink = VendorSocialLink::find($id);
        $socialLink->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }

    public function destroy($id)
    {
        $seller = User::find($id);
        // $banner_image = $seller->banner_image;
        $seller->delete();
        // if ($banner_image) {
        //     if (File::exists(public_path() . '/' . $banner_image)) unlink(public_path() . '/' . $banner_image);
        // }

        // SellerMailLog::where('seller_id', $id)->delete();
        // SellerWithdraw::where('seller_id', $id)->delete();
        // VendorSocialLink::where('vendor_id', $id)->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id)
    {
        $seller = User::find($id);
        if ($seller->status == 1) {
            $seller->status = 0;
            $seller->save();
            $data['name'] = $seller->first_name;
            $data['status'] = $seller->status;
            $data['subject'] = 'Account Dectivation';
            Mail::to($seller->email)->send(new AccountActivation($data));
            $message = trans('admin_validation.Inactive Successfully');
        } else {
            $seller->status = 1;
            $seller->save();

            $data['name'] = $seller->first_name;
            $data['status'] = $seller->status;
            $data['subject'] = 'Account Activation';
            Mail::to($seller->email)->send(new AccountActivation($data));

            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

    public function updateSellerSop(Request $request, $id)
    {
        $seller = Vendor::find($id);
        $rules = [
            'shop_name' => 'required|unique:vendors,email,' . $seller->id,
            'email' => 'required|unique:vendors,email,' . $seller->id,
            'phone' => 'required',
            'description' => 'required',
            'greeting_msg' => 'required',
            'opens_at' => 'required',
            'closed_at' => 'required',
            'address' => 'required',
        ];
        $customMessages = [
            'shop_name.required' => trans('admin_validation.Shop name is required'),
            'shop_name.unique' => trans('admin_validation.Shop anme is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'phone.required' => trans('admin_validation.Phone is required'),
            'description.required' => trans('admin_validation.Description is required'),
            'greeting_msg.required' => trans('admin_validation.Greeting Message is required'),
            'opens_at.required' => trans('admin_validation.Opens at is required'),
            'closed_at.required' => trans('admin_validation.Close at is required'),
            'address.required' => trans('admin_validation.Address is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $seller->phone = $request->phone;
        $seller->open_at = $request->opens_at;
        $seller->closed_at = $request->closed_at;
        $seller->address = $request->address;
        $seller->description = $request->description;
        $seller->greeting_msg = $request->greeting_msg;
        $seller->seo_title = $request->seo_title ? $request->seo_title : $request->shop_name;
        $seller->seo_description = $request->seo_description ? $request->seo_description : $request->shop_name;
        $seller->save();

        if ($request->banner_image) {
            $exist_banner = $seller->banner_image;
            $extention = $request->banner_image->getClientOriginalExtension();
            $banner_name = 'seller-banner' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $banner_name = 'uploads/custom-images/' . $banner_name;
            Image::make($request->banner_image)
                ->save(public_path() . '/' . $banner_name);
            $seller->banner_image = $banner_name;
            $seller->save();
            if ($exist_banner) {
                if (File::exists(public_path() . '/' . $exist_banner)) unlink(public_path() . '/' . $exist_banner);
            }
        }

        if (count($request->links) > 0) {
            $socialLinks = $seller->socialLinks;
            foreach ($socialLinks as $link) {
                $link->delete();
            }
            foreach ($request->links as $index => $link) {
                if ($request->links[$index] != null && $request->icons[$index] != null) {
                    $socialLink = new VendorSocialLink();
                    $socialLink->vendor_id = $seller->id;
                    $socialLink->icon = $request->icons[$index];
                    $socialLink->link = $request->links[$index];
                    $socialLink->save();
                }
            }
        }

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function sellerReview($id)
    {
        $user = User::with('seller')->find($id);
        $seller = $user->seller;
        $reviews = ProductReview::orderBy('id', 'desc')->where('product_vendor_id', $user->seller->id)->get();
        $setting = Setting::first();
        return view('admin.seller_product_review', compact('reviews', 'user', 'seller', 'setting'));
    }

    public function showSellerReviewDetails($id)
    {
        $review = ProductReview::find($id);
        $seller = Vendor::with('user')->find($review->product_vendor_id);
        $setting = Setting::first();
        return view('admin.show_seller_product_review', compact('review', 'seller', 'setting'));
    }

    public function sendEmailToSeller($id)
    {
        $user = User::with('seller')->find($id);
        $setting = Setting::first();
        return view('admin.send_seller_email', compact('user', 'setting'));
    }

    public function sendMailtoSingleSeller(Request $request, $id)
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

        $user = User::with('seller')->find($id);
        $seller = $user->seller;
        MailHelper::setMailConfig();
        Mail::to($user->email)->send(new SendSingleSellerMail($request->subject, $request->message));
        $sellerMail = new SellerMailLog();
        $sellerMail->seller_id = $seller->id;
        $sellerMail->subject = $request->subject;
        $sellerMail->message = $request->message;
        $sellerMail->save();
        $notification = trans('admin_validation.Email Send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function emailHistory($id)
    {
        $user = User::with('seller')->find($id);
        $seller = $user->seller;
        $emails = SellerMailLog::where('seller_id', $seller->id)->orderBy('id', 'desc')->get();
        $setting = Setting::first();
        return view('admin.email_history', compact('emails', 'user', 'seller', 'setting'));
    }

    public function productBySaller($id)
    {
        $user = User::with('seller')->find($id);
        $seller = $user->seller;
        $products = Product::where('vendor_id', $seller->id)->get();
        $setting = Setting::first();
        return view('admin.product_by_seller', compact('products', 'user', 'seller', 'setting'));
    }

    public function sendEmailToAllSeller()
    {
        $setting = Setting::first();
        return view('admin.send_email_to_all_seller', compact('setting'));
    }

    public function sendMailToAllSeller(Request $request)
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

        $sellers = Vendor::with('user')->where('status', 1)->get();
        MailHelper::setMailConfig();
        foreach ($sellers as $seller) {
            Mail::to($seller->user->email)->send(new SendSingleSellerMail($request->subject, $request->message));
            $sellerMail = new SellerMailLog();
            $sellerMail->seller_id = $seller->id;
            $sellerMail->subject = $request->subject;
            $sellerMail->message = $request->message;
            $sellerMail->save();
        }

        $notification = trans('admin_validation.Email Send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function sellerWithdrawList($id)
    {
        $seller = Vendor::find($id);
        $user = $seller->user;
        $withdraws = SellerWithdraw::where('seller_id', $id)->get();
        $setting = Setting::first();
        return view('admin.seller_withdraw_list', compact('withdraws', 'user', 'setting'));
    }
    public function addVendor()
    {
        return view('admin.create-vendor');
    }

    public function createVendor(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $password = Str::random(8);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        $data['role'] = 'vendor';
        $data['password'] = Hash::make($password);
        $user = User::create($data);
        $data['email'] = $user->email;
        $data['password'] = $password;
        Mail::to($request->email)->send(new SendPassword($data));
        $notification = trans('Customer Register Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/pending-seller-list')->with($notification);
    }
    // vendor Edit
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.edit-vendor', compact('data'));
    }
    // vendor Update
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->only(['first_name', 'last_name', 'email', 'phone']);
        User::find($request->id)->update($data);
        $notification = trans('Customer Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/seller-list')->with($notification);
    }
}

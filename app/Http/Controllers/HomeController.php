<?php

namespace App\Http\Controllers;

use Str;
use Cart;
use Mail;
use Route;
use Session;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Vendor;
use App\Rules\Captcha;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\ShopPage;
use App\Models\CustomPage;
use App\Models\HelpCenter;
use App\Models\SeoSetting;
use App\Models\Subscriber;
use App\Helpers\MailHelper;
use App\Models\BannerImage;
use App\Models\BlogComment;
use App\Models\ContactPage;
use App\Models\PopularPost;
use App\Models\SubCategory;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ChildCategory;
use App\Models\EmailTemplate;
use App\Models\ProductReview;
use App\Models\ContactMessage;
use App\Models\HomePageBanner;
use App\Models\ProductVariant;
use App\Models\BreadcrumbImage;
use App\Models\CampaignProduct;
use App\Models\GoogleRecaptcha;
use App\Models\PopularCategory;
use App\Models\CustomPagination;
use App\Models\TermsAndCondition;
use App\Models\ProductVariantItem;
use App\Models\ThreeColumnCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\HomePageOneVisibility;
use App\Mail\SubscriptionVerification;
use App\Mail\ContactMessageInformation;

class HomeController extends Controller
{
    public function index()
    {
        $seoSetting = SeoSetting::find(1);
        $categories = Category::get();
        $homePageBanner = HomePageBanner::get();
        $products = Product::where('is_featured', 1)->get();
        $brands = Brand::where('is_featured', 1)->get();
        return view('index', compact('categories', 'products', 'brands', 'homePageBanner', 'seoSetting'));
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        $seoSetting = SeoSetting::find(2);
        return view('about_us', compact('aboutUs', 'seoSetting'));
    }

    public function contactUs()
    {
        $contact = ContactPage::first();
        $recaptchaSetting = GoogleRecaptcha::first();
        $seoSetting = SeoSetting::find(3);
        return view('contact_us', compact('contact', 'recaptchaSetting', 'seoSetting'));
    }

    public function sendContactMessage(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => new Captcha()
        ];
        $this->validate($request, $rules);

        $setting = Setting::first();
        if ($setting->enable_save_contact_message == 1) {
            $contact = new ContactMessage();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();
        }

        MailHelper::setMailConfig();
        $template = EmailTemplate::where('id', 2)->first();
        $message = $template->description;
        $subject = $template->subject;
        $message = str_replace('{{name}}', $request->name, $message);
        $message = str_replace('{{email}}', $request->email, $message);
        $message = str_replace('{{phone}}', $request->phone, $message);
        $message = str_replace('{{subject}}', $request->subject, $message);
        $message = str_replace('{{message}}', $request->message, $message);

        Mail::to($setting->contact_email)->send(new ContactMessageInformation($message, $subject));

        $notification = trans('user_validation.Message send successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function blog()
    {
        $paginateQty = CustomPagination::whereId('1')->first()->qty;
        $blogs = Blog::orderBy('id', 'desc')->where(['status' => 1])->paginate($paginateQty);
        $banner = BreadcrumbImage::where(['id' => 10])->first();
        $seoSetting = SeoSetting::find(6);
        return view('blog', compact('blogs', 'banner', 'seoSetting'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where(['status' => 1, 'slug' => $slug])->first();
        $blog->views += 1;
        $blog->save();
        $relatedBlogs = Blog::where(['status' => 1, 'blog_category_id' => $blog->blog_category_id])->where('id', '!=', $blog->id)->get();
        $popularPosts = PopularPost::where(['status' => 1])->get();
        $categories = BlogCategory::where(['status' => 1])->get();
        $recaptchaSetting = GoogleRecaptcha::first();
        return view('blog_detail', compact('blog', 'relatedBlogs', 'popularPosts', 'categories', 'recaptchaSetting'));
    }

    public function blogByCategory($slug)
    {
        $paginateQty = CustomPagination::whereId('1')->first()->qty;
        $category = BlogCategory::where('slug', $slug)->first();
        $blogs = Blog::orderBy('id', 'desc')->where(['status' => 1, 'blog_category_id' => $category->id])->paginate($paginateQty);
        $banner = BreadcrumbImage::where(['id' => 10])->first();
        $seoSetting = SeoSetting::find(6);
        return view('blog', compact('blogs', 'banner', 'seoSetting'));
    }

    public function blogSearch(Request $request)
    {
        $paginateQty = CustomPagination::whereId('1')->first()->qty;
        $blogs = Blog::orderBy('id', 'desc')
            ->where(['status' => 1])
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $request->search . '%')
            ->paginate($paginateQty);
        $banner = BreadcrumbImage::where(['id' => 10])->first();
        $seoSetting = SeoSetting::find(6);
        return view('blog', compact('blogs', 'banner', 'seoSetting'));
    }

    public function blogComment(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'g-recaptcha-response' => new Captcha()
        ];
        $this->validate($request, $rules);

        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        $notification = trans('user_validation.Blog comment submited successfully');

        return response()->json(['status' => 1, 'message' => $notification]);
    }

    public function campaign()
    {
        $banner = BreadcrumbImage::where(['id' => 3])->first();
        $campaigns = Campaign::orderBy('id', 'desc')->where('status', 1)->get();
        $seoSetting = SeoSetting::find(7);
        return view('campaign', compact('banner', 'campaigns', 'seoSetting'));
    }

    public function campaignDetail($slug)
    {
        $banner = BreadcrumbImage::where(['id' => 3])->first();
        $campaign = Campaign::where(['status' => 1, 'slug' => $slug])->first();
        $campaignProducts = $campaign->products;
        $currencySetting = Setting::first();

        $bannerOne = BannerImage::whereId('11')->first();
        $bannerTwo = BannerImage::whereId('12')->first();
        $setting = Setting::first();
        return view('campaign_detail', compact('banner', 'campaign', 'campaignProducts', 'currencySetting', 'bannerOne', 'bannerTwo', 'setting'));
    }

    public function brand()
    {
        $paginateQty = CustomPagination::whereId('3')->first()->qty;
        $brands = Brand::orderBy('id', 'desc')->where('status', 1)->paginate($paginateQty);
        $banner = BreadcrumbImage::where(['id' => 1])->first();
        $seoSetting = SeoSetting::find(4);
        return view('brand', compact('brands', 'banner', 'seoSetting'));
    }

    public function trackOrder()
    {
        $banner = BreadcrumbImage::where(['id' => 7])->first();
        return view('track_order', compact('banner'));
    }

    public function trackOrderResponse($id)
    {
        if (!$id) {
            $message = trans('user_validation.Order id is required');
            return response()->json(['status' => 0, 'message' => $message]);
        }
        $order = Order::where('order_id', $id)->first();
        if ($order) {
            return view('ajax_track_order', compact('order'));
        } else {
            $message = trans('user_validation.Order not found');
            return response()->json(['status' => 0, 'message' => $message]);
        }
    }

    public function faq()
    {
        $banner = BreadcrumbImage::where(['id' => 4])->first();
        $faqs = FAQ::orderBy('id', 'desc')->where('status', 1)->get();
        return view('faq', compact('banner', 'faqs'));
    }

    public function customPage($slug)
    {
        $page = CustomPage::where(['slug' => $slug, 'status' => 1])->first();
        return view('custom_page', compact('page'));
    }
    public function subCategoryListing($slug)
    {
        $category = Category::with('subCategories', 'products')->where(['slug' => $slug, 'status' => 1])->first();
        $brands = Brand::where('status', 1)->get();
        return view('sub_category_listing', compact('category', 'brands'));
    }
    public function allCategories()
    {
        $categories = Category::where('status', 1)->get();
        return view('all_categories', compact('categories'));
    }
    public function allSubCategories($slug)
    {
        $category = Category::with('subCategories', 'products')->where(['slug' => $slug, 'status' => 1])->first();
        return view('all_sub_categories', compact('category'));
    }
    public function childCategoryListing($slug)
    {
        $subcategory = SubCategory::with('childCategories', 'products')->where(['slug' => $slug, 'status' => 1])->first();
        $brands = Brand::where('status', 1)->get();
        return view('child_category_listing', compact('subcategory', 'brands'));
    }
    public function allChildCategories($slug){
        $subcategory = SubCategory::with('childCategories', 'products')->where(['slug' => $slug, 'status' => 1])->first();
        return view('all_child_categories',compact('subcategory'));
    }
    public function productListing($slug){

        $childcategory = ChildCategory::with('category','subCategory','products')->where(['slug' => $slug, 'status' => 1])->first();
        return view('product_listing',compact('childcategory'));
    }
    public function termsAndCondition()
    {
        $terms_conditions = TermsAndCondition::first();
        return view('terms_and_conditions', compact('terms_conditions'));
    }

    public function privacyPolicy()
    {
        $privacyPolicy = TermsAndCondition::first();
        return view('privacy_policy', compact('privacyPolicy'));
    }

    public function seller()
    {
        $banner = BreadcrumbImage::where(['id' => 8])->first();
        $sellers = Vendor::orderBy('id', 'desc')->where('status', 1)->get();
        $productReviews = ProductReview::all();
        $seoSetting = SeoSetting::find(5);
        return view('seller', compact('banner', 'sellers', 'productReviews', 'seoSetting'));
    }

    public function sellerDetail(Request $request)
    {
        $slug = $request->shop_name;
        $banner = BreadcrumbImage::where(['id' => 8])->first();
        $seller = Vendor::where(['status' => 1, 'slug' => $slug])->first();
        $paginateQty = CustomPagination::whereId('2')->first()->qty;
        $products = Product::orderBy('id', 'desc')->where(['status' => 1, 'vendor_id' => $seller->id])->paginate($paginateQty);
        $reviewQty = ProductReview::where('status', 1)->where('product_vendor_id', $seller->id)->count();
        $totalReview = ProductReview::where('status', 1)->where('product_vendor_id', $seller->id)->sum('rating');

        $variantsForSearch = ProductVariant::select('name', 'id')->groupBy('name')->get();
        $shop_page = ShopPage::first();
        $productCategories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();
        $currencySetting = Setting::first();
        return view('seller_detail', compact('banner', 'seller', 'products', 'reviewQty', 'totalReview', 'variantsForSearch', 'shop_page', 'productCategories', 'brands', 'currencySetting'));
    }

    public function product(Request $request)
    {
        $variantsForSearch = ProductVariant::select('name', 'id')->groupBy('name')->get();
        $shop_page = ShopPage::first();
        $banner = BreadcrumbImage::where(['id' => 9])->first();
        $productCategories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();
        $paginateQty = CustomPagination::whereId('2')->first()->qty;
        $products = Product::orderBy('id', 'desc')->where(['status' => 1]);
        if ($request->category_id) {
            $products = $products->where('category_id', $request->category_id);
        }
        if ($request->sub_category_id) {
            $products = $products->where('sub_category_id', $request->sub_category_id);
        }

        if ($request->child_category_id) {
            $products = $products->where('child_category_id', $request->child_category_id);
        }

        if ($request->brand_id) {
            $products = $products->where('brand_id', $request->brand_id);
        }

        $products = $products->paginate($paginateQty);
        $seoSetting = SeoSetting::find(9);
        $currencySetting = Setting::first();
        $setting = $currencySetting;
        return view('product', compact('banner', 'products', 'productCategories', 'brands', 'shop_page', 'variantsForSearch', 'seoSetting', 'currencySetting', 'setting'));
    }

    public function searchProduct(Request $request)
    {
        $paginateQty = CustomPagination::whereId('2')->first()->qty;
        if ($request->variantItems) {
            $products = Product::whereHas('variantItems', function ($query) use ($request) {
                $sortArr = [];
                if ($request->variantItems) {
                    foreach ($request->variantItems as $variantItem) {
                        $sortArr[] = $variantItem;
                    }
                    $query->whereIn('name', $sortArr);
                }
            })->where('status', 1);
        } else {
            $products = Product::where('status', 1);
        }




        if ($request->shorting_id) {
            if ($request->shorting_id == 1) {
                $products = $products->orderBy('id', 'desc');
            } else if ($request->shorting_id == 2) {
                $products = $products->orderBy('price', 'asc');
            } else if ($request->shorting_id == 3) {
                $products = $products->orderBy('price', 'desc');
            }
        } else {
            $products = $products->orderBy('id', 'desc');
        }


        if ($request->category) {
            $category = Category::where('slug', $request->category)->first();
            $products = $products->where('category_id', $category->id);
        }

        if ($request->sub_category) {
            $sub_category = SubCategory::where('slug', $request->sub_category)->first();
            $products = $products->where('sub_category_id', $sub_category->id);
        }

        if ($request->child_category) {
            $child_category = ChildCategory::where('slug', $request->child_category)->first();
            $products = $products->where('child_category_id', $child_category->id);
        }

        if ($request->brand) {
            $brand = Brand::where('slug', $request->brand)->first();
            $products = $products->where('brand_id', $brand->id);
        }

        $brandSortArr = [];
        if ($request->brands) {
            foreach ($request->brands as $brand) {
                $brandSortArr[] = $brand;
            }
            $products = $products->whereIn('brand_id', $brandSortArr);
        }

        if ($request->price_range) {
            $price_range = explode(';', $request->price_range);
            $start_price = $price_range[0];
            $end_price = $price_range[1];
            $products = $products->where('price', '>=', $start_price)->where('price', '<=', $end_price);
        }

        if ($request->shop_name) {
            $slug = $request->shop_name;
            $seller = Vendor::where(['slug' => $slug])->first();
            $products = $products->where('vendor_id', $seller->id);
        }

        if ($request->search) {
            $products = $products->where('name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('long_description', 'LIKE', '%' . $request->search . '%');
        }

        $products = $products->paginate($paginateQty);
        $products = $products->appends($request->all());

        $page_view = '';
        if ($request->page_view) {
            $page_view = $request->page_view;
        } else {
            $page_view = 'grid_view';
        }

        $currencySetting = Setting::first();
        $setting = $currencySetting;
        return view('ajax_products', compact('products', 'page_view', 'currencySetting', 'setting'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category','brand','specifications','productOverview','gallery','subCategory','childCategory')->where(['status' => 1, 'slug' => $slug])->first();
        $relatedProducts = Product::where('sub_category_id',$product->sub_category_id)->where('status',1)->latest()->limit(4)->get();
        return view('product_detail', compact('product','relatedProducts'));
    }

    public function addToCompare($id)
    {
        $compare_array = [];
        foreach (Cart::instance('compare')->content() as $content) {
            $compare_array[] = $content->id;
        }

        if (3 <= Cart::instance('compare')->count()) {
            $notification = trans('user_validation.Already 3 items added');
            return response()->json(['status' => 0, 'message' => $notification]);
        }

        if (in_array($id, $compare_array)) {
            $notification = trans('user_validation.Already added this item');
            return response()->json(['status' => 0, 'message' => $notification]);
        } else {
            $product = Product::with('tax')->find($id);
            $data = array();
            $data['id'] = $id;
            $data['name'] = 'abc';
            $data['qty'] = 1;
            $data['price'] = 1;
            $data['weight'] = 1;
            $data['options']['product'] = $product;
            Cart::instance('compare')->add($data);
            $notification = trans('user_validation.Item added successfully');
            return response()->json(['status' => 1, 'message' => $notification]);
        }
    }
    public function compare()
    {
        $banner = BreadcrumbImage::where(['id' => 6])->first();
        $compare_contents = Cart::instance('compare')->content();
        $currencySetting = Setting::first();
        return view('compare', compact('banner', 'compare_contents', 'currencySetting'));
    }

    public function removeCompare($id)
    {
        Cart::instance('compare')->remove($id);
        $notification = trans('user_validation.Item remmoved successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function flashDeal()
    {
        $banner = BreadcrumbImage::where(['id' => 6])->first();
        $paginateQty = CustomPagination::whereId('2')->first()->qty;
        $products = Product::orderBy('id', 'desc')->where(['status' => 1, 'is_flash_deal' => 1])->paginate($paginateQty);
        $seoSetting = SeoSetting::find(8);
        $currencySetting = Setting::first();
        $setting = $currencySetting;
        return view('flash_deal', compact('banner', 'products', 'seoSetting', 'currencySetting', 'setting'));
    }

    public function subscribeRequest(Request $request)
    {
        if ($request->email != null) {
            $isExist = Subscriber::where('email', $request->email)->count();
            if ($isExist == 0) {
                $subscriber = new Subscriber();
                $subscriber->email = $request->email;
                $subscriber->verified_token = Str::random(25);
                $subscriber->save();

                MailHelper::setMailConfig();

                $template = EmailTemplate::where('id', 3)->first();
                $message = $template->description;
                $subject = $template->subject;
                Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber, $message, $subject));

                return response()->json(['status' => 1, 'message' => trans('user_validation.Subscription successfully, please verified your email')]);
            } else {
                return response()->json(['status' => 0, 'message' => trans('user_validation.Email already exist')]);
            }
        } else {
            return response()->json(['status' => 0, 'message' => trans('user_validation.Email Field is required')]);
        }
    }

    public function subscriberVerifcation($token)
    {
        $subscriber = Subscriber::where('verified_token', $token)->first();
        if ($subscriber) {
            $subscriber->verified_token = null;
            $subscriber->is_verified = 1;
            $subscriber->save();
            $notification = trans('user_validation.Email verification successfully');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('home')->with($notification);
        } else {
            $notification = trans('user_validation.Invalid token');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('home')->with($notification);
        }
    }
    public function helpCenter()
    {
        return view('help_center');
    }
    public function storeHelpCenter(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'use_industrify' => 'required',
            'love_feature' => 'required',
            'improve_first' => 'required',
            'recommend_endustrify' => 'required',
        ]);
        $data = $request->only(['email', 'use_industrify', 'love_feature', 'improve_first', 'recommend_endustrify']);
        HelpCenter::create($data);
        $notification = trans('Help Request send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function vendorDashboard(){
        return view('vendor.index');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        $notification = trans('Logout Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('/login')->with($notification);
    }
    public function getFileHeader(Request $request){
        $header = Excel::toArray([],$request->file('excel-file'))[0][0];
        return response()->json([
            'success' => 'Status  successfully',
            'header' => $header,
        ]);

    }
}

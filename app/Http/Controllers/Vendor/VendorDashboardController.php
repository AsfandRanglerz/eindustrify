<?php

namespace App\Http\Controllers\Vendor;

use Image;
use index;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Industry;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use App\Models\CountryState;
use Illuminate\Http\Request;
use App\Models\BillingAddress;
use App\Models\ProductGallery;
use App\Models\VendorCategory;
use App\Models\ProductOverview;
use App\Models\TechnicalSupport;
use App\Models\BusinessInformation;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductSpecificationKey;

class VendorDashboardController extends Controller
{
    public function vendorDashboard()
    {
        return view('vendor.index');
    }
    public function vendorProduct()
    {
        $products = Product::with('gallery')->where('status', 1)->where('vendor_id', Auth::id())->get();

        return view('vendor.vendor_product', compact('products'));
    }
    public function customerListing()
    {
        return view('vendor.customer_listing');
    }
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('message', 'Record delete Successfully');
    }
    public function deleteAllProducts(Request $request)
    {
        $products = Product::whereIn('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Products delete Successfully');
    }
    public function vendorCategory()
    {
        $user = User::with('categories')->find(Auth::id());
        return view('vendor.categories', compact('user'));
    }

    public function deleteVendorCategory($id)
    {
        VendorCategory::where('category_id', $id)->delete();
        return redirect()->back()->with('message', 'Record delete Successfully');
    }
    public function deleteAllVendorCategory(Request $request)
    {
        VendorCategory::where('category_id', $request->id)->delete();
        return redirect()->back()->with('message', 'Categories delete Successfully');
    }
    public function addProduct()
    {

        $user = User::with('categories', 'subcategories', 'childcategories')->find(Auth::id());
        $specificationKeys = ProductSpecificationKey::all();
        return view('vendor.add_product', compact('user','specificationKeys'));
    }
    public function createProduct(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'long_description' => 'required',
            'price' => 'required|numeric',
            // 'qty' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name is required'),
            // 'slug.required' => trans('admin_validation.Slug is required'),
            // 'slug.unique' => trans('admin_validation.Slug already exist'),
            'category_id.required' => trans('admin_validation.Category is required'),
            'long_description.required' => trans('admin_validation.Long description is required'),
            // 'brand.required' => trans('admin_validation.Brand is required'),
            // 'qty.required' => trans('admin_validation.Quantity is required'),
            'status.required' => trans('admin_validation.Status is required'),
        ];
        $this->validate($request, $rules, $customMessages);


        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->name;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->subcategory_id ? $request->subcategory_id : 0;
        $product->child_category_id = $request->childcategory ? $request->childcategory : 0;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->qty = $request->qty;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->tags = implode(',', $request->tags);
        $product->status = $request->status;
        $product->vendor_id = Auth::id();

        $product->is_undefine = 1;
        $product->is_specification = $request->is_specification ? 1 : 0;

        if ($request->hasfile('image')) {
            $file = $request->file('image')[0];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $product->thumb_image = 'public/uploads/' . $filename;
        }
        $product->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $data) {
                if ($data->isValid()) {
                    $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                    $data->move(public_path('images'), $image);
                    ProductGallery::create([
                        'image' =>  'public/images/' . $image,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
        if ($request->keys) {
            $exist_specifications = [];
            if ($request->keys) {
                foreach ($request->keys as $index => $key) {
                    if ($key) {
                        if ($request->specifications[$index]) {
                            if (!in_array($key, $exist_specifications)) {
                                $productSpecification = new ProductSpecification();
                                $productSpecification->product_id = $product->id;
                                $productSpecification->product_specification_key_id = $key;
                                $productSpecification->specification = $request->specifications[$index];
                                $productSpecification->save();
                            }
                            $exist_specifications[] = $key;
                        }
                    }
                }
            }
        }
        if ($request->file('product_overview_image')) {
            $product_overview_image = [];
            if ($request->product_overview_title) {
                foreach ($request->product_overview_title as $index => $product_overview_title) {
                    if ($product_overview_title) {
                        if ($request->product_overview_image[$index]) {
                            if (!in_array($product_overview_title, $product_overview_image)) {
                                $productOverview = new ProductOverview();
                                $productOverview->product_id = $product->id;
                                $productOverview->title = $request->product_overview_title[$index];
                                $doucments = $request->file('product_overview_image')[$index]->getClientOriginalName();
                                $request->file('product_overview_image')[$index]->move('public/images/', $doucments);
                                $file = 'public/images/' . $doucments;
                                $productOverview['image'] = $file;
                                $productOverview->save();
                            }
                            $product_overview_image[] = $product_overview_title;
                        }
                    }
                }
            }
        }
        if ($request->product_price) {
            $product_price = [];
            if ($request->product_size) {
                foreach ($request->product_size as $index => $product_size) {
                    if ($product_size) {
                        if ($request->product_price[$index]) {
                            if (!in_array($product_size, $product_price)) {
                                $productSize = new ProductSize();
                                $productSize->product_id = $product->id;
                                $productSize->product_price = $request->product_price[$index];
                                $productSize->product_size = $request->product_size[$index];
                                $productSize->discount_price = $request->product_discount_price[$index];
                                $productSize->sku = $request->product_sku[$index];
                                $productSize->qty = $request->product_qty[$index];
                                $productSize->shipping_weight = $request->product_shipping_weight[$index] . $request->product_unit[$index];
                                $productSize->save();
                            }
                            $product_price[] = $product_size;
                        }
                    }
                }
            }
        }


        return redirect('vendor-product')->with('message', 'Product create Successfully');
    }
    public function technicalSupport()
    {
        $tickets = TechnicalSupport::where('user_id',Auth::id())->get();
        return view('vendor.technical_support', compact('tickets'));
    }
    public function technical_ticket()
    {

        return view('vendor.technical_ticket');
    }
    public function createTicket(Request $request)
    {
        $rules = [
            'subject' => 'required',
            'description' => 'required',
            'document' => 'required',
        ];
        $customMessages = [
            'subject.required' => trans('subject is required'),
            'description.required' => trans('description is required'),
            'document.required' => trans('document is required'),
        ];
        $this->validate($request, $rules, $customMessages);
        $tech = TechnicalSupport::latest('id')->first();
        if (isset($tech)) {
            $ticket_no = $tech->ticket_no;
        } else {
            $ticket_no = 0;
        }
        $data = new TechnicalSupport();
        $data->subject = $request->subject;
        $data->description = $request->description;
        $data->ticket_no = $ticket_no + 1;
        $data->user_id = Auth::id();
        $data->date = Carbon::now();
        $data->status = 'deleivered';
        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $data->document = 'public/images/' . $filename;
        }
        $data->save();
        return redirect('technical-support')->with('message', 'Ticket create Successfully');
    }
    public function add_store_details(){
        $industries = Industry::get();
        $country = Country::get();
        $state = CountryState::get();
        $vendor = User::with('businessInformation','billingAddress')->find(Auth::id());
      return view('vendor.add_store_details',compact('industries','country','state','vendor'));
    }
    public function vendorGetStates(Request $request){
        $data =  CountryState::where('country_id', $request->id)->get();
        return response()->json([
            'success' => 'States Against Country',
            'data' => $data,
        ]);
    }
    public function updateStore(Request $request){
        $request->validate([
            'vendor_business_name' => 'required',
            'vendor_business_phone' => 'required',
            'vendor_tax_id' => 'required',
            'vendor_industry_type' => 'required',
            'billing_street_address' => 'required',
            'billing_department' => 'required',
            'billing_country_id' => 'required',
            'billing_state_id' => 'required',
            'billing_city_name' => 'required',
            'billing_zip_code' => 'required',
        ], [
            'vendor_business_name.required' => 'The bussiness name field is required.',
            'vendor_business_phone.required' => 'The bussiness phone field is required.',
            'vendor_tax_id.required' => 'The bussiness tax id field is required.',
            'vendor_industry_type.required' => 'The bussiness industry type field is required.',
            'billing_street_address.required' => 'The billing street address field is required.',
            'billing_department.required' => 'The billing department field is required.',
            'billing_country_id.required' => 'The billing country  field is required.',
            'billing_city_name.required' => 'The billing city  field is required.',
            'billing_state_id.required' => 'The billing state  field is required.',
            'billing_zip_code.required' => 'The billing zip code  field is required.',
        ]);
        $user = User::with('businessInformation','billingAddress')->find(Auth::id());
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $user->image = 'public/images/' . $filename;
        }
        $user->save();
        $bussiness_information = BusinessInformation::find($user->businessInformation->id);
        $bussiness_information['name'] = $request->vendor_business_name;
        $bussiness_information['phone'] = $request->vendor_business_phone;
        $bussiness_information['tax_id'] = $request->vendor_tax_id;
        $bussiness_information['industry_id'] = $request->vendor_industry_type;
        $bussiness_information['user_id'] = $user->id;
        $bussiness_information['vat'] = $request->vendor_vat;
        $bussiness_information['total_employee'] = $request->vendor_total_employee;
        if ($request->hasfile('banner_image')) {
            $file = $request->file('banner_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '1' . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $bussiness_information->banner_image = 'public/images/' . $filename;
        }
        $bussiness_information->save();
        $billing_address = BillingAddress::find($user->billingAddress->id);
        $billing_address['user_id'] = $user->id;
        $billing_address['street_address'] = $request->billing_street_address;
        $billing_address['department'] = $request->billing_department;
        $billing_address['country_id'] = $request->billing_country_id;
        $billing_address['state_id'] = $request->billing_state_id;
        $billing_address['city_name'] = $request->billing_city_name;
        $billing_address['zip_code'] = $request->billing_zip_code;
        $billing_address->save();
        $notification = trans('Store Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function taxesDuties(){
        return view('vendor.taxes_duties');
    }
    public function vendorPayments(){
        return view('vendor.payments');
    }
    public function orderReturn(){
       return view('vendor.order_return');
    }
    public function orderDetail(){
       return view('vendor.order_detail');
    }
    public function shippingDelivery(){
       return view('vendor.shipping_delivery');
    }
}

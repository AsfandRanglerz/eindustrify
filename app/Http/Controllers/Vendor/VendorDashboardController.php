<?php

namespace App\Http\Controllers\Vendor;

use Image;
use index;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VendorCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    public function vendorDashboard()
    {
        return view('vendor.index');
    }
    public function vendorProduct()
    {
        $products = Product::where('status', 1)->where('vendor_id', Auth::id())->get();
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
        return view('vendor.add_product', compact('user'));
    }
    public function createProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name is required'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'category_id.required' => trans('admin_validation.Category is required'),
            'long_description.required' => trans('admin_validation.Long description is required'),
            'brand.required' => trans('admin_validation.Brand is required'),
            'qty.required' => trans('admin_validation.Quantity is required'),
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
        // $product->tags = $request->tags;
        $product->status = $request->status;
        $product->vendor_id = Auth::id();

        $product->is_undefine = 1;
        $product->is_specification = $request->is_specification ? 1 : 0;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image_name = Str::slug($request->name) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extension;
            $image_path = 'uploads/custom-images/' . $image_name;
            \Image::make($file)->save(public_path($image_path));
            $product->image[0] = $image_path;
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
                                $productSize->discount_price = $request->discount_price[$index];
                                $productSize->sku = $request->product_sku[$index];
                                $productSize->qty = $request->product_qty[$index];
                                $productSize->save();
                            }
                            $product_price[] = $product_size;
                        }
                    }
                }
            }
        }
        $product->save();
        dd('usman');
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use index;
use App\Models\User;
use App\Models\Product;
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
    public function customerListing(){
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
    public function vendorCategory(){
        $user = User::with('categories')->find(Auth::id());
          return view('vendor.categories',compact('user'));
    }

    public function deleteVendorCategory($id)
    {
        VendorCategory::where('category_id',$id)->delete();
        return redirect()->back()->with('message', 'Record delete Successfully');
    }
    public function deleteAllVendorCategory(Request $request)
    {
        VendorCategory::where('category_id',$request->id)->delete();
        return redirect()->back()->with('message', 'Categories delete Successfully');
    }
}

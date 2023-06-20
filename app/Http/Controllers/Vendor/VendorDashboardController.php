<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Product;
use Illuminate\Http\Request;
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
        $products = Product::where('status',1)->where('vendor_id', Auth::id())->get();
        return view('vendor.vendor_product',compact('products'));
    }
    public function deleteProduct($id){
      Product::destroy($id);
      return redirect()->back()->with('message', 'Record delete Successfully');
    }
    public function deleteAllProducts(Request $request){
      dd($request->all());
    }
}

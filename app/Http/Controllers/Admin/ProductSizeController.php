<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSizeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($id)
    {
        $productsSize = ProductSize::where('product_id',$id)->orderBy('id', 'desc')->get();
        return view('admin.productSize.index', compact('productsSize','id'));
    }
    public function edit($id){

        $data = ProductSize::find($id);
        return view('admin.productSize.edit',compact('data','id'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'product_price' => 'required',
                'product_size' => 'required',
              ]
        );
        $data = ProductSize::find($request->id);
        $data->product_size = $request->product_size;
        $data->product_price = $request->product_price;
        $data->save();
        $notification = trans('Product Size Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-size',$data->product_id)->with($notification);
    }
    public function add($id){
        return view('admin.productSize.add');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductOverview;
use App\Http\Controllers\Controller;

class ProductOverviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($id)
    {
        $productsOverview = ProductOverview::where('product_id',$id)->orderBy('id', 'desc')->get();
        return view('admin.productOverview.index', compact('productsOverview','id'));
    }
    public function edit($id){

        $data = ProductOverview::find($id);
        return view('admin.productOverview.edit',compact('data','id'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
              ]
        );
        $data = ProductOverview::find($request->id);
        $data->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('Product Overview Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-overview',$data->product_id)->with($notification);
    }
    public function add($id){
        return view('admin.productOverview.add',compact('id'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'image' => 'required',
              ]
        );
        $data = new ProductOverview();
        $data->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->product_id = $request->id;
        $data->save();
        $notification = trans('Product Overview Add Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-overview',$request->id)->with($notification);

    }
}

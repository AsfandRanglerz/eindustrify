<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerSupport;
use App\Http\Controllers\Controller;

class CustomersSupportController extends Controller
{
    public function customerSupport()
    {
        return view('customer_support');
    }
    public function storeCustomerSupport(Request $request)
    {
        $request->validate([
            'localted_usa' => 'required',
            'subject' => 'required',
            'bussiness_name' => 'required',
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $data = $request->only(['localted_usa', 'subject', 'bussiness_name', 'email', 'first_name','last_name','phone','message']);
        CustomerSupport::create($data);
        $notification = trans('Customer Support request send Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

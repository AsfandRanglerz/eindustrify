<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CustomerSupport;
use App\Http\Controllers\Controller;

class CustomerSupportController extends Controller
{
    public function getCustomerSupport(){
        $data = CustomerSupport::get();
       return view('admin.customerSupport.index',compact('data'));
     }
     // destroy
     public function destroy($id)
     {
         $user = CustomerSupport::find($id);
         $user->delete();
         $notification = trans('admin_validation.Delete Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect()->back()->with($notification);
     }
}

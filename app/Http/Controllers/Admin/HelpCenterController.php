<?php

namespace App\Http\Controllers\Admin;

use App\Models\HelpCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpCenterController extends Controller
{
    public function getHelpCenter(){
       $data = HelpCenter::get();
      return view('admin.helpCenter.index',compact('data'));
    }
    // destroy
    public function destroy($id)
    {
        $user = HelpCenter::find($id);
        $user->delete();
        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TechnicalSupport;
use App\Http\Controllers\Controller;

class TechnicalSupportController extends Controller
{
    public function getTechnicalSupport(){
        $data = TechnicalSupport::get();
       return view('admin.technicalSupport.index',compact('data'));
     }
     // destroy
     public function destroy($id)
     {
         $user = TechnicalSupport::find($id);
         $user->delete();
         $notification = trans('admin_validation.Delete Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect()->back()->with($notification);
     }
     public function getTechnicalSupportEdit($id){
        $TechnicalSupport = TechnicalSupport::find($id);
        return view('admin.technicalSupport.edit',compact('TechnicalSupport'));
     }
     public function updateTechnicalSupport(Request $request){
       
        $TechnicalSupport = TechnicalSupport::find($request->id);
        $TechnicalSupport->status = $request->status;
        $TechnicalSupport->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.technical-support')->with($notification);
     }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Policy;
use App\Imports\RoleImport;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PolicyController extends Controller
{
    public function getCopyRightPolicy()
    {
        $copyright = Policy::where('type', 'copyright')->first();
        return view('admin.copyrightPoliciy.index', compact('copyright'));
    }
    public function getEditCopyRightPolicy($id)
    {
        $data = Policy::find($id);
        return view('admin.copyrightPoliciy.edit', compact('data'));
    }
    public function updateCopyRightPolicy(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = Policy::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'copyright';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/copyright-policy')->with($notification);
    }
    public function getPrivacyPolicy()
    {
        $privacyPolicy = Policy::where('type', 'privacy-policy')->first();
        return view('admin.privacyPolicy.index', compact('privacyPolicy'));
    }
    public function getEditPrivacyPolicy($id)
    {
        $data = Policy::find($id);
        return view('admin.privacyPolicy.edit', compact('data'));
    }
    public function updatePrivacyPolicy(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = Policy::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'privacy-policy';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/privacy-policy')->with($notification);
    }
    public function getTermsCondition()
    {
        $termsCondition = Policy::where('type', 'terms-condition')->first();
        return view('admin.termsCondition.index', compact('termsCondition'));
    }
    public function getEditTermsCondition($id)
    {
        $data = Policy::find($id);
        return view('admin.termsCondition.edit', compact('data'));
    }
    public function updateTermsCondition(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = Policy::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'terms-condition';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/terms-condition')->with($notification);
    }
    public function getTermsRegistration()
    {
        $termsRegistration = Policy::where('type', 'terms-registration')->first();
        return view('admin.termsRegistration.index', compact('termsRegistration'));
    }
    public function getEditTermsRegistration($id)
    {
        $data = Policy::find($id);
        return view('admin.termsRegistration.edit', compact('data'));
    }
    public function updateTermsRegistration(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = Policy::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'terms-registration';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/terms-registration')->with($notification);
    }
    public function getSalesSite()
    {
        $salesSite = Policy::where('type', 'sales-site')->first();
        return view('admin.salesSite.index', compact('salesSite'));
    }
    public function getEditSalesSite($id)
    {
        $data = Policy::find($id);
        return view('admin.salesSite.edit', compact('data'));
    }
    public function updateSalesSite(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = Policy::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'sales-site';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/sales-site')->with($notification);
    }
    public function check(){
        $data = '1';
        // Excel::import(new ProductsImport($data),request()->file('file'), null, \Maatwebsite\Excel\Excel::XLSX);
        Excel::import(new RoleImport($data), request()->file('file')->store('temp'));
        return back();
    }
}

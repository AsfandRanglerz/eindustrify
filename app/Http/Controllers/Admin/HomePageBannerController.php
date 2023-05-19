<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageBanner;
use Illuminate\Http\Request;

class HomePageBannerController extends Controller
{
    public function getHomePageBanner()
    {
        $homePageBanner = HomePageBanner::get();
        return view('admin.homePageBanner.index', compact('homePageBanner'));
    }
    public function getEditHomePageBanner($id)
    {
        $data = HomePageBanner::find($id);
        return view('admin.homePageBanner.edit', compact('data'));
    }
    public function updateHomePageBanner(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'post_title' => 'required',
            ]
        );
        $data = HomePageBanner::find($request->id);
        $data->title = $request->title;
        $data->pre_title = $request->pre_title;
        $data->post_title = $request->post_title;
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
        return redirect('admin/home-page-banner')->with($notification);
    }
}

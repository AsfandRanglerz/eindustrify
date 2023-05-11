<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HelpCenterPage;
use App\Http\Controllers\Controller;

class HelpCenterPageController extends Controller
{
       // Help Center Page Start
    public function getHelpCenterPage()
    {
        $helpCenter = HelpCenterPage::where('type', 'help-center')->first();
        return view('admin.helpCenterPage.index', compact('helpCenter'));
    }
    public function getEditHelpCenterPage($id)
    {
        $data = HelpCenterPage::find($id);
        return view('admin.helpCenterPage.edit', compact('data'));
    }
    public function updateHelpCenterPage(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = HelpCenterPage::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'help-center';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('Help Center Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/help-center-page')->with($notification);
    }

    // === Help Center Quotes Start
    public function getHelpCenterQuotes()
    {
        $helpCenterQuotes = HelpCenterPage::where('type', 'help-center-quotes')->first();
        return view('admin.helpCenterQuotes.index', compact('helpCenterQuotes'));
    }
    public function getEditHelpCenterQuotes($id)
    {
        $data = HelpCenterPage::find($id);
        return view('admin.helpCenterQuotes.edit', compact('data'));
    }
    public function updateHelpCenterQuotes(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $data = HelpCenterPage::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = 'help-center-quotes';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
            $data['image'] = 'public/uploads/' . $filename;
        }
        $data->save();
        $notification = trans('Help Center Quotes Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect('admin/help-center-quotes')->with($notification);
    }
     // === Help Center Lists Start
     public function getHelpCenterLists()
     {
         $helpCenterLists = HelpCenterPage::where('type', 'help-center-lists')->first();
         return view('admin.helpCenterLists.index', compact('helpCenterLists'));
     }
     public function getEditHelpCenterLists($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterLists.edit', compact('data'));
     }
     public function updateHelpCenterLists(Request $request)
     {
         $request->validate(
             [
                 'title' => 'required',
                 'description' => 'required',
             ]
         );
         $data = HelpCenterPage::find($request->id);
         $data->title = $request->title;
         $data->description = $request->description;
         $data->type = 'help-center-lists';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Lists Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-lists')->with($notification);
     }
}

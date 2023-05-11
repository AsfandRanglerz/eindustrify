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
     // === Help Center Reorders Start
     public function getHelpCenterReorder()
     {
         $helpCenterReorder = HelpCenterPage::where('type', 'help-center-reorder')->first();
         return view('admin.helpCenterReorder.index', compact('helpCenterReorder'));
     }
     public function getEditHelpCenterReorder($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterReorder.edit', compact('data'));
     }
     public function updateHelpCenterReorder(Request $request)
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
         $data->type = 'help-center-reorder';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Reorder Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-reorder')->with($notification);
     }
     // === Help Center Order History Start
     public function getHelpCenterOrderHistory()
     {
         $helpCenterOrderHistory = HelpCenterPage::where('type', 'help-center-order-history')->first();
         return view('admin.helpCenterOrderHistory.index', compact('helpCenterOrderHistory'));
     }
     public function getEditHelpCenterOrderHistory($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterOrderHistory.edit', compact('data'));
     }
     public function updateHelpCenterOrderHistory(Request $request)
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
         $data->type = 'help-center-order-history';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Order History Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-order-history')->with($notification);
     }
     // === Help Center Online Invoices Start
     public function getHelpCenterOnlineInvoices()
     {
         $helpCenterOnlineInvoices = HelpCenterPage::where('type', 'help-center-online-invoices')->first();
         return view('admin.helpCenterOnlineInvoices.index', compact('helpCenterOnlineInvoices'));
     }
     public function getEditHelpCenterOnlineInvoices($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterOnlineInvoices.edit', compact('data'));
     }
     public function updateHelpCenterOnlineInvoices(Request $request)
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
         $data->type = 'help-center-online-invoices';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Order History Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-online-invoices')->with($notification);
     }
     // === Help Center Returns & Cancellation Start
     public function getHelpCenterReturnsCancellation()
     {
         $helpCenterReturnsCancellation = HelpCenterPage::where('type', 'help-center-returns-cancellation')->first();
         return view('admin.helpCenterReturnsCancellation.index', compact('helpCenterReturnsCancellation'));
     }
     public function getEditHelpCenterReturnsCancellation($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterReturnsCancellation.edit', compact('data'));
     }
     public function updateHelpCenterReturnsCancellation(Request $request)
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
         $data->type = 'help-center-returns-cancellation';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Order History Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-returns-cancellation')->with($notification);
     }
     // === Help Center Checkout Start
     public function getHelpCenterCheckout()
     {
         $helpCenterCheckout = HelpCenterPage::where('type', 'help-center-checkout')->first();
         return view('admin.helpCenterCheckout.index', compact('helpCenterCheckout'));
     }
     public function getEditHelpCenterCheckout($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterCheckout.edit', compact('data'));
     }
     public function updateHelpCenterCheckout(Request $request)
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
         $data->type = 'help-center-checkout';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Checkout Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-checkout')->with($notification);
     }
     // === Help Center User Manangement Start
     public function getHelpCenterUserManangenment()
     {
         $helpCenterUserManangenment = HelpCenterPage::where('type', 'help-center-user-manangenment')->first();
         return view('admin.helpCenterUserManangenment.index', compact('helpCenterUserManangenment'));
     }
     public function getEditHelpCenterUserManangenment($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterUserManangenment.edit', compact('data'));
     }
     public function updateHelpCenterUserManangenment(Request $request)
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
         $data->type = 'help-center-user-manangenment';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center User Manangement Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-user-manangenment')->with($notification);
     }
     // === Help Center Account Settings Start
     public function getHelpCenterAccountSetting()
     {
         $helpCenterAccountSetting = HelpCenterPage::where('type', 'help-center-account-setting')->first();
         return view('admin.helpCenterAccountSetting.index', compact('helpCenterAccountSetting'));
     }
     public function getEditHelpCenterAccountSetting($id)
     {
         $data = HelpCenterPage::find($id);
         return view('admin.helpCenterAccountSetting.edit', compact('data'));
     }
     public function updateHelpCenterAccountSetting(Request $request)
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
         $data->type = 'help-center-account-setting';
         if ($request->hasfile('image')) {
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $filename = time() . '.' . $extension;
             $file->move(public_path('/uploads'), $filename);
             $data['image'] = 'public/uploads/' . $filename;
         }
         $data->save();
         $notification = trans('Help Center Account Setting Updated Successfully');
         $notification = array('messege' => $notification, 'alert-type' => 'success');
         return redirect('admin/help-center-account-setting')->with($notification);
     }
}

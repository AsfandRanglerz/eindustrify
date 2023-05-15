<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpCenterPage;
use App\Http\Controllers\Controller;

class HelpCenterPagesController extends Controller
{
    public function helpCenterDetail()
    {
        $helpCenter = HelpCenterPage::where('type','help-center')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterQuotes()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-quotes')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterLists()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-lists')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterReorder()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-reorder')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterOrderHistory()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-order-history')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterOnlineInvoices()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-online-invoices')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterCancellations()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-returns-cancellation')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterCheckout()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-checkout')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterManagement()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-user-manangenment')->first();
        return view('help_center_page',compact('helpCenter'));
    }
    public function helpCenterSettings()
    {
        $helpCenter = HelpCenterPage::where('type','help-center-account-setting')->first();
        return view('help_center_page',compact('helpCenter'));
    }

}

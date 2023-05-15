<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyPageController extends Controller
{
    public function copyrightPolicy()
    {
        $policy = Policy::where('type', 'copyright')->first();
        return view('policy', compact('policy'));
    }
    public function privacyPolicy()
    {
        $policy = Policy::where('type', 'privacy-policy')->first();
        return view('policy', compact('policy'));
    }
    public function termsConditions()
    {
        $policy = Policy::where('type', 'terms-condition')->first();
        return view('policy', compact('policy'));
    }
    public function termsRegistration()
    {
        $policy = Policy::where('type', 'terms-registration')->first();
        return view('policy', compact('policy'));
    }
    public function salesSiteAgreement()
    {
        $policy = Policy::where('type', 'sales-site')->first();
        return view('policy', compact('policy'));
    }
}

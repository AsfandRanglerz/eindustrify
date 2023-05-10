@extends('layout')
@section('title')
    <title>Help Center Online Invoices</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Online Invoices">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/help-center-online-invoices.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">Online Invoices</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>E-industrify provides various options for accessing and paying your invoices, including the ability to view, save, print, and pay them directly on E-industrify.com. Additionally, you can choose to have your invoices sent to you via email for added convenience.</p>

                    <h6 class="mt-4">View and Pay your Invoices:</h6>
                    <p>· Invoices for online and offline orders invoiced within the last 18 months are available on E-industrify.com the day after the products are shipped or picked up at the branch.</p>
                    <p>· You can view, save, print, and pay invoices online, and also receive them via email.</p>
                    <p>· Payment can be made online using credit card, bank account, or wire transfer. You can select from existing payment methods saved to your E-industrify.com account or add new ones directly from the Invoicing section in My Account.</p>
                    <p>· For paying invoices without logging in, simply click here.</p>
                    <p>· Credit and Debits can be viewed, but Debits cannot be paid online.</p>
                    <h6 class="mt-4">How to Access:</h6>
                    <p>Once you have logged in, you will be able to retrieve your invoices by navigating to the Invoicing option in the My Account section. From there, you will have the ability to view, print, search for, download, and make payments towards your invoices.</p>
                    <p>To pay an invoice, select Pay Invoice and choose an existing payment method or add a new one. Click Submit Payment. For multiple invoices, choose Pay Multiple Invoices, check each box, and select Pay Selected.</p>
                </div>
            </div>
            <h4 class="text-center mt-lg-5 mt-4 mb-3">Are you looking for help with...</h4>
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-3">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Placing Orders</h5>
                        <p class="mb-3 text">Quotes</p>
                        <p class="mb-3 text">Lists</p>
                        <p class="text">Reorder</p>
                    </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-3">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Order Information</h5>
                        <p class="mb-3 text">Order History & Tracking</p>
                        <p class="mb-3 text">Online Invoices</p>
                        <p class="text">Returns & Cancellations</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="help-content-block">
                        <h5 class="mb-3 main-heading">Account Settings</h5>
                        <p class="mb-3 text">Checkout</p>
                        <p class="mb-3 text">User Management</p>
                        <p class="text">Account Settings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection

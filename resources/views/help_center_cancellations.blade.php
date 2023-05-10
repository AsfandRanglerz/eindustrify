@extends('layout')
@section('title')
    <title>Help Center Returns & Cancellations</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Returns & Cancellations">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/return-cancellations.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">Returns & Cancellations</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>In the event that you need to return an item, you may either send it back to E-industrify via shipping or drop it off at any of our E-industrify Branch Locations.</p>
                    <h6 class="mt-4">If you are shipping the product:</h6>
                    <p>· Ensure that you pack the item(s) securely and include the packing slip. On the packing slip, state the reason for returning the product.</p>
                    <p>· If the packing slip is missing, please provide the purchase date, original invoice number, and item number for the product.</p>
                    <p>· Specify whether you require a replacement product or a credit. Please note that you need to prepay for shipping as E-industrify does not accept Cash on Delivery (C.O.D.s).</p>
                    <p>· Ship the package to the nearest E-industrify location. If you require assistance with returns, you can contact E-industrify Customer Care at <b>1-888-Eindustrify(1-888-774-7632)</b></p>
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

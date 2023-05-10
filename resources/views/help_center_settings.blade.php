@extends('layout')
@section('title')
    <title>Help Center Account Settings</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Account Settings">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/help-center-settings.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">Account Settings</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>Optimize your E-industrify experience with Account Settings. Admin users can set preferred behaviors for new user registrations and order settings, including custom fields at the line and order level, to ensure accurate and efficient registration and compliance with internal procurement processes.</p>
                    <h6 class="mt-4">How to Access:</h6>
                    <p>· Access to Account Settings is restricted to Admin users who have signed in to E-industrify.com with their account credentials.</p>
                    <p>· To locate this feature, click on the My Account dropdown menu located at the top of the E-industrify.com webpage.</p>
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
                        <p class="text">Checkout</p>
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

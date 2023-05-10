@extends('layout')
@section('title')
    <title>Help Center Order History</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Order History">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/help-center-order-history.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">help-center-online-invoices</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>E-industrify’s Order History page simplifies your post-order requirements and streamlines the process for reordering products. You can view order details, track your shipments in real-time, and obtain packing lists and invoice copies for both online and offline orders.</p>
                    <h6 class="mt-4">View my Order History</h6>
                    <p>How to Access:</p>
                    <p>· Access to E-industrify's Order History page is limited to users with a business account who are signed in to E-industrify.com.</p>
                    <p>· You can access the Order History from the top My Account dropdown menu on E-industrify.com.</p>
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

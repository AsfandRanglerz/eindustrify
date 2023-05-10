@extends('layout')
@section('title')
    <title>Help Center Quotes</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Quotes">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/help-center-quotes.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">Quotes</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>Create, review and order your quotes, view all actively quoted products, and your quote history on E-industrify. Print your quotes and easily share them with others in your organization to comply with internal processes.</p>

                    <h6 class="mt-4">View Quotes:</h6>
                    <p>How to Access:</p>
                    <p>· Sign in to E-industrify with a business account</p>
                    <p>· You can access quotes from the My Account dropdown at the top of E-industrify.com</p>
                    <h6 class="mt-4">View and Print Quotes:</h6>
                    <p>Quote documents are linked to your business account and can be viewed by both Standard and Admin users. When you view a quote, you can view the listed products, along with their corresponding prices and validity period. You can also add further information to the quote, such as quantity and job number.</p>
                    <p>· You can use the Catalog Quotes page to access your active quotes by entering the quote number or browsing through the active and historical quotes based on product.</p>
                    <p>· If you find a product that you are interested in, you can conveniently add it to your cart or save it to a new or existing List. Moreover, you can save the quote as a PDF document to print, save, or share with others within your organization.</p>
                    <h6 class="mt-4">Convert Quote into an order:</h6>
                    <p>To convert a quote into an order, you can either add individual products to your cart or add the entire quote to your cart. If you add products from a quote to your cart, the quantity, price, and other relevant information will be carried over to the order. You can convert Catalog Quotes to orders multiple times as long as they are within the valid dates.</p>
                    <p>· You can easily add all the products from your Quote to the order by hovering over the quote number and selecting the "Add to Order" option.</p>
                    <p>· To view the full details of a quote and add any or all products within it to the order, you can select the quote number. Then, you can select the "Add to Order" option.</p>
                    <p>· An alternative option is to use the "View by Product" feature to add specific products to the cart.</p>
                    <p>· After the products are in the cart, you can add more items or modify the quantity as necessary.</p>
                    <h6 class="mt-4">Generating a No Price Quote:</h6>
                    <p>On E-industrify.com, you have the option to create a No Price Quote by accessing the Quotes section of your My Account page or by adding products to the quote directly from the Product Detail Page. This type of quote is based on your current price and remains valid for 30 days. You can use No Price Quotes to capture the current pricing information and download or refer to them later for placing orders in accordance with your procurement process. Please note that these quotes can only be accessed by the creator of the quote and other users registered to the account.</p>
                    <p>· To generate a No Price Quote, you can create the quote directly from the Quotes section of your My Account page.</p>
                    <p>· To review a draft, choose the "View Quote" option.</p>
                    <p>· To finalize the draft, choose the "Generate Quote" option.</p>
                    <p>· To view the completed quotes, you can go to the "No Price Quotes" tab or use the "View by Product" option.</p>
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

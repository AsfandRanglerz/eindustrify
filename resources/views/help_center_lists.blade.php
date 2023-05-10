@extends('layout')
@section('title')
    <title>Help Center Lists</title>
@endsection
@section('meta')
    <meta name="description" content="Help Center Lists">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/help-center-lists.png') }}" class="w-100 banner-img">
                <div class="pt-0 h-100 d-flex align-items-center position-absolute banner-section">
                    <h1 class="mt-0 heading">Lists</h1>
                </div>
            </div>
            <div class="section-below-banner row">
                <div class="col-xl-12">
                    <p>Utilize the Lists feature on E-industrify.com to save and arrange your frequently purchased products. By creating Lists, you can identify common purchases by user or location, create a list of essential products, or group items according to your business's needs. Once you have found a product, you can add it to a List and easily access it from any device when logged in to E-industrify.com.</p>
                    <h6 class="mt-4">View my Lists</h6>
                    <p>How to Access</p>
                    <p>· Access to E-industrify.com requires a sign-in.</p>
                    <p>· You can access your Lists from the My Account section.</p>
                    <h6 class="mt-4">Creating and Using Lists:</h6>
                    <p>You can easily create Lists either from the My Lists page or the Product Detail Page. These Lists are a great way to organize products that you frequently purchase, prefer, or need to access quickly and easily, such as PPE for your team members. You can create Lists for your personal use or share them with all users on the account to encourage standardization and streamline the purchasing process.</p>
                    <p>· You can save significant details about each product, such as the preferred reorder quantity or internal customer part number, within your Lists.</p>
                    <p>· The line-level information you save within your Lists will be transferred to the cart, ensuring a prompt and precise checkout process.</p>
                    <p>· You can quickly check the price and availability of the products in each List at a glance.</p>
                    <p>· Quickly order products by adding them to your cart directly from your list.</p>
                    <h6 class="mt-4">Inventory Fields:</h6>
                    <p>You can access additional inventory fields at the product level to manage light inventory and improve organization. You can view this information within your List or print labels to streamline your space and simplify the ordering process.</p>
                    <p>· You can capture product details such as part number and location to associate list products with physical locations or processes in your facility.</p>
                    <p>· Set inventory quantity values to indicate minimum and maximum levels and the ideal time to reorder.</p>
                    <p>· Labels can be used to display product information such as number, image, and inventory fields for selected items.</p>
                    <p>They are useful for quick reference, ordering, or organizing stock locations.</p>
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

<style>
    .sidebar {
        border: 1px solid #CCCCCC;
        padding: 20px 16px;
    }
    .sidebar .heading {
        margin: 18px 0 12px 0;
    }
    .sidebar .link.active {
        background: #B0191E;
        color: #FFF;
    }
    .sidebar .link.active img {
        filter: brightness(0) invert(1);
    }
    .sidebar .link {
        background: #F2F2F2;
        color: #454545;
        margin-bottom: 8px;
        padding: 10px 16px;
        display: flex;
        align-items: center;
        font-weight: bold;
    }
    .sidebar .link:hover {
        background: #B0191E;
        color: #FFF;
    }
    .sidebar .link img {
        width: 15px;
        height: 15px;
        object-fit: contain;
        margin-right: 10px;
    }
    .sidebar .link:hover img {
        filter: brightness(0) invert(1);
    }
    .sidebar .link:last-child {
        margin-bottom: 0;
    }
</style>
<div class="sidebar">
    <a href="{{URL('vendor-dashboard')}}" class="w-100 link {{ request()->is('vendor-dashboard') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/dashboard.png') }}">Dashboard</a>
    <h6 class="heading">Orders</h6>
    <a href="" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/order.png') }}">Orders</a>
    <h6  class="heading">Products</h6>
    <a href="{{URL('vendor-product')}}" class="w-100 link {{ request()->is('vendor-product') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/product.png') }}">Products</a>
    <a href="{{URL('vendor-category')}}" class="w-100 link {{ request()->is('vendor-category') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/category.png') }}">Categories</a>
    <h6  class="heading">Customers</h6>
    <a href="{{URL('customer-listing')}}" class="w-100 link {{ request()->is('customer-listing') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/customer.png') }}">Customers</a>
    <h6  class="heading">Analytics & Reports</h6>
    <a href="" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/analytic.png') }}">Analytics</a>
    <a href="" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/report.png') }}">Reports</a>
    <h6  class="heading">Settings</h6>
    <a href="{{URL('add-store-details')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/store.png') }}">Store Details</a>
    <a href="{{URL('taxes-duties')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/tax.png') }}">Taxes and Duties</a>
    <a href="" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/shipping.png') }}">Shipping Delivery</a>
    <a href="{{URL('payments')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/dollar.png') }}">Payments</a>
    <h6  class="heading">Account Preferences</h6>
    <a href="{{URL('technical-support')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/tech-support.png') }}">Technical Support</a>
    <a href="{{URL('help-center-details')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/question.png') }}">Help Center</a>
</div>

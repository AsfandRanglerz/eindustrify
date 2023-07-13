<style>
    .sidebar {
        border: 1px solid #CCCCCC;
        padding: 24px 16px;
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
        font-size: 15px;
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
    <h4>John Doe</h4>
    <p class="mb-4">Account Balance: <span class="red-text font-700">$0.00</span></p>
    <a href="{{URL('customer-dashboard')}}" class="w-100 link {{ request()->is('customer-dashboard') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/dashboard.png') }}">Dashboard</a>
    <h6 class="heading">Orders</h6>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/order.png') }}">Order History</a>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/order.png') }}">Wishlist</a>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/order.png') }}">Loyalty Points</a>
    <h6  class="heading">Account Preferences</h6>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/tech-support.png') }}">Personal Information</a>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/tech-support.png') }}">Address Book</a>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/tech-support.png') }}">Account Settings</a>
    <a href="#" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/question.png') }}">Payment Methods</a>
    <h6  class="heading">Account Preferences</h6>
    <a href="{{URL('technical-support')}}" class="w-100 link {{ request()->is('technical-support') ? 'active' : '' }}"><img src="{{ asset('/uploads/website-images/images/tech-support.png') }}">Technical Support</a>
    <a href="{{URL('help-center-details')}}" class="w-100 link"><img src="{{ asset('/uploads/website-images/images/question.png') }}">Help Center</a>
</div>

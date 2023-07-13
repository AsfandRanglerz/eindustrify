
@extends('vendor.layout.master')
@section('title', '')
@section('content')
<style>
    .bg-grey {
        background: #F2F2F2;
        font-weight: 500 !important;
        padding: 10px;
    }
    .profile-pic {
        width: 200px;
        max-height: 200px;
        display: inline-block;
    }
    .file-upload {
        display: none;
    }
    .circle {
        border-radius: 100% !important;
        overflow: hidden;
        width: 160px;
        height: 160px;
        border: 2px solid #ccc;
    }
    .circle img {
        max-width: 100%;
        height: auto;
    }
    .small-12.medium-2.large-2.columns {
        width: 155px;
        height: 135px;
        position: relative;
    }
    .p-image {
        position: absolute;
        right: 0;
        bottom: -10px;
        background: #b0191e;
        border-radius: 50px;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .p-image .upload-button {
        font-size: 0.9em;
        color: #FFF;
    }
    .p-image .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #FFF;
    }
    .box {
        width: 100%;
        min-height: 150px;
        cursor: pointer;
        background: #F7F7F7;
        border: 2px dashed rgba(48, 48, 48, 0.3);
        padding: 20px 20px;
    }
    .box-inside {
        text-align: center;
        margin: 2em 0;
    }
    .box-inside .heading {
        font-family: 'Inter';
        font-weight: 600;
        color: rgba(28, 28, 28, 0.5);
    }
    .store-header {
        border-bottom: 2px solid #CCCCCC;
    }
    .order-return img[alt="locator"] {
        position: relative;
        top: 6px;
    }
    .order-return hr:not([size]) {
        height: 2px;
    }
    .order-return .dash-back-btn {
        border: 1px solid #CCCCCC;
        background: none;
    }
    .order-return img[alt="return-request"] {
        height: 25px;
    }
    .order-return .engine22 {
        height: 45px;
        border: 1px solid #CCCCCC;
        padding: 5px;
    }
    .order-return .order-return-details {
        width: 70%;
    }
    .order-return .order-return-price {
        width: 30%;
    }
    .order-return .reason-returning-img {
        width: 48%;
    }
    .order-return .reason-returning-img:first-child {
        margin-right: 1%;
    }
    .order-return .grand-total-block {
        border-top: 3px solid #CCCCCC80;
    }
</style>
<div class="admin-main-content border order-return">
    <div class="row mx-auto store-header">
        <div class="col-sm-11 py-4 mx-auto d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-start">
                    <a href="{{URL('order-listing')}}" class="dash-back-btn"><span class="fas fa-arrow-left p-2"></span></a>
                    <div class="ms-3">
                        <div class="d-flex align-items-center">
                            <h3 class="d-inline-block">#481293</h3>
                            <img src="{{ asset('public/uploads/website-images/images/return-request.png') }}" alt="return-request" class="ms-3 me-2">
                            <a href="#" class="d-inline-block red-link font-600">Return Requested</a>
                        </div>
                        <small class="d-block">02 Mar 2023, 10:30 AM</small>
                    </div>
                </div>
            </div>
            <button class="btn-bg">Accept Request</button>
        </div>
    </div>

    <div class="row col-sm-11 mx-auto my-4">
        <div class="d-flex">
            <div class="d-flex order-return-details">
                <div class="me-3 img-holder">
                    <img src="{{ asset('public/uploads/website-images/images/engine30.png') }}" class="engine22">
                </div>
                <div>
                    <h6 class="mb-2">Mophorn 3 HP Electric Motor 1 Phase AC Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW Air Compressor Motor, 115/230V</h6>
                    <p class="mb-1"><b>Size:</b> 3 HP</p>
                    <p><b>SKU:</b> 3200809-005-746</p>
                </div>
            </div>
            <h6 class="d-inline-block text-end order-return-price">USD $11,250.00</h6>
        </div>
        <div class="d-flex align-items-baseline mt-4">
            <img src="{{ asset('public/uploads/website-images/images/locator.png') }}" alt="locator">
            <div class="ms-3">
                <h6>Location</h6>
                <p>Street 1, Houston, Texas</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row col-sm-11 mx-auto my-4">
        <div>
            <div class="mb-3">
                <img src="{{ asset('public/uploads/website-images/images/return-request.png') }}" alt="return-request" class="me-2">
                <a href="#" class="d-inline-block red-link font-600">Return Requested</a>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div>
                    <p><b class="me-5">Subtotal:</b> 1 item</p>
                </div>
                <p>$11,250.00</p>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div>
                    <p><b class="me-5">Shipping:</b> Standard (10.0 kg)</p>
                </div>
                <p>$ 20.00</p>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div>
                    <p><b class="me-5">Total:</b></p>
                </div>
                <p>$ 11,270.00</p>
            </div>
            <div class="pt-3 d-flex justify-content-between grand-total-block">
                <div>
                    <p><b class="me-5">Grand Total:</b></p>
                </div>
                <p><b>$ 11,270.00</b></p>
            </div>
        </div>
    </div>

    <div class="bg-grey">
        <h5 class="col-sm-11 mx-auto">Reason For Returning</h5>
    </div>
    <div class="row col-sm-11 mx-auto my-4">
        <div class="col-md-8">
            <div>
                <h6 class="d-inline">Reason</h6>
                <p class="d-inline ms-5">Item is damaged / Broken</p>
            </div>
            <hr>
            <h6 class="mb-3">Additional Information</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="mt-md-0 mt-3 col-md-4">
            <img src="{{ asset('public/uploads/website-images/images/reason2.png') }}" class="reason-returning-img">
            <img src="{{ asset('public/uploads/website-images/images/reason1.png') }}" class="reason-returning-img">
        </div>
    </div>
    <hr>
    <div class="row col-sm-11 mx-auto my-4">
        <h5 class="mb-3">Customer Information</h5>
        <div class="col-sm-6">
            <h6>Full Name</h6>
            <p class="mb-3">John Doe</p>
            <h6>Email Address</h6>
            <p class="mb-3">johndoe@example.com</p>
            <h6>Phone Number</h6>
            <p class="mb-3">+1 000 000000</p>
        </div>
        <div class="col-sm-6">
            <h6>Shipping Address</h6>
            <p class="mb-3">Street, 6001 W Waco Dr #314. New York, USA</p>
            <h6>Billing Address</h6>
            <p>Street, 6001 W Waco Dr #314. New York, USA</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('error'))
        <script>
            toastr.error('{{ \Illuminate\Support\Facades\Session::get('error') }}');
        </script>
    @endif
    <script>

    </script>

@endsection

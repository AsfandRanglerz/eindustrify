@extends('layout')
@section('title')
    <title>Registration</title>
@endsection
@section('meta')
    <meta name="description" content="{{ __('user.Login') }}">
@endsection
<style>
    .side-section {
        height: 100%;
    }

    img[alt="login-side-img"] {
        height: 100%;
    }

    .side-section-content {
        top: 0;
    }

    .auth-container {
        border: 1px solid #CCCCCC;
    }

    .bg-grey {
        background: #F2F2F2;
        font-weight: 500 !important;
        padding: 10px;
    }

    .dropzone {
        background: #F7F7F7 !important;
        border: 2px dashed rgba(48, 48, 48, 0.3) !important;
    }

    button.dz-button {
        font-family: 'Inter' !important;
        font-weight: 600 !important;
        color: rgba(28, 28, 28, 0.5) !important;
    }

    .accordion-button::before {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-style: normal;
        flex-shrink: 0;
        margin-left: 0;
        content: "\f068";
        transition: transform 0.2s ease-in-out;
        background: #B0191E;
        color: #FFF;
        width: 16px;
        height: 16px;
        font-size: 8px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        border-radius: 4px;
        margin-right: 8px;
    }

    .collapsed::before {
        content: "\f067";
        background: #000;
    }

    .accordion-button::after {
        display: none;
    }

    img[alt="icon-search"] {
        position: absolute;
        right: 14px;
    }

    #searchCat {
        border-radius: 0;
    }

    .accordion-item {
        border-bottom: 1px solid #D9D9D9 !important;
    }

    .accordion .accordion-item:last-child {
        border-bottom: none !important;
    }

    .accordion-button {
        font-weight: 600;
    }

    .cat-dropdown-section {
        position: absolute;
        width: 100%;
        z-index: 1;
        background: #FFF;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        height: 305px;
        overflow-y: scroll;
    }

    .category-dropdown-container .accordion-button {
        background: rgba(176, 25, 30, 0.1) !important;
    }

    .category-dropdown-container .accordion-button.collapsed {
        background: #FFF !important;
    }

    .bulk-modal .form-check-input[type=checkbox] {
        border-radius: 50px;
    }

    .bulk-modal .form-control {
        padding: 12px 16px !important;
    }

    .bulk-modal .prod-prop-input {
        padding: 12px 36px !important;
    }

    .bulk-modal tr {
        vertical-align: middle;
    }

    .bulk-modal .table>thead {
        vertical-align: bottom;
        background: #000;
        color: #FFF;
        text-align: center;
    }

    img[alt="property-icon"] {
        left: 22px;
    }

    img[alt="dropdown-icon"] {
        right: 30px;
        height: 5px;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #F2F2F2;
        border: none;
    }

    .bulk-modal tr {
        font-size: 14px;
    }

    .bulk-modal td {
        padding: 18px 16px !important;
    }

    .bulk-files-table {
        border-left: 1px solid #C8C8C8;
        border-right: 1px solid #C8C8C8;
    }

    .bulk-modal .modal-body {
        background: #F5F5F5;
        padding: 2rem;
    }

    .bulk-modal tbody tr {
        background: #FFF;
    }

    .bulk-modal .modal-title {
        padding: 8px 16px;
    }

    .bulk-modal .modal-title,
    .bulk-modal .bulk-model-steps {
        background: #FFF;
        border: 1px solid #C8C8C8;
        margin-bottom: 20px;
    }

    .bulk-modal .bulk-model-steps {
        padding: 12px 16px;
    }

    .bulk-files-step2 {
        padding: 85px 0;
        border: 1px solid #CCCCCC;
    }
</style>
@section('public-content')
    <!--============================
                                           LOGIN/REGISTER PAGE START
                                        ==============================-->
    <section id="wsus__login_register" class="py-5">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-xl-8 col-md-6">
                    <div class="pt-5 auth-container">
                        <h3 class="text-center text-inherit heading">Register your account.</h3>
                        <p class="pb-5 text-center">Reap the benefits of a personalized shopping experience.</p>
                        <ul class="mb-4 nav nav-tabs justify-content-center" id="authData" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="contactInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#contactInfo" type="button" role="tab" aria-controls="contactInfo"
                                    aria-selected="true"><span class="badge me-2">1</span> Contact Information</button>
                            </li>
                            <li class="nav-item d-flex align-items-center" role="presentation">
                                <span class="d-block seperator"></span>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="businessInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#businessInfo" type="button" role="tab"
                                    aria-controls="businessInfo" aria-selected="false"><span class="badge me-2">2</span>
                                    Business Information</button>
                            </li>
                            <li class="nav-item d-flex align-items-center vendor-section d-none" role="presentation">
                                <span class="d-block seperator"></span>

                            </li>
                            <li class="nav-item vendor-section d-none" role="presentation">
                                <button class="nav-link" id="prodInfo-tab" data-bs-toggle="tab" data-bs-target="#prodInfo"
                                    type="button" role="tab" aria-controls="prodInfo" aria-selected="false"><span
                                        class="badge me-2">3</span> Product Information</button>
                            </li>
                        </ul>
                        <form action="{{ Url('customer-register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="authDataContent">
                                <div class="tab-pane fade show active" id="contactInfo" role="tabpanel"
                                    aria-labelledby="contactInfo-tab">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row mb-4 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Registration type <span
                                                        class="required">*</span></label>
                                                <select class="form-control" id="selRole" name="role">
                                                    <option value=""></option>
                                                    <option value="user">Register as a Customer</option>
                                                    <option value="vendor">Register as a Vendor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 bg-grey">
                                        <h5 class="col-xl-10 mx-auto">Contact Information</h5>
                                    </div>
                                    <div class="col-xl-10 mx-auto">
                                       
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">First Name <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control" name="first_name"
                                                    value="{{ old('first_name') }}" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Last Name <span
                                                        class="required">*</span></label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                    class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Email Address <span
                                                        class="required">*</span></label>
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control" placeholder="Email Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Phone Number <span
                                                        class="required">*</span></label>
                                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                                    class="form-control" placeholder="Phone Number" id="phoneNumber">
                                            </div>
                                        </div>
                                        <div class="row mx-auto">
                                            <div class="form-group col-md-6">
                                                <label for="userPassword" class="text-uppercase">Password <span
                                                        class="required">*</span></label>
                                                <div class="position-relative my-0 wsus__login_input">
                                                    <input type="password" name="password" value="{{ old('password') }}"
                                                        placeholder="Password" name="password" id="userPassword"
                                                        class="form-control pr-padding">
                                                    <span toggle="#userPassword"
                                                        class="fas fa-eye preview-eye-icon toggle-password"
                                                        aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="userConPassword" class="text-uppercase">Confirm Password <span
                                                        class="required">*</span></label>
                                                <div class="position-relative my-0 wsus__login_input">
                                                    <input type="password" name="confirm_password"
                                                        value="{{ old('confirm_password') }}" placeholder="Password"
                                                        name="password" id="userConPassword"
                                                        class="form-control pr-padding">
                                                    <span toggle="#userConPassword"
                                                        class="fas fa-eye preview-eye-icon toggle-password"
                                                        aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="mt-4 form-check">
                                                    <input class="form-check-input" type="checkbox" id="agreeOffer">
                                                    <label class="form-check-label label-light-weight" for="agreeOffer">I
                                                        agree to receive information and commerical offers from
                                                        eIndustrify</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="border-segregate">
                                        <div class="col-xl-10 mx-auto">
                                            <div class="row mx-auto py-2">
                                                <div class="form-group my-4 text-end">
                                                    <a href="#" class="common_btn continue_btn">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="businessInfo" role="tabpanel"
                                    aria-labelledby="businessInfo-tab">
                                    <div class="customer-section d-none">
                                        <div class="bg-grey">
                                            <h5 class="col-xl-10 mx-auto">Business Information</h5>
                                        </div>
                                        <div class="my-4 col-xl-10 mx-auto">
                                            {{-- <form method="POST"> --}}
                                            @csrf
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">business name <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="bussiness_name"
                                                        value="{{ old('bussiness_name') }}" class="form-control"
                                                        placeholder="XYZ Business">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Business number <span
                                                            class="required">*</span></label>
                                                    <input type="tel" name="bussiness_phone"
                                                        value="{{ old('bussiness_phone') }}" class="form-control"
                                                        placeholder="Business Number" id="businessNumber1">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">tax id <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="bussiness_tax_id"
                                                        value="{{ old('bussiness_tax_id') }}" class="form-control"
                                                        placeholder="ATU12345678">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">industry type</label>
                                                    <select class="form-control indus-type"
                                                        name="bussiness_industry_type">
                                                        <option value=""></option>
                                                        <option value="industry name">industry one</option>
                                                        <option value="industry name">industry two</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                        <div class="mb-3 bg-grey">
                                            <h5 class="col-xl-10 mx-auto">Shipping Address</h5>
                                        </div>
                                        <div class="col-xl-10 mx-auto">
                                            {{-- <form method="POST"> --}}
                                            @csrf
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Street address line 1 <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="shipping_street_address"
                                                        value="{{ old('shipping_street_address') }}" class="form-control"
                                                        placeholder="Street, 6001 W Waco Dr #314">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Suite, building, department etc <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="shipping_department"
                                                        value="{{ old('shipping_department') }}" class="form-control"
                                                        placeholder="Suite, building, department etc">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">City <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-city" name="shipping_city_id">
                                                        <option value=""></option>
                                                        @foreach ($city as $city_data)
                                                            <option value="{{ $city_data->id }}">{{ $city_data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">state <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-state" name="shipping_state_id">
                                                        <option value=""></option>
                                                        @foreach ($state as $state_data)
                                                            <option value="{{ $state_data->id }}">{{ $state_data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Country/Region* <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-country"
                                                        name="shipping_country_id">
                                                        <option value=""></option>
                                                        @foreach ($country as $country_data)
                                                            <option value="{{ $country_data->id }}">
                                                                {{ $country_data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Postal/zip code</label>
                                                    <input type="text" name="shipping_zip_code"
                                                        value="{{ old('shipping_zip_code') }}" class="form-control"
                                                        placeholder="147001">
                                                </div>
                                                <div class="form-group">
                                                    <div class="mt-4 form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="billingAddress">
                                                        <label class="form-check-label label-light-weight"
                                                            for="billingAddress">Billing address same as shipping
                                                            address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                        <div class="bg-grey">
                                            <h5 class="col-xl-10 mx-auto">Billing Address</h5>
                                        </div>
                                        <div class="col-xl-10 my-4 mx-auto">
                                            {{-- <form action="{{Url('customer-register')}}" method="POST"> --}}
                                            @csrf
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Street address line 1 <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="billing_street_address"
                                                        value="{{ old('billing_street_address') }}" class="form-control"
                                                        placeholder="Street, 6001 W Waco Dr #314">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Suite, building, department etc <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="billing_department"
                                                        value="{{ old('billing_department') }}" class="form-control"
                                                        placeholder="Suite, building, department etc">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">City <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-city" name="billing_city_id">
                                                        <option value=""></option>
                                                        @foreach ($city as $city_data)
                                                            <option value="{{ $city_data->id }}">{{ $city_data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">state <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-state" name="billing_state_id">
                                                        <option value=""></option>
                                                        @foreach ($state as $state_data)
                                                            <option value="{{ $state_data->id }}">{{ $state_data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Country/Region* <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-country" name="billing_country_id">
                                                        <option value=""></option>
                                                        @foreach ($country as $country_data)
                                                            <option value="{{ $country_data->id }}">
                                                                {{ $country_data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Postal/zip code</label>
                                                    <input type="text" class="form-control" name="billing_zip_code"
                                                        value="{{ old('billing_zip_code') }}" placeholder="147001">
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                    <div class="vendor-section d-none">
                                        <div class="bg-grey">
                                            <h5 class="col-xl-10 mx-auto">Business Information</h5>
                                        </div>
                                        <div class="my-4 col-xl-10 mx-auto">
                                            {{-- <form method="POST"> --}}
                                            @csrf
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">business name <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="vendor_business_name" placeholder="XYZ Business">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Tax ID number <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="vendor_tax_id" class="form-control"
                                                        placeholder="Tax ID Number">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Industry <span
                                                            class="required">*</span></label>
                                                    <select class="form-control indus-type" name="vendor_industry_type">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">VAT Number <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="vendor_vat" class="form-control"
                                                        placeholder="Enter VAT Number">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">No. of employees</label>
                                                    <select class="form-control" id="noEmployees"
                                                        name="vendor_total_employee">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Business number <span
                                                            class="required">*</span></label>
                                                    <input type="tel" class="form-control"
                                                        placeholder="Business Number" name="vendor_business_phone"
                                                        id="businessNumber2">
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                        <div class="bg-grey">
                                            <h5 class="col-xl-10 mx-auto">Billing Address</h5>
                                        </div>
                                        <div class="col-xl-10 my-4 mx-auto">
                                            {{-- <form method="POST"> --}}
                                            @csrf
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Street address</label>
                                                    <input type="text" class="form-control"
                                                        name="vendor_street_address"
                                                        placeholder="Street, 6001 W Waco Dr #314">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Suite, building, department
                                                        etc</label>
                                                    <input type="text" class="form-control" name="vendor_department"
                                                        placeholder="Suite, building, department etc">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Country/Region<span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-country" id="vendor_country_id"
                                                        name="vender_country_id">
                                                        <option value=""></option>
                                                        @foreach ($country as $country_item)
                                                            <option value="{{ $country_item->id }}">
                                                                {{ $country_item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">State<span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-state" id="vendor_state_id"
                                                        name="vender_state_id">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mx-auto">
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">City <span
                                                            class="required">*</span></label>
                                                    <select class="form-control select-city" id="vendor_city_id"
                                                        name="vender_city_id">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-uppercase">Postal/zip code</label>
                                                    <input type="text" class="form-control" placeholder="147001"
                                                        vender_zip_code>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                    <div class="border-segregate">
                                        <div class="col-xl-10 mx-auto">
                                            <div class="row mx-auto py-2">
                                                <div class="form-group my-4 text-end">
                                                    <a href="" class="font-600">Back</a>
                                                    {{-- <button class="ms-5 common_btn continue_btn">Continue</button> --}}
                                                    <button class="ms-5 common_btn">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="prodInfo" role="tabpanel"
                                    aria-labelledby="prodInfo-tab">
                                    <div class="my-4 col-xl-10 mx-auto">
                                        @csrf
                                        <div class="row mb-3 mx-auto">
                                            <label class="text-uppercase">Product Categories</label>
                                            <div class="form-group col-md-12 my-4">
                                                <div class="position-relative category-dropdown-container">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <input type="text" id="searchCat" class="form-control"
                                                            placeholder="Please Search/Select Category">
                                                        <img src="{{ asset('public/uploads/website-images/images/icon-search.png') }}"
                                                            alt="icon-search">
                                                    </div>
                                                    <div class="accordion d-none cat-dropdown-section"
                                                        id="catSubChildDropdown">
                                                        @foreach ($categories as $category)
                                                            <div class="accordion-item accordion-item-category">
                                                                <h2 class="accordion-header"
                                                                    id="headingOne{{ $category->id }}">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseOne{{ $category->id }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseOne{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </button>
                                                                    <input class="form-check-input" name="category_id[]"
                                                                        type="checkbox" value="{{ $category->id }}"
                                                                        hidden>
                                                                </h2>
                                                                <div id="collapseOne{{ $category->id }}"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingOne{{ $category->id }}"
                                                                    data-bs-parent="#catSubChildDropdown">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="position-relative d-flex align-items-center">
                                                                            <input type="text"
                                                                                class="form-control search-sub-category"
                                                                                placeholder="Please Search/Select Sub-Category">
                                                                            <img src="{{ asset('public/uploads/website-images/images/icon-search.png') }}"
                                                                                alt="icon-search">
                                                                        </div>
                                                                        @foreach ($category->subCategories as $subCategory)
                                                                            <div class="accordion"
                                                                                id="catSubChildDropdown1{{ $subCategory->id }}">
                                                                                <div
                                                                                    class="accordion-item accordion-item-sub-category">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingOne1{{ $subCategory->id }}">
                                                                                        <button
                                                                                            class="accordion-button collapsed"
                                                                                            type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseOne1{{ $subCategory->id }}"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="collapseOne1{{ $subCategory->id }}">
                                                                                            {{ $subCategory->name }}
                                                                                        </button>
                                                                                        <input class="form-check-input"
                                                                                            name="suCategory_id[]"
                                                                                            type="checkbox"
                                                                                            value="{{ $subCategory->id }}"
                                                                                            hidden>
                                                                                    </h2>
                                                                                    <div id="collapseOne1{{ $subCategory->id }}"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingOne1{{ $subCategory->id }}"
                                                                                        data-bs-parent="#catSubChildDropdown1{{ $subCategory->id }}">
                                                                                        <div class="accordion-body">
                                                                                            <div
                                                                                                class=" mb-3 position-relative d-flex align-items-center">
                                                                                                <input type="text"
                                                                                                    class="form-control child-cat-search"
                                                                                                    placeholder="Please Search/Select Child-Category">
                                                                                                <img src="{{ asset('public/uploads/website-images/images/icon-search.png') }}"
                                                                                                    alt="icon-search">
                                                                                            </div>
                                                                                            <div
                                                                                                class="search-sub-cat-child">
                                                                                                @foreach ($subCategory->childCategories as $childCategory)
                                                                                                    <div
                                                                                                        class="form-check mb-0 sub-cat-child">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            name="child_category_id[]"
                                                                                                            type="checkbox"
                                                                                                            value="{{ $childCategory->id }}"
                                                                                                            id="accessoriesSub{{ $childCategory->id }}">
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="accessoriesSub{{ $childCategory->id }}">{{ $childCategory->name }}</label>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group">
                                                <div class="mb-2 d-flex align-items-center justify-content-between">
                                                    <label class="text-uppercase">Please upload your product catalog
                                                        here</label>
                                                    <button type="button" class="common_btn" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">Bulk Upload</button>
                                                    <!-- Button trigger modal -->







                                                </div>
                                                <form action="/upload-target" class="dropzone"></form>
                                                <!-- Or With An Input Field Fallback -->
                                                <form action="/upload-target" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                                                <!-- Modal -->
                            {{-- data-bs-backdrop="static" --}}
                            <div class="modal fade bulk-modal" id="staticBackdrop" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="staticBackdropLabel">Product Mapping Guide</h5>
                                        <div class="d-flex bulk-model-steps">
                                            <div class="d-flex align-items-center">
                                                <span class="fa fa-angle-right"></span>
                                                <img class="mx-2"
                                                    src="{{ asset('/public/uploads/website-images/images/property.png') }}">
                                                <h6 class="me-5">Product</h6>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img
                                                    src="{{ asset('/public/uploads/website-images/images/import-product.png') }}">
                                                <h6 class="ms-2">Ready to Import Products</h6>
                                            </div>
                                        </div>
                                        <div
                                            class="table-responsive bulk-files-table bulk-files-step1 product-mapping-1">
                                            <table class="table mb-0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">COLUMN <br> HEADER <br> FROM FILE</th>
                                                        <th scope="col">PREVIEW INFORMATION</th>
                                                        <th scope="col">MAPPED</th>
                                                        <th scope="col">IMPORT AS</th>
                                                        <th scope="col">eINDUSTRIFY PROPERTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">Product Name</td>
                                                        <td class="text-center">Mophorn 3 HP Electric Motor</td>
                                                        <td class="text-center"><input type="checkbox"
                                                                class="form-check-input" name=""
                                                                id=""></td>
                                                        <td class="position-relative d-flex align-items-center"><img
                                                                src="{{ asset('public/uploads/website-images/images/property.png') }}"
                                                                class="position-absolute" alt="property-icon"><img
                                                                src="{{ asset('public/uploads/website-images/images/dropdown.png') }}"
                                                                class="position-absolute" alt="dropdown-icon"><input
                                                                type="input" placeholder="Product Properties"
                                                                class="form-control prod-prop-input" name=""
                                                                id="" readonly></td>
                                                        <td><input type="input" placeholder="Product Name*"
                                                                class="form-control" name="" id=""
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">Product Name</td>
                                                        <td class="text-center">Mophorn 3 HP Electric Motor</td>
                                                        <td class="text-center"><input type="checkbox"
                                                                class="form-check-input" name=""
                                                                id=""></td>
                                                        <td class="position-relative d-flex align-items-center"><img
                                                                src="{{ asset('public/uploads/website-images/images/property.png') }}"
                                                                class="position-absolute" alt="property-icon"><img
                                                                src="{{ asset('public/uploads/website-images/images/dropdown.png') }}"
                                                                class="position-absolute" alt="dropdown-icon"><input
                                                                type="input" placeholder="Product Properties"
                                                                class="form-control prod-prop-input" name=""
                                                                id="" readonly></td>
                                                        <td><input type="input" placeholder="Product Name*"
                                                                class="form-control" name="" id=""
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">Product Name</td>
                                                        <td class="text-center">Mophorn 3 HP Electric Motor</td>
                                                        <td class="text-center"><input type="checkbox"
                                                                class="form-check-input" name=""
                                                                id=""></td>
                                                        <td class="position-relative d-flex align-items-center"><img
                                                                src="{{ asset('public/uploads/website-images/images/property.png') }}"
                                                                class="position-absolute" alt="property-icon"><img
                                                                src="{{ asset('public/uploads/website-images/images/dropdown.png') }}"
                                                                class="position-absolute" alt="dropdown-icon"><input
                                                                type="input" placeholder="Product Properties"
                                                                class="form-control prod-prop-input" name=""
                                                                id="" readonly></td>
                                                        <td><input type="input" placeholder="Product Name*"
                                                                class="form-control" name="" id=""
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">Product Name</td>
                                                        <td class="text-center">Mophorn 3 HP Electric Motor</td>
                                                        <td class="text-center"><input type="checkbox"
                                                                class="form-check-input" name=""
                                                                id=""></td>
                                                        <td class="position-relative d-flex align-items-center"><img
                                                                src="{{ asset('public/uploads/website-images/images/property.png') }}"
                                                                class="position-absolute" alt="property-icon"><img
                                                                src="{{ asset('public/uploads/website-images/images/dropdown.png') }}"
                                                                class="position-absolute" alt="dropdown-icon"><input
                                                                type="input" placeholder="Product Properties"
                                                                class="form-control prod-prop-input" name=""
                                                                id="" readonly></td>
                                                        <td><input type="input" placeholder="Product Name*"
                                                                class="form-control" name="" id=""
                                                                readonly></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="bg-white d-none mb-4 bulk-files-step2 product-mapping-2">
                                            <div class="col-sm-5 mx-auto">
                                                <h4 class="mb-3">Product Mapping Final Details</h4>
                                                <label for="formFile" class="form-label">Import File Name*</label>
                                                <input class="form-control" type="file" id="formFile" name="file">
                                                <div class="mt-3 form-check">
                                                    <input class="form-check-input" type="checkbox" id="agreeOffer2">
                                                    <label class="form-check-label label-light-weight"
                                                        for="agreeOffer2">I agree that all the products in this import
                                                        are expecting to hear from eIndustrify itself. eIndustry has the
                                                        necessary information saved regarding each product and is
                                                        confidential and will remain confidential. I can hereby confirm
                                                        this list wasn’t purchased, rented, appended, or provided by a
                                                        third party.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="bulk-files-step1 product-mapping-1 mt-4 d-flex align-items-center justify-content-between">
                                            <button type="button" class="bg-dark common_btn"
                                                data-bs-dismiss="modal"><span
                                                    class="me-2 fa fa-angle-left text-white"></span>Back</button>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <b>You have 3 unmapped columns</b>
                                                    <div class="mt-2 mb-0 form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="agreeOffer1">
                                                        <label class="form-check-label label-light-weight"
                                                            for="agreeOffer1">Don’t import data from unmapped
                                                            columns</label>
                                                    </div>
                                                </div>
                                                <button type="button" class="common_btn next_btn">Next<span
                                                        class="ms-2 fa fa-angle-right text-white"></span></button>
                                            </div>
                                        </div>
                                        <div
                                            class="product-mapping-2 d-none d-flex align-items-center justify-content-between">
                                            <button type="button" class="bg-dark common_btn to-step-1"><span
                                                    class="me-2 fa fa-angle-left text-white"></span>Back</button>
                                            <button type="button" class="common_btn next_btn"
                                                data-bs-dismiss="modal">Finish Import</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <div class="border-segregate">
                                        <div class="col-xl-10 mx-auto">
                                            <div class="row mx-auto py-2">
                                                <div class="form-group my-4 text-end">
                                                    <a href="" class="font-600">Back</a>
                                                    <button class="ms-5 common_btn">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 px-0 col-md-6">
                    <div class="position-relative side-section">
                        <img src="{{ asset('public/uploads/website-images/images/auth-side-img.jpg') }}"
                            class="img-fluid w-100">
                        <div class="position-absolute py-5 px-4 side-section-content">
                            <h3 class="text-white position-relative heading">Register and you will be able to</h3>
                            <ul>
                                <li class="text-white list"><img
                                        src="{{ asset('public/uploads/website-images/images/check-circle.png') }}"
                                        class="me-2">Speed your way through checkout</li>
                                <li class="text-white list"><img
                                        src="{{ asset('public/uploads/website-images/images/check-circle.png') }}"
                                        class="me-2">Track your orders easily</li>
                                <li class="text-white list"><img
                                        src="{{ asset('public/uploads/website-images/images/check-circle.png') }}"
                                        class="me-2">Keep a record of all your purchases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                           LOGIN/REGISTER PAGE END
                                        ==============================-->
@endsection
@section('js')
    <script>
        $(function() {
            $('.bulk-modal .next_btn').on('click', function() {
                $('.product-mapping-1').addClass('d-none');
                $('.product-mapping-2').removeClass('d-none');
            });
            $('.bulk-modal .to-step-1').on('click', function() {
                $('.product-mapping-1').removeClass('d-none');
                $('.product-mapping-2').addClass('d-none');
            });

            $('input:checkbox').on('click', function() {
                if ($(this).is(':checked') || $(this).parent().siblings().find('input:checkbox').is(
                        ':checked')) {
                    $(this).closest('.accordion-item-category').children('.accordion-header').find('input')
                        .attr('selected', true);
                    $(this).closest('.accordion-item-sub-category').children('.accordion-header').find(
                        'input').attr('selected', true);
                } else {
                    $(this).closest('.accordion-item-category').children('.accordion-header').find('input')
                        .attr('selected', false);
                    $(this).closest('.accordion-item-sub-category').children('.accordion-header').find(
                        'input').attr('selected', false);
                }
            });

            $('#searchCat').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.accordion-item-category').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.search-sub-category').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $(this).closest('.accordion-body').find('.accordion-item-sub-category').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.child-cat-search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $(this).closest('.accordion-body').find('.sub-cat-child').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $(document).on('click', '#searchCat, #catSubChildDropdown', function() {
                $('.cat-dropdown-section').removeClass('d-none');
            });
            $('#prodInfo').click(function() {
                $('.cat-dropdown-section').addClass('d-none');
            });

            $('#selRole').select2({
                placeholder: 'Select Your Role',
            });
            $('.indus-type').select2({
                placeholder: 'Industry Type',
            });
            $('#noEmployees').select2({
                placeholder: 'Number of Employees',
            });
            $('.select-city').select2({
                placeholder: 'Select City',
            });
            $('.select-state').select2({
                placeholder: 'Select State',
            });
            $('.select-country').select2({
                placeholder: 'Select Country',
            });
            $('.select-category').select2({
                placeholder: 'Please Search or Select Category',
            });
            var telInput2 = document.querySelector("#phoneNumber");
            var telInput3 = document.querySelector("#businessNumber1");
            var telInput4 = document.querySelector("#businessNumber2");
            if (telInput2) {
                var telflags = window.intlTelInput(telInput2, {
                    allowExtensions: true,
                    formatOnDisplay: true,
                    autoFormat: true,
                    autoHideDialCode: false,
                    autoPlaceholder: true,
                    defaultCountry: "auto",
                    ipinfoToken: "yolo",
                    nationalMode: false,
                    numberType: "MOBILE",
                    //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    preferredCountries: ['pk', 'sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],
                    preventInvalidNumbers: true,
                    separateDialCode: true,
                    initialCountry: "us",
                    geoIpLookup: function(callback) {
                        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "";
                            callback(countryCode);
                        });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
                });
            }
            if (telInput3) {
                var telflags = window.intlTelInput(telInput3, {
                    allowExtensions: true,
                    formatOnDisplay: true,
                    autoFormat: true,
                    autoHideDialCode: false,
                    autoPlaceholder: true,
                    defaultCountry: "auto",
                    ipinfoToken: "yolo",
                    nationalMode: false,
                    numberType: "MOBILE",
                    //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    preferredCountries: ['pk', 'sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],
                    preventInvalidNumbers: true,
                    separateDialCode: true,
                    initialCountry: "us",
                    geoIpLookup: function(callback) {
                        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "";
                            callback(countryCode);
                        });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
                });
            }
            if (telInput4) {
                var telflags = window.intlTelInput(telInput4, {
                    allowExtensions: true,
                    formatOnDisplay: true,
                    autoFormat: true,
                    autoHideDialCode: false,
                    autoPlaceholder: true,
                    defaultCountry: "auto",
                    ipinfoToken: "yolo",
                    nationalMode: false,
                    numberType: "MOBILE",
                    //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                    preferredCountries: ['pk', 'sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],
                    preventInvalidNumbers: true,
                    separateDialCode: true,
                    initialCountry: "us",
                    geoIpLookup: function(callback) {
                        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "";
                            callback(countryCode);
                        });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
                });
            }
        });

        $(".dropzone").dropzone({
            url: "upload-target",
            maxFiles: 3,
            uploadMultiple: false,
        });

        $('#selRole').on('change', function() {
            if ($(this).val() == 'user') {
                $('.customer-section').removeClass('d-none');
                $('.vendor-section').addClass('d-none');
            } else {
                $('.customer-section').addClass('d-none');
                $('.vendor-section').removeClass('d-none');
            }
        });


        $(function() {
            $("#vendor_country_id").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var countryId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/vendor-get-states') }}',
                    type: 'GET',
                    data: {
                        'id': countryId
                    },
                    success: function(response) {
                        $('#vendor_state_id').empty();
                        $('#response_billing_state_append').html(
                            '<option value="" disabled selected>Select State</option>');
                        $.each(response.data, function(key, value) {
                            $("#vendor_state_id").append(
                                '<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
        $(function() {
            $("#vendor_state_id").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var stateId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('vendor-get-city') }}',
                    type: 'GET',
                    data: {
                        'id': stateId
                    },
                    success: function(response) {
                        $('#vendor_city_id').empty();
                        $('#response_billing_city_append').html(
                            '<option value="" disabled selected>Select City</option>');
                        $.each(response.data, function(key, value) {
                            $("#vendor_city_id").append(
                                '<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection

@extends('layout')
@section('title')
    <title>Registration</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Login')}}">
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
        border-radius: 20px;
    }

    .bg-grey {
        background: #F2F2F2;
        font-weight: 500!important;
        padding: 10px;
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
                                <button class="nav-link active" id="contactInfo-tab" data-bs-toggle="tab" data-bs-target="#contactInfo" type="button" role="tab" aria-controls="contactInfo" aria-selected="true"><span class="badge me-2">1</span> Contact Information</button>
                            </li>
                            <li class="nav-item d-flex align-items-center" role="presentation">
                                <span class="d-block seperator"></span>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="businessInfo-tab" data-bs-toggle="tab" data-bs-target="#businessInfo" type="button" role="tab" aria-controls="businessInfo" aria-selected="false"><span class="badge me-2">2</span> Business Information</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="authDataContent">
                            <div class="tab-pane fade show active" id="contactInfo" role="tabpanel" aria-labelledby="contactInfo-tab">
                                <div class="col-xl-10 mx-auto">
                                    <div class="row mb-4 mx-auto">
                                        <div class="form-group col-md-6">
                                            <label class="text-uppercase">Registration type <span class="required">*</span></label>
                                            <select class="form-control" id="selRole">
                                                <option value=""></option>
                                                <option value="Register as a customer">Register as a customer</option>
                                                <option value="Register as a Vendor">Register as a Vendor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 bg-grey">
                                    <h5 class="col-xl-10 mx-auto">Contact Information</h5>
                                </div>
                                <div class="col-xl-10 mx-auto">
                                    <form method="POST">
                                        @csrf
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">First Name <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Last Name <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Email Address <span class="required">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Phone Number <span class="required">*</span></label>
                                                <input type="tel" class="form-control" placeholder="Phone Number" id="phoneNumber">
                                            </div>
                                        </div>
                                        <div class="row mx-auto">
                                            <div class="form-group col-md-6">
                                                <label for="userPassword" class="text-uppercase">Password <span class="required">*</span></label>
                                                <div class="position-relative my-0 wsus__login_input">
                                                    <input type="password" placeholder="Password" name="password" id="userPassword" class="form-control pr-padding">
                                                    <span toggle="#userPassword" class="fas fa-eye preview-eye-icon toggle-password" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="userConPassword" class="text-uppercase">Confirm Password <span class="required">*</span></label>
                                                <div class="position-relative my-0 wsus__login_input">
                                                    <input type="password" placeholder="Password" name="password" id="userConPassword" class="form-control pr-padding">
                                                    <span toggle="#userConPassword" class="fas fa-eye preview-eye-icon toggle-password" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="mt-4 form-check">
                                                    <input class="form-check-input" type="checkbox" id="agreeOffer">
                                                    <label class="form-check-label label-light-weight" for="agreeOffer">I agree to receive information and commerical offers from eIndustrify</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="border-segregate">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row mx-auto py-2">
                                            <div class="form-group my-4 text-end">
                                                <button class="common_btn continue_btn" href="" type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="businessInfo" role="tabpanel" aria-labelledby="businessInfo-tab">
                                <div class="bg-grey">
                                    <h5 class="col-xl-10 mx-auto">Business Information</h5>
                                </div>
                                <div class="my-4 col-xl-10 mx-auto">
                                    <form method="POST">
                                        @csrf
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">business name <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="XYZ Business">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Business number <span class="required">*</span></label>
                                                <input type="tel" class="form-control" placeholder="Business Number" id="businessNumber">
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">tax id <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="ATU12345678">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">industry type</label>
                                                <select class="form-control" id="indusType">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-3 bg-grey">
                                    <h5 class="col-xl-10 mx-auto">Shipping Address</h5>
                                </div>
                                <div class="col-xl-10 mx-auto">
                                    <form method="POST">
                                        @csrf
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Street address line 1 <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Street, 6001 W Waco Dr #314">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Suite, building, department etc <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Suite, building, department etc">
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">City <span class="required">*</span></label>
                                                <select class="form-control select-city">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">state <span class="required">*</span></label>
                                                <select class="form-control select-state">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Country/Region* <span class="required">*</span></label>
                                                <select class="form-control select-country">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Postal/zip code</label>
                                                <input type="text" class="form-control" placeholder="147001">
                                            </div>
                                            <div class="form-group">
                                                <div class="mt-4 form-check">
                                                    <input class="form-check-input" type="checkbox" id="billingAddress">
                                                    <label class="form-check-label label-light-weight" for="billingAddress">Billing address same as shipping address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="bg-grey">
                                    <h5 class="col-xl-10 mx-auto">Billing Address</h5>
                                </div>
                                <div class="col-xl-10 my-4 mx-auto">
                                    <form method="POST">
                                        @csrf
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Street address line 1 <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Street, 6001 W Waco Dr #314">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Suite, building, department etc <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Suite, building, department etc">
                                            </div>
                                        </div>
                                        <div class="row mb-3 mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">City <span class="required">*</span></label>
                                                <select class="form-control select-city">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">state <span class="required">*</span></label>
                                                <select class="form-control select-state">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mx-auto">
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Country/Region* <span class="required">*</span></label>
                                                <select class="form-control select-country">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-uppercase">Postal/zip code</label>
                                                <input type="text" class="form-control" placeholder="147001">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="border-segregate">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row mx-auto py-2">
                                            <div class="form-group my-4 text-end">
                                                <a href="" class="font-600">Back</a>
                                                <button class="ms-5 common_btn continue_btn" href="" type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 px-0 col-md-6">
                    <div class="position-relative side-section">
                        <img src="{{ asset('public/uploads/website-images/images/auth-side-img.jpg') }}" class="img-fluid w-100 rounded-side-img">
                        <div class="position-absolute py-5 px-4 side-section-content">
                            <h3 class="text-white position-relative heading">Register today and you will be able to</h3>
                            <ul>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Speed your way through checkout</li>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Track your orders easily</li>
                                <li class="text-white list"><img src="{{ asset('public/uploads/website-images/images/check-circle.png') }}" class="me-2">Keep a record of all your purchases</li>
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
        $('#selRole').select2({
            placeholder: 'Select Your Role',
        });
        $('#indusType').select2({
            placeholder: 'Industry Type',
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
        var telInput2 = document.querySelector("#phoneNumber");
        var telInput3 = document.querySelector("#businessNumber");
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
                geoIpLookup: function (callback) {
                    $.get("http://ipinfo.io", function () {
                    }, "jsonp").always(function (resp) {
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
                geoIpLookup: function (callback) {
                    $.get("http://ipinfo.io", function () {
                    }, "jsonp").always(function (resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
            });
        }
    });
</script>
@endsection

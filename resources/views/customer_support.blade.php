@extends('layout')
@section('title')
    <title>Customer Support</title>
@endsection
@section('meta')
    <meta name="description" content="Customer Support">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 mx-auto">
                    <div class="mb-4 d-flex justify-content-center align-iems-center">
                        <h3>Customer Support</h3>
                    </div>
                    <div class="grey-border rounded px-sm-5 px-3 py-sm-5 py-3">
                        <div class="px-sm-5">
                            <form action="{{Url('customer-support')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="d-block font-weight-400">Are you located in the U.S.? <span class="required">*</span></label>
                                    <div class="form-check form-check-inline d-inline-flex">
                                        <input class="form-check-input me-2" type="radio" name="localted_usa" id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline d-inline-flex">
                                        <input class="form-check-input me-2" type="radio" name="localted_usa" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Select Subject <span class="required">*</span></label>
                                    <select id="selSubject" class="form-control" name="subject">
                                        <option value=""></option>
                                        <option value="Sales and Orders">Sales and Orders</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Business Name <span class="required">*</span></label>
                                    <input type="text" name="bussiness_name" placeholder="Business Name" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">First Name <span class="required">*</span></label>
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phoneNumber">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-uppercase">Message <span class="required">*</span></label>
                                    <textarea placeholder="Enter Text Here..." name="message" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-bg">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection
@section('js')
    <script>
        $(function() {
            $('#selSubject').select2({
                placeholder: 'Select Option',
            });
            var telInput2 = document.querySelector("#phoneNumber");
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
        });
    </script>
@endsection

@extends('layout')
@section('title')
    <title>Product Inquiry</title>
@endsection
@section('meta')
    <meta name="description" content="Product Inquiry">
@endsection
<style>
    .prod-sup-content .side-content-img {
        width: 90px;
        margin-right: 24px;
    }
    .prod-sup-content .side-content-text {
        font-weight: bold;
        font-size: 14px;
    }
</style>
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container-md">
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <div class="grey-border rounded px-sm-4 px-3 py-sm-4 py-3">
                        <h3>Product Inquiry</h3>
                        <p class="mt-3 mb-md-5 mb-3">Provide information and files that you would like to send to added suppliers. Once a supplier has given you a quote, you can check out with it right here on eindustrify.</p>
                        <form action="">
                            <div class="row">
                                <div class="form-group col-sm-6 pe-sm-1 mb-3">
                                    <label class="text-uppercase">First Name <span class="required">*</span></label>
                                    <input type="text" placeholder="First Name" class="form-control">
                                </div>
                                <div class="form-group col-sm-6 ps-sm-1 mb-3">
                                    <label class="text-uppercase">Last Name <span class="required">*</span></label>
                                    <input type="text" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 pe-sm-1 mb-3">
                                    <label class="text-uppercase">Email Address <span class="required">*</span></label>
                                    <input type="email" placeholder="Email Address" class="form-control">
                                </div>
                                <div class="form-group col-sm-6 ps-sm-1 mb-3">
                                    <label class="text-uppercase">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phoneNumber">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="text-uppercase">Inquiry <span class="required">*</span></label>
                                <textarea placeholder="What would you like to know?" class="form-control" rows="7"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-bg">Send Inquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="grey-border rounded px-sm-4 px-3 py-sm-4 py-3 mb-3">
                        <h3>Selected Product</h3>
                        <div class="d-flex align-items-center my-4 prod-sup-content">
                            <img src="{{ asset('public/uploads/website-images/images/engine30.png') }}" alt="engine30" class="mr-4 side-content-img">
                            <p class="side-content-text">Mophorn 3 HP Electric Motor 1 Phase AC Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW Air Compressor Motor, 115/230V</p>
                        </div>
                    </div>
                    <div class="grey-border rounded px-sm-4 px-3 py-sm-4 py-3">
                        <h3>Selected Supplier</h3>
                        <div class="d-flex align-items-center my-4 prod-sup-content">
                            <img src="{{ asset('public/uploads/website-images/images/supplier.png') }}" alt="supplier" class="mr-4 side-content-img">
                            <p class="side-content-text">Supplier ABC</p>
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

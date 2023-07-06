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
            border-bottom: 1px solid #CCCCCC;
        }
    </style>
    <form action="{{URL('update-store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="admin-main-content border add-product-content">
        <div class="row mx-auto store-header">
            <div class="col-xl-11 py-4 mx-auto d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/store-shop.png') }}">
                    <h3 class="ms-3">Store Details</h3>
                </div>
                <button class="btn-bg">Save</button>
            </div>
        </div>

        <div class="row my-4 col-xl-11 mx-auto">
            <div class="col-sm-4">
                <label class="text-uppercase h6">Profile Picture</label>
                <div class="small-12 medium-2 large-2 columns">
                    <div class="circle">
                        <img class="profile-pic" src="{{ asset($vendor->image) }}">
                    </div>
                    <div class="p-image">
                        <span class="fa fa-camera upload-button"></span>
                    </div>
                    <input class="file-upload" type="file" name="image" accept="image/*" />
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box" id="bannerImgSelect">
                    <div class="box-inside">
                        <img class="d-block mx-auto mb-md-4 mb-3"
                            src="{{ asset($vendor->businessInformation->banner_image) }}">
                        <h6 class="heading file-val">Click to upload banner</h6>
                        <small class="d-block mt-2">Maximum file size 50MB. Banner size is (1900 x 300)</small>
                    </div>
                </div>
                <input type="file" accept="image/*" id="fileBannerImg" name="banner_image" class="d-none" />
            </div>
        </div>
        <div class="bg-grey">
            <h5 class="col-xl-11 mx-auto">Business Information</h5>
        </div>
        <div class="my-4 col-xl-11 mx-auto">
            <div class="row mb-3 mx-auto">
                <div class="form-group col-md-6">
                    <label class="text-uppercase">business name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="vendor_business_name"
                        value="{{ $vendor->businessInformation->name }}" placeholder="XYZ Business">
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Tax ID number <span class="required">*</span></label>
                    <input type="text" name="vendor_tax_id" value="{{ $vendor->businessInformation->tax_id }}"
                        class="form-control" placeholder="Tax ID Number">
                </div>
            </div>
            <div class="row mb-3 mx-auto">
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Industry <span class="required">*</span></label>
                    <select class="form-control indus-type" name="vendor_industry_type">
                        <option value=""></option>
                        @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}"
                                {{ $vendor->businessInformation->industry_id == $industry->id ? 'selected' : '' }}>
                                {{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">VAT Number <span class="required">*</span></label>
                    <input type="text" name="vendor_vat" value="{{ $vendor->businessInformation->vat }}"
                        class="form-control" placeholder="Enter VAT Number">
                </div>
            </div>
            <div class="row mb-3 mx-auto">
                <div class="form-group col-md-6">
                    <label class="text-uppercase">No. of employees</label>
                    <select class="form-control" id="noEmployees" name="vendor_total_employee">
                        <option value=""></option>
                        <option value="5 to 10"
                            {{ $vendor->businessInformation->total_employee >= 5 && $vendor->businessInformation->total_employee <= 10 ? 'selected' : '' }}>
                            5 to 10</option>
                        <option value="11 to 20"
                            {{ $vendor->businessInformation->total_employee >= 11 && $vendor->businessInformation->total_employee <= 20 ? 'selected' : '' }}>
                            11 to 20</option>
                        <option value="21 to 30"
                            {{ $vendor->businessInformation->total_employee >= 21 && $vendor->businessInformation->total_employee <= 30 ? 'selected' : '' }}>
                            21 to 30</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Business number <span class="required">*</span></label>
                    <input type="tel" class="form-control" placeholder="Business Number" name="vendor_business_phone"
                     value="{{$vendor->businessInformation->phone}}"   id="businessNumber2">
                </div>
            </div>
        </div>
        <div class="bg-grey">
            <h5 class="col-xl-11 mx-auto">Billing Address</h5>
        </div>
        <div class="col-xl-11 my-4 mx-auto">
            <div class="row mb-3 mx-auto">
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Street address line 1 <span class="required">*</span></label>
                    <input type="text" name="billing_street_address" value="{{$vendor->billingAddress->street_address}}"
                        class="form-control" placeholder="Street, 6001 W Waco Dr #314">
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Suite, building, department etc <span class="required">*</span></label>
                    <input type="text" name="billing_department" value="{{$vendor->billingAddress->department}}"
                        class="form-control" placeholder="Suite, building, department etc">
                </div>
            </div>
            <div class="row mb-3 mx-auto">
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Country/Region* <span class="required">*</span></label>
                    <select class="form-control select-country" id="user_shipping_country_id" name="billing_country_id">
                        <option value=""></option>
                        @foreach ($country as $item)
                            <option value="{{ $item->id }}"  {{ $vendor->billingAddress->country_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">state <span class="required">*</span></label>
                    <select class="form-control select-state" name="billing_state_id" id="user_shipping_state_id">
                        <option value=""></option>
                        @foreach ($state as $item)
                            <option value="{{ $item->id }}" {{ $vendor->billingAddress->state_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mx-auto">
                {{-- <div class="form-group col-md-6">
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
                </div> --}}
                <div class="form-group col-md-6">
                    <label class="text-uppercase">City <span class="required">*</span></label>
                    <input type="text" class="form-control" value="{{$vendor->billingAddress->city_name}}" name="billing_city_name" placeholder="City Name">
                    {{-- <select class="form-control select-city" name="shipping_city_id"
                        id="user_shipping_city_id">
                        <option value=""></option>
                    </select> --}}
                </div>
                <div class="form-group col-md-6">
                    <label class="text-uppercase">Postal/zip code</label>
                    <input type="text" name="billing_zip_code" value="{{$vendor->billingAddress->zip_code}}"
                        class="form-control" placeholder="147001">
                </div>
            </div>
        </div>
    </div>
</form>
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
        $(function() {
            $(document).on('click', '#bannerImgSelect', function() {
                $("#fileBannerImg").click();
            });

            $('#fileBannerImg').change(function() {
                var files = $(this).prop('files');
                if (files.length !== 0) {
                    $('.file-val').text($('#fileBannerImg').val().replace(/C:\\fakepath\\/i, ''));
                }
            });

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function() {
                readURL(this);
            });
            $(".p-image").on('click', function() {
                $(".file-upload").click();
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
            var telInput4 = document.querySelector("#businessNumber2");
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


        $(function() {
            $("#user_shipping_country_id").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var countryId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/vendor-gett-states') }}',
                    type: 'GET',
                    data: {
                        'id': countryId
                    },
                    success: function(response) {
                        $('#user_shipping_state_id').empty();
                        $('#response_billing_state_append').html(
                            '<option value="" disabled selected>Select State</option>');
                        $.each(response.data, function(key, value) {
                            $("#user_shipping_state_id").append(
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

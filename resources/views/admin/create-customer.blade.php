@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Customer') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Customer') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.customer-list') }}">{{ __('admin.Customer List') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Create Customer') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.customer-list') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('admin.Customer List') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.create-customer') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="First Name">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="last_name"
                                                placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                placeholder="Example@gmail.com">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                            <input type="tel" id="" class="form-control" name="phone"
                                                placeholder="92xxxxxxxxxx">
                                        </div>
                                        <h4>Business Information</h4>
                                        <div class="form-group col-12">
                                            <label>{{ __('Business Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control" name="bussiness_name"
                                                placeholder="XYZ Bussiness">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Business Number') }} <span class="text-danger">*</span></label>
                                            <input type="tel" id="" class="form-control" name="bussiness_phone"
                                                placeholder="Business Number">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('TAX ID') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="bussiness_tax_id" placeholder="ATU12345678">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Industry Type') }} <span class="text-danger">*</span></label>
                                            <select name="bussiness_industry_type" class="form-control" id="">
                                                <option value="1">Select Industry</option>
                                                @foreach ($industries as $industry)
                                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h4>Shipping Address</h4>
                                        <div class="form-group col-12">
                                            <label>{{ __('Street Address Line 1') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="shipping_street_address" placeholder="Street, 6001 W Waco Dr #314">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Suite, Building, Department etc') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="shipping_department" placeholder="Suite, building, department etc">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Country/Region') }} <span class="text-danger">*</span></label>
                                            <select name="shipping_country_id" class="form-control" id="shipping_country_id">
                                                <option value="1">Select Country</option>
                                                @foreach ($country as $country_data)
                                                    <option value="{{ $country_data->id }}">
                                                        {{ $country_data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('State') }} <span class="text-danger">*</span></label>
                                            <select name="shipping_state_id" class="form-control" id="shipping_state_append">
                                                <option value="">Select State</option>
                                                {{-- @foreach ($state as $state_data)
                                                    <option value="{{ $state_data->id }}">{{ $state_data->name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('City') }} <span class="text-danger">*</span></label>
                                            {{-- <select name="shipping_city_id" class="form-control" id="shipping_city_append">
                                                <option value="1">Select City</option> --}}
                                                {{-- @foreach ($city as $city_data)
                                                    <option value="{{ $city_data->id }}">{{ $city_data->name }}
                                                    </option>
                                                @endforeach --}}
                                            {{-- </select> --}}
                                            <input type="text" placeholder="City Name" class="form-control" name="shipping_city_name">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Postal/Zip Code') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="shipping_zip_code" placeholder="147001">
                                        </div>
                                        <h4>Billing Address</h4>

                                        <div class="form-group col-12">
                                            <label>{{ __('Street Address Line 1') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="billing_street_address" placeholder="Street, 6001 W Waco Dr #314">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Suite, Building, Department etc') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="billing_department" placeholder="Suite, building, department etc">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Country/Region') }} <span class="text-danger">*</span></label>
                                            <select name="billing_country_id" class="form-control"
                                                id="billing_country_id">
                                                <option value="1">Select Country</option>
                                                @foreach ($country as $country_data)
                                                    <option value="{{ $country_data->id }}">
                                                        {{ $country_data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('State') }} <span class="text-danger">*</span></label>
                                            <select name="billing_state_id" class="form-control"
                                                id="response_billing_state_append">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('City') }} <span class="text-danger">*</span></label>
                                            {{-- <select name="billing_city_id" class="form-control"
                                                id="response_billing_city_append">
                                                <option value="1">Select City</option> --}}
                                                {{-- @foreach ($city as $city_data)
                                                    <option value="{{ $city_data->id }}">{{ $city_data->name }}
                                                    </option>
                                                @endforeach --}}
                                            {{-- </select> --}}
                                            <input type="text" placeholder="City Name" name="billing_city_name" class="form-control">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Postal/Zip Code') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="" class="form-control"
                                                name="billing_zip_code" placeholder="147001">
                                        </div>

                                        {{-- <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1">{{__('admin.Active')}}</option>
                                        <option value="0">{{__('admin.InActive')}}</option>
                                    </select>
                                </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary">{{ __('admin.Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#name").on("focusout", function(e) {
                    $("#slug").val(convertToSlug($(this).val()));
                })
            });
        })(jQuery);

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>
    <script type="text/javascript">
        $(function() {
            $("#billing_country_id").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var countryId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/admin/get-states') }}',
                    type: 'GET',
                    data: {
                        'id': countryId
                    },
                    success: function(response) {
                        $('#response_billing_state_append').html(
                            '<option value="" disabled selected>Select State</option>');
                        $.each(response.data, function(key, value) {
                            $("#response_billing_state_append").append(
                                '<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#shipping_country_id").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var countryId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/admin/get-states') }}',
                    type: 'GET',
                    data: {
                        'id': countryId
                    },
                    success: function(response) {
                        $('#shipping_state_append').html(
                            '<option value="" disabled selected>Select State</option>');
                        $.each(response.data, function(key, value) {
                            $("#shipping_state_append").append(
                                '<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#response_billing_state_append").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var stateId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/admin/get-city') }}',
                    type: 'GET',
                    data: {
                        'id': stateId
                    },
                    success: function(response) {
                        $('#response_billing_city_append').html(
                            '<option value="" disabled selected>Select City</option>');
                        $.each(response.data, function(key, value) {
                            $("#response_billing_city_append").append(
                                '<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#shipping_state_append").change(function() {
                var selectedText = $(this).find("option:selected").text();
                var stateId = $(this).val();
                $.ajax({
                    url: '{{ URL::to('/admin/get-city') }}',
                    type: 'GET',
                    data: {
                        'id': stateId
                    },
                    success: function(response) {
                        $('#shipping_city_append').html(
                            '<option value="" disabled selected>Select City</option>');
                        $.each(response.data, function(key, value) {
                            $("#shipping_city_append").append(
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

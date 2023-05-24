@extends('admin.master_layout')
@section('title')
    <title>{{ __('Vendor List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Vendor List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Vendor List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.seller-list') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('Vendor List') }}</a>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped table-bordered">
                                        {{-- <tr>
                                            <td>{{ __('admin.Image') }}</td>
                                            <td>
                                                @if ($customer->image)
                                                    <img src="{{ asset($customer->image) }}" class="rounded-circle"
                                                        alt="" width="80px">
                                                @endif
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td>
                                                <h4>Vendor Detail</h4>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('First Name') }}</td>
                                            <td>{{ $vendor->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Last Name') }}</td>
                                            <td>{{ $vendor->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('admin.Email') }}</td>
                                            <td>{{ $vendor->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('admin.Phone') }}</td>
                                            <td>{{ $vendor->phone }}</td>
                                        </tr>
                                        @if (isset($vendor->businessInformation))
                                            <tr>
                                                <td>
                                                    <h4>Bussiness Information</h4>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Bussiness Name') }}</td>
                                                <td>{{ $vendor->businessInformation->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Bussiness Phone') }}</td>
                                                <td>{{ $vendor->businessInformation->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Bussiness Tax Id') }}</td>
                                                <td>{{ $vendor->businessInformation->tax_id }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Bussiness Industry Type') }}</td>
                                                <td>{{ $vendor->businessInformation->industry_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Bussiness Vat') }}</td>
                                                <td>{{ $vendor->businessInformation->vat }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('No Of Employees') }}</td>
                                                <td>{{ $vendor->businessInformation->total_employee }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($vendor->billingAddress))
                                            <tr>
                                                <td>
                                                    <h4>Billing Address</h4>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Billing Address') }}</td>
                                                <td>{{ $vendor->billingAddress->street_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Billing Department') }}</td>
                                                <td>{{ $vendor->billingAddress->department }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Billing Country') }}</td>
                                                <td>{{ $vendor->billingAddress->country->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Billing State') }}</td>
                                                <td>{{ $vendor->billingAddress->countryState->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Billing City') }}</td>
                                                <td>{{ $vendor->billingAddress->city->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Billing Zip Code') }}</td>
                                                <td>{{ $vendor->billingAddress->zip_code }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>{{ __('admin.Status') }}</td>
                                            <td>
                                                @if ($vendor->status == 1)
                                                    <a href="javascript:;"
                                                        onclick="manageCustomerStatus({{ $vendor->id }})">
                                                        <input id="status_toggle" type="checkbox" checked
                                                            data-toggle="toggle" data-on="{{ __('admin.Active') }}"
                                                            data-off="{{ __('admin.InActive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </a>
                                                @else
                                                    <a href="javascript:;"
                                                        onclick="manageCustomerStatus({{ $vendor->id }})">
                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle"
                                                            data-on="{{ __('admin.Active') }}"
                                                            data-off="{{ __('admin.InActive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        function manageCustomerStatus(id) {
            var isDemo = "{{ env('APP_VERSION') }}"
            if (isDemo == 0) {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/seller-status/') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(err) {
                    console.log(err);

                }
            })
        }
    </script>
@endsection

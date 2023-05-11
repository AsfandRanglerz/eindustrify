@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Help Center Online Invoices') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Help Center Online Invoices') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Help Center Online Invoices') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('#') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        @if (isset($helpCenterOnlineInvoices))
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{ $helpCenterOnlineInvoices->title }}</td>
                                                    <td>
                                                        @if ($helpCenterOnlineInvoices->image)
                                                            <img src="{{ asset($helpCenterOnlineInvoices->image) }}"
                                                                alt="" width="80px">
                                                        @endif
                                                    </td>
                                                    <td>{!! $helpCenterOnlineInvoices->description !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.help-center-online-invoices-edit', $helpCenterOnlineInvoices->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

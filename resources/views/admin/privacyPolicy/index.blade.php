@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Privacy Policy') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Privacy Policy') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
                    <div class="breadcrumb-item">{{ __('Privacy Policy') }}</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <a href="{{ route('admin.send-email-to-all-customer') }}" class="btn btn-primary">{{__('admin.Send email to all user')}}</a> --}}
                {{-- <a href="{{ route('admin.add-customer') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                    {{ __('admin.Add New') }}</a> --}}
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
                                        @if(isset($privacyPolicy))
                                        <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{ $privacyPolicy->title }}</td>
                                                    <td>
                                                        @if ($privacyPolicy->image)
                                                            <img src="{{ asset($privacyPolicy->image) }}" alt=""
                                                                width="80px">
                                                        @endif
                                                    </td>
                                                    <td>{!! $privacyPolicy->description !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.privacy-policy-edit', $privacyPolicy->id) }}"
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

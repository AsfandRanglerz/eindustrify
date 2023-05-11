@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Help Center User Manangement') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Help Center User Manangement') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
                    <div class="breadcrumb-item">{{ __('Help Center User Manangement') }}</div>
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
                                        @if(isset($helpCenterUserManangenment))
                                        <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{ $helpCenterUserManangenment->title }}</td>
                                                    <td>
                                                        @if ($helpCenterUserManangenment->image)
                                                            <img src="{{ asset($helpCenterUserManangenment->image) }}" alt=""
                                                                width="80px">
                                                        @endif
                                                    </td>
                                                    <td>{!! $helpCenterUserManangenment->description !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.help-center-user-manangenment-edit', $helpCenterUserManangenment->id) }}"
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

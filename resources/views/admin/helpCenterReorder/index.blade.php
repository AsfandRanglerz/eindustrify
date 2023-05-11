@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Help Center Reorder') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Help Center Reorder') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
                    <div class="breadcrumb-item">{{ __('Help Center Reorder') }}</div>
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
                                        @if(isset($helpCenterReorder))
                                        <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{ $helpCenterReorder->title }}</td>
                                                    <td>
                                                        @if ($helpCenterReorder->image)
                                                            <img src="{{ asset($helpCenterReorder->image) }}" alt=""
                                                                width="80px">
                                                        @endif
                                                    </td>
                                                    <td>{!! $helpCenterReorder->description !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.help-center-reorder-edit', $helpCenterReorder->id) }}"
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

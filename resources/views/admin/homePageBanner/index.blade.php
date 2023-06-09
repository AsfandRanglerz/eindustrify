@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Home Page Banner') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Home Page Banner') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Home Page Banner') }}</div>
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
                                                <th>{{ __('Pre Title') }}</th>
                                                <th>{{ __('Post Title') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($homePageBanner as $homePage)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $homePage->title }}</td>
                                                    <td>
                                                        @if (isset($homePage->pre_title))
                                                            {{ $homePage->pre_title }}
                                                    </td>
                                                @else
                                                    _
                                            @endif
                                            <td>{{ $homePage->post_title }}</td>
                                            <td>
                                                @if ($homePage->image)
                                                    <img src="{{ asset($homePage->image) }}" alt="" width="80px">
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.home-page-banner-edit', $homePage->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

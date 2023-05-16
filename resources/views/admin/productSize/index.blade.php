@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Product Size') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Product Sizes') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
                    <div class="breadcrumb-item">{{ __('Product Size') }}</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <a href="{{ route('admin.send-email-to-all-customer') }}" class="btn btn-primary">{{__('admin.Send email to all user')}}</a> --}}
                <a href="{{ route('admin.add-product-size', $id) }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                    {{ __('admin.Add New') }}</a>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('#') }}</th>
                                                <th>{{ __('Size') }}</th>
                                                <th>{{ __('Price') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productsSize as $product)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $product->product_size }}</td>
                                                    <td>{!! $product->product_price !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.product-size-edit', $product->id) }}"
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

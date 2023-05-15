@extends('layout')
@section('title')
    <title>Copyright Policy</title>
@endsection
@section('meta')
    <meta name="description" content="Copyright Policy">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset($policy->image) }}" class="w-100 banner-img">
                <div class="position-absolute banner-section">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item" aria-current="page">Policy</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $policy->title }}</li>
                        </ol>
                    </nav>
                    <h1 class="heading">{{ $policy->title }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="text-end my-4">
                        <a href="" class="text-underline red-link">Download</a>
                    </div>
                    {!! $policy->description !!}
                </div>
            </div>
        </div>
    </section>
    <!--============================
                CUSTOM PAGES PAGE END
            ==============================-->
@endsection

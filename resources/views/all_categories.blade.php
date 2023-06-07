@extends('layout')
@section('title')
    <title>All Categories</title>
@endsection
@section('meta')
    <meta name="description" content="All Categories">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <h4 class="mb-3">All Categories</h4>
            <div class="d-flex flex-wrap">
                @foreach ($categories as $category)
                <a class="product-cat-content" href="{{ url('sub-category-listing/'.$category->slug) }}">
                    <div class="image-holder">
                        <img src="{{ asset($category->image) }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">{{$category->name}}</h6>
                </a>    
                @endforeach
                
                {{-- <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-5.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Bearing Protection Rings</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-7.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">DC Motors & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-2.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Servo Motors & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-7.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">DC Motors & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-9.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Dynamic Braking</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-3.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Encoders & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-4.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-6.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Bases</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/sub-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-8.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Brakes</h6>
                </a> --}}
            </div>
        </div>
    </div>
    <!--============================
                CUSTOM PAGES PAGE END
            ==============================-->
@endsection
@section('js')
    <script>
        $(function() {

        });
    </script>
@endsection
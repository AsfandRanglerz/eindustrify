@extends('layout')
@section('title')
    <title>All Sub-Categories</title>
@endsection
@section('meta')
    <meta name="description" content="All Sub-Categories">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <h4 class="mb-3">{{$category->name}}</h4>
            <div class="d-flex flex-wrap">
                @foreach ($category->subCategories as $subcategory)    
                <a class="product-cat-content" href="{{URL('child-category-listing/'.$subcategory->slug)}}">
                    <div class="image-holder">
                        <img src="{{ asset($subcategory->image) }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">{{$subcategory->name}}</h6>
                </a>
                @endforeach
                {{-- <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-5.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Bearing Protection Rings</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-7.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">DC Motors & Accessories</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-2.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Servo Motors & Accessories</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-7.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">DC Motors & Accessories</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-9.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Dynamic Braking</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-3.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Encoders & Accessories</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-4.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Accessories</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-6.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Bases</h6>
                </div>
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-8.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Brakes</h6>
                </div> --}}
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
@extends('layout')
@section('title')
    <title>Category Listing</title>
@endsection
@section('meta')
    <meta name="description" content="Category Listing">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <h4 class="mb-3">Motors & Power Transmission</h4>
            <div class="d-flex flex-wrap">
                <div class="product-cat-content">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-1.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">AC Motors & Accessories</h6>
                </div>
                <div class="product-cat-content">
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
                </div>
            </div>
            <h4 class="my-4">Shop by Brand</h4>
            <div class="d-flex shop-brand">
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-6.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-3.png') }}" class="w-100">
                </div>
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-2.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-4.png') }}" class="w-100">
                </div>
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-1.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-4.png') }}" class="w-100">
                </div>
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-3.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-5.png') }}" class="w-100">
                </div>
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-4.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-1.png') }}" class="w-100">
                </div>
                <div class="text-center shop-brand-block">
                    <img src="{{ asset('public/uploads/website-images/images/shop-logo-5.png') }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-2.png') }}" class="w-100">
                </div>
            </div>
            <h4 class="mt-4 mb-3">Popular Picks in Motors</h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine8.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine30.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine7.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine4.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                            <s class="ms-3">$8,200.00</s>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine8.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine6.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine7.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine4.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                            <s class="ms-3">$8,200.00</s>
                        </div>
                    </div>
                </div>
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

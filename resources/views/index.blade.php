@extends('layout')
@section('title')
    <title>{{ $seoSetting->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seoSetting->seo_description }}">
@endsection

@section('public-content')
    <!--============================
                BANNER PART START
            ==============================-->
        <section id="wsus__banner">
            <div class="container px-0">
                <div class="row wsus__banner_content_main">
                    <div class="col-xl-8 col-lg-9">
                        <div class="h-100 wsus__banner_content">
                            <div class="row banner_slider">
                                <div class="col-xl-12">
                                    <div class="position-relative wsus__single_slider"
                                        style="background-image: linear-gradient(90.73deg, #000000 3.54%, rgba(0, 0, 0, 0) 96.91%), url({{ asset("public/uploads/website-images/images/slide-2.png") }});">
                                        <div class="wsus__single_slider_text">
                                            <h2 class="text-white main-heading">Permanent Magnet Motor</h2>
                                            <p class="text-white mt-2 mb-4 heading-caption">Supplier ABC</p>
                                            <a class="view-more" href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="position-relative wsus__single_slider"
                                        style="background-image: linear-gradient(90.73deg, #000000 3.54%, rgba(0, 0, 0, 0) 96.91%), url({{ asset("public/uploads/website-images/images/slide-3.png") }});">
                                        <div class="wsus__single_slider_text">
                                            <h2 class="text-white main-heading">Gas Turbine Parts</h2>
                                            <p class="text-white mt-2 mb-4 heading-caption">Easy & quick guide</p>
                                            <a class="view-more" href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="position-relative wsus__single_slider"
                                        style="background-image: linear-gradient(90.73deg, #B0191E 3.54%, rgba(176, 25, 30, 0) 96.91%), url({{ asset("public/uploads/website-images/images/slide-4.png") }});">
                                        <div class="wsus__single_slider_text">
                                            <p class="text-white small heading-caption">Growth, Marketing & Sales Practice</p>
                                            <h2 class="text-white main-heading">Future of B2B Sales</h2>
                                            <h4 class="text-white mt-2 mb-4 main-heading">The Big Reframe</h4>
                                            <a class="view-more" href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 ps-0">
                        <div class="h-100 wsus__banner_content">
                            <div class="position-relative wsus__banner_content_inner_first">
                                <img src="{{ asset('public/uploads/website-images/images/left-circum.png') }}" alt="left-circum">
                                <h5 class="heading">Take your business to the world with us!</h5>
                                <div class="row mb-3 wsus__banner_content_inner_first_1">
                                    <div class="col-sm-6 d-flex align-items-center">
                                        <img src="{{ asset('public/uploads/website-images/images/business-1.png') }}" class="buis-img">
                                        <p class="content-text">Global Access</p>
                                    </div>
                                    <div class="col-sm-6 px-0 d-flex align-items-center">
                                        <img src="{{ asset('public/uploads/website-images/images/business-3.png') }}" class="buis-img">
                                        <p class="content-text">Expert Knowledge</p>
                                    </div>
                                </div>
                                <div class="row wsus__banner_content_inner_first_2">
                                    <div class="col-sm-6 d-flex align-items-center">
                                        <img src="{{ asset('public/uploads/website-images/images/business-2.png') }}" class="buis-img">
                                        <p class="content-text">Accurate Inventory Information</p>
                                    </div>
                                    <div class="col-sm-6 px-0 d-flex align-items-center">
                                        <img src="{{ asset('public/uploads/website-images/images/business-4.png') }}" class="buis-img">
                                        <p class="content-text">All-Inclusive ecommerce Marketplace</p>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative wsus__banner_content_inner_second">
                                <img src="{{ asset('public/uploads/website-images/images/circum.png') }}" alt="circum">
                                <h5 class="heading">Effortless Buying Online!</h5>
                                <p class="content-text"><img src="{{ asset('public/uploads/website-images/images/business-5.png') }}" class="buis-img">Accelerated Speed to Global Markets</p>
                                <p class="content-text"><img src="{{ asset('public/uploads/website-images/images/business-6.png') }}" class="buis-img">All-Inclusive eCommerce Marketplace</p>
                                <p class="content-text"><img src="{{ asset('public/uploads/website-images/images/business-7.png') }}" class="buis-img">Extension of Supplier Offerings</p>
                                <a href="#" class="link"><img src="">Request Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--============================
        BANNER PART END
    ==============================-->

        <div class="grey-background">
            <div class="container pt-5 pb-3">
                <div class="mb-4 d-flex flex-wrap align-items-center justify-content-between">
                    <h4 class="mb-0">Explore Product Categories</h4>
                    <a href="#" class="view-all">View All<span class="fas fa-caret-right ms-1"></span></a>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine1.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Motors & Power Transmission</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine11.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Safety & Security</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine12.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Pneumatics & Hydraulics</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine13.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Metalworking & Fabrication</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine14.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Plumbing & Pumps</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine10.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Motors & Power Transmission</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine2.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Safety & Security</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine3.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Metalworking & Fabrication</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine9.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Motors & Power Transmission</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine1.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Plumbing & Pumps</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine1.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Plumbing & Pumps</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine11.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Safety & Security</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine12.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Pneumatics & Hydraulics</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine13.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Metalworking & Fabrication</h6>
                    </div>
                    <div class="product-cat-content">
                        <div class="image-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine14.png') }}">
                        </div>
                        <h6 class="mt-3 px-4 text-center">Plumbing & Pumps</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-products">
            <div class="container py-5">
                <div class="mb-3 d-flex flex-wrap align-items-center justify-content-between">
                    <h4 class="mb-0">Featured Products</h4>
                    <a href="#" class="view-all">View All<span class="fas fa-caret-right ms-1"></span></a>
                </div>
                <div class="row">
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine15.png') }}">
                                <a href="" class="position-absolute text-white quick-view">Quick View</a>
                            </div>
                            <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                            <div class="p-3">
                                <h6 class="mb-2">Release device EM 24V-DC</h6>
                                <span class="price">$377.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine2.png') }}">
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
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine3.png') }}">
                                <a href="" class="position-absolute text-white quick-view">Quick View</a>
                            </div>
                            <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                            <div class="p-3">
                                <h6 class="mb-2">Release device EM 24V-DC</h6>
                                <span class="price">$377.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine9.png') }}">
                                <a href="" class="position-absolute text-white quick-view">Quick View</a>
                            </div>
                            <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                            <div class="p-3">
                                <h6 class="mb-2">Release device EM 24V-DC</h6>
                                <span class="price">$377.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine16.png') }}">
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
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine5.png') }}">
                                <a href="" class="position-absolute text-white quick-view">Quick View</a>
                            </div>
                            <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                            <div class="p-3">
                                <h6 class="mb-2">Release device EM 24V-DC</h6>
                                <span class="price">$377.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                <img src="{{ asset('public/uploads/website-images/images/engine17.png') }}">
                                <a href="" class="position-absolute text-white quick-view">Quick View</a>
                            </div>
                            <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                            <div class="p-3">
                                <h6 class="mb-2">Release device EM 24V-DC</h6>
                                <span class="price">$377.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="position-relative feature-product-section">
                            <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                            <div class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
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
                </div>
            </div>
        </div>

        <!--============================
            BRAND SLIDER END
        ==============================-->
        <div class="container" id="wsus__brand_sleder">
            <h4 class="text-center mb-4">Featured Brands and Partners</h4>
            <div class="col-xl-10 mx-auto brand_slider">
                <img src="{{ asset('public/uploads/website-images/images/feature-slider-1.png') }}" alt="feature-slider-1.png">
                <img src="{{ asset('public/uploads/website-images/images/feature-slider-3.png') }}" alt="feature-slider-3.png">
                <img src="{{ asset('public/uploads/website-images/images/feature-slider-2.png') }}" alt="feature-slider-2.png">
                <img src="{{ asset('public/uploads/website-images/images/feature-slider-4.png') }}" alt="feature-slider-4.png">
                <img src="{{ asset('public/uploads/website-images/images/feature-slider-3.png') }}" alt="feature-slider-3.png">
            </div>
        </div>
        <!--============================
            BRAND SLIDER END
        ==============================-->

@endsection

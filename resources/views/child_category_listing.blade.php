@extends('layout')
@section('title')
    <title>Child-Category Listing</title>
@endsection
@section('meta')
    <meta name="description" content="Child-Category Listing">
@endsection
@section('public-content')
    <!--============================
                CUSTOM PAGES PAGE START
            ==============================-->
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <div class="mb-xl-3 mb-2 d-flex flex-wrap align-items-center justify-content-between">
                <h4>{{$subcategory->name}}</h4>
                <a href="{{ url('all-child-categories/'.$subcategory->slug) }}" class="view-all">View All<span class="fas fa-caret-right ms-1"></span></a>
            </div>
            <div class="d-flex flex-wrap">
                @foreach ($subcategory->childCategories as $childcategory)
                <a class="product-cat-content" href="{{ url('product-listing/'.$childcategory->slug) }}">
                    <div class="image-holder">
                        <img src="{{ asset($childcategory->image) }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">{{$childcategory->name}}</h6>
                </a>
                @endforeach
                {{-- <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-5.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Bearing Protection Rings</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-7.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">DC Motors & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-2.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Servo Motors & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-9.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Dynamic Braking</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-3.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Encoders & Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-4.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Accessories</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-6.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Bases</h6>
                </a>
                <a class="product-cat-content" href="{{ url('/child-category-listing') }}">
                    <div class="image-holder">
                        <img src="{{ asset('public/uploads/website-images/images/motor-8.png') }}">
                    </div>
                    <h6 class="mt-3 px-3 text-center">Motor Brakes</h6>
                </a> --}}
            </div>
            <h4 class="my-4">Shop by Brand</h4>
            <div class="d-flex shop-brand">
                @foreach ($brands as $brand)
                <div class="text-center shop-brand-block">
                    <img src="{{ asset($brand->logo) }}" class="shop-logo">
                    <img src="{{ asset('public/uploads/website-images/images/shop-3.png') }}" class="w-100">
                </div>
                @endforeach
                {{-- <div class="text-center shop-brand-block">
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
                </div> --}}
            </div>
            <h4 class="mt-4 mb-3">Popular Picks in Motors</h4>
            <div class="row">
                @foreach ($subcategory->products as $product)
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset($product->thumb_image) }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">{{$product->name}}</h6>
                            <span class="price">{{$product->price}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6 p-2">
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
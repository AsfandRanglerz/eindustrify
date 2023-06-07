@extends('layout')
@section('title')
    <title>Product Listing</title>
@endsection
@section('meta')
    <meta name="description" content="Product Listing">
@endsection
@section('public-content')
    <!--============================
                    CUSTOM PAGES PAGE START
                ==============================-->
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{$childcategory->category->name}}
                            </button>
                          </h2>
                          <?php 
                           $subcategories = App\Models\SubCategory::where('category_id',$childcategory->category->id)->where('status',1)->get();
                          ?>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($subcategories as $subcategory)    
                                <div class="form-check mb-0">
                                    <input class="form-check-input" value="{{$subcategory->id}}" type="checkbox" id="motor{{$subcategory->id}}" {{ $subcategory->id == $childcategory->subCategory->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="motor{{$subcategory->id}}">{{$subcategory->name}}</label>
                                </div>
                            @endforeach                            
                                {{-- <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="motor2">
                                    <label class="form-check-label" for="motor2">Bearing Protection Rings</label>
                                </div> --}}

                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item" aria-current="page">Electric Motors</li>
                            <li class="breadcrumb-item active" aria-current="page">AC Motors & Accessories</li>
                        </ol>
                    </nav>
                    <img src="{{ asset('public/uploads/website-images/images/ac-motors.png') }}" class="w-100">
                    <h4 class="mt-4 mb-3">{{$childcategory->name}}</h4>
                    <p>17,111 Results</p>
                    <div class="row">
                        @foreach ($childcategory->products as $product)
                        <div class="col-lg-4 col-md-6 p-2">
                            <div class="position-relative feature-product-section">
                                <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                        aria-hidden="true"></span></button>
                                <div
                                    class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                                    <img src="{{ asset($product->image) }}">
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
                        
                        {{-- <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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
                        <div class="col-lg-4 col-md-6 p-2">
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

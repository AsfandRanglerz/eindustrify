@extends('layout')
@section('title')
    <title></title>
@endsection
@section('meta')
    <meta name="description" content="">
@endsection

<style>
    .prod-images-slider ul {
        list-style: none outside none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .prod-images-slider li {
        display: block;
        float: left;
        margin-right: 6px;
        cursor: pointer;
    }

    .prod-images-slider img {
        display: block;
        height: auto;
        max-width: 100%;
    }

    .prod-images-slider {
        border: 1px solid #B7B7B7;
        border-radius: 20px;
        padding: 12px 36px;
    }

    .lSSlideOuter .lSPager.lSGallery {
        margin: 24px auto 0 !important;
    }

    .prod-size-block {
        column-gap: 16px;
        row-gap: 12px;
    }

    .prod-size-block .prod-size {
        background: #F2F2F2;
        border: 1px solid #C8C8C8;
        padding: 8px 24px;
        width: 140px;
    }

    .prod-size-block .prod-size.active {
        border-color: #B0191E;
    }

    .prod-size-block .prod-size.active .price {
        color: #B0191E;
        font-weight: 700;
    }

    .prod-size-block .price {
        color: rgba(0, 0, 0, 0.5);
        font-size: 14px;
    }

    .similar-item-section .similar-item-block {
        flex: 0 1 calc(20%);
    }

    .similar-item-block .price {
        color: #B0191E;
    }

    .similar-item-block .inner {
        border: 1px solid rgba(0, 0, 0, 0.2);

    }

    .similar-item-block.active .inner {
        border-color: #B0191E;
        border-width: 2px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
    }

    .spec-item {
        border-top: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    .list {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    .list:last-child {
        border-bottom: none;
    }

    .current-item {
        background: rgba(176, 25, 30, 0.2);
        border: 1px solid #B0191E;
        font-weight: 700;
        font-size: 16px;
        line-height: 30px;
        text-align: center;
        color: #B0191E;
        margin: 2px;
    }

    .prod-detail-section {
        border: 1px solid #B7B7B7;
        border-radius: 20px;
    }

    .prod-detail-section .accordion-item:first-child {
        border-top: 2px solid #b7b7b765;
    }

    .prod-detail-section .accordion-item {
        border-bottom: 1px solid #B7B7B7;
    }

    .prod-detail-section .accordion-button {
        font-size: inherit!important;
    }

    .prod-detail-section .accordion-button.collapsed {
        background: #FFF!important;
    }

    .prod-detail-section .accordion-button:not(.collapsed) {
        background: #F2F2F2!important;
    }

    .prod-detail-section .accordion-button::after {
        content: "\f107";
        width: unset;
        height: unset;
        line-height: unset;
        font-size: unset;
        background: none!important;
        box-shadow: none;
    }

    img[alt="prod-view"] {
        width: 25px;
        height: 35px;
        object-fit: contain;
    }

    .prod-detail-section .add-wishlist-btn {
        visibility: visible;
        padding: 8px 12px;
        position: unset;
    }
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

.prod-detail-section #number {
    text-align: center;
    background: #F2F2F2;
    font-weight: 700;
    border: none;
    border-left: 1px solid #D9D9D9;
    border-right: 1px solid #D9D9D9;
    width: 65px;
}

.prod-detail-section .prod-counter {
    background: #F2F2F2;
    border: none;
    padding: 6px 10px;
}
.prod-detail-section .prod-counter span {
    color: #FFF;
    background: #000000;
    padding: 5px;
    border-radius: 50px;
    width: 25px;
    height: 25px;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.prod-detail-section .breadcrumb-item {
    font-size: 15px;
}
.prod-detail-section .breadcrumb-item.active {
    color: #000;
    font-weight: 700;
}
.prod-detail-section .breadcrumb-item a:hover {
    color: #b0191e;
    text-decoration: underline;
}

.prod-images-slider .dropdown-toggle::after {
    display: none;
}

.prod-images-slider .dropdown-toggle {
    white-space: nowrap;
    border: 1px solid #000;
    background: none;
    color: #000;
    border-radius: 0;
    text-transform: uppercase;
    font-size: 15px;
    padding: 8px 16px;
    font-weight: 500;
}
.prod-images-slider .dropdown-toggle:hover, .prod-images-slider .dropdown-toggle:focus, .prod-images-slider .dropdown-toggle:active {
    background: none;
    color: #000;
}
.prod-images-slider .dropdown-toggle:focus, .prod-images-slider .dropdown-toggle:active {
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
}
.specifications-table {
    border-color: rgba(0, 0, 0, 0.3)!important;
    border-top: 1px solid rgba(0, 0, 0, 0.3);
}
.specifications-table td {
    padding: 10px 1.25rem!important;
    font-size: 15px;
}
.specifications-table td.th {
    width: 50%;
    background: #F2F2F2!important;
    font-weight: 600;
}
.specifications-table tr:last-child td {
    border-bottom: 0;
}
.about-supplier {
    border-top: 1px solid rgba(0, 0, 0, 0.3);
}
.read-review-mention {
    background: #FFFFFF;
    border: 1px solid var(--red-theme);
    border-radius: 5px;
    padding: 8px 16px;
}

.read-review-mention * {
    font-weight: 700;
}

.user-review-section {
    border: 1px solid #B7B7B7;
    border-radius: 20px;
}

.user-review-section .user-prof-name {
    width: 100px;
    height: 100px;
    margin: auto;
    border-radius: 50px;
    background: #D9D9D9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-review-section .user-prof-name img {
    width: 55px;
}

.user-review-section .progress {
    width: 40%;
    height: 25px!important;
    border-radius: 22px!important;
}
.user-review-section .progress-bar.bg-danger {
    background: #B0191E!important;
    border-radius: 0px!important;
}
.user-review-section .rating-number {
    width: 20px;
    display: inline-block;
    font-weight: 700;
}
.prod-images-slider .lSSlideOuter .lSPager.lSGallery li.active, .prod-images-slider .lSSlideOuter .lSPager.lSGallery li:hover {
    border-radius: 0;
    border: 2px solid #B0191E;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
</style>

@section('public-content')
    <!--============================
            PRODUCT DETAILS START
        ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 px-2">
                    <div class="prod-images-slider">
                        <div class="dropdown text-end">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fa fa-share me-1"></span> Share
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="w-100"><a class="dropdown-item" href="#">Action</a></li>
                                <li class="w-100"><a class="dropdown-item" href="#">Another action</a></li>
                                <li class="w-100"><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <ul id="lightSlider">
                            @foreach ($product->gallery as $gallery)
                            <li data-thumb="{{ asset($gallery->image) }}">
                                <img src="{{ asset($gallery->image) }}" />
                            </li>
                            @endforeach
                            {{-- <li data-thumb="{{ asset('public/uploads/website-images/images/engine42.png') }}">
                                <img src="{{ asset('public/uploads/website-images/images/engine42.png') }}" />
                            </li>
                            <li data-thumb="{{ asset('public/uploads/website-images/images/engine43.png') }}">
                                <img src="{{ asset('public/uploads/website-images/images/engine43.png') }}" />
                            </li>
                            <li data-thumb="{{ asset('public/uploads/website-images/images/engine44.png') }}">
                                <img src="{{ asset('public/uploads/website-images/images/engine44.png') }}" />
                            </li>
                            <li data-thumb="{{ asset('public/uploads/website-images/images/engine45.png') }}">
                                <img src="{{ asset('public/uploads/website-images/images/engine45.png') }}" />
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 px-2">
                    <div class="prod-detail-section">
                        <div class="px-3 pt-3 pb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$product->subCategory->name}}</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$product->childCategory->name}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                                </ol>
                            </nav>

                            <h3 class="col-lg-11">{{$product->name}}</h3>
                            <div class="mt-4 d-flex align-items-center">
                                <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}" class="me-1">
                                <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}" class="me-1">
                                <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}" class="me-1">
                                <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}" class="me-1">
                                <img src="{{ asset('public/uploads/website-images/images/rating-star2.png') }}" class="me-1">
                                <b class="ms-1">4.0 <a href="#" class="mx-2 text-decoration-underline red-link">429 Reviews</a> | See More by <a href="#" class="text-decoration-underline red-link">Supplier</a></b>
                            </div>

                            <div class="my-4 d-flex align-items-center">
                                <h3 class="d-inline-block red-text">${{$product->price}}.00</h3>
                                <s class="ms-3 me-2">$230.00</s>
                                <b class="red-text">14% OFF</b>
                            </div>

                            <div class="d-flex">
                                <div class="d-flex">
                                    <button class="decrement prod-counter"><span class="fa fa-minus icon"></span></button>
                                    <input type="number" id="number" value="0">
                                    <button class="increment prod-counter"><span class="fa fa-plus icon"></span></button>
                                </div>

                                <button class="ms-3 me-2 add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon" aria-hidden="true"></span></button>
                                <button class="btn-bg add-cart-btn">Add to Cart</button>
                            </div>

                            <p class="my-3">Select Size & Power: <b>3 HP</b></p>
                            <div class="d-flex flex-wrap prod-size-block">
                                <button class="prod-size active"><b>{{$product->size}}</b> <br> <span class="price">${{$product->price}}.00</span></button>
                                @foreach ($product->productVariant as $productVariant)
                                <button class="prod-size"><b>{{$productVariant->product_size}}</b> <br> <span class="price">{{$productVariant->product_price}}</span></button>
                                @endforeach
                                {{-- <button class="prod-size"><b>1 HP</b> <br> <span class="price">$138.00</span></button>
                                <button class="prod-size"><b>1.5 HP</b> <br> <span class="price">$128.00</span></button>
                                <button class="prod-size"><b>2 HP</b> <br> <span class="price">$204.00</span></button>
                                <button class="prod-size active"><b>3 HP</b> <br> <span class="price">$198.00</span></button>
                                <button class="prod-size"><b>4 HP</b> <br> <span class="price">$248.00</span></button>
                                <button class="prod-size"><b>5 HP</b> <br> <span class="price">$298.00</span></button> --}}
                            </div>
                        </div>
                        <div class="accordion" id="prodDetailAccordian">
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-uppercase font-700 collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#shortDescription" aria-expanded="true" aria-controls="shortDescription">
                                        SHORT DESCRIPTION
                                    </button>
                                </h5>
                                <div id="shortDescription" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#prodDetailAccordian">
                                    <div class="accordion-body">
                                        {{-- <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                        the collapse plugin adds the appropriate classes that we use to style each element.
                                        These classes control the overall appearance, as well as the showing and hiding via CSS
                                        transitions. You can modify any of this with custom CSS or overriding our default
                                        variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow. --}}
                                        {!!$product->long_description!!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button text-uppercase font-700" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#prodOverView" aria-expanded="false" aria-controls="prodOverView">
                                        Product Overview
                                    </button>
                                </h5>
                                <div id="prodOverView" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#prodDetailAccordian">
                                    <div class="accordion-body px-lg-5 py-lg-4">
                                        <div class="row">
                                            @foreach ($product->productOverview as $productOverview)
                                            <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($productOverview->image) }}" alt="prod-view">
                                                    <span class="ms-3 small">{{$productOverview->title}}</span>
                                                </div>
                                            </div>
                                            @endforeach

                                            {{-- <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/prod-view6.png') }}" alt="prod-view">
                                                    <span class="ms-3 small">Mounting Bracket Included</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/prod-view1.png') }}" alt="prod-view">
                                                    <span class="ms-3 small">High Performance</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/prod-view2.png') }}" alt="prod-view">
                                                    <span class="ms-3 small">Fully Enclosed Fan</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/prod-view4.png') }}" alt="prod-view">
                                                    <span class="ms-3 small">Sturdy & Durable Construction</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/prod-view3.png') }}" alt="prod-view">
                                                    <span class="ms-3 small">Wide Application</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button text-uppercase font-700 collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#speciFications" aria-expanded="false" aria-controls="speciFications">
                                        Specifications
                                    </button>
                                </h5>
                                <div id="speciFications" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#prodDetailAccordian">
                                    <div class="pb-0 accordion-body">
                                        <b>Additional Documents</b>
                                        <div class="mt-2 mb-3">
                                            <a href="#" class="text-decoration-underline red-link">Product Manual</a>
                                            <a href="#" class="ms-2 text-decoration-underline red-link">Product Catalog</a>
                                        </div>
                                        <b>Features</b>
                                    </div>
                                    <table class="mt-3 mb-0 table specifications-table">
                                        @foreach ($product->specifications as $specification)
                                        <tr>
                                            <td class="th">{{$specification->key->key}}</td>
                                            <td>{{$specification->specification}}</td>
                                        </tr>
                                        @endforeach

                                        {{-- <tr>
                                            <td class="th">Speed</td>
                                            <td>1725.00</td>
                                        </tr>
                                        <tr>
                                            <td class="th">Voltage</td>
                                            <td>115 Volts</td>
                                        </tr>
                                        <tr>
                                            <td class="th">Horsepower</td>
                                            <td>0.75 hp</td>
                                        </tr>
                                        <tr>
                                            <td class="th">Item Dimensions LxWxH</td>
                                            <td>12 x 8 x 8 inche s</td>
                                        </tr> --}}
                                    </table>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button text-uppercase font-700 collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#suppInfo" aria-expanded="false" aria-controls="suppInfo">
                                        Supplier Info
                                    </button>
                                </h5>
                                <div id="suppInfo" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#prodDetailAccordian">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <h6>Positive Seller Ratings</h6>
                                                <h6 class="mt-3 theme-color">80%</h6>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <h6>Ship on Time</h6>
                                                <h6 class="mt-3 theme-color">80%</h6>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <h6>Chat Response Rate</h6>
                                                <h6 class="mt-3 theme-color">80%</h6>
                                            </div>
                                        </div>
                                        <div class="mt-3 pt-4 about-supplier">
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <h5>About Supplier</h5>
                                                <a href="#" class="d-flex align-items-center">
                                                    <img src="{{ asset('public/uploads/website-images/images/eye-icon.png') }}">
                                                    <span class="ms-2 text-decoration-underline font-600 red-link">View</a>
                                                </a>
                                            </div>
                                            <p>ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="text-uppercase">Product Enquiry</h5>
                                <p>We're here to help.</p>
                            </div>
                            <div>
                                <button class="btn-bg">Product Inquiry</button>
                                <button class="black-btn">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            PRODUCT DETAILS END
        ==============================-->

    <!--============================
            RELATED PRODUCT START
        ==============================-->
    <div class="featured-products">
        <div class="container pt-xl-5 pt-3">
            <div class="mb-xl-3 mb-0 d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Compare Similar Items</h4>
            </div>
            <div class="row similar-item-section">
                <div class="px-2 similar-item-block active">
                    <div class="inner">
                        <p class="current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset($product->thumb_image) }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">1HP 1725 115-230</h6>
                            <h6 class="price">$188.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            @foreach ($product->specifications as  $specification)
                            <p class="py-2 text-center small list"><b>{{$specification->key->key}}: </b>{{$specification->specification}}</p>
                            @endforeach
                            {{-- <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p> --}}
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div>

                <?php
               $compareProducts =App\Models\Product::where('child_category_id',$product->child_category_id)->latest()->limit(4)->get();
                ?>
                @foreach ($compareProducts as $compareProduct)
                @if($compareProduct->id == $product->id)
                @else
                <div class="px-2 similar-item-block">
                    <div class="inner">
                        <p class="invisible current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset($compareProduct->thumb_image) }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">1HP 1725 115-230</h6>
                            <h6 class="price">$188.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            @foreach ($compareProduct->specifications as  $specification)
                            <p class="py-2 text-center small list"><b>{{$specification->key->key}}: </b>{{$specification->specification}}</p>
                            @endforeach
                            {{-- <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p> --}}
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                {{-- <div class="px-2 similar-item-block active">
                    <div class="inner">
                        <p class="current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/similar-item1.png') }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">0.5HP 1725 115-230</h6>
                            <h6 class="price">$198.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            <p class="py-2 text-center small list"><b>Horsepower: </b>1HP</p>
                            <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p>
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div>
                <div class="px-2 similar-item-block">
                    <div class="inner">
                        <p class="invisible current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/similar-item3.png') }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">1HP 3450 115-230</h6>
                            <h6 class="price">$218.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            <p class="py-2 text-center small list"><b>Horsepower: </b>1HP</p>
                            <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p>
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div>
                <div class="px-2 similar-item-block">
                    <div class="inner">
                        <p class="invisible current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/similar-item2.png') }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">1.5HP 1725 115-230</h6>
                            <h6 class="price">$230.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            <p class="py-2 text-center small list"><b>Horsepower: </b>1HP</p>
                            <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p>
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="px-2 similar-item-block">
                    <div class="inner">
                        <p class="invisible current-item">Current Item</p>
                        <div
                            class="mt-2 position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/similar-item1.png') }}">
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 name">1.5HP 3450 115-230</h6>
                            <h6 class="price">$260.00</h6>
                        </div>
                        <div class="mt-2 spec-item">
                            <p class="py-2 text-center small list"><b>Horsepower: </b>1HP</p>
                            <p class="py-2 text-center small list"><b>RPM: </b>1725</p>
                            <p class="py-2 text-center small list"><b>Voltage: </b>115-230</p>
                            <p class="py-2 text-center small list"><b>Frequency: </b>60hz</p>
                        </div>
                        <div class="py-3 px-2">
                            <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                            <button class="mt-2 black-btn w-100">View Details</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="featured-products">
        <div class="container pt-xl-5 pb-xl-0 py-3 px-2">
            <h4 class="mb-3">Ratings & Reviews</h4>
            <p class="mb-3">Our <span class="text-decoration-underline">Community Guidelines</span> help customers write honest reviews.</p>
            <div class="row col-12 mx-auto mb-2 py-5 align-items-center user-review-section">
                <div class="col-sm-6 text-center">
                    <h4>4.0</h4>
                    <div class="my-1 line-height-1">
                        <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                        <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                        <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                        <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                        <img src="{{ asset('public/uploads/website-images/images/rating-star2.png') }}">
                    </div>
                    <a href="#" class="red-link font-600 text-decoration-underline">429 Reviews</a>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="mb-2 d-flex">
                        <div><span class="rating-number">5</span><img class="mx-2" src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}"></div>
                        <div class="ms-2 me-3 progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>12</span>
                    </div>
                    <div class="mb-2 d-flex">
                        <div><span class="rating-number">4</span><img class="mx-2" src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}"></div>
                        <div class="ms-2 me-3 progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>21</span>
                    </div>
                    <div class="mb-2 d-flex">
                        <div><span class="rating-number">3</span><img class="mx-2" src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}"></div>
                        <div class="ms-2 me-3 progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>10</span>
                    </div>
                    <div class="mb-2 d-flex">
                        <div><span class="rating-number">2</span><img class="mx-2" src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}"></div>
                        <div class="ms-2 me-3 progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>24</span>
                    </div>
                    <div class="d-flex">
                        <div><span class="rating-number">1</span><img class="mx-2" src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}"></div>
                        <div class="ms-2 me-3 progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>54</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-products">
        <div class="container pt-xl-5 pb-xl-0 py-3 px-2">
            <h4 class="mb-3">Read reviews that mention</h4>
            <div class="mb-xl-3 mb-0 d-flex flex-wrap align-items-baseline justify-content-between">
                <div>
                    <button class="read-review-mention"><span>Easy to Install</span><span class="ms-3">6</span></button>
                    <button class="mx-2 read-review-mention"><span>Compressor</span><span class="ms-3">12</span></button>
                    <button class="read-review-mention"><span>Great Value</span><span class="ms-3">22</span></button>
                </div>
                <fieldset class="sort-by">
                    <legend>SORT BY</legend>
                    <div class="dropdown">
                        <a class="btn ps-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Top Reviews</a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </fieldset>
            </div>
            <div class="row col-12 mx-auto mb-2 py-5 align-items-center user-review-section">
                <div class="col-sm-3 text-center">
                    <div class="mb-2 user-prof-name">
                        <img src="{{ asset('public/uploads/website-images/images/user1.png') }}">
                    </div>
                    <h6 class="name">David</h6>
                </div>
                <div class="col-sm-7">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star2.png') }}">
                    <p class="mt-3">Wire diagram was extremely easy to follow. Already had wires segregated and in line to what theu should be. So hookup was a breeze. Turns on and works fine.There was small damage to back cover over plastic fan. Was not a big issue. I straightened it and put cover back on. Does not hit or rub after the fix.Is slightly noisier then the old motor but that is to be expected as the old motor was a different type and oiled bearing case motor.Seems to work as it should and run the compressor just fine.</p>
                </div>
                <div class="col-sm-2 text-center">
                    <p class="font-500">02/03/2023</p>
                </div>
            </div>
            <div class="row col-12 mx-auto mb-2 py-5 align-items-center user-review-section">
                <div class="col-sm-3 text-center">
                    <div class="mb-2 user-prof-name">
                        <img src="{{ asset('public/uploads/website-images/images/user1.png') }}">
                    </div>
                    <h6 class="name">David</h6>
                </div>
                <div class="col-sm-7">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star2.png') }}">
                    <p class="mt-3">Wire diagram was extremely easy to follow. Already had wires segregated and in line to what theu should be. So hookup was a breeze. Turns on and works fine.There was small damage to back cover over plastic fan. Was not a big issue. I straightened it and put cover back on. Does not hit or rub after the fix.Is slightly noisier then the old motor but that is to be expected as the old motor was a different type and oiled bearing case motor.Seems to work as it should and run the compressor just fine.</p>
                </div>
                <div class="col-sm-2 text-center">
                    <p class="font-500">02/03/2023</p>
                </div>
            </div>
            <div class="row col-12 mx-auto mb-2 py-5 align-items-center user-review-section">
                <div class="col-sm-3 text-center">
                    <div class="mb-2 user-prof-name">
                        <img src="{{ asset('public/uploads/website-images/images/user1.png') }}">
                    </div>
                    <h6 class="name">David</h6>
                </div>
                <div class="col-sm-7">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star1.png') }}">
                    <img src="{{ asset('public/uploads/website-images/images/rating-star2.png') }}">
                    <p class="mt-3">Wire diagram was extremely easy to follow. Already had wires segregated and in line to what theu should be. So hookup was a breeze. Turns on and works fine.There was small damage to back cover over plastic fan. Was not a big issue. I straightened it and put cover back on. Does not hit or rub after the fix.Is slightly noisier then the old motor but that is to be expected as the old motor was a different type and oiled bearing case motor.Seems to work as it should and run the compressor just fine.</p>
                </div>
                <div class="col-sm-2 text-center">
                    <p class="font-500">02/03/2023</p>
                </div>
            </div>
            <div class="mt-4 text-center">
                <a href="#" class="red-link text-decoration-underline font-500">Show 10 More Reviews</a>
            </div>
        </div>
    </div>
    <div class="featured-products">
        <div class="container py-xl-5 py-3">
            <div class="mb-xl-3 mb-0 d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Related Products</h4>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset($relatedProduct->thumb_image) }}">
                            <a href="{{URL('product-detail/'.$relatedProduct->slug)}}" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                        <div class="p-3">
                            {{-- <h6 class="mb-2">Release device EM 24V-DC</h6> --}}
                            <h6 class="mb-2">{{$relatedProduct->name}}</h6>
                            <span class="price">${{$relatedProduct->price}}.00</span>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine2.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine3.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine9.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
                        <div class="p-3">
                            <h6 class="mb-2">Release device EM 24V-DC</h6>
                            <span class="price">$377.00</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="featured-products">
        <div class="container pb-xl-5 pb-3">
            <div class="mb-xl-3 mb-0 d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Recently Viewed</h4>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 p-2">
                    <div class="position-relative feature-product-section">
                        <button class="add-wishlist-btn"><span class="fa fa-heart-o wishlist-icon"
                                aria-hidden="true"></span></button>
                        <div
                            class="position-relative text-center d-flex justify-content-center align-items-center img-holder">
                            <img src="{{ asset('public/uploads/website-images/images/engine16.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine5.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine17.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
                            <img src="{{ asset('public/uploads/website-images/images/engine8.png') }}">
                            <a href="" class="position-absolute text-white quick-view">Quick View</a>
                        </div>
                        <button class="btn-bg add-cart-btn w-100">Add to Cart</button>
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
            RELATED PRODUCT END
        ==============================-->
    <script>
        $(function() {
            $(document).on('click', '.increment', function() {
                var number = $('#number').val();
                number++;
                $('#number').val(number);
            });

            $('.decrement').on('click', function() {
                var number = $('#number').val();
                if (number > 0) {
                    number--;
                    $('#number').val(number);
                }
            });

            $(document).on('click', '.prod-size', function(){
                $('.prod-size').removeClass('active');
                $(this).addClass('active');
            });

            $('#lightSlider').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                slideMargin: 0,
                thumbItem: 9,
                controls: false
                // prevHtml: "<b></b>",
                // nextHtml: "<b></b>",
            });
        });
    </script>
@endsection

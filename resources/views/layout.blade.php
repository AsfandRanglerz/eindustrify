@php
    $setting = App\Models\Setting::first();
    $announcementModal = App\Models\AnnouncementModal::first();
    $productCategories = App\Models\Category::where(['status' => 1])->get();
    $megaMenuCategories = App\Models\MegaMenuCategory::orderBy('serial', 'asc')
        ->where('status', 1)
        ->get();
    $megaMenuBanner = App\Models\BannerImage::find(1);
    $modalProducts = App\Models\Product::all();
    $currencySetting = App\Models\Setting::first();
    $menus = App\Models\MenuVisibility::select('status', 'id')->get();
    $customPages = App\Models\CustomPage::where('status', 1)->get();
    $googleAnalytic = App\Models\GoogleAnalytic::first();
    $facebookPixel = App\Models\FacebookPixel::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @yield('title')
    @yield('meta')

    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <link rel="stylesheet" href="{{ asset('user/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/lightslider-master/dist/css/lightslider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('intl-tel-input-master/build/css/intlTelInput.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @if ($setting->text_direction == 'rtl')
        <link rel="stylesheet" href="{{ asset('user/css/rtl.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('user/css/common.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('dropzone/min/dropzone.min.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/dev.css') }}">

    <!--jquery library js-->
    <script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    @if ($googleAnalytic->status == 1)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalytic->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $googleAnalytic->analytic_id }}');
        </script>
    @endif

    @if ($facebookPixel->status == 1)
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $facebookPixel->app_id }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $facebookPixel->app_id }}&ev=PageView&noscript=1" /></noscript>
    @endif

    <script>
        var end_year = '';
        var end_month = '';
        var end_date = '';
        var capmaign_time = '';
        var campaign_end_year = ''
        var campaign_end_month = ''
        var campaign_end_date = ''
        var campaign_hour = ''
        var campaign_min = ''
        var campaign_sec = ''
        var productIds = [];
        var productYears = [];
        var productMonths = [];
        var productDays = [];
    </script>

    @include('theme_style_css')
</head>

<body>
    <!--============================
        HEADER START
    ==============================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="{{ route('home') }}">
                            <img src="{{ asset($setting->logo) }}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <form action="" class="col-xl-9 mx-auto d-flex h-100">
                        <input type="email" class="form-control header-search"
                            placeholder="Search by Keywords, Item #, Brand">
                        <button type="submit" class="btn"><span class="fa fa-search text-white"></span></button>
                    </form>
                </div>
                <div class="col-xl-2 col-lg-3 position-relative reg-log-cart">
                    @if (Auth::id())
                        <div class="dropdown ml-auto">
                            <a class="p-0 btn dropdown-toggle rounded-circle" role="button" id="profContentBtn"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('public/uploads/website-images/images/user-profile.png') }}"
                                    class="profile-user-pic">
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-right animated-dropdown slideIn w-100 border-0 dark-box-shadow">
                                <b
                                    class="text-muted text-uppercase d-block mb-2 user-name-text">{{ Auth::user()->first_name }}</b>
                                    <a class="dropdown-item" href="{{ URL('vendor-dashboard') }}"><span
                                        class="fas fa-sign-out-alt mr-2"></span><b>Dashbaord</b></a>
                                    <hr class="my-1">
                                <a class="dropdown-item" href="{{ URL('logout') }}"><span
                                        class="fas fa-sign-out-alt mr-2"></span><b>Logout</b></a>
                            </div>
                        </div>
                    @else
                        <ul class="w-unset wsus__icon_area">
                            <li class="mx-0"><a
                                    class="d-flex justify-content-center align-items-center wsus__user_icon"><img
                                        src="{{ asset('public/uploads/website-images/images/user.png') }}"
                                        alt="user-img"></a></li>
                            <a href="{{ url('login') }}" class="ms-2">Login</a>
                        </ul>
                    @endif
                    <ul class="w-unset wsus__icon_area">
                        @if ($menus->where('id', 19)->first()->status == 1)
                            <li class="mx-0"><a class="wsus__cart_icon" href="javascript:;"><img
                                        src="{{ asset('public/uploads/website-images/images/Vector.png') }}"
                                        alt="cart-img"><span
                                        id="cartQty">{{ Cart::instance('default')->count() }}</span></a></li>
                            <a class="ms-2 wsus__cart_icon" href="javascript:;">Cart</a>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="wsus__mini_cart">
            <h4>{{ __('user.SHOPPING CART') }} <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span>
            </h4>
            <div id="load_sidebar_cart">
                @if (Cart::instance('default')->count() == 0)
                    <h5 class="text-danger text-center">{{ 'Your Cart is empty' }}</h5>
                @else
                    <ul>
                        @php
                            $sidebarCartSubTotal = 0;
                            $sidebar_cart_contents = Cart::instance('default')->content();
                        @endphp
                        @foreach ($sidebar_cart_contents as $sidebar_cart_content)
                            <li>
                                <div class="wsus__cart_img">
                                    <a href="#"><img src="{{ asset($sidebar_cart_content->options->image) }}"
                                            alt="product" class="img-fluid w-100"></a>
                                    <a class="wsis__del_icon"
                                        onclick="sidebarCartItemRemove('{{ $sidebar_cart_content->rowId }}')"
                                        href="javascript:;"><i class="fas fa-minus-circle"></i></a>
                                </div>
                                <div class="wsus__cart_text">
                                    <a class="wsus__cart_title"
                                        href="{{ route('product-detail', $sidebar_cart_content->options->slug) }}">{{ $sidebar_cart_content->name }}</a>
                                    <p><span>{{ $sidebar_cart_content->qty }} x</span>
                                        {{ $currencySetting->currency_icon }}{{ $sidebar_cart_content->price }}</p>
                                </div>
                            </li>

                            @php
                                $productPrice = $sidebar_cart_content->price;
                                $total = $productPrice * $sidebar_cart_content->qty;
                                $sidebarCartSubTotal += $total;
                            @endphp
                        @endforeach




                    </ul>
                    <h5>{{ __('user.Sub Total') }}
                        <span>{{ $currencySetting->currency_icon }}{{ $sidebarCartSubTotal }}</span></h5>
                    <div class="wsus__minicart_btn_area">
                        <a class="common_btn" href="{{ route('cart') }}">{{ __('user.View Cart') }}</a>
                        <a class="common_btn"
                            href="{{ route('user.checkout.billing-address') }}">{{ __('user.Checkout') }}</a>
                    </div>
                @endif
            </div>
        </div>

    </header>
    <!--============================
        HEADER END
    ==============================-->



    <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row position-relative">
                <div class="col-xl-3 col-lg-3 pe-0">
                    <div class="ps-0 wsus__main_menu wsus_menu_category_bar">
                        <p><img src="{{ asset('public/uploads/website-images/images/toggle-bars.png') }}"
                                class="me-3" />All Products Categories</p>
                        <span class="fa fa-angle-down"></span>
                    </div>
                </div>
                <div class="row position-absolute pt-3 pb-4 product-categories-dropdown">
                    <?php
                    $categories = App\Models\Category::with('subCategories')->limit(5)->get();
                    ?>
                    @foreach ($categories as $category)
                    <div class="col-md-2">
                        <img src="{{ asset($category->image) }}"
                            class="product-cat-img">
                        <h6 class="my-2 main-heading">{{$category->name}}</h6>
                        <ul class="list-links">
                            @foreach ($category->subCategories as $subcategory)
                            <li><a href="{{URL('child-category-listing/'.$subcategory->slug)}}" class="link">{{$subcategory->name}}</a></li>
                            @endforeach
                        </ul>
                        <a href="{{URL('sub-category-listing/'.$category->slug)}}" class="mt-2 view-link">View All</a>
                    </div>
                    @endforeach
                    <div class="col-md-2 d-flex flex-column justify-content-center product-cat-last-section">
                        <h6 class="text-uppercase small">More</h6>
                        <h5 class="my-1 text-uppercase main-heading">Categories</h5>
                        <a href="{{URL('all-categories')}}" class="view-all">View All Categories</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <ul class="wsus__menu_item">
                        {{-- @if ($menus->where('id', 1)->first()->status == 1)
                        <li><a  href="{{ route('home') }}">{{__('user.Home')}}</a></li>
                        @endif

                        @if ($menus->where('id', 2)->first()->status == 1)
                        <li><a href="{{ route('product') }}">{{__('user.Shop')}}
                            @if ($menus->where('id', 3)->first()->status == 1)
                             <i class="fa fa-angle-down"></i>
                            @endif
                            </a>
                            @if ($menus->where('id', 3)->first()->status == 1)
                            <div class="wsus__mega_menu">
                                <div class="row">
                                    @foreach ($megaMenuCategories as $megaMenuCategory)
                                        <div class="col-xl-3 col-lg-4">
                                            <div class="wsus__mega_menu_colum">
                                                <h4><a class="text-dark" href="{{ route('product',['category' => $megaMenuCategory->category->slug]) }}">{{ $megaMenuCategory->category->name }}</a></h4>
                                                <ul class="wsis__mega_menu_item">
                                                    @foreach ($megaMenuCategory->subCategories as $subCategory)
                                                    <li><a href="{{ route('product',['sub_category' => $subCategory->subCategory->slug]) }}">{{ $subCategory->subCategory->name }} </a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($megaMenuBanner->status == 1)
                                    <div class="col-xl-3 d-lg-none d-xl-block">
                                        <div class="wsus__mega_menu_colum">
                                            <img src="{{ asset($megaMenuBanner->image) }}" alt="images" class="img-fluid w-100">
                                            <div class="wsus__mega_menu_colum_text">
                                                <h5>{{ $megaMenuBanner->title }}</h5>
                                                <h3>{{ $megaMenuBanner->description }}</h3>
                                                <a class="common_btn" href="{{ $megaMenuBanner->link }}">{{__('user.Shop Now')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </li>
                        @endif
                        @if ($menus->where('id', 4)->first()->status == 1)
                            @if ($setting->enable_multivendor == 1)
                                <li><a href="{{ route('sellers') }}">{{__('user.Sellers')}}</a></li>
                            @endif
                        @endif
                        @if ($menus->where('id', 5)->first()->status == 1)
                        <li><a href="{{ route('blog') }}">{{__('user.Blog')}}</a></li>
                        @endif
                        @if ($menus->where('id', 6)->first()->status == 1)
                        <li><a href="{{ route('campaign') }}">{{__('user.Campaign')}}</a></li>
                        @endif --}}
                        <li class="wsus__relative_li"><a href="#">Sell on eindustrify</a></li>
                        <li class="wsus__relative_li"><a href="#">Help</a></li>
                        {{-- @if ($menus->where('id', 7)->first()->status == 1)
                        <li class="wsus__relative_li"><a href="javascript:;">{{__('user.Pages')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="wsus__menu_droapdown">
                                @if ($menus->where('id', 8)->first()->status == 1)
                                <li><a href="">{{__('user.About Us')}}</a></li>
                                @endif
                                @if ($menus->where('id', 9)->first()->status == 1)
                                <li><a href="{{ route('contact-us') }}">{{__('user.Contact Us')}}</a></li>
                                @endif
                                @if ($menus->where('id', 10)->first()->status == 1)
                                <li><a href="{{ route('user.checkout.billing-address') }}">{{__('user.Check Out')}}</a></li>
                                @endif
                                @if ($menus->where('id', 11)->first()->status == 1)
                                <li><a href="{{ route('brand') }}">{{__('user.Brand')}}</a></li>
                                @endif
                                @if ($menus->where('id', 12)->first()->status == 1)
                                <li><a href="{{ route('faq') }}">{{__('user.FAQ')}}</a></li>
                                @endif
                                @if ($menus->where('id', 13)->first()->status == 1)
                                <li><a href="{{ route('privacy-policy') }}">{{__('user.Privacy Policy')}}</a></li>
                                @endif
                                @if ($menus->where('id', 14)->first()->status == 1)
                                <li><a href="{{ route('terms-and-conditions') }}">{{__('user.Terms and Conditions')}}</a></li>
                                @endif

                                @foreach ($customPages as $customPage)
                                    <li><a href="{{ route('page', $customPage->slug) }}">{{ $customPage->page_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif --}}
                    </ul>
                    <ul class="wsus__menu_item wsus__menu_item_right ms-auto">
                        <li class="wsus__relative_li"><a href="#">Quick Order <span
                                    class="fa fa-angle-down"></span></a>
                            <ul class="wsus__menu_droapdown">
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                            </ul>
                        </li>
                        @if ($menus->where('id', 15)->first()->status == 1)
                            <li class="track_bar"><a href="">{{ __('user.Track Order') }}</a></li>
                        @endif
                        <li class="wsus__relative_li"><a href="#">US English <span
                                    class="fa fa-angle-down"></span></a>
                            <ul class="wsus__menu_droapdown">
                                <li><a href="">{{ __('user.About Us') }}</a></li>
                                <li><a href="#">Link</a></li>
                            </ul>
                        </li>
                        <li>
                            {{-- <span class="usd-dollar">$ USD</span> --}}
                            <select id="currencyList">
                                <option value="USD" selected="selected">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="JPY">JPY</option>
                                <option value="GBP">GBP</option>
                                <option disabled>──────────</option>
                                <option value="AED">AED</option>
                                <option value="AFN">AFN</option>
                                <option value="ALL">ALL</option>
                                <option value="AMD">AMD</option>
                                <option value="ANG">ANG</option>
                                <option value="AOA">AOA</option>
                                <option value="ARS">ARS</option>
                                <option value="AUD">AUD</option>
                                <option value="AWG">AWG</option>
                                <option value="AZN">AZN</option>
                                <option value="BAM">BAM</option>
                                <option value="BBD">BBD</option>
                                <option value="BDT">BDT</option>
                                <option value="BGN">BGN</option>
                                <option value="BHD">BHD</option>
                                <option value="BIF">BIF</option>
                                <option value="BMD">BMD</option>
                                <option value="BND">BND</option>
                                <option value="BOB">BOB</option>
                                <option value="BRL">BRL</option>
                                <option value="BSD">BSD</option>
                                <option value="BTN">BTN</option>
                                <option value="BWP">BWP</option>
                                <option value="BYN">BYN</option>
                                <option value="BZD">BZD</option>
                                <option value="CAD">CAD</option>
                                <option value="CDF">CDF</option>
                                <option value="CHF">CHF</option>
                                <option value="CLP">CLP</option>
                                <option value="CNY">CNY</option>
                                <option value="COP">COP</option>
                                <option value="CRC">CRC</option>
                                <option value="CUC">CUC</option>
                                <option value="CUP">CUP</option>
                                <option value="CVE">CVE</option>
                                <option value="CZK">CZK</option>
                                <option value="DJF">DJF</option>
                                <option value="DKK">DKK</option>
                                <option value="DOP">DOP</option>
                                <option value="DZD">DZD</option>
                                <option value="EGP">EGP</option>
                                <option value="ERN">ERN</option>
                                <option value="ETB">ETB</option>
                                <option value="EUR">EUR</option>
                                <option value="FJD">FJD</option>
                                <option value="FKP">FKP</option>
                                <option value="GBP">GBP</option>
                                <option value="GEL">GEL</option>
                                <option value="GGP">GGP</option>
                                <option value="GHS">GHS</option>
                                <option value="GIP">GIP</option>
                                <option value="GMD">GMD</option>
                                <option value="GNF">GNF</option>
                                <option value="GTQ">GTQ</option>
                                <option value="GYD">GYD</option>
                                <option value="HKD">HKD</option>
                                <option value="HNL">HNL</option>
                                <option value="HRK">HRK</option>
                                <option value="HTG">HTG</option>
                                <option value="HUF">HUF</option>
                                <option value="IDR">IDR</option>
                                <option value="ILS">ILS</option>
                                <option value="IMP">IMP</option>
                                <option value="INR">INR</option>
                                <option value="IQD">IQD</option>
                                <option value="IRR">IRR</option>
                                <option value="ISK">ISK</option>
                                <option value="JEP">JEP</option>
                                <option value="JMD">JMD</option>
                                <option value="JOD">JOD</option>
                                <option value="JPY">JPY</option>
                                <option value="KES">KES</option>
                                <option value="KGS">KGS</option>
                                <option value="KHR">KHR</option>
                                <option value="KID">KID</option>
                                <option value="KMF">KMF</option>
                                <option value="KPW">KPW</option>
                                <option value="KRW">KRW</option>
                                <option value="KWD">KWD</option>
                                <option value="KYD">KYD</option>
                                <option value="KZT">KZT</option>
                                <option value="LAK">LAK</option>
                                <option value="LBP">LBP</option>
                                <option value="LKR">LKR</option>
                                <option value="LRD">LRD</option>
                                <option value="LSL">LSL</option>
                                <option value="LYD">LYD</option>
                                <option value="MAD">MAD</option>
                                <option value="MDL">MDL</option>
                                <option value="MGA">MGA</option>
                                <option value="MKD">MKD</option>
                                <option value="MMK">MMK</option>
                                <option value="MNT">MNT</option>
                                <option value="MOP">MOP</option>
                                <option value="MRU">MRU</option>
                                <option value="MUR">MUR</option>
                                <option value="MVR">MVR</option>
                                <option value="MWK">MWK</option>
                                <option value="MXN">MXN</option>
                                <option value="MYR">MYR</option>
                                <option value="MZN">MZN</option>
                                <option value="NAD">NAD</option>
                                <option value="NGN">NGN</option>
                                <option value="NIO">NIO</option>
                                <option value="NOK">NOK</option>
                                <option value="NPR">NPR</option>
                                <option value="NZD">NZD</option>
                                <option value="OMR">OMR</option>
                                <option value="PAB">PAB</option>
                                <option value="PEN">PEN</option>
                                <option value="PGK">PGK</option>
                                <option value="PHP">PHP</option>
                                <option value="PKR">PKR</option>
                                <option value="PLN">PLN</option>
                                <option value="PRB">PRB</option>
                                <option value="PYG">PYG</option>
                                <option value="QAR">QAR</option>
                                <option value="RON">RON</option>
                                <option value="RSD">RSD</option>
                                <option value="RUB">RUB</option>
                                <option value="RWF">RWF</option>
                                <option value="SAR">SAR</option>
                                <option value="SEK">SEK</option>
                                <option value="SGD">SGD</option>
                                <option value="SHP">SHP</option>
                                <option value="SLL">SLL</option>
                                <option value="SLS">SLS</option>
                                <option value="SOS">SOS</option>
                                <option value="SRD">SRD</option>
                                <option value="SSP">SSP</option>
                                <option value="STN">STN</option>
                                <option value="SYP">SYP</option>
                                <option value="SZL">SZL</option>
                                <option value="THB">THB</option>
                                <option value="TJS">TJS</option>
                                <option value="TMT">TMT</option>
                                <option value="TND">TND</option>
                                <option value="TOP">TOP</option>
                                <option value="TRY">TRY</option>
                                <option value="TTD">TTD</option>
                                <option value="TVD">TVD</option>
                                <option value="TWD">TWD</option>
                                <option value="TZS">TZS</option>
                                <option value="UAH">UAH</option>
                                <option value="UGX">UGX</option>
                                <option value="USD">USD</option>
                                <option value="UYU">UYU</option>
                                <option value="UZS">UZS</option>
                                <option value="VES">VES</option>
                                <option value="VND">VND</option>
                                <option value="VUV">VUV</option>
                                <option value="WST">WST</option>
                                <option value="XAF">XAF</option>
                                <option value="XCD">XCD</option>
                                <option value="XOF">XOF</option>
                                <option value="XPF">XPF</option>
                                <option value="ZAR">ZAR</option>
                                <option value="ZMW">ZMW</option>
                                <option value="ZWB">ZWB</option>
                            </select>
                        </li>
                        {{-- @if ($menus->where('id', 16)->first()->status == 1)
                        <li><a href="{{ route('flash-deal') }}">{{__('user.Flash Deal')}}</a></li>
                        @endif --}}
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        MOBILE MENU START
    ==============================-->
    <section id="wsus__mobile_menu">
        <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
        <ul class="wsus__mobile_menu_header_icon d-inline-flex">
            @if ($menus->where('id', 21)->first()->status == 1)
                <li><a href="{{ route('user.wishlist') }}"><i class="far fa-heart"></i>
                        @auth
                            @php
                                $user = Auth::guard('web')->user();
                                $wishlist = App\Models\Wishlist::where('user_id', $user->id)->count();
                            @endphp
                            <span id="mobileMenuwishlistQty">{{ $wishlist }}</span>
                        @endauth
                    </a></li>
            @endif

            @if ($menus->where('id', 20)->first()->status == 1)
                <li><a href="{{ route('compare') }}"><i class="far fa-random"></i><span
                            id="mobileMenuCompareQty">{{ Cart::instance('compare')->count() }}</span></a></li>
            @endif
        </ul>
        @if ($menus->where('id', 25)->first()->status == 1)
            <form action="{{ route('product') }}">
                <input type="text" placeholder="{{ __('user.Search') }}" name="search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        @endif

        @php
            $categoryFalse = $menus->where('id', 24)->first()->status == 1 ? false : true;
        @endphp
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @if ($menus->where('id', 24)->first()->status == 1)
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" role="tab" aria-controls="pills-home"
                        aria-selected="true">{{ __('user.Categories') }}</button>
                </li>
            @endif
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $categoryFalse ? 'active' : '' }}" id="pills-profile-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">{{ __('user.Main Menu') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @if ($menus->where('id', 24)->first()->status == 1)
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <div class="wsus__mobile_menu_main_menu">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <ul class="wsus_mobile_menu_category">
                                @foreach ($productCategories as $productCategory)
                                    @if ($productCategory->subCategories->count() == 0)
                                        <li><a href="{{ route('product', ['category' => $productCategory->slug]) }}"><i
                                                    class="{{ $productCategory->icon }}"></i>
                                                {{ $productCategory->name }}</a></li>
                                    @else
                                        <li><a href="{{ route('product', ['category' => $productCategory->slug]) }}"
                                                class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThreew-{{ $productCategory->id }}"
                                                aria-expanded="false"
                                                aria-controls="flush-collapseThreew-{{ $productCategory->id }}"><i
                                                    class="{{ $productCategory->icon }}"></i>
                                                {{ $productCategory->name }}</a>
                                            <div id="flush-collapseThreew-{{ $productCategory->id }}"
                                                class="accordion-collapse collapse"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        @foreach ($productCategory->subCategories as $subCategory)
                                                            <li><a
                                                                    href="{{ route('product', ['sub_category' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="tab-pane fade  {{ $categoryFalse ? 'show active' : '' }}" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <ul>
                            @if ($menus->where('id', 1)->first()->status == 1)
                                <li><a href="{{ route('home') }}">{{ __('user.Home') }}</a></li>
                            @endif
                            @if ($menus->where('id', 2)->first()->status == 1)
                                @if ($menus->where('id', 3)->first()->status == 1)
                                    <li><a href="{{ route('product') }}" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseThree">{{ __('user.Shop') }}</a>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach ($megaMenuCategories as $megaMenuCategory)
                                                        <li><a
                                                                href="{{ route('product', ['category' => $megaMenuCategory->category->slug]) }}">{{ $megaMenuCategory->category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="{{ route('product') }}">{{ __('user.Shop') }}</a></li>
                                @endif
                            @endif
                            @if ($menus->where('id', 4)->first()->status == 1)
                                @if ($setting->enable_multivendor == 1)
                                    <li><a href="{{ route('sellers') }}">{{ __('user.Sellers') }}</a></li>
                                @endif
                            @endif
                            @if ($menus->where('id', 5)->first()->status == 1)
                                <li><a href="{{ route('blog') }}">{{ __('user.Blog') }}</a></li>
                            @endif
                            @if ($menus->where('id', 6)->first()->status == 1)
                                <li><a href="{{ route('campaign') }}">{{ __('user.Campain') }}</a></li>
                            @endif
                            @if ($menus->where('id', 7)->first()->status == 1)
                                <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree101" aria-expanded="false"
                                        aria-controls="flush-collapseThree101">{{ __('user.Pages') }}</a>
                                    <div id="flush-collapseThree101" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">
                                            <ul>
                                                @if ($menus->where('id', 8)->first()->status == 1)
                                                    <li><a href="">{{ __('user.About Us') }}</a></li>
                                                @endif
                                                @if ($menus->where('id', 9)->first()->status == 1)
                                                    <li><a
                                                            href="{{ route('contact-us') }}">{{ __('user.Contact Us') }}</a>
                                                    </li>
                                                @endif
                                                @if ($menus->where('id', 10)->first()->status == 1)
                                                    <li><a
                                                            href="{{ route('user.checkout.billing-address') }}">{{ __('user.Check Out') }}</a>
                                                    </li>
                                                @endif
                                                @if ($menus->where('id', 11)->first()->status == 1)
                                                    <li><a href="{{ route('brand') }}">{{ __('user.Brand') }}</a>
                                                    </li>
                                                @endif
                                                @if ($menus->where('id', 12)->first()->status == 1)
                                                    <li><a href="{{ route('faq') }}">{{ __('user.FAQ') }}</a></li>
                                                @endif
                                                @if ($menus->where('id', 13)->first()->status == 1)
                                                    <li><a
                                                            href="{{ route('privacy-policy') }}">{{ __('user.Privacy Policy') }}</a>
                                                    </li>
                                                @endif
                                                @if ($menus->where('id', 14)->first()->status == 1)
                                                    <li><a
                                                            href="{{ route('terms-and-conditions') }}">{{ __('user.Terms and Conditions') }}</a>
                                                    </li>
                                                @endif

                                                @foreach ($customPages as $customPage)
                                                    <li><a
                                                            href="{{ route('page', $customPage->slug) }}">{{ $customPage->page_name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if ($menus->where('id', 15)->first()->status == 1)
                                <li><a href="{{ route('track-order') }}">{{ __('user.Track Order') }}</a></li>
                            @endif
                            @if ($menus->where('id', 16)->first()->status == 1)
                                <li><a href="{{ route('flash-deal') }}">{{ __('user.Flash Deal') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        MOBILE MENU END
    ==============================-->


    <!--==========================
           POP UP START
    ===========================-->

    @if ($announcementModal->status)
        <section id="wsus__pop_up">
            <div class="wsus__pop_up_center" style="background-image:url({{ asset($announcementModal->image) }})">
                <div class="wsus__pop_up_text">
                    <span id="cross"><i class="fas fa-times"></i></span>
                    <h5>{{ $announcementModal->title }}</h5>
                    <p>{{ $announcementModal->description }}</p>
                    <form id="modalSubscribeForm">
                        @csrf
                        <input type="email" name="email" placeholder="{{ __('user.Your Email') }}"
                            class="news_input">
                        <button type="submit" class="common_btn" id="modalSubscribeBtn"><i
                                id="modal-subscribe-spinner"
                                class="loading-icon fa fa-spin fa-spinner mr-3 d-none"></i>
                            {{ __('user.Subscribe') }}</button>
                        <div class="wsus__pop_up_check_box"></div>
                </div>
                </form>
                <div class="form-check">
                    <input type="hidden" id="announcement_expired_date"
                        value="{{ $announcementModal->expired_date }}">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                    <label class="form-check-label" for="flexCheckDefault11">
                        {{ $announcementModal->footer_text }}
                    </label>
                </div>
            </div>
            </div>
        </section>

        <script>
            let isannouncementModal = sessionStorage.getItem("announcementModal");
            let expirationDate = sessionStorage.getItem("announcementModalExpiration");
            if (isannouncementModal && expirationDate) {
                let today = new Date();
                today = today.toISOString().slice(0, 10)
                if (today < expirationDate) {
                    $("#wsus__pop_up").addClass("d-none");
                }
            }
        </script>
    @endif
    <!--==========================
           POP UP END
    ===========================-->


    <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    {{-- @foreach ($modalProducts as $modalProducts)
        <section class="product_popup_modal">
            <div class="modal fade" id="productModalView-{{ $modalProducts->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        @if ($modalProducts->video_link)
                                            @php
                                                $video_id=explode("=",$modalProducts->video_link);
                                            @endphp
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/{{ $video_id[1] }}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif

                                        <div class="row modal_slider">
                                            @foreach ($modalProducts->gallery as $image)
                                            <div class="col-xl-12">
                                                <div class="modal_slider_img">
                                                    <img src="{{ asset($image->image) }}" alt="product" class="img-fluid w-100">
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="wsus__pro_details_text">
                                        <a class="title" href="{{ route('product-detail', $modalProducts->slug) }}">{{ $modalProducts->name }}</a>

                                            @if ($modalProducts->qty == 0)
                                            <p class="wsus__stock_area"><span class="in_stock">{{__('user.Out of Stock')}}</span></p>
                                            @else
                                                <p class="wsus__stock_area"><span class="in_stock">{{__('user.In stock')}}
                                                    @if ($setting->show_product_qty == 1)
                                                        </span> ({{ $modalProducts->qty }} {{__('user.item')}})
                                                    @endif
                                                </p>
                                            @endif


                                        @php
                                            $reviewQty = $modalProducts->reviews->where('status',1)->count();
                                            $totalReview = $modalProducts->reviews->where('status',1)->sum('rating');

                                            if ($reviewQty > 0) {
                                                $average = $totalReview / $reviewQty;

                                                $intAverage = intval($average);

                                                $nextValue = $intAverage + 1;
                                                $reviewPoint = $intAverage;
                                                $halfReview=false;
                                                if($intAverage < $average && $average < $nextValue){
                                                    $reviewPoint= $intAverage + 0.5;
                                                    $halfReview=true;
                                                }
                                            }
                                        @endphp

                                        @php
                                            $variantPrice = 0;
                                            $variants = $modalProducts->variants->where('status', 1);
                                            if($variants->count() != 0){
                                                foreach ($variants as $variants_key => $variant) {
                                                    if($variant->variantItems->where('status',1)->count() != 0){
                                                        $item = $variant->variantItems->where('is_default',1)->first();
                                                        if($item){
                                                            $variantPrice += $item->price;
                                                        }
                                                    }
                                                }
                                            }
                                            $isCampaign = false;
                                            $today = date('Y-m-d H:i:s');
                                            $campaign = App\Models\CampaignProduct::where(['status' => 1, 'product_id' => $modalProducts->id])->first();
                                            if($campaign){
                                                $campaign = $campaign->campaign;
                                                if($campaign->start_date <= $today &&  $today <= $campaign->end_date){
                                                    $isCampaign = true;
                                                }
                                                $campaignOffer = $campaign->offer;
                                                $productPrice = $modalProducts->price;
                                                $campaignOfferPrice = ($campaignOffer / 100) * $productPrice;
                                                $totalPrice = $modalProducts->price;
                                                $campaignOfferPrice = $totalPrice - $campaignOfferPrice;
                                            }

                                            $totalPrice = $modalProducts->price;
                                            if($modalProducts->offer_price != null){
                                                $offerPrice = $modalProducts->offer_price;
                                                $offer = $totalPrice - $offerPrice;
                                                $percentage = ($offer * 100) / $totalPrice;
                                                $percentage = round($percentage);
                                            }


                                        @endphp

                                        @if ($isCampaign)
                                            <h4>{{ $currencySetting->currency_icon }} <span id="mainProductModalPrice-{{ $modalProducts->id }}">{{ sprintf("%.2f", $campaignOfferPrice + $variantPrice) }}</span>  <del>{{ $currencySetting->currency_icon }}{{ sprintf("%.2f", $totalPrice) }}</del></h4>
                                        @else
                                            @if ($modalProducts->offer_price == null)
                                                <h4>{{ $currencySetting->currency_icon }}<span id="mainProductModalPrice-{{ $modalProducts->id }}">{{ sprintf("%.2f", $totalPrice + $variantPrice) }}</span></h4>
                                            @else
                                                <h4>{{ $currencySetting->currency_icon }}<span id="mainProductModalPrice-{{ $modalProducts->id }}">{{ sprintf("%.2f", $modalProducts->offer_price + $variantPrice) }}</span> <del>{{ $currencySetting->currency_icon }}{{ sprintf("%.2f", $totalPrice) }}</del></h4>
                                            @endif
                                        @endif

                                        @if ($reviewQty > 0)
                                            <p class="review">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $reviewPoint)
                                                        <i class="fas fa-star"></i>
                                                    @elseif ($i> $reviewPoint )
                                                        @if ($halfReview == true)
                                                        <i class="fas fa-star-half-alt"></i>
                                                            @php
                                                                $halfReview=false
                                                            @endphp
                                                        @else
                                                        <i class="fal fa-star"></i>
                                                        @endif
                                                    @endif
                                                @endfor
                                                <span>({{ $reviewQty }} {{__('user.review')}})</span>
                                            </p>
                                        @endif

                                        @if ($reviewQty == 0)
                                            <p class="review">
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <span>(0 {{__('user.review')}})</span>
                                            </p>
                                        @endif

                                        @php
                                            $productPrice = 0;
                                            if($isCampaign){
                                                $productPrice = $campaignOfferPrice + $variantPrice;
                                            }else{
                                                if ($modalProducts->offer_price == null) {
                                                    $productPrice = $totalPrice + $variantPrice;
                                                }else {
                                                    $productPrice = $modalProducts->offer_price + $variantPrice;
                                                }
                                            }
                                        @endphp
                                        <form id="productModalFormId-{{ $modalProducts->id }}">
                                        <div class="wsus__quentity">
                                            <h5>{{__('user.quantity') }} :</h5>
                                            <div class="modal_btn">
                                                <button onclick="productModalDecrement('{{ $modalProducts->id }}')" type="button" class="btn btn-danger btn-sm">-</button>
                                                <input id="productModalQty-{{ $modalProducts->id }}" name="quantity"  readonly class="form-control" type="text" min="1" max="100" value="1" />
                                                <button onclick="productModalIncrement('{{ $modalProducts->id }}')" type="button" class="btn btn-success btn-sm">+</button>
                                            </div>
                                            <h3 class="d-none">{{ $currencySetting->currency_icon }}<span id="productModalPrice-{{ $modalProducts->id }}">{{ sprintf("%.2f",$productPrice) }}</span></h3>

                                            <input type="hidden" name="product_id" value="{{ $modalProducts->id }}">
                                            <input type="hidden" name="image" value="{{ $modalProducts->thumb_image }}">
                                            <input type="hidden" name="slug" value="{{ $modalProducts->slug }}">

                                        </div>
                                        @php
                                            $productVariants = App\Models\ProductVariant::where(['status' => 1, 'product_id'=> $modalProducts->id])->get();
                                        @endphp
                                        @if ($productVariants->count() != 0)
                                            <div class="wsus__selectbox">
                                                <div class="row">
                                                    @foreach ($productVariants as $productVariant)
                                                        @php
                                                            $items = App\Models\ProductVariantItem::orderBy('is_default','desc')->where(['product_variant_id' => $productVariant->id, 'product_id' => $modalProducts->id])->get();
                                                        @endphp
                                                        @if ($items->count() != 0)
                                                            <div class="col-xl-6 col-sm-6 mb-3">
                                                                <h5 class="mb-2">{{ $productVariant->name }}:</h5>

                                                                <input type="hidden" name="variants[]" value="{{ $productVariant->id }}">
                                                                <input type="hidden" name="variantNames[]" value="{{ $productVariant->name }}">

                                                                <select class="select_2 productModalVariant" name="items[]" data-product="{{ $modalProducts->id }}">
                                                                    @foreach ($items as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <ul class="wsus__button_area">
                                            <li><button type="button" onclick="addToCartInProductModal('{{ $modalProducts->id }}')" class="add_cart">{{__('user.add to cart')}}</button></li>
                                            <li><a class="buy_now" href="javascript:;" onclick="addToBuyNow('{{ $modalProducts->id }}')">{{__('user.buy now')}}</a></li>
                                            <li><a href="javascript:;" onclick="addToWishlist('{{ $modalProducts->id }}')"><i class="fal fa-heart"></i></a></li>
                                            <li><a href="javascript:;" onclick="addToCompare('{{ $modalProducts->id }}')"><i class="far fa-random"></i></a></li>
                                        </ul>
                                    </form>
                                    @if ($modalProducts->sku)
                                    <p class="brand_model"><span>{{__('user.Model')}} :</span> {{ $modalProducts->sku }}</p>
                                    @endif

                                    <p class="brand_model"><span>{{__('user.Brand')}} :</span> <a href="{{ route('product',['brand' => $modalProducts->brand->slug]) }}">{{ $modalProducts->brand->name }}</a></p>
                                    <p class="brand_model"><span>{{__('user.Category')}} :</span> <a href="{{ route('product',['category' => $modalProducts->category->slug]) }}">{{ $modalProducts->category->name }}</a></p>
                                    <div class="wsus__pro_det_share d-none">
                                        <h5>{{__('user.share')}} :</h5>
                                        <ul class="d-flex">
                                            <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ route('product-detail', $modalProducts->slug) }}&t={{ $modalProducts->name }}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a class="twitter" href="https://twitter.com/share?text={{ $modalProducts->name }}&url={{ route('product-detail', $modalProducts->slug) }}"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('product-detail', $modalProducts->slug) }}&title={{ $modalProducts->name }}"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a class="pinterest" href="https://www.pinterest.com/pin/create/button/?description={{ $modalProducts->name }}&media=&url={{ route('product-detail', $modalProducts->slug) }}"><i class="fab fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach --}}
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->

    @yield('public-content')

    @php
        $setting = App\Models\Setting::first();
        $footer = App\Models\Footer::first();
        $links = App\Models\FooterSocialLink::all();
        $footerLinks = App\Models\FooterLink::all();
    @endphp

    <!--============================
        FOOTER PART START
    ==============================-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <img src="{{ asset('public/uploads/website-images/images/footer-logo.png') }}"
                        alt="footer-logo">
                    <p class="mt-2 text-white">Premier global B2B e-commerce platform for industrial supplies</p>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 mb-xl-3 mb-4">
                            <h5 class="text-white mb-lg-4 mb-0">{{ $footer->first_column }}</h5>
                            <ul class="wsus__footer_menu">
                                @foreach ($footerLinks->where('column', 1) as $footerLink)
                                    <li><a href="" class="text-white">{{ $footerLink->title }}</a></li>
                                    {{-- <li><a href="{{ $footerLink->link }}" class="text-white">{{ $footerLink->title }}</a></li> --}}
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4 mb-xl-3 mb-4">
                            <h5 class="text-white mb-lg-4 mb-0">{{ $footer->second_column }}</h5>
                            <ul class="wsus__footer_menu">
                                @foreach ($footerLinks->where('column', 2) as $footerLink)
                                    <li><a href="" class="text-white">{{ $footerLink->title }}</a></li>
                                    {{-- <li><a href="{{ $footerLink->link }}" class="text-white">{{ $footerLink->title }}</a></li> --}}
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4 mb-xl-3 mb-4">
                            <h5 class="text-white mb-lg-4 mb-0">{{ $footer->third_column }}</h5>
                            <ul class="wsus__footer_menu">
                                @foreach ($footerLinks->where('column', 3) as $footerLink)
                                    <li><a href="{{ $footerLink->link }}"
                                            class="text-white">{{ $footerLink->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="text-white mb-lg-4 mb-0">CONTACT US</h5>
                            <p class="mt-2 text-white">{{ $footer->address }}</p>
                            <a class="action text-white" href="callto:{{ $footer->phone }}"
                                class="text-white">{{ $footer->phone }}</a>
                            <a class="action text-white" href="mailto:{{ $footer->email }}"
                                class="text-white">{{ $footer->email }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-xl-5 mt-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white text-uppercase mb-2">Signup for Email</h6>
                    <form action="" class="d-flex">
                        <input type="email" class="form-control" placeholder="Email Address">
                        <button type="submit" class="btn">Submit</button>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-9 footer-images-section">
                            <img src="{{ asset('public/uploads/website-images/images/footer-img-5.png') }}"
                                alt="footer-img-5">
                            <img src="{{ asset('public/uploads/website-images/images/footer-img-1.png') }}"
                                alt="footer-img-1">
                            <img src="{{ asset('public/uploads/website-images/images/footer-img-2.png') }}"
                                alt="footer-img-2">
                            <img src="{{ asset('public/uploads/website-images/images/footer-img-4.png') }}"
                                alt="footer-img-4">
                            <img src="{{ asset('public/uploads/website-images/images/footer-img-3.png') }}"
                                alt="footer-img-3">
                        </div>
                        <div class="col-lg-3">
                            <h6 class="text-white text-uppercase mb-2">Feedback</h6>
                            <a href="#" class="help-us">Help Us Improve</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom">
                <div class="col-md-4 px-0">
                    <small class="d-block text-center mb-2 text-white">{{ $footer->copyright }}</small>
                </div>
                <div class="col-md-4 px-0">
                    <p class="text-center">
                        <img src="{{ asset('public/uploads/website-images/images/stripe.png') }}" alt="card"
                            class="img-fluid me-1">
                        <img src="{{ asset('public/uploads/website-images/images/master.png') }}" alt="card"
                            class="img-fluid me-1">
                        <img src="{{ asset('public/uploads/website-images/images/visa.png') }}" alt="card"
                            class="img-fluid me-1">
                        <img src="{{ asset('public/uploads/website-images/images/paypal.png') }}" alt="card"
                            class="img-fluid">
                    </p>
                </div>
                <div class="col-md-4 px-0">
                    <ul class="wsus__footer_social">
                        @foreach ($links as $link)
                            <li><a class="facebook" href="{{ $link->link }}"><i
                                        class="{{ $link->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->

    @php
        $isAuth = false;
        if (Auth::check()) {
            $isAuth = true;
        }
        $shop_page = App\Models\ShopPage::first();
        $max_val = $shop_page->filter_price_range;
        $currencySetting = App\Models\Setting::first();
        $currency_icon = $currencySetting->currency_icon;
        $tawk_setting = App\Models\TawkChat::first();
        $cookie_consent = App\Models\CookieConsent::first();
        $setting = App\Models\Setting::first();

    @endphp
    <script>
        let filter_max_val = "{{ $max_val }}";
        let currency_icon = "{{ $currency_icon }}";
        let themeColor = "{{ $setting->theme_one }}";
    </script>

    @if ($tawk_setting->status == 1)
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = '{{ $tawk_setting->chat_link }}';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endif

    @if ($cookie_consent->status == 1)
        <script src="{{ asset('user/js/cookieconsent.min.js') }}"></script>

        <script>
            window.addEventListener("load", function() {
                window.wpcc.init({
                    "border": "{{ $cookie_consent->border }}",
                    "corners": "{{ $cookie_consent->corners }}",
                    "colors": {
                        "popup": {
                            "background": "{{ $cookie_consent->background_color }}",
                            "text": "{{ $cookie_consent->text_color }} !important",
                            "border": "{{ $cookie_consent->border_color }}"
                        },
                        "button": {
                            "background": "{{ $cookie_consent->btn_bg_color }}",
                            "text": "{{ $cookie_consent->btn_text_color }}"
                        }
                    },
                    "content": {
                        "href": "{{ route('privacy-policy') }}",
                        "message": "{{ $cookie_consent->message }}",
                        "link": "{{ $cookie_consent->link_text }}",
                        "button": "{{ $cookie_consent->btn_text }}"
                    }
                })
            });
        </script>
    @endif

    <!--bootstrap js-->
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('user/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('user/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('user/js/slick.min.js') }}"></script>
    <!--light slider js-->
    <script src="{{ asset('public/lightslider-master/dist/js/lightslider.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('user/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('user/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('user/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('user/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.countup.min.js') }}"></script>
    <!--calender js-->
    <script src="{{ asset('user/js/jquery.calendar.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('user/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('user/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('user/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('user/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('user/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('user/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('user/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('user/js/jquery.classycountdown.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('intl-tel-input-master/build/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('dropzone/min/dropzone.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script> --}}
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script>
        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif



    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $(".click_first_cat").click();
                $(".click_featured_product").click();

                $("#modalSubscribeForm").on('submit', function(e) {
                    e.preventDefault();

                    var isDemo = "{{ env('APP_VERSION') }}"
                    if (isDemo == 0) {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    $("#modal-subscribe-spinner").removeClass('d-none')
                    $("#modalSubscribeBtn").addClass('after_subscribe')
                    $("#modalSubscribeBtn").attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        data: $('#modalSubscribeForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function(response) {
                            if (response.status == 1) {
                                toastr.success(response.message);
                                $("#modal-subscribe-spinner").addClass('d-none')
                                $("#modalSubscribeBtn").removeClass('after_subscribe')
                                $("#modalSubscribeBtn").attr('disabled', false);
                                let expiredDate = $("#announcement_expired_date").val();
                                expiredDate = expiredDate * 1;
                                let date = new Date();
                                date.setDate(date.getDate() + expiredDate);
                                let nextDate = date.toISOString().slice(0, 10);
                                sessionStorage.setItem("announcementModal", "yes");
                                sessionStorage.setItem("announcementModalExpiration",
                                    nextDate);
                                $("#cross").click();

                            }

                            if (response.status == 0) {
                                toastr.error(response.message);
                                $("#modal-subscribe-spinner").addClass('d-none')
                                $("#modalSubscribeBtn").removeClass('after_subscribe')
                                $("#modalSubscribeBtn").attr('disabled', false);
                            }
                        },
                        error: function(err) {
                            toastr.error('Something went wrong');
                            $("#modal-subscribe-spinner").addClass('d-none')
                            $("#modalSubscribeBtn").removeClass('after_subscribe')
                            $("#modalSubscribeBtn").attr('disabled', false);
                        }
                    });
                })

                $("#flexCheckDefault11").on("click", function() {
                    let expiredDate = $("#announcement_expired_date").val();
                    expiredDate = expiredDate * 1;
                    let date = new Date();
                    date.setDate(date.getDate() + expiredDate);
                    let nextDate = date.toISOString().slice(0, 10);
                    sessionStorage.setItem("announcementModal", "yes");
                    sessionStorage.setItem("announcementModalExpiration", nextDate);
                    $("#cross").click();
                })

                $("#subscriberForm").on('submit', function(e) {
                    e.preventDefault();
                    var isDemo = "{{ env('APP_VERSION') }}"
                    if (isDemo == 0) {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    $("#subscribe-spinner").removeClass('d-none')
                    $("#SubscribeBtn").addClass('after_subscribe')
                    $("#SubscribeBtn").attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        data: $('#subscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function(response) {
                            if (response.status == 1) {
                                toastr.success(response.message);
                                $("#subscribe-spinner").addClass('d-none')
                                $("#SubscribeBtn").removeClass('after_subscribe')
                                $("#SubscribeBtn").attr('disabled', false);
                                $("#subscriberForm").trigger("reset");
                            }

                            if (response.status == 0) {
                                toastr.error(response.message);
                                $("#subscribe-spinner").addClass('d-none')
                                $("#SubscribeBtn").removeClass('after_subscribe')
                                $("#SubscribeBtn").attr('disabled', false);
                            }
                        },
                        error: function(err) {
                            toastr.error('Something went wrong');
                            $("#subscribe-spinner").addClass('d-none')
                            $("#SubscribeBtn").removeClass('after_subscribe')
                            $("#SubscribeBtn").attr('disabled', false);
                        }
                    });
                })

                $(".productModalVariant").on("change", function() {
                    let id = $(this).data("product");
                    calculateProductModalPrice(id);

                })



            });
        })(jQuery);

        function addToWishlist(id) {

            var isDemo = "{{ env('APP_VERSION') }}"
            if (isDemo == 0) {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            let isAuth = "{{ $isAuth }}";
            if (!isAuth) {
                toastr.error("{{ __('user.Please Login First') }}");
                return;
            }
            $.ajax({
                type: 'get',
                url: "{{ url('user/add-to-wishlist/') }}" + "/" + id,
                success: function(response) {
                    if (response.status == 1) {
                        toastr.success(response.message)

                        let currentQty = $("#wishlistQty").text();
                        currentQty = currentQty * 1 + 1 * 1;
                        $("#wishlistQty").text(currentQty);

                        let mobileMenuCurrentQty = $("#mobileMenuwishlistQty").text();
                        mobileMenuCurrentQty = mobileMenuCurrentQty * 1 + 1 * 1;
                        $("#mobileMenuwishlistQty").text(mobileMenuCurrentQty);
                    }
                    if (response.status == 0) {
                        toastr.error(response.message)
                    }
                },
                error: function(response) {
                    alert('error');
                }
            });
        }


        function calculateProductModalPrice(productId) {
            $.ajax({
                type: 'get',
                data: $('#productModalFormId-' + productId).serialize(),
                url: "{{ route('calculate-product-price') }}",
                success: function(response) {
                    let qty = $("#productModalQty-" + productId).val();
                    let price = response.productPrice * qty;
                    price = price.toFixed(2);
                    $("#productModalPrice-" + productId).text(price);
                    $("#mainProductModalPrice-" + productId).text(price);
                },
                error: function(err) {
                    alert('error')
                }
            });

        }

        function productModalIncrement(id, current_stock) {
            let qty = $("#productModalQty-" + id).val();
            if (parseInt(qty) < parseInt(current_stock)) {
                qty = qty * 1 + 1 * 1;
                $("#productModalQty-" + id).val(qty);
                calculateProductModalPrice(id)
            }

        }

        function productModalDecrement(id) {
            let qty = $("#productModalQty-" + id).val();
            if (qty > 1) {
                qty = qty - 1;
                $("#productModalQty-" + id).val(qty);
                calculateProductModalPrice(id)
            }

        }

        function addToCartMainProduct(productId) {
            addToCartInProductModal(productId);
        }


        function addToCartInProductModal(productId) {
            $.ajax({
                type: 'get',
                data: $('#productModalFormId-' + productId).serialize(),
                url: "{{ route('add-to-cart') }}",
                success: function(response) {
                    if (response.status == 0) {
                        toastr.error(response.message)
                    }
                    if (response.status == 1) {
                        toastr.success(response.message)
                        $.ajax({
                            type: 'get',
                            url: "{{ route('load-sidebar-cart') }}",
                            success: function(response) {
                                $("#load_sidebar_cart").html(response)
                                $.ajax({
                                    type: 'get',
                                    url: "{{ route('get-cart-qty') }}",
                                    success: function(response) {
                                        $("#cartQty").text(response.qty);
                                        $("#productModalView-" + productId).modal(
                                            'hide');
                                    },
                                });
                            },
                        });
                    }
                },
                error: function(response) {

                }
            });
        }

        function addToBuyNow(id) {
            $.ajax({
                type: 'get',
                data: $('#productModalFormId-' + id).serialize(),
                url: "{{ route('add-to-cart') }}",
                success: function(response) {
                    if (response.status == 0) {
                        toastr.error(response.message)
                    }
                    if (response.status == 1) {
                        window.location.href = "{{ route('cart') }}";
                        toastr.success(response.message)
                        $.ajax({
                            type: 'get',
                            url: "{{ route('load-sidebar-cart') }}",
                            success: function(response) {
                                $("#load_sidebar_cart").html(response)
                                $.ajax({
                                    type: 'get',
                                    url: "{{ route('get-cart-qty') }}",
                                    success: function(response) {
                                        $("#cartQty").text(response.qty);
                                    },
                                });
                            },
                        });
                    }
                },
                error: function(response) {

                }
            });
        }

        function sidebarCartItemRemove(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('sidebar-cart-item-remove') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response.message)
                    let ifCheckoutPage =
                        "{{ Route::is('user.checkout.payment') || Route::is('user.checkout.checkout') || Route::is('user.checkout.billing-address') ? 'yes' : 'no' }}";
                    if (ifCheckoutPage == 'yes') {
                        window.location.reload();
                    }
                    $.ajax({
                        type: 'get',
                        url: "{{ route('load-sidebar-cart') }}",
                        success: function(response) {
                            $("#load_sidebar_cart").html(response)
                            $.ajax({
                                type: 'get',
                                url: "{{ route('get-cart-qty') }}",
                                success: function(response) {
                                    $("#cartQty").text(response.qty);
                                },
                            });
                        },
                    });

                    $.ajax({
                        type: 'get',
                        url: "{{ route('load-main-cart') }}",
                        success: function(response) {
                            $("#CartResponse").html(response)
                        },
                    });
                },
            });

        }

        function addToCompare(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('add-to-compare') }}" + "/" + id,
                success: function(response) {
                    if (response.status == 1) {
                        toastr.success(response.message)
                        let currentQty = $("#compareQty").text();
                        currentQty = currentQty * 1 + 1 * 1;
                        $("#compareQty").text(currentQty);

                        let mobileMenuCurrentQty = $("#mobileMenuCompareQty").text();
                        mobileMenuCurrentQty = mobileMenuCurrentQty * 1 + 1 * 1;
                        $("#mobileMenuCompareQty").text(mobileMenuCurrentQty);

                    } else {
                        toastr.error(response.message)
                    }
                },
            });

        }
    </script>
    @yield('js')
</body>

</html>

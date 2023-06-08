@php
$setting = App\Models\Setting::first();
@endphp
<style>
.dashboard-header {
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
}

.dashboard-header .profile-user-pic {
    border: 2px solid #ccc;
    border-radius: 50%;
    box-shadow: 0 2px 10px var(--theme-color);
    height: 45px;
    object-fit: contain;
    padding: 4px;
    width: 45px;
}

.dashboard-header .dropdown-toggle::after {
    display: none;
}

.dashboard-header #profContentBtn+.dropdown-menu .user-name-text {
    font-family: Inter, sans-serif;
    font-size: 10px;
    padding: 4px 16px;
}

.dashboard-header #profContentBtn+.dropdown-menu .dropdown-item {
    color: unset;
    font-size: 14px;
    padding: 4px 16px;
}

.dashboard-header #profContentBtn+.animated-dropdown {
    top: 6px !important;
}

.dashboard-header .badge {
    width: 22px;
    height: 22px;
    font-size: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 2px;
    margin-top: 6px;
}
</style>
<!--============================
        HEADER START
    ==============================-->
<header class="mb-4 dashboard-header">
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
                    <input type="email" class="form-control header-search" placeholder="Search">
                    <button type="submit" class="btn"><span class="fa fa-search text-white"></span></button>
                </form>
            </div>
            <div class="col-xl-2 col-lg-3 position-relative reg-log-cart">
                <div class="position-relative">
                    <img src="{{ asset('public/uploads/website-images/images/notify.png') }}">
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">01<span
                            class="visually-hidden">unread messages</span></span>
                </div>
                <div class="dropdown ml-auto">
                    <a class="p-0 btn dropdown-toggle rounded-circle" role="button" id="profContentBtn"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('public/uploads/website-images/images/user-profile.png') }}"
                            class="profile-user-pic">
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right animated-dropdown slideIn w-100 border-0 dark-box-shadow">
                        <b class="text-muted text-uppercase d-block mb-2 user-name-text">AB Corp.</b>
                        <hr class="my-1">
                        <a class="dropdown-item" href="https://ranglerzclients.pw/voj/logout"><span
                                class="fas fa-sign-out-alt mr-2"></span><b>Logout</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--============================
        HEADER END
    ==============================-->

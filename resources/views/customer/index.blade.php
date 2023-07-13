@extends('customer.layout.master')
@section('title', '')
@section('content')
    <style>
        .admin-main-content {
            border: 1px solid #CCCCCC;
        }

        .dashboard-front-pg .btn {
            border: 1px solid #CCCCCC;
            height: 50px
        }

        .dashboard-front-pg .btn:focus {
            outline: none;
            box-shadow: none;
        }

        .dashboard-front-pg .dropdown-toggle {
            font-style: normal;
            font-weight: 600;
            font-size: 14px;

        }

        .dashboard-front-pg .dropdown-toggle::after {
            color: #B0191E;
        }

        .dashboard-front-pg .progress-cards p {
            color: #525252;
        }

        .dashboard-front-pg .progress-cards img {
            height: 20%;
            width: 20%;
            object-fit: cover;
        }

        .dashboard-front-pg .progress,
        .progress-bar {
            height: 8.68px;
        }

        .dashboard-front-pg .progress-bar {
            background: #B0191E;
        }

        .dashboard-front-pg .strong {
            font-size: 18px;
            font-weight: 700;
            color: #292929;
        }

        .dashboard-front-pg .per {
            font-size: 14px;
            font-weight: 700;
        }

        .dashboard-front-pg .per-category {
            font-size: 14px;
            font-weight: 600;
        }

        .barchart-Wrapper {
            display: table;
            position: relative;
            margin: 20px 0;
            height: 252px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
        }

        .barChart-Container {
            display: table-cell;
            width: 100%;
            height: 100%;
            padding-left: 15px;
        }

        .barchart {
            display: table;
            table-layout: fixed;
            height: 100%;
            width: 100%;
        }

        .barchart-Col {
            position: relative;
            vertical-align: bottom;
            display: table-cell;
            height: 100%;
        }

        .barchart-Col+.barchart-Col {
            border-left: 4px solid transparent;
        }

        .barchart-Bar {
            position: relative;
            height: 0;
            transition: height 0.5s 2s;
            width: 15px;
            margin: auto;
        }

        .barchart-Bar:after {
            content: attr(attr-height);
            color: white;
            position: absolute;
            text-align: center;
            width: 100%;
        }

        .barchart-TimeCol {
            position: absolute;
            top: 0;
            height: 100%;
            width: 100%;
        }

        .barchart-Time {
            height: 18%;
            vertical-align: middle;
            position: relative;
        }

        .barchart-Time:after {
            content: "";
            position: absolute;
            width: 100%;
            left: 0;
            top: 0em;
        }

        .barchart-TimeText {
            position: absolute;
            z-index: 1;
            background: white;
            padding-right: 5px;
            color: #4d4d4d;
            font-size: 12px;
            font-family: 'Avenir Medium';
        }

        .bar-line {
            background: #B0191E;
            border-radius: 4px;
        }

        .barchart-BarFooter {
            position: absolute;
            text-align: center;
            height: 10%;
            width: 100%;
        }

        .month {
            font-size: 12px;
        }

        .dashboard-front-pg table .circle-success {
            color: #4CE13F;
            font-size: 10px;
        }

        .dashboard-front-pg table .circle-pending {
            color: #F29A2E;
            font-size: 10px;
        }

        .dashboard-front-pg table .circle-cancel {
            color: #EF0606;
            font-size: 10px;
        }

        .dashboard-front-pg .days-percentage .p-font {
            font-size: 12px;
        }

        .dashboard-front-pg .days-percentage {
            background: #F9F9F9;
        }

        .dashboard-front-pg .days-percentage img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .dashboard-front-pg .min {
            overflow: auto;
        }

        .dashboard-front-pg table {
            min-width: 800px;
        }

        .dashboard-front-pg .fa-circle {
            font-size: 7px;
            color: #03a4ff;
        }

        .dashboard-front-pg .circle2 {
            font-size: 7px;
            color: #CCCCCC;
        }

        .dashboard-front-pg .small {
            font-size: 9px;
            color: #4d4d4d;
            font-weight: 600;
        }

        .dashboard-front-pg .danger {
            color: #B0191E;
            font-weight: 600;
        }
    </style>
    <div class="p-xl-4 p-2 admin-main-content">
        <div class="admin-main-content-inner">
            <div class="dashboard-front-pg">
                <div class="d-flex px-1 align-items-center">
                    <img src="{{ asset('public/uploads/dashboard-img.png') }}" class="img-fluid" height="30px" width="30px">
                    <h4 class="ms-3 text-black d-none d-sm-block">Dashboard</h4>
                </div>
                <div class="mt-3 px-1 d-flex justify-content-between align-items-center">
                    <h6>Welcome Back, John Doe!</h6>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Last 30 Days
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="progress-cards">
                    <div class="row mx-0 mt-3">
                        <div class="col-md-4 px-1">
                            <div class="border rounded p-2 d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mt-3 mb-2 per">Total Spent</p>
                                    <h4>$20.4K</h4>
                                    <p class="mt-2 mb-3">2023 Year Spent</p>
                                </div>
                                <img src="{{ asset('public/uploads/blue-line.png') }}" class="img-fluid text-end">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="border rounded p-2 d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mt-3 mb-2 per">Return Orders</p>
                                    <h4>3</h4>
                                    <p class="mt-2 mb-3">Total Return Units</p>
                                </div>
                                <img src="{{ asset('public/uploads/red-line.png') }}" class="img-fluid text-end">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="border rounded p-2 d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mt-3 mb-2 per">Total Orders</p>
                                    <h4>13</h4>
                                    <p class="mt-2 mb-3">2023 Year orders placed</p>
                                </div>
                                <img src="{{ asset('public/uploads/orange-line.png') }}" class="img-fluid text-end">
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 mt-3">
                        <div class="col-md-8 px-1">
                            <div class="border p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>Order Overview</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="small"><span class="fas fa-circle circle1 p-1"></span>Order</small>
                                        <small class="small ms-2"><span
                                                class="fas fa-circle circle2 p-1"></span>Returns</small>
                                    </div>
                                </div>
                                <div class="d-flex my-2">
                                    <strong>$20.4K</strong>
                                    <div>
                                        <small class="danger ms-3"><span class="fas fa-arrow-up danger me-2"></span>5% than
                                            last month</small>
                                    </div>
                                </div>
                                <canvas id="canvas"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="border rounded p-3 pb-3">
                                <h6>Most Ordered Items</h6>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="per-category">Motors</p>
                                    <p class="per">70%</p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <p class="per-category">Bearings</p>
                                    <p class="per">40%</p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <p class="per-category">Connectors</p>
                                    <p class="per">60%</p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <p class="per-category">Motor Accessories</p>
                                    <p class="per">80%</p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <p class="per-category">Others</p>
                                    <p class="per">20%</p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-1">
                    <div class="border rounded min mt-3 p-3">
                        <h6 class="mb-2">Recent Orders</h6>
                        <div class="border rounded">
                            <table class="table table-borderless table-striped mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <td>Products</td>
                                        <td>Order ID</td>
                                        <td>Date</td>
                                        <td>Supplier name</td>
                                        <td>Status</td>
                                        <td>Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-success"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-pending"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-success"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-cancel"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-pending"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>#857</td>
                                        <td>Jun 29, 2023</td>
                                        <td>Hassan</td>
                                        <td><span class="fas fa-circle circle-success"></span> delivered</td>
                                        <td>500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-4 px-1">
                    <h6>My Popular Items</h6>
                    <div class="row featured-products">
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
                                    <span class="price">$7,800.00</span>
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
                                    <img src="{{ asset('public/uploads/website-images/images/engine7.png') }}">
                                    <a href="" class="position-absolute text-white quick-view">Quick View</a>
                                </div>
                                <button class="btn btn-bg add-cart-btn w-100 rounded-0">Add to Cart</button>
                                <div class="p-3">
                                    <h6 class="mb-2">Air Compressor Motor</h6>
                                    <span class="price">$229.00</span>
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
                                    <h6 class="mb-2">Hydraulic Motor</h6>
                                    <span class="price">$1,600.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var chartOptions = {
            responsive: true,
            legend: {
                display: false,
                position: "top"
            },
            title: {
                display: true,
                text: ""
            },
            scales: {
                yAxes: [{
                    ticks: {
                        callback: function(value, index, values) {
                            if (value % 20 == 0) {
                                return value + 'K';
                            }
                        }
                    }
                }]
            }
        };

        var chartData = {
            labels: [
                "Jan",
                "Feb",
                "March",
                "Apr",
                "May",
                "June",
                "July",
                "Aug",
                "Sep"
            ],
            datasets: [{
                    label: "",
                    backgroundColor: "#03A4FF",
                    borderWidth: 0,
                    data: [95, 65, 70, 60, 65, 40, 60, 75, 65]
                },
                {
                    label: "",
                    backgroundColor: "#B0191E",
                    borderWidth: 0,
                    data: [0, 0, 25, 85, 0, 25, 0, 0, 55]
                }
            ]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: "bar",
                data: chartData,
                options: chartOptions
            });
        };
    </script>
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('error'))
        <script>
            toastr.error('{{ \Illuminate\Support\Facades\Session::get('error') }}');
        </script>
    @endif
@endsection

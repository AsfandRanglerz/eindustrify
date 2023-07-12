@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <style>
        .vendor-order-content .order-btn {
            background: #B0191E;
            padding: 10px 20px 10px 20px;
        }

        .vendor-order-content .order-btn:focus {
            box-shadow: none;
        }

        .vendor-order-content .all-dropdown {
            background: #EFD1D2;
            color: #B0191E;
        }

        .vendor-order-content .all-dropdown-c {
            color: #B0191E !important;
        }

        .vendor-order-content .nav-link {
            font-weight: 600;
        }

        .vendor-order-content .p {
            font-size: 14px;
        }

        .vendor-order-content .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }

        .vendor-order-content .toggle-arrow .dropdown-toggle::after {
            margin-left: 40%;
        }

        .vendor-order-content table .circle-success {
            color: #4CE13F;
            font-size: 12px;
        }

        .vendor-order-content table .circle-pending {
            color: #F29A2E;
            font-size: 12px;
        }

        .vendor-order-content table .circle-canceled {
            color: #EF0606;
            font-size: 12px;
        }

        .vendor-order-content table .fa-eye,
        .fa-trash {
            color: #7F7F7F;
            cursor: pointer;
        }

        .vendor-order-content table .fa-trash:hover {
            color: #B0191E;
        }

        .vendor-order-content table td {
            vertical-align: middle;
        }

        .vendor-order-content input[type=text] {
            width: 0;
            border: 1px solid #ccc;
            border-radius: 0px;
            background-color: white;
        }

        #searchInput {
            padding: 10px;
            font-size: 16px;
            background-image: url(public/uploads/website-images/images/icon-search.png);
            background-repeat: no-repeat;
            background-position: 12px center;
            padding-left: 30px;
        }

        .vendor-order-content .min {
            overflow: auto;
        }

        .vendor-order-content table {
            min-width: 800px;
        }

        .vendor-order-content input[type=text]:focus {
            width: 100%;
        }

        .vendor-order-content input:focus+.fa-search-icon {
            display: none;
        }

        .vendor-order-content .fa-search-icon:hover {
            display: none;
        }

        .vendor-order-content .search {
            margin-bottom: 30px;
        }


        .vendor-order-content [data-filter-item] {
            padding: 15px;
            border: 1px solid #fff;
        }

        .vendor-order-content .sort-by {
            margin-top: -8px
        }

        .admin-main-content .navbar-nav .nav-link.active, .admin-main-content .navbar-nav .navbar-nav .show>.nav-link {
            background: #EFD1D2;
            color: #B0191E;
        }
    </style>
    <div class="p-xl-4 p-2 admin-main-content border">
        <div class="vendor-order-content">
            <div class="d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/product-icon.png') }}" class="img-fluid" height="30px" width="30px">
                    <h4 class="ms-3 text-black d-none d-sm-block">Orders</h4>
                </div>
                <div class="d-flex align-items-center">
                    <h6>Export</h6>
                    <a href="" class="btn order-btn ms-3 rounded-0 text-white">Delete</a>
                    <a href="" class="btn order-btn ms-3 rounded-0 text-white">Create Order</a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="w-100">
                    <div class="collapse navbar-collapse border p-2 mt-3" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 base nav" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="allTab" data-bs-toggle="tab"
                                    data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                    aria-selected="true">All</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="deliveredTab" data-bs-toggle="tab"
                                    data-bs-target="#delivered" type="button" role="tab" aria-controls="delivered"
                                    aria-selected="true">Delivered</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pendingTab" data-bs-toggle="tab" data-bs-target="#pending"
                                    type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="canceledTab" data-bs-toggle="tab" data-bs-target="#canceled"
                                    type="button" role="tab" aria-controls="canceled" aria-selected="false">Canceled</a>
                            </li>
                        </ul>
                        <form class="d-flex justify-content-center align-items-center ">
                            <input type="text" id="searchInput" class="m-2" placeholder="Search...">
                        </form>
                        <fieldset class="sort-by">
                            <legend>SORT BY</legend>
                            <div class="dropdown">
                                <a class="btn ps-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">Top Reviews</a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </fieldset>

                    </div>
                </div>
            </nav>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="allTab">
                    <div class="mt-2 table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead class="table-dark align-items-center">
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Products</td>
                                    <td>Order ID</td>
                                    <td>Date</td>
                                    <td>Customer name</td>
                                    <td>Status</td>
                                    <td>Amount</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-success"></span> Delivered</td>
                                    <td>$400.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-pending"></span> Pending</td>
                                    <td>$288.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td class="d-flex align-items-center"><img
                                            src="{{ asset('public/uploads/website-images/images/return-request.png') }}"
                                            width="14" class="me-1" /> Return Requested</td>
                                    <td>$500.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-canceled"></span> Canceled</td>
                                    <td>$500.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="delivered" role="tabpanel" aria-labelledby="deliveredTab">
                    <div class="mt-2 table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead class="table-dark align-items-center">
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike">
                                        </form>
                                    </td>
                                    <td>Products</td>
                                    <td>Order ID</td>
                                    <td>Date</td>
                                    <td>Customer name</td>
                                    <td>Status</td>
                                    <td>Amount</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike">
                                        </form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-success"></span> Delivered</td>
                                    <td>$400.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pendingTab">
                    <div class="mt-2 table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead class="table-dark align-items-center">
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike">
                                        </form>
                                    </td>
                                    <td>Products</td>
                                    <td>Order ID</td>
                                    <td>Date</td>
                                    <td>Customer name</td>
                                    <td>Status</td>
                                    <td>Amount</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike">
                                        </form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-pending"></span> Pending</td>
                                    <td>$288.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceledTab">
                    <div class="mt-2 table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead class="table-dark align-items-center">
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Products</td>
                                    <td>Order ID</td>
                                    <td>Date</td>
                                    <td>Customer name</td>
                                    <td>Status</td>
                                    <td>Amount</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form action="/action_page.php"><input type="checkbox" id="vehicle1"
                                                class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                                    </td>
                                    <td>Product Name</td>
                                    <td>#11232</td>
                                    <td>Jun 29,2023</td>
                                    <td>John Doe</td>
                                    <td><span class="fas fa-circle circle-canceled"></span> Canceled</td>
                                    <td>$500.00</td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fas fa-eye"></i>
                                            <i class="fas fa-trash ms-2"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-md-4">
        <p>Learn more about <a href=""><strong class="text-underline">product</strong></a></p>
    </div>
@endsection
@section('scripts')
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
    <script>
        $(function() {
            $('#checkAll').click(function() {
                $(this).closest('.table').find('.check').prop('checked', $(this).prop('checked'));
            });
            $('#searchInput').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('table tr').each(function() {
                    var lineText = $(this).text().toLowerCase();
                    if (lineText.indexOf(searchTerm) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
@endsection

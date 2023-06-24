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
            font-size: 10px;
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
            width: 70px;
            border: 1px solid #ccc;
            border-radius: 0px;
            background-color: white;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.5s ease-in-out;
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

        .vendor-order-content .base {
            align-items: baseline;
        }

        .vendor-order-content td{
            font-size:12px;
        }

        .vendor-order-content [data-filter-item] {
            padding: 15px;
            border: 1px solid #fff;
        }

        .vendor-order-content .hidden {
            display: none;
        }

        .vendor-order-content .sort-by {
            margin-top: -8px
        }
    </style>


    {{-- <div class="p-xl-4  p-2 admin-main-content border">
        <div class="vendor-order-content">
            <div class="d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/product-icon.png') }}" class="img-fluid" height="30px" width="30px">
                    <h4 class="ms-3 text-black d-none d-sm-block">Products</h4>
                </div>
                <div class="d-flex align-items-center">
                    <h6 class="text-end me-3">Export</h6>
                    <h6>Import</h6>
                    <a href="{{URL('add-product')}}" class="btn order-btn ms-3 rounded-0 text-white">Add Product</a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="w-100">
                    <div class="collapse navbar-collapse border p-2 mt-3" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 base">
                            <li class="nav-item all-dropdown dropdown">
                                <a class="nav-link dropdown-toggle all-dropdown-c" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    All
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Draft</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"
                                    id="deleteProducts">Delete</a>
                            </li>
                        </ul>
                        <form class="d-flex justify-content-center align-items-center ">
                            <input type="text" class="p-2 m-2 rounded-0 search" id="searchInput" placeholder="search"
                                data-search />
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
            <div class=" rounded min pt-3 items">
                <table class="table table-striped table-borderless">
                    <thead class="table-dark align-items-center">
                        <tr>
                            <td>
                                <form action="/action_page.php"><input type="checkbox" id="checkAll"
                                        class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                            </td>
                            <td class="text-center">Products</td>
                            <td>Status</td>
                            <td>Inventory</td>
                            <td>Type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ URL('delete-all-products') }}" id="myForm" method="POST">
                            @csrf
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="vehicle1" class="check form-check-input ms-3"
                                            name="id[]" value="{{ $product->id }}">

                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset($product->thumb_image) }}" class="img-fluid" height="45px"
                                                width="45px">
                                            <p class="ms-2 p">{{ $product->name }}</p>
                                        </div>
                                    </td>
                                    @if ($product->status == 1)
                                        <td><span class="fas fa-circle circle-success"></span> Active</td>
                                    @else
                                        <td><span class="fas fa-circle circle-danger"></span> Deactive</td>
                                    @endif
                                    <td>{{ $product->qty }}</td>
                                    <td>@if(isset($product->category)){{ $product->category->name }}@endif</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-eye"></i>
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn-sm" onclick="deleteData({{ $product->id }})"><i
                                                    class="fas fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center mt-md-4">
        <p>Learn more about <a href=""><strong class="text-underline">product</strong></a></p>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('admin.Item Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('admin.Are You sure delete this item ?') }}</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">{{ __('admin.Yes, Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="p-xl-4  p-2 admin-main-content border">
        <div class="vendor-order-content">
        <div class="d-flex justify-content-between ">
        <div class="d-flex align-items-center">
        <img src="{{ asset('public/uploads/product-icon.png') }}" class="img-fluid" height="30px" width="30px">
        <h4 class="ms-3 text-black d-none d-sm-block">Products</h4>
        </div>
        <div class="d-flex align-items-center">
        <h6 class="text-end me-3">Export</h6>
        <h6>Import</h6>
        <a href="" class="btn order-btn ms-3 rounded-0 text-white">Add Product</a>
        </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="w-100">
            <div class="collapse navbar-collapse border p-2 mt-3" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 base">
              <li class="nav-item all-dropdown dropdown">
                  <a class="nav-link dropdown-toggle all-dropdown-c" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    All
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Draft</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Delete</a>
                </li>
              </ul>
              <form class="d-flex justify-content-center align-items-center ">
                <input type="text" class="p-2 m-2 rounded-0 search" id="searchInput" placeholder="search" data-search />
              </form>
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
          </div>
        </nav>
        <div class=" rounded min pt-3 items">
            <table class="table table-striped table-borderless">
              <thead class="table-dark align-items-center">
                <tr>
                  <td>
                    <form action="/action_page.php"><input type="checkbox" id="checkAll" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td colspan="2">Products</td>

                  <td>Status</td>
                  <td>Inventory</td>
                  <td>Type</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td >
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td >
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td>
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td >
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td >
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  Active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr >
                <td >
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
                  <td>
                    <div class="d-flex">
                    <i class="fas fa-eye"></i>
                    <i class="fas fa-trash ms-2"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                <td>
                    <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
                </td>
                <td class="">
                  <img src="{{ asset('public/uploads/motor-img.png') }}" class="img-fluid" height="50px" width="50px">
                  </td>
                  <td> Mophorn 3 HP Electric Motor 1 Phase AC <br> Motor 3450rpm 60Hz 56 Frame SPL Rot-CCW</td>
                  <td><span class="fas fa-circle circle-success"></span>  active</td>
                  <td>294 instock for 4 variants</td>
                  <td>Electric Motor</td>
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
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('product-delete') }}' + "/" + id)
        }
        $(document).ready(function() {
            $("#deleteProducts").click(function(event) {
                event.preventDefault(); // Prevents the default behavior of the anchor tag

                $("#myForm").submit(); // Submits the form
                $("#myForm").remove(); // Removes the form from the DOM
            });
        });
        $(document).ready(function() {
            $("#checkAll").click(function() {
                $(".check").prop('checked', $(this).prop('checked'));
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

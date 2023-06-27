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

        .vendor-order-content .all-dropdown1 {
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

        /*
            .vendor-order-content td{
                font-size:12px;
            } */

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

        .vendor-order-content td {
            text-align: center;
        }

        /* .vendor-order-content table td:first-child {
                text-align:center;
            } */
    </style>

    <div class="p-xl-4  p-2 admin-main-content border">
        <div class="vendor-order-content">
            <div class="d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/tech-img.png') }}" class="img-fluid" height="30px" width="30px">
                    <h4 class="ms-3 text-black d-none d-sm-block">Technical Support</h4>
                </div>
                <div class="">
                    <a href="{{ URL('new-ticket') }}" class="btn order-btn ms-3 rounded-0 text-white">New Ticket</a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="w-100">
                    <div class="collapse navbar-collapse border p-2 mt-3" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 base">
                            <li class="nav-item all-dropdown1 dropdown">
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
                                <a class="nav-link" href="#">Open</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Closed</a>
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
                            <td>Ticket ID</td>
                            <td>Category</td>
                            <td>Date</td>
                            <td>Subject</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>#{{$ticket->ticket_no}}</td>
                            <td>Finance</td>
                            <td>{{$ticket->date}}</td>
                            <td>{{$ticket->subject}}</td>
                            <td><span class="fas fa-circle circle-success"></span> {{$ticket->status}}</td>
                            <td>
                                <ul>
                                    <li class="nav-item all-dropdown ">
                                        <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('public/uploads/dotted-img.png') }}" class="img-fluid">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
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

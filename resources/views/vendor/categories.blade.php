@extends('vendor.layout.master')
@section('title', '')
@section('content')

<style>
.vendor-order-content .order-btn{
    background:#B0191E;
    padding: 10px 20px 10px 20px;
}
.vendor-order-content .order-btn:focus{
    box-shadow:none;
}
.vendor-order-content .all-dropdown{
background:#EFD1D2;
color:#B0191E;
}
.vendor-order-content .all-dropdown-c{
color:#B0191E !important;
}
.vendor-order-content .nav-link{
font-weight:600;
}
/* .vendor-order-content .p{
    font-size:14px;
} */
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
.vendor-order-content table .fa-eye, .fa-trash{
    color:#7F7F7F;
    cursor: pointer;
}
.vendor-order-content table .fa-trash:hover{
    color:#B0191E;
}
.vendor-order-content table td{
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
.vendor-order-content .min{
    overflow: auto;
}
.vendor-order-content table{
    min-width: 800px;
}
.vendor-order-content input[type=text]:focus {
  width: 100%;
}
.vendor-order-content input:focus + .fa-search-icon {display: none;}
.vendor-order-content .fa-search-icon:hover{
    display: none;
}
.vendor-order-content .search {
	margin-bottom: 30px;
}
.vendor-order-content .base{
    align-items: baseline;
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
.vendor-order-content .padding {
   background:#F2F2F2;
}
.vendor-order-content .table-striped {
   background:#FBFBFB;
}
.vendor-order-content .table>:not(caption)>*>*{
    padding: 1.5rem 0.5rem;
}
</style>


<div class="p-xl-4  p-2 admin-main-content border">
<div class="vendor-order-content">
<div class="d-flex justify-content-between ">
<div class="d-flex align-items-center">
<img src="{{ asset('public/uploads/category-img.png') }}" class="img-fluid" height="30px" width="30px">
<h4 class="ms-3 text-black d-none d-sm-block">Categories</h4>
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
          <td class="text-center">Title</td>
          <td>Products</td>
          <td>Product conditions</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <tr class="">
        <td>
            <form action="/action_page.php"><input type="checkbox" id="vehicle1" class="check form-check-input ms-3" name="vehicle1" value="Bike"></form>
        </td>
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">DC Motors</p>
          </div></td>

          <td>220</td>
          <td>Product title contains Lubricant Oils
            Product <br> Tag is equal to Lubricant Oils</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Motors Accessories</p>
          </div></td>

          <td>220</td>
          <td>Product title contains Motor
            Product <br> Tag is equal to Motors Accessories</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">AC Motors</p>
          </div></td>

          <td>220</td>
          <td>Product title contains AC Motor
            Product <br> Tag is equal to AC Motor</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Lubricant Oils</p>
          </div></td>

          <td>220</td>
          <td>Product title contains Lubricant Oils
            Product <br> Tag is equal to Lubricant Oils</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Motor Capacitor</p>
          </div></td>

          <td>220</td>
          <td>Product title contains Motor
            Product <br> Tag is equal to Motor Capacitor</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Gearing</p>
          </div></td>

          <td>220</td>
          <td>Product Tag is equal to Gearing</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Coupling</p>
          </div></td>

          <td>220</td>
          <td>Product Tag is equal to Coupling</td>
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
        <td>    <div class="d-flex align-items-center justify-content-start">
          <img src="{{ asset('public/uploads/flat-img.png') }}" class="img-fluid padding p-2" height="45px" width="45px">
          <p class="ms-2 p">Linear Motion</p>
          </div></td>

          <td>220</td>
          <td>Product title contains Linear Motion
            Product <br> Tag is equal to Linear Motion</td>
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
<script>
$(document).ready(function() {
    $("#checkAll").click(function () {
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

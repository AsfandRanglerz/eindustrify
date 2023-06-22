@extends('vendor.layout.master')
@section('title', '')
@section('content')
<style>
.admin-main-content {
    border:1px solid #CCCCCC;
}
.dashboard-front-pg .btn{
border:1px solid #CCCCCC;
height:50px
 }
.dashboard-front-pg .btn:focus {
    outline: none;
    box-shadow: none;
}

.dashboard-front-pg .dropdown-toggle{
font-style: normal;
font-weight: 600;
font-size: 14px;

}
.dashboard-front-pg .dropdown-toggle::after{
    color: #B0191E;
}
.dashboard-front-pg .progress-cards p{
color: #525252;
}
.dashboard-front-pg .progress-cards img{
height:20%;
width: 20%;
object-fit:cover;
}
.dashboard-front-pg .progress, .progress-bar{
    height: 8.68px;
}
.dashboard-front-pg .progress-bar{
    background: #B0191E;
}
.dashboard-front-pg .strong{
    font-size:18px;
    font-weight:700;
    color: #292929;
}

.dashboard-front-pg .per{
    font-size:14px;
    font-weight:700;
}
.dashboard-front-pg .per-category{
    font-size:14px;
    font-weight:600;
}

.barchart-Wrapper {
      display: table;
      position: relative;
      margin: 20px 0;
      height: 252px;
      border:1px solid #CCCCCC;
      border-radius:4px;
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
    .barchart-Col + .barchart-Col {
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
    .bar-line{
        background:#B0191E;
        border-radius:4px;
    }
    .barchart-BarFooter {
      position: absolute;
      text-align: center;
      height: 10%;
      width: 100%;
    }
    .month{
        font-size:12px;
    }
    .dashboard-front-pg table .circle-success {
        color: #4CE13F;
        font-size: 10px;
      }
      .dashboard-front-pg  table .circle-pending{
        color: #F29A2E;
        font-size: 10px;
      }
      .dashboard-front-pg  table .circle-cancel{
        color: #EF0606;
        font-size: 10px;
      }
      .dashboard-front-pg  .days-percentage .p-font{
        font-size: 12px;
      }
      .dashboard-front-pg  .days-percentage{
        background: #F9F9F9;
      }

    .dashboard-front-pg .days-percentage img {
    width: 200px;
    height: 200px;
    object-fit: cover;
}
      .dashboard-front-pg  .min{
    overflow: auto;
    }

    .dashboard-front-pg  table{
    min-width: 800px;
}
    .dashboard-front-pg  .fa-circle{
    font-size:7px;
    color:#B0191E;
}
    .dashboard-front-pg  .circle2{
    font-size:7px;
    color:#CCCCCC;
}
    .dashboard-front-pg  .small{
    font-size:9px;
    color:#4d4d4d;
    font-weight:600;
}
    .dashboard-front-pg  .danger{
    color:#B0191E;
    font-weight:600;
}




</style>
<div class="p-xl-4 p-2 admin-main-content">
      <div class="admin-main-content-inner">
      <div class="dashboard-front-pg">
      <div class="d-flex align-items-center">
    <img src="{{ asset('public/uploads/dashboard-img.png') }}" class="img-fluid" height="30px" width="30px">
<h4 class="ms-3 text-black d-none d-sm-block">Dashboard</h4>
</div>
    <div class="mt-4 d-flex justify-content-between align-items-center">
    <h6>Here’s what’s happening with your store.</h6>
    <div class="dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        6 june 23 - 10 june 23
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
    </div>
    <div class="progress-cards">
      <div class="row mt-3">
      <div class="col-md-4">
        <div class="border rounded p-2 d-flex justify-content-between align-items-center">
            <div>
            <p class="mt-3 mb-2">Todays Sales</p>
            <strong>$20.4K</strong>
            <p class="mt-2 mb-3">We have sold 123 items</p>
            </div>
            <img src="{{ asset('public/uploads/blue-line.png') }}" class="img-fluid text-end">
        </div>
        </div>

        <div class="col-md-4">
        <div class="border rounded p-2 d-flex justify-content-between align-items-center">
            <div>
            <p class="mt-3 mb-2">Todays Sales</p>
            <strong>$20.4K</strong>
            <p class="mt-2 mb-3">We have sold 123 items</p>
            </div>
            <img src="{{ asset('public/uploads/red-line.png') }}" class="img-fluid text-end">
        </div>
        </div>

        <div class="col-md-4">
        <div class="border rounded p-2 d-flex justify-content-between align-items-center">
            <div>
            <p class="mt-3 mb-2">Todays Sales</p>
            <strong>$20.4K</strong>
            <p class="mt-2 mb-3">We have sold 123 items</p>
            </div>
            <img src="{{ asset('public/uploads/orange-line.png') }}" class="img-fluid text-end">
        </div>
        </div>
      </div>
<div class="row mt-3">
    <div class="col-md-8">
    <div class="border p-2 pb-4">
    <div class="d-flex mt-2 align-items-center justify-content-between">
    <p class="per">Total Revenue</p>
    <div class="d-flex align-items-center">
    <small class="small"><span class="fas fa-circle circle1 p-1"></span>Profit</small>
    <small class="small ms-2"><span class="fas fa-circle circle2 p-1"></span>Loss</small>
    </div>
    </div>
    <div class="d-flex mt-2">
        <strong>$50.4K</strong>
       <div>
        <small class="danger ms-3"><span class="fas fa-arrow-up danger me-2"></span>5% than last month</small>
       </div>
    </div>
        <canvas id="canvas"></canvas>
    </div>
    </div>

        <div class="col-md-4">
            <div class="border rounded p-3 pb-3">
            <strong class="strong">Most Sold Items</strong>
            <div class="d-flex justify-content-between mt-2">
                <p class="per-category">Motors</p>
                <p class="per">70%</p>
            </div>
          <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between mt-3">
                <p class="per-category">Bearings</p>
                <p class="per">40%</p>
            </div>
          <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between mt-3">
                <p class="per-category">Connectors</p>
                <p class="per">60%</p>
            </div>
          <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between mt-3">
                <p class="per-category">Motor Accessories</p>
                <p class="per">80%</p>
            </div>
          <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between mt-3">
                <p class="per-category">Others</p>
                <p class="per">20%</p>
            </div>
          <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </div>
        </div>
        </div>
    </div>
    <div class="border rounded min mt-3">
    <table class="table table-borderless table-striped ">
      <thead class="table-dark">
        <tr>
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
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-success"></span> delivered</td>
          <td>500</td>
          <td>
            <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
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
        <tr>
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-pending"></span> delivered</td>
          <td>500</td>
          <td>        <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        </ul></td>
        </tr>
        <tr>
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-success"></span> delivered</td>
          <td>500</td>
          <td>        <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        </ul></td>
        </tr>
        <tr>
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-cancel"></span> delivered</td>
          <td>500</td>
          <td>        <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        </ul></td>
        </tr>
        <tr>
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-pending"></span> delivered</td>
          <td>500</td>
          <td>        <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        </ul></td>
        </tr>
        <tr>
          <td>product name</td>
          <td>#857</td>
          <td>01 23 2020</td>
          <td>Hassan</td>
          <td><span class="fas fa-circle circle-success"></span> delivered</td>
          <td>500</td>
          <td>        <ul>
            <li class="nav-item all-dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ...
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        </ul></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="days-percentage mt-3 border rounded">
    <div class="text-start d-flex align-items-center justify-content-between">
      <div class="p-3">
      <h4 class="text-start text-lowercase mb-3 ">In the last 7 days</h4>
      <p><strong class="text-danger">62%</strong> of all your orders came from North America Region</p>
      <p class="p-font">You had 284 orders from North America Region.</p>
      </div>

        <img src="{{ asset('public/uploads/map-img.png') }}" class="img-fluid me-md-5">

    </div>
  </div>
  </div>
  </div>
</div>
@endsection
@section('scripts')
<script>

var barChartData = {
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
  datasets: [
    {
      label: "",
      backgroundColor: "#B0191E",
      borderWidth: 0,
      data: [4, 7, 3, 6, 10,7,4,6,7]
    },
    {
      label: "",
      backgroundColor: "#CCCCCC",
      borderWidth: 0,
      data: [6,9,7,3,10,7,4,6,6]
    }
  ]
};

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
        beginAtZero: true
      }
    }],
    xAxes: [{
      barPercentage: 0.6 // Adjust this value to resize the bars (0.6 means 60% of the available space)
    }]
  }
};

window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: "bar",
    data: barChartData,
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

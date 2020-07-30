<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Gates</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/respovsive.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/algolia.css') }}" rel="stylesheet"> -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        main > .container {
            padding: 60px 15px 0;
        }

        .footer {
            background-color: #f5f5f5;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }
    /* Sidebar */
    .sidebar {
        position: fixed;
        width:240px;
        padding: 60px 5px 0; /* Height of navbar */
    }
    .nav-link {
        color:#fff;
    }
/*sidebar treeview*/

/* Remove default bullets */
ul, #nav {
  list-style-type: none;
}

/* Hide the nested list */
.nested {
  display: none;
}
.nested2 {
  display: none;
}
/* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
.active {

  display: block;

}
</style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

<!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="#">Gatesboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li style="margin-left:60px;" class="nav-item active">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/cart">Cart 
                @if (Session::get('cart')) ({{ Session::get('cart')->totalQty }})
                @else (0)
                @endif  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                  @if (Auth::user()) ({{ Auth::user()->name }})
                  @else Not logged 
                  @endif </a>
                </li>

            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

<!--Sidebar-->
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky" >
        <ul class="nav flex-column" >
          <li class="nav-item"  style="border:1px solid; margin-bottom:5px; border-color:grey;">
            <a class="nav-link active" href="/">
              <span data-feather="home"></span>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item"  style="border:1px solid; margin-top:2px; border-color:grey;color:white;">
            <a class="nav-link" href="{% url 'shop:orders'%}">
              <span data-feather="message-square"></span>
              Chat Room
            </a>
          </li>
          <li class="nav-item"  style="border:1px solid; margin-top:2px; border-color:grey;color:white;">
            <a class="nav-link" href="/customers">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="caret px-3 pt-2 pb-2"  style="border:1px solid; margin-top:2px; border-color:grey;color:white;">            
              <span data-feather="shopping-cart"></span>
              <a href="/shop"style="color:white;">Product Manager</a><i class="fa fa-angle-left pull-right"></i>
              <ul class="nested px-1 bg-dark"style="color:grey;">
                <li><a href="/shop"style="color:grey;">
                Products</a></li>
                <li>Product Status</li>
                <li>Payment Product</li>
              </ul>            
          </li>
            <li id="top" class="caret2 px-3 pt-2 pb-2" style="border:1px solid; color:white;margin-top:2px; border-color:grey;">
            <!-- <a class="nav-link" href="/orders"> -->
              <span data-feather="list"></span>
              <a href="/orders"style="color:white;">Orders Manager</a><i class="fa fa-angle-left pull-right"></i>
              <ul id="flip" class="nested2 px-1 bg-dark"style="color:grey;">
                <li><a href="/orders"style="color:grey;">
                Orders</a></li>
                <li>Order Status</li>
                <li>Payment Status</li>
              </ul>
          </li>
          <li class="nav-item" style="border:1px solid; margin-top:2px; border-color:grey;color:white;">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Production
            </a>
          </li>
          <li class="nav-item" style="border:1px solid; margin-top:2px; border-color:grey;color:white;">
            <a class="nav-link" href="{% url 'shop:orders'%}">
              <span data-feather="truck"></span>
              Shipping
            </a>
          </li>
          <li class="nav-item" style="border:1px solid; margin-top:2px; border-color:grey;">
            <a class="nav-link" href="#">
              <span data-feather="mail"></span>
              Email
            </a>
          </li>
          <li class="nav-item"style="border:1px solid; margin-top:2px; border-color:grey;">
            <a class="nav-link" href="/">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item"style="border:1px solid; margin-top:2px; border-color:grey;">
            <a class="nav-link" href="{% url 'shop:controlpanel'%}">
              <span data-feather="settings"></span>
              Control Panel
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
          <span>Advance Options</span>
          <a class="d-flex align-items-center text-muted" href="/">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item"style="border:1px solid; margin-top:2px; border-color:grey;">
            <a class="nav-link" href="#">
              <span data-feather="tag"></span>
              Coupon
            </a>
          </li>
          <li class="nav-item"style="border:1px solid; margin-top:2px; border-color:grey;">
            <a class="nav-link" href="{{ route('login') }}">
              <span data-feather="log-out"></span>
              @if (Auth::user()) Log out
              @else Login
              @endif
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!--   end sidebar -->

<!-- Begin page content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-0">
<div class="container">
    @yield('content')
</div>
</main>

  </div>
</div>
</body>
<!-- <footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script>
  'use strict'
  feather.replace()

// $(document).ready(function(){
//   $("#top").click(function(){
//     $(".li").slideDown("slow");
//   });
// });


// document.getElementsByClassName("caret").click;

// var toggler = document.getElementsByClassName("caret");
// var i;

// for (i = 0; i < toggler.length; i++) {
//   toggler[i].addEventListener("click", function() {
//     this.parentElement.querySelector(".nested").classList.toggle("active");
//     // this.classList.toggle("caret-down");
//   });
// }

// var toggler = document.getElementsByClassName("caret2");
// var i;
// for (i = 0; i < toggler.length; i++) {
//   toggler[i].addEventListener("click", function() {
//     this.parentElement.querySelector(".nested2").classList.toggle("active");
//     this.parentElement.querySelector(".nested2").classList.slideUp();
    
//     // this.classList.toggle("caret-down");
//   });
// }

</script>
</html>

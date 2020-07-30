
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Gates Tech Online</title>
<!-- online -->
<link rel="shortcut icon" href="/nc_assets/img/logos/gates.png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/pricing/">
  <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/offcanvas/">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">

<style type="text/css"> /* FONT AWESOME CSS */
  .fa {
    padding-right: 5px;  
  }  
  .redcolor{
          color: red;
        }
  .greencolor{
          color: green;
        }
  .bluecolor{
          color: blue;
        }
  .yellowcolor{
          color: yellow;
        }        
.silverbgcolor{
          background: #c2c2c2;
        }   
</style>

<style type="text/css">
  html,

body {
  overflow-x: hidden; /* Prevent scroll on narrow devices */
}
/* covers screen with grey layer  */
.screen-overlay {
  width:0%;
  height: 100%;
  z-index: 30;
  position: fixed;
  top: 0;
  left: 0;
  opacity:0;
  visibility:hidden;
  background-color: rgba(34, 34, 34, 0.6);
  transition:opacity .2s linear, visibility .1s, width 1s ease-in;
   }
.screen-overlay.show {
    transition:opacity .5s ease, width 0s;
    opacity:1;
    width:100%;
    visibility:visible;
}
  
body.offcanvas-active{
  overflow:hidden;
}
.nav-link .fa{
  display: none;
}
 .navbar-dark .navbar-nav .nav-link{
    padding: 5px;  
    color: white;
  }

@media (max-width: 768px) {
  .nav-link .fa{
    display: inline;
    padding-right: 10px;
  }
  .offcanvas-collapse {
    overflow-x: hidden;
    border: 1px solid #c2c2c2;
    color: grey;  
    z-index: 99;
    position: fixed;
    top: 0px; /* Height of navbar */
    bottom: 0;
    right: 100%;
    width: 240px;
    padding-right: 1rem;
    padding-left: 1rem;
    overflow-y: auto;
    visibility: hidden;
    background-color: white;
    transition: visibility .3s ease-in-out, -webkit-transform .3s ease-in-out;
    transition: transform .3s ease-in-out, visibility .3s ease-in-out;
    transition: transform .3s ease-in-out, visibility .3s ease-in-out, -webkit-transform .3s ease-in-out;
  }
    
  .navbar-dark .navbar-nav .nav-link{
    padding: 10px 20px;  
    color: teal;
    border-bottom: 1px solid #e2e2e2;
  }
  .offcanvas-collapse.open {
    visibility: visible;
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  color: rgba(255, 255, 255, .75);
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-underline .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
  color: #6c757d;
}
.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
    color: red;
}
.nav-underline .nav-link:hover {
  color: #07bff;
}

.nav-underline .active {
  font-weight: 500;
  color: #343a40;
}

.text-white-50 { color: rgba(255, 255, 255, .5); }

.bg-purple { background-color: #6f42c1; }

.lh-100 { line-height: 1; }
.lh-125 { line-height: 1.25; }
.lh-150 { line-height: 1.5; }
</style>

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
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <b class="screen-overlay"></b>

    <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4  bg-white border-bottom shadow-sm">  
    <!-- style="background-image: url({{asset('img/bg.png')}});" -->

  <h5 class="my-0 mr-md-auto font-weight-normal">
<!-- online -->
<!-- <img src="/nc_assets/img/logos/gatestech.png" alt="Gates_Tech" style="height: 80px;"> -->
<img src="{{asset('img/gatestech.png')}}" alt="Gates Tech"  height="80">
  </h5>
  <nav class="my-2 my-md-0 mr-md-3 d-none d-md-flex">
    <a class="p-2 text-dark" href="#">Adout</a>
    <a class="p-2 text-dark" href="#">Support</a>
    <a class="p-2 text-dark" href="#">Contact us</a>
    <a class="p-2 text-dark" >Developed by | gatestech.online</a>
  </nav>
</div>
<!-- COLLAPSE BAR -->
 <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background: #073a6d!important">
  <a class="navbar-brand mr-auto mr-md-0" href="#">
    <h4 style="font-family:sans-serif;">APPS WORLD</h4></a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse p-0" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">

        <a class="nav-link">   
          <h4 class="mb-2 d-md-none redcolor">APPs WORLD</h4>
         <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-cog redcolor"></i>Simple Website</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-user bluecolor"></i>Online Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-shopping-cart redcolor"></i>E-commerce site</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fa fa-cog yellowcolor" aria-hidden="true"></i>Stock Manager</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-battery-half greencolor" aria-hidden="true"></i>Inventory & Invoicing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-envelope-o bluecolor"></i>Portfolio site
        </a>
      </li>
      <li class="nav-item dropdown d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog redcolor"></i>Advance</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item d-md-none">
    <a class="nav-link silverbgcolor" href="#"></a>
    <a class="nav-link ">@ gatestech.online</a>
    <a class="nav-link" href="#">Adout</a>
    <a class="nav-link" href="#">Support</a>
    <a class="nav-link" >Contact us</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

   <img class="image-responsive mb-2" src="{{asset('img/gem.jpg')}}" alt="gem">

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Products & Services</h1>
  <p class="lead">Efficient and effective website and software develop.</p>
</div>
<style>
.card-deck .col-md-4{
  padding: 0;
}  
</style>
<div class="container">
  <div class="card-deck mb-3 text-center">
   
   <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-info">
        <h4 class="my-0 font-weight-normal">Simple Website</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Get started</button>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-danger">
        <h4 class="my-0 font-weight-normal">E-Commerce</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$20 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Get started</button>
      </div>
    </div>
  </div>
   <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning">
        <h4 class="my-0 font-weight-normal">Online Shop</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$20 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Get started</button>
      </div>
    </div>
    </div>
      <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-success">
        <h4 class="my-0 font-weight-normal">Stock Manager</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Contact us</button>
      </div>
    </div>    
  </div>
  
  <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary">
        <h4 class="my-0 font-weight-normal">Desktop Apps</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$10 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Get started</button>
      </div>
    </div>
  </div>
      <div class="col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Web Apps</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Contact us</button>
      </div>
    </div> 
  </div>   
  </div>

  </div>

  <div class="container p-3">
  <div class="row">

    <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-truck m-2"></i></div>
    <div>FREE SHIPPING Y  <br>
      Free Shipping All Order
    </div>    
  </div>
    <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-user m-2"></i></div>
    <div>FREE SHIPPING Y  <br>
      Free Shipping All Order
    </div>    
  </div>
  <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-support m-2"></i></div>
    <div>FREE SHIPPING  <br>
      Free Shipping All Order
    </div>
  </div>
  <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-lock m-2"></i></div>
    <div>FREE SHIPPING  <br>
      Free Shipping All Order
    </div>
  </div>  
</div>
</div>

<div class="container-flex">
  <!-- pt-4 my-md-5 pt-md-5 -->
  <footer class="p-5 border-top bg-light">
    <div class="row">
      <div class="col-6 col-md">
<!-- online -->
<img class="mb-2" src="/nc_assets/img/logos/gatestech.png" alt="" height="60px" height="24">
<img class="mb-2" src="{{asset('img/gatestech.png')}}" alt="" height="60px">

        <small class="d-block mb-3 text-muted">&copy; 2020</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <div class="floor text-light text-center p-3" style="background: #073a6d;">
      @ Gatse Tech Online
  </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function () {
  'use strict'

  $('[data-toggle="offcanvas"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open');

    $('body').toggleClass("offcanvas-active");
    $(".screen-overlay").toggleClass("show");
  })
});

$(document).ready(function() {

  // $("[data-trigger]").on("click", function(e){
  //       e.preventDefault();
  //       e.stopPropagation();
  //       var offcanvas_id =  $(this).attr('data-trigger');
  //       $(offcanvas_id).toggleClass("show");
  //       $('body').toggleClass("offcanvas-active");
  //       $(".screen-overlay").toggleClass("show");
  //   }); 

    // Close menu when pressing ESC
    $(document).on('keydown', function(event) {
        if(event.keyCode === 27) {
           $(".offcanvas-collapse").removeClass("open");
           $("body").removeClass("overlay-active");
           $(".screen-overlay").removeClass("show");
        }
    });

    $(".screen-overlay").click(function(e){
      $(".offcanvas-collapse").removeClass("open");
      $("body").removeClass("offcanvas-active");
      $(".screen-overlay").removeClass("show");

    }); 

});
</script>

</html>

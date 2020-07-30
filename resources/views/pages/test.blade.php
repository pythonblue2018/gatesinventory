<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Gates Tech Online</title>
      <link rel="shortcut icon" href="/nc_assets/img/logos/gates.png">
      <link rel="shortcut icon" href="{{ asset('img/gates.png')}}">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/pricing/">
  <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/offcanvas/">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
  .orangecolor{
          color: orange;        }  
  .basecolor{
    color: #051e66;
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
#brand-logo{
    height: 70px;
  }
  #dropdown{
    width: 260px;
  }
@media (max-width: 768px) {
  #brand-logo{
    height: 50px;
  }
  #dropdown{
    width: 200px;
  }
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
      /*--------------*/
      body{

      }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-flex"> 

<!-- Top Navbar ------------------------------------------------------------------->
      <nav class="navbar-nav nav-light d-md-flex" 
        style="font-size: 15px; font-family:Poppins,sans-serif; background: #051e66;height: 40px;">
        <div class="container"> 
            <a class="p-2 text-light pull-left">Website Development & Design </a>
            <a class="p-2 text-light pull-right d-none d-sm-none d-md-inline">
              <i class="fa yellowcolor fa-envelope-o"></i>gatestech123@gmail.com
              <i class="fa text-info fa-phone ml-2"></i>01316110315
              <i class="fa text-warning fa-facebook-f ml-4"></i>
              <i class="fa text-success fa-credit-card ml-3"></i>USD
          </a>
      </div>
    </nav>
<!-- Top Navbar End ---------------------------------------------------------------->

    <b class="screen-overlay"></b>

  
<!-- COLLAPSE BAR -->
<style>
 #dropdown:hover > .dropdown-menu {
    display: block;
}
  .dropdown-toggle:after { content: none }

.navbar-collapse{
    background: white;
    z-index: 99;
    /*padding: 5px;*/
}
a .dropdown-item {
  font-size: 14px;
  font-family: sans-serif;
}
.dropdown-menu{
  padding-top: 0;
  padding-bottom: 0;
}
.nav-item .nav-link{
  margin-left: 10px;
}
@media (max-width: 768px) {
  #navbarCollapse{
    background-color: #f2f2f2;
    padding: 10px;
    border: 1px solid grey;
  }
}
</style>
<!-- Main Navbar ------------------------------------------------------------------->
 <nav class="navbar navbar-expand-md navbar-light border navbar-fixed-top">
 <div class="container d-flex">  
  <div class="brand-logo">  
      <img id="brand-logo"  src="{{ asset('img/gatestech.png')}}" >    
      <!-- <img  src="/nc_assets/img/gatestech.png" style="height: 70px;">     -->
  </div>
  <div class="main-menu d-flex"> 

    <li class="nav-item btn-group mr-0 ml-2"  id="dropdown" style="
                  background: #051e66; border-radius: 0px;">
            <a class="nav-link js-scroll-trigger dropdown-toggle ml-2" data-toggle="dropdown" href="#" style="color: white;width: 240px;">WEBSITE CRAFT
               <i class="fa fa-bars p-1  d-md-flex  d-sm-flex pull-right"></i>
             </a>
            <ul class="dropdown-menu m-0" style="width:260px;">         
              <a href="">
              <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Simple Website<i class="fa fa-lg fa-internet-explorer pull-right"></i>
               </li>
               </a>
               <a href="">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 E-Commerce Website<i class="fa fa-lg fa-cog pull-right"></i>
               </li>
               </a>
               <a href="#">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Online Shop Website<i class="fa fa-lg fa-shopping-cart pull-right"></i>
               </li>
               </a>
               <a href="#">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Stock Manager Website
                 <i class="fa fa-lg fa-cube pull-right"></i>
               </li>
               </a>
               <a href="#">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Invoice System Website
                 <i class="fa fa-lg fa-life-ring pull-right"></i>
               </li>
               </a>
               <a href="#">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Classified Advert Website
                 <i class="fa fa-lg fa-bullhorn pull-right"></i>
               </li>
               </a>
               <a href="#">
               <li class="dropdown-item mt-0" style="border-bottom: 1px solid #dadada; padding: 10px 20px;">
                 Multivendor Marketplace
                 <i class="fa fa-lg fa-building pull-right"></i>
               </li>
               </a>
              </ul>            
    </li>
    <li class="nav-item d-none d-md-flex ml-1 text-center" style="font-family:Poppins,sans-serif;">
      <a class="ml-1 p-2 basecolor border" style="width: 80px;" href="#">About</a>
      <a class="ml-1 p-2 basecolor border" style="width: 80px;" href="#">Services</a>
      <a class="ml-1 p-2 basecolor border" style="width: 80px;" href="#">Portfolio</a>
      <a class="ml-1 p-2 basecolor border" style="width: 105px;" href="#">Contact us</a>
    </li>     
    

  <!-- Example dropdown button -->
  
  <div class="navbar-collapse offcanvas-collapse p-0 " id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto d-md-none">
      <li class="nav-item">
        <a class="nav-link">   
          <h5 class="mb-2 d-md-none redcolor">WEBSITE CRAFTs</h5>
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-battery-half greencolor" aria-hidden="true"></i>Inventory & Invoicing</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-envelope-o bluecolor"></i>Portfolio site
        </a>
      </li> -->
      <li class="nav-item dropdown d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog redcolor"></i>Advance 
          <i class="fa fa-chevron-down"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item d-md-none">
    <a class="nav-link silverbgcolor" href="#"></a>
    <a class="nav-link ">@ gatestech.online</a>
    <a class="nav-link" href="#">About</a>
    <a class="nav-link" href="#">Service</a>
    <a class="nav-link" href="#">Portfolio</a>
    <a class="nav-link" >Contact us</a>
      </li>
    </ul>
  </div>

</div>

  <button class="navbar-toggler p-0 border-0 pull-right" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  </div> 
</nav>
<style type="text/css">

/* THE CAROUSEL -------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 26rem;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 26rem;
}

/* RESPONSIVE CSS
-------------------------------------------------- */
@media (max-width: 756px) {
 .carousel-item {
   height: 12rem;
 }
 .carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: auto;
  }
}
@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }  
}
.responsive {
  width: 100%;
  height: auto;
}

</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
           <img class="responsive" src="{{asset('img/online/ban90.png')}}" alt="ban" >

      </div>
      <div class="carousel-item">
        <img class="responsive" src="{{asset('img/online/ban91.png')}}" alt="ban" >

      </div>
      <div class="carousel-item">
        <img class="responsive" src="{{asset('img/online/ban92.png')}}" alt="ban" >

      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" style="background-color: #e2e2e2; height: 50px; width: 50px; border-radius: 2px;" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" style="background-color: #e2e2e2; height: 50px; width: 50px; border-radius: 2px;" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- Main Navbar End ------------------------------------------------------------>

   <!-- <img class="image-responsive mb-2" src="{{asset('img/online/ban90.png')}}" alt="ban" width="100%"> -->

<!-- LIVE online -->
   <!-- <img class="image-responsive mb-2" src="/nc_assets/img/logos/gem.jpg" alt="gem" width="100%"> -->





<!-- PRODUCTS AND SERVICES Header -------------------------------------->
<div class="container pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h3 class="display-4" style="font-size: 24px;color: #001040; font-weight: 700;">Products & Services</h3>
  <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
</div>
<style>
.card-deck .col-md-4{
  padding: 0;
}  
</style>


<!-- Tab ------------------------------------------------------------------->
<style type="text/css">
  /* Style the tab */
.tab {
  overflow: hidden;
  border-bottom: 1px solid #ccc;
  /*background-color: #f1f1f1;*/
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #eee;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ddd;
  color: #045FB4;
}
h4{
  color: #045FB4;
  margin-bottom: 20px;
}
/* Style the tab content */
.tabcontent {
  min-height: 320px;
  display: none;
  padding: 6px 12px;
  /*border: 1px solid #ccc;*/
  border-top: none;
}

.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
.tablinks{
  font-family:Poppins,sans-serif;
  font-weight: 600;
  color: #0B3861;
}
td, th {
  font-size: 15px;
}
</style>

<div class="container mt-2 mb-3" style=" font-family:Poppins,sans-serif;"> 
 <!-- Tab links -->
<div class="tab" style="">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" >Website Development</button>
  <button class="tablinks" onclick="openCity(event, 'Commerce')">E-Commerce Solution</button>
  <button class="tablinks" onclick="openCity(event, 'Inventory')">Inventory System</button>
  <button class="tablinks" onclick="openCity(event, 'Classified')">Classified Ad</button>
  <button class="tablinks" onclick="openCity(event, 'apps')">Software & Web Apps</button>
  <button class="tablinks" onclick="openCity(event, 'SEO')">SEO Optimise</button>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
  <div class="row mt-3"> 
  <div class="col-md-4 text-left overflow-hidden"> 
  <img class="image-responsive"  src="{{ asset('img/online/web2.png')}}" width="320px">
   <!-- <img src=" /nc_assets/img/online/web2.png" width="340px"> -->

  </div>
  <div class="col-md-8"> 
  <h4>Website Development & Design</h4>
  <p>
We understand that websites are first impressions for any business. We help you differentiate among others by creating highly unique and tempting designs, which fascinates huge potential customers, resulting in increased profitability and satisfaction.
</p>

<table class="mt-2">
<tr>
  <td>Basic HTML BS4 CSS website from </td><th> $99</td><td width="20px"></td>
  <td>Basic HTML BS4 CSS website from </td><th> $99</td>
</tr>
<tr>
  <td>Standard WordPress website from </th><td>$149</td><td width="20px"></td>
  <td>Basic HTML BS4 CSS website from </td><th> $99</td>
</tr>
<tr>
  <td>Standard HTML BS4 CSS website from </td><td>$149</td><td width="20px"></td>
  <td>Basic HTML BS4 CSS website from </td><th> $99</td>
</tr>
<tr>
  <td>PHP Laravel Dynamic website from </td><td>$199</td>
</tr>
<tr>
  <td>Python Django Dynamic website from </td><td>$199</td>
</tr>
</table>

</div>
</div>
</div>

<div id="Commerce" class="tabcontent">
 <div class="row mt-3"> 
  <div class="col-md-4 text-center"> 
  <img class="image-responsive" src="{{ asset('img/online/ecommerce.png')}}" width="260px">
     <!-- <img src="/nc_assets/img/online/ecommerce.png" width="260px"> -->
  </div>
  <div class="col-md-8"> 
  <h4>E-Commerce Solutions</h4>
  <p>
We believe in creating interactive E – commerce websites, which engages customers with retailers in many ways. It creates online shopping most personalized. Customers relish overall process of buying i.e. from searching to buying, which boosts sales.
 </p>
<table class="mt-2">
<tr>
  <td>Woo-commerce WordPress site from </td><td>$199</td>
</tr>
<tr>
  <td>Multivendor Woo-commerce WordPress from </td><td>$299</td>
</tr>
<tr>
  <td>PHP MYSQL Laravel ecommerce site from </td><td>$399</td>
</tr>
<tr>
  <td>Python Django MySQL ecommerce site from </td><td>$499</td>
</tr>
</table>
 
</div>
</div>
</div>
<div id="Inventory" class="tabcontent">
  <div class="row mt-3"> 
  <div class="col-md-4 text-center"> 
  <img src="{{ asset('img/online/inventory.png')}}" width="250px">
  <!-- <img src="/nc_assets/img/online/inventory.png" width="250px"> -->
  </div>
  <div class="col-md-8"> 
  <h4>Inventory System </h4>
  <p>
We understand that websites are first impressions for any business. We help you differentiate among others by creating highly unique and tempting designs, which fascinates huge potential customers, resulting in increased profitability and satisfaction.
</p>
<table class="mt-2">
<tr>
  <td>WordPress Inventory System from </td><td>$299</td>
</tr>
<tr>
  <td>PHP MYSQL Laravel Inventory from </td><td>$299</td>
</tr>
<tr>
  <td>Advance PHP Laravel Inventory from </td><td>$499</td>
</tr>
<tr>
  <td>Python Django Inventory from </td><td>$399</td>
</tr>
</table>
</div>
</div>
</div>
<div id="Classified" class="tabcontent">
 <div class="row mt-3"> 
  <div class="col-md-4 text-left"> 
  <img src="{{ asset('img/online/software.jpg')}}" width="280px">
  <!-- <img src="/nc_assets/img/online/software.jpg" width="280px"> -->
  </div>
  <div class="col-md-8"> 
  <h4>Classified Advert site</h4>
  <p>
We believe in creating interactive E – commerce websites, which engages customers with retailers in many ways. It creates online shopping most personalized. Customers relish overall process of buying i.e. from searching to buying, which boosts sales.
</p>
<table class="mt-2">
<tr>
  <td>Classified Ad WordPress site from </td><td>$299</td>
</tr>
<tr>
  <td>Classified Ad PHP Laravel Site from </td><td>$399</td>
</tr>

</table>
</div>
</div>
</div>
<div id="SEO" class="tabcontent">
 <div class="row mt-3"> 
  <div class="col-md-4 text-center"> 
  <img src="{{ asset('img/online/seo.jpg')}}" height="200px">
  <!-- <img src="/nc_assets/img/online/seo.jpg" height="200px"> -->
  </div>
  <div class="col-md-8"> 
  <h4>SEO Solutions</h4>
  <p>
We believe in creating interactive E – commerce websites, which engages customers with retailers in many ways. It creates online shopping most personalized. Customers relish overall process of buying i.e. from searching to buying, which boosts sales.
</p>
<table class="mt-2">
<tr>
  <td>Basic SEO Search Engine Services from </td><td>$99</td>
</tr>
<tr>
  <td>Advance SEO Search Engine Services from </td><td>$199</td>
</tr>

</table>
</div>
</div>
</div>


<div id="apps" class="tabcontent">
  <div class="row mt-3"> 
  <div class="col-md-4 text-left"> 
  <!-- <img src="/nc_assets/img/online/apps.png" width="250px"> -->
  <img src="{{ asset('img/online/apps.png')}}" width="250px">
  </div>
  <div class="col-md-8"> 
  <h4>Software & Web Apps</h4>
  <p>
We understand that websites are first impressions for any business. We help you differentiate among others by creating highly unique and tempting designs, which fascinates huge potential customers, resulting in increased profitability and satisfaction.
</p>
<table class="mt-2">
<tr>
  <td>PHP Web apps from </td><td>$49</td>
</tr>
<tr>
  <td>Python Django Web apps from </td><td>$49</td>
</tr>
<tr>
  <td>Python Desktop apps from </td><td>$49</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<!-- Tab End ----------------------------------------------------------------->
<hr>
<!-- PRICE CARDS ------------------------------------------------------------->

<div class="container">
  <div class="card-deck mb-3 text-center">
   
   <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm" style="border-radius: 0;">
      <div class="card-header bg-info" style="border-radius: 0;">
        <h5 class="my-0 font-weight-normal">Simple Website</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $99 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 m-0 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-danger">
        <h5 class="my-0 font-weight-normal">E-Commerce</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $199 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div>
  </div>
   <div class="col-md-3 col-sm-6 m-0 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning">
        <h5 class="my-0 font-weight-normal">Classified Adverts</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $299 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div>
    </div>
      <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-success">
        <h5 class="my-0 font-weight-normal">Stock Manager</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $299 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div>    
  </div>
  
  <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary">
        <h5 class="my-0 font-weight-normal">Desktop Apps</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $99 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div>
  </div>
 <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-purple">
        <h5 class="my-0 font-weight-normal">Web Apps</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $99 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div> 
  </div>  
  <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-info">
        <h5 class="my-0 font-weight-normal">Online Shop</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $199 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div> 
  </div>  
  <div class="col-md-3 col-sm-6 p-0">
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning">
        <h5 class="my-0 font-weight-normal">SEO Promotion</h5>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><small class="text-muted">from </small> $99 </h3>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <a >Read more..</a>
      </div>
    </div> 
  </div>   
  </div>
  </div>
<!-- END -->
<hr>

<!-- SERVICES ------------------------------------------------------------------>
  <div class="container p-3">
  <div class="row">

    <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-truck m-2"></i></div>
    <div>FREE DOMAIN<br>
      Free xyz domain with All
    </div>    
  </div>
    <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-user m-2"></i></div>
    <div>FREE HOSTING<br>
      Free Shared Hosting with All
    </div>    
  </div>
  <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-support m-2"></i></div>
    <div>FREE SUPPORT  <br>
      Free limited support with All
    </div>
  </div>
  <div class="col-md-3 col-sm-6  row p-2 ml-2">
    <div><i class="fa fa-2x fa-bullhorn m-2"></i></div>
    <div>FREE SEO  <br>
      Free basic seo
    </div>
  </div>
</div>
</div>
</div>

<!-- Footer ------------------------------------------------------------------>
<div class="container-flex">
  <!-- pt-4 my-md-5 pt-md-5 -->
  <footer class="border-top bg-light pt-4">
    <div class="container"> 
    <div class="row">
      <div class="col-6 col-md">
        <img class="mb-2" src="{{ asset('img/online/gatestech.png')}}" alt="" height="60px">

        <!-- LIVE online   -->
        <img class="mb-2" src="/nc_assets/img/logos/gatestech.png" alt="" height="60px">
        <small class="d-block mb-3 text-muted">&copy; 2020</small>
        <br>
        <p>Developed by | gatestech.online</p>
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
<script type="text/javascript">

  function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
  document.getElementById("defaultOpen").click();

</script>

</html>

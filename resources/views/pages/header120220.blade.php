<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="{{ asset('css/test.css')}}">
<link href="{{ asset('templates/css/main.css')}}" rel="stylesheet">
<link rel="icon" href="{{ asset('images/logo.png')}}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="{{ asset('js/ajaxFunction.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- end links -->
<style type="text/css">

  .mega-area{
  position: absolute;
  min-height: 300px;
  width: 100%;
  right: 0;
  left: 0;
  padding: 15px;
}
.dropdown-item{
  padding: 5px 0;
  font-size: 18px;
}
.menu-area{
  position: static;
}
.dropdown-menu{
  top: 98%;
  color: #11324b;
}

.btn.btn-rounded {
  border-radius: 50px;
  width: 20px;
  height: 20px;
  padding: 0;
  margin: 5px;
  font-size: 12px;
}
</style>
<title>Responsive Header</title>
</head>    
<header>

@php 
  $categories = (isset($categories) ? $categories : App\Category::where('parent_id', 0)->get());
@endphp

<div class="top-header">
      <div class="inner-header-top">
          <ul class="contact">
              <a><li><i class="fa fa-phone"></i> 0123456789</li></a>
              <a><li><i class="fa fa-envelope"></i><span class="sm-hide"> admin@eurohome</span></li></a>
          </ul>
          <ul class="account">
              <a href="{{ route('shop.shopCart')}}"><li ><i class="fa fa-shopping-cart"></i></li>
                <span id="header_cart_quantity">
                  <button type="button" class="btn btn-success btn-rounded btn-icon">
                     {{ $cart_qty ?? 0 }}
                  </button>
                </span>                
              </a>
              <a><li><i class="fa fa-heart"></i></li></a>
              <a><li><i class="fa fa-user"></i> Account</li></a>
              <a><li class="d-none d-md-table-cell"><i class="fa fa-lock"></i> Login</li></a>
          </ul>
      </div>          

    </div>   
<nav class="navbar navbar-expand-md navbar-light bg-default">
      <a class="navbar-brand" href="/shopHome">
          <img src="{{ asset('images/logo.png')}}" width="50px"/>
      </a>
      <a href="/"><span class="navbar_text"><i class="fa fa-user"></i></span></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">

            <a class="nav-link" href="{{ route('shop.shopProducts')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown menu-area sm-hide">
              <a class="nav-link dropdown-toggle" id="megamenu" data-toggle="dropdown" aria-expanded="true" href="#">Products</a>
              
              <div class="dropdown-menu mega-area" aria-lablledby="megamenu">
                <div class="row">
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <h4><a href="{{ route('shop.shopProducts')}}">Electronics</a></h4>
                    @foreach($categories as $product)            
                      <a class="dropdown-item" href="{{ route('shop.shopProductCat',['id' => $product->id ])}}">{{ $product->name }}</a>
                      @if ($loop->index == 6)
                         </div>
                         <div class="col-sm-6 col-md-3 col-lg-3" style="margin-top: 50px;">
                           <a class="dropdown-item"  href="{{ route('shop.shopProductCat',['id' => $product->id ])}}">{{ $product->name }}</a>
                      @endif
                    @endforeach
                                      
                  </div>
                  <div class="col-sm-6 col-md-3  col-lg-3">
                    <h4>Support</h4>
                    <a class="dropdown-item" href="">devel opement</a>
                    <a class="dropdown-item" href="">devel opement</a>
                    <a class="dropdown-item" href="">devel opement</a>
                    <a class="dropdown-item" href="">devel opement</a>
                  </div>
                  
                  <div class="col-sm-6 col-md-3  col-lg-3">
                    <h5>Graphics branding</h5>
                    <a class="dropdown-item" href="/">
                      <img src="{{ asset('images/logo1.png')}}" alt="" style="height: 100px;width: 100px;"> 
                    </a>         
                  </div>
                </div>
              </div>
            </li>
               
            <li class="nav-item dropdown md-hide">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Products</a>

              <div class="dropdown-menu pl-2 mr-2" aria-lablledby="megamenu">
                <div class="row">
                  <div class="col-sm-6 col-lg-3">
                    <h6>Electronics</h6>
                    <h6>Support</h6>                   
                    <h6>Graphics branding</h6>
                    <a class="dropdown-item" href="/">
                      <img src="{{ asset('images/logo1.png')}}" alt="" style="height: 50px;width: 50px;"> 
                    </a>         
                  </div>
                </div>
              </div>  
            </li>

          <li class="nav-item">
            <a class="nav-link " href="#">Support</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
</header>

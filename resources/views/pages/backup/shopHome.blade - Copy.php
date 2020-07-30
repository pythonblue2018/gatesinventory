
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free website shopping cart for business">
    <meta name="keyword" content="">
    <title>Gates</title>
    <meta property="og:image" content="https://demo.s-cart.org/images/org.jpg" />
    <meta property="og:url" content="https://demo.s-cart.org" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Demo S-cart : Free Laravel eCommerce for Business" />
    <meta property="og:description" content="Free website shopping cart for business" />
    <meta name="csrf-token" content="RAUUX5aaYo2tCerlvYYSdBUHOchbW14lCfgpMZlk">
<!--Module meta -->
  <!--//Module meta -->
    <link href="https://demo.s-cart.org/templates/default/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://demo.s-cart.org/templates/default/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://demo.s-cart.org/templates/default/css/prettyPhoto.css" rel="stylesheet">
    <link href="https://demo.s-cart.org/templates/default/css/animate.css" rel="stylesheet">
    <link href="https://demo.s-cart.org/templates/default/css/main.css" rel="stylesheet">
    <link href="https://demo.s-cart.org/templates/default/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://demo.s-cart.org/templates/default/js/html5shiv.js"></script>
    <script src="https://demo.s-cart.org/templates/default/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="https://demo.s-cart.org/templates/default/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://demo.s-cart.org/templates/default/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://demo.s-cart.org/templates/default/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://demo.s-cart.org/templates/default/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="https://demo.s-cart.org/templates/default/images/ico/apple-touch-icon-57-precomposed.png">
<!--Module header -->
                                                <!--//Module header -->

</head><!--/head-->
<body>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> 0123456789</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> admin-demo@s-cart.org</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="btn-group pull-right">
              <div class="btn-group locale">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown"><img src="https://demo.s-cart.org/data/language/flag_uk.png" style="height: 25px;">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                                      <li><a href="https://demo.s-cart.org/locale/en"><img src="https://demo.s-cart.org/data/language/flag_uk.png" style="height: 25px;"></a></li>
                                      <li><a href="https://demo.s-cart.org/locale/vi"><img src="https://demo.s-cart.org/data/language/flag_vn.png" style="height: 25px;"></a></li>
                                  </ul>
                              </div>
                             <div class="btn-group locale">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  USD Dola
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                                      <li><a href="https://demo.s-cart.org/currency/USD">USD Dola</a></li>
                                      <li><a href="https://demo.s-cart.org/currency/VND">VietNam Dong</a></li>
                                  </ul>
              </div>
                          </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="https://demo.s-cart.org"><img style="width: 20px;" src="{{ asset('dist/img/glogo.jfif')}}" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">

                <li><a href="https://demo.s-cart.org/wishlist.html"><span  class="cart-qty  shopping-wishlist" id="shopping-wishlist">0</span><i class="fa fa-star"></i> Wishlist</a></li>
                <li><a href="https://demo.s-cart.org/compare.html"><span  class="cart-qty shopping-compare" id="shopping-compare">0</span><i class="fa fa-crosshairs"></i> Compare</a></li>
                <li><a href="https://demo.s-cart.org/cart.html"><span class="cart-qty shopping-cart" id="shopping-cart">0</span><i class="fa fa-shopping-cart"></i> View cart</a>
                </li>
                                <li><a href="https://demo.s-cart.org/member/login.html"><i class="fa fa-lock"></i> Login</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="https://demo.s-cart.org" class="active">Home</a></li>
                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        <li><a href="https://demo.s-cart.org/products.html">All products</a></li>
                        <li><a href="https://demo.s-cart.org/compare.html">Compare</a></li>
                        <li><a href="https://demo.s-cart.org/cart.html">View cart</a></li>
                        <li><a href="https://demo.s-cart.org/categories">Categories</a></li>
                        <li><a href="https://demo.s-cart.org/brands">Brands</a></li>
                        <li><a href="https://demo.s-cart.org/vendors">Vendors</a></li>
                    </ul>
                </li>

                <li><a href="https://demo.s-cart.org/news.html">Blog</a></li>

                
                                                            <li><a  href="https://demo.s-cart.org/about.html">About us</a></li>
                                          <li><a  href="https://demo.s-cart.org/contact.html">Contact us</a></li>
                                          <li><a target=_blank href="https://s-cart.org">S-Cart</a></li>
                                                    </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <form id="searchbox" method="get" action="https://demo.s-cart.org/search.html" >
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Your keyword..." name="keyword">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->

<!--Module banner -->
                                                         <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1" class=""></li>
                          </ol>
            <div class="carousel-inner">
                                 <div class="item active">
                    <div class="col-sm-12">
                      <img src="/data/banner/Main-banner-3-1903x600.jpg" class="girl img-responsive" alt="" />
                    </div>
                  </div>
                                 <div class="item ">
                    <div class="col-sm-12">
                      <img src="/data/banner/Main-banner-1-1903x600.jpg" class="girl img-responsive" alt="" />
                    </div>
                  </div>
                           </div>
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section><!--/slider-->
                                      <!--//Module banner -->


<!--Module top -->
                                              <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=934208239994473';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
                          <!--//Module top -->


  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12" id="breadcrumb">
          <!--breadcrumb-->
                    <!--//breadcrumb-->

          <!--//fillter-->
                    <!--//fillter-->
        </div>

        <!--body-->
                  <!--main left-->
<div class="col-sm-3">
           <div class="left-sidebar">    <!--Module left -->                                                                                                                 <h2>Categories</h2>
              <div class="panel-group category-products" id="accordian">
                                              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#0">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      </a>
                      <a href="https://demo.s-cart.org/category/electronics_1">  Electronics</a>
                    </h4>
                  </div>
                  <div id="0" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/mobile_3">Mobile</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/computers_5">Computers</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/tablets_6">Tablets</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/appliances_7">Appliances</a>
                                <ul>
                                                                  </ul>
                            </li>
                                              </ul>
                    </div>
                  </div>
                </div>
                                                            <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#1">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      </a>
                      <a href="https://demo.s-cart.org/category/clothing-wears_2">  Clothing &amp; Wears</a>
                    </h4>
                  </div>
                  <div id="1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/mens-clothing_8">Men&#039;s Clothing</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/womens-clothing_9">Women&#039;s Clothing</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/kids-wear_10">Kid&#039;s Wear</a>
                                <ul>
                                                                  </ul>
                            </li>
                                              </ul>
                    </div>
                  </div>
                </div>
                                                              <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="https://demo.s-cart.org/category/mobile_3"><h4 class="panel-title"><a href="https://demo.s-cart.org/category/mobile_3">Mobile</a></h4></a>
                    </div>
                  </div>
                                                           <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#3">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      </a>
                      <a href="https://demo.s-cart.org/category/accessaries-extras_4">  Accessaries &amp; Extras</a>
                    </h4>
                  </div>
                  <div id="3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/mobile-accessaries_11">Mobile Accessaries</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/womens-accessaries_12">Women&#039;s Accessaries</a>
                                <ul>
                                                                  </ul>
                            </li>
                                                    <li>
                                - <a href="https://demo.s-cart.org/category/womens-accessaries_13">Women&#039;s Accessaries</a>
                                <ul>
                                                                  </ul>
                            </li>
                                              </ul>
                    </div>
                  </div>
                </div>
                                                              <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="https://demo.s-cart.org/category/computers_5"><h4 class="panel-title"><a href="https://demo.s-cart.org/category/computers_5">Computers</a></h4></a>
                    </div>
                  </div>
                                                             <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="https://demo.s-cart.org/category/womens-clothing_9"><h4 class="panel-title"><a href="https://demo.s-cart.org/category/womens-clothing_9">Women&#039;s Clothing</a></h4></a>
                    </div>
                  </div>
                                         </div>                                           <div class="brands_products"><!--brands_products-->
                <h2>Brands</h2>
                <div class="brands-name">
                  <ul class="nav nav-pills nav-stacked">
                                          <li><a href="https://demo.s-cart.org/brand/brand-ka_8"> Brand KA</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/avatar_7"> Avatar</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/metabo_6"> Metabo</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/klein_5"> Klein</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/cst_4"> CST</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/apex_3"> Apex</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/ideal_2"> Ideal</a></li>
                                          <li><a href="https://demo.s-cart.org/brand/husq_1"> Husq</a></li>
                                      </ul>
                </div>
              </div><!--/brands_products-->                                                                                                                                                               <div class="brands_products"><!--product special-->
                <h2>Special products</h2>
                <div class="products-name">
                  <ul class="nav nav-pills nav-stacked">
                                          <li>
                        <div class="product-image-wrapper product-single">
                          <div class="single-products product-box-0">
                              <div class="productinfo text-center">
                                <a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html"><img src="https://demo.s-cart.org/data/product/img-1.jpg" alt="Easy Polo Black Edition 1" /></a>
                                <span class="new-price">$5,000</span><span class="old-price">$15,000</span>
                                <a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html"><p>Easy Polo Black Edition 1</p></a>
                              </div>
                                                    <img src="https://demo.s-cart.org/templates/default/images/home/sale.png" class="new" alt="" />
                                                    </div>
                        </div>
                      </li>
                                      </ul>
                </div>
              </div><!--/product special-->                                                                                                                                          <div class="last_view_product"><!--last_view_product-->
              <h2>Products recently viewed</h2>
              <div class="products-lasView">
                <ul class="nav nav-pills nav-stacked">
                                      <li>
                      <div class="row">
                        <div class="col-xs-4"><a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html"><img src="https://demo.s-cart.org/data/product/img-1.jpg" alt="Easy Polo Black Edition 1" /></a></div>
                        <div class="col-xs-8"><a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html">Easy Polo Black Edition 1</a><span class="last-view">(2019-09-30 15:04:51)</span></div>
                      </div>
                    </li>
                                  </ul>
              </div>
            </div><!--/last_view_product-->

                                                                <!--//Module left -->
      </div>
    </div>
<!--//main left-->
          <!--main right-->
<div class="col-sm-9 padding-right">
             <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
@foreach($products as $product)            
<div class="col-sm-4">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="https://demo.s-cart.org/product/easy-polo-black-edition-17_17.html"><img src="{{ asset('img/'.$product->image)}}"  height="50%" alt="Easy Polo Black Edition 17" /></a>
<span class="new-price">${{ $product->price }}</span>
<a href="{{ route('admin.productView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a>

<a class="btn btn-default add-to-cart" onClick="addToCartAjax('17','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>

</div>
</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">
<li><a onClick="addToCartAjax('17','wishlist')"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
<li><a onClick="addToCartAjax('17','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
</ul>
</div>
</div>
</div>
@endforeach
                                
                         </div><!--features_items-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Hot products</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                                                  <div class="item active">

@foreach($products3 as $product3)
<div class="col-sm-4">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="https://demo.s-cart.org/product/easy-polo-black-edition-17_17.html"><img src="{{ asset('img/'.$product3->image)}}"  height="50%" alt="Easy Polo Black Edition 17" /></a>
<span class="new-price">${{ $product3->price }}</span>
<a href="{{ route('admin.productView',['id' => $product->id ])}}" ><p>{{ $product3->name }}</p></a>

<a class="btn btn-default add-to-cart" onClick="addToCartAjax('17','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>

</div>
</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">
<li><a onClick="addToCartAjax('17','wishlist')"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
<li><a onClick="addToCartAjax('17','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
</ul>
</div>
</div>
</div>
@endforeach                                         

                                               </div>
                                                                 <div class="item ">
                                  <div class="col-sm-4">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products   product-box-8">
                          <div class="productinfo text-center">
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-8_8.html"><img src="https://demo.s-cart.org/data/product/img-18.jpg" alt="Easy Polo Black Edition 8" /></a>
                            <span class="new-price">$15,000</span>
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-8_8.html"><p>Easy Polo Black Edition 8</p></a>
                                                         <a class="btn btn-default add-to-cart" onClick="addToCartAjax('8','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                      </div>

                                            <img src="https://demo.s-cart.org/templates/default/images/home/hot.png" class="new" alt="" />
                      
                      </div>
                      <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                          <li><a onClick="addToCartAjax('8','wishlist')"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                          <li><a onClick="addToCartAjax('8','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                                                                 <div class="col-sm-4">
                    <div class="product-image-wrapper product-single">
                      <div class="single-products   product-box-1">
                          <div class="productinfo text-center">
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html"><img src="https://demo.s-cart.org/data/product/img-1.jpg" alt="Easy Polo Black Edition 1" /></a>
                            <span class="new-price">$5,000</span><span class="old-price">$15,000</span>
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-1_1.html"><p>Easy Polo Black Edition 1</p></a>
                                                         <a class="btn btn-default add-to-cart" onClick="addToCartAjax('1','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                      </div>

                                            <img src="https://demo.s-cart.org/templates/default/images/home/sale.png" class="new" alt="" />
                      
                      </div>
                      <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                          <li><a onClick="addToCartAjax('1','wishlist')"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                          <li><a onClick="addToCartAjax('1','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                                  </div>
                               
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
          </div><!--/recommended_items-->

          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#cate1" data-toggle="tab">Products build</a></li>
                  <li><a href="#cate2" data-toggle="tab">Products group</a></li>
              </ul>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="cate1" >
                                      <div class="col-sm-3">
                      <div class="product-image-wrapper product-single">
                        <div class="single-products  product-box-15">
                          <div class="productinfo text-center">
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-15_15.html"><img src="https://demo.s-cart.org/data/product/img-41.jpg" alt="Easy Polo Black Edition 15" /></a>
                            <span class="new-price">$15,000</span>
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-15_15.html"><p>Easy Polo Black Edition 15</p></a>
                                                         <a class="btn btn-default add-to-cart" onClick="addToCartAjax('15','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                      </div>

                                            <img src="https://demo.s-cart.org/templates/default/images/home/bundle.png" class="new" alt="" />
                                              </div>
                      </div>
                    </div>
                              </div>
                <div class="tab-pane fade" id="cate2" >
                                      <div class="col-sm-3">
                      <div class="product-image-wrapper product-single">
                        <div class="single-products  product-box-16">
                          <div class="productinfo text-center">
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-16_16.html"><img src="https://demo.s-cart.org/data/product/img-42.jpg" alt="Easy Polo Black Edition 16" /></a>
                            <span class="new-price">Click view price</span>
                            <a href="https://demo.s-cart.org/product/easy-polo-black-edition-16_16.html"><p>Easy Polo Black Edition 16</p></a>
                                                          &nbsp;
                                                      </div>

                                            <img src="https://demo.s-cart.org/templates/default/images/home/group.png" class="new" alt="" />
                                              </div>
                      </div>
                    </div>
                                </div>
          </div><!--/category-tab-->


</div>
<!--//main right-->
          <!--Module right -->
  <!--//Module right -->
                <!--//body-->

      </div>
    </div>
  </section>

<!--Footer-->

<!--Module top footer -->
  <!--//Module top footer -->

  <footer id="footer"><!--Footer-->
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><a href="https://demo.s-cart.org"><img style="max-width: 150px;" src="https://demo.s-cart.org/data/logo/scart-mid.png"></a></h2>
             <ul class="nav nav-pills nav-stacked">
               <li>Demo S-cart : Free Laravel eCommerce for Business</li>
             </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>My account</h2>
              <ul class="nav nav-pills nav-stacked">
                                                      <li><a  href="https://demo.s-cart.org/member/login.html">My profile</a></li>
                                      <li><a  href="https://demo.s-cart.org/compare.html">Compare page</a></li>
                                      <li><a  href="https://demo.s-cart.org/wishlist.html">Wishlist page</a></li>
                                                </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>About us</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Address: 123st - abc - xyz</a></li>
                <li><a href="#">Hot line: Support: 0987654321</a></li>
                <li><a href="#">Email: admin-demo@s-cart.org</a></li>
            </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>Subscribe</h2>
              <form action="https://demo.s-cart.org/subscribe" method="post" class="searchform">
                <input type="hidden" name="_token" value="RAUUX5aaYo2tCerlvYYSdBUHOchbW14lCfgpMZlk">
                <input type="email" name="subscribe_email" required="required" placeholder="Your email">
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p>Get the most recent updates from us</p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2018 <a href="https://s-cart.org">S-Cart 3.0.4</a> Inc. All rights reserved.</p>
          <p class="pull-right">Hosted by  <span><a target="_blank" href="https://giaiphap247.com">GiaiPhap247</a></span></p>
            <!--
            S-Cart is free open source and you are free to remove the powered by S-cart if you want, but its generally accepted practise to make a small donation.
            Please donate via PayPal to https://www.paypal.me/LeLanh or Email: fastle.ktc@gmail.com
            //-->
        </div>
      </div>
    </div>
  </footer>
<!--//Footer-->

<script src="https://demo.s-cart.org/templates/default/js/jquery.js"></script>
<script src="https://demo.s-cart.org/templates/default/js/jquery-ui.min.js"></script>
<script src="https://demo.s-cart.org/templates/default/js/bootstrap.min.js"></script>
<script src="https://demo.s-cart.org/templates/default/js/jquery.scrollUp.min.js"></script>
<script src="https://demo.s-cart.org/templates/default/js/jquery.prettyPhoto.js"></script>
<script src="https://demo.s-cart.org/templates/default/js/main.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>




    <script type="text/javascript">
      function formatNumber (num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
      }
      $('#shipping').change(function(){
          $('#total').html(formatNumber(parseInt(0)+ parseInt($('#shipping').val())));
      });
    </script>

    <script type="text/javascript">
        function addToCartAjax(id,instance = null){
        $.ajax({
            url: "https://demo.s-cart.org/addToCartAjax",
            type: "POST",
            dataType: "JSON",
            data: {"id": id,"instance":instance, "_token":"RAUUX5aaYo2tCerlvYYSdBUHOchbW14lCfgpMZlk"},
            async: false,
            success: function(data){
              // console.log(data);
                error= parseInt(data.error);
                if(error ==0)
                {
                  setTimeout(function () {
                    if(data.instance =='default'){
                      $('.shopping-cart').html(data.count_cart);
                    }else{
                      $('.shopping-'+data.instance).html(data.count_cart);
                    }
                  }, 1000);

                    $.notify({
                      icon: 'glyphicon glyphicon-star',
                      message: data.msg
                    },{
                      type: 'success'
                    });
                }else{
                  if(data.redirect){
                    window.location.replace(data.redirect);
                    return;
                  }
                  $.notify({
                  icon: 'glyphicon glyphicon-warning-sign',
                    message: data.msg
                  },{
                    type: 'danger'
                  });
                }

                }
        });
    }
</script>

<!--message-->
            <!--//message-->


<!--Module bottom -->
  <!--//Module bottom -->
    <div id="loading">
          <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
   </div>
</body>
</html>

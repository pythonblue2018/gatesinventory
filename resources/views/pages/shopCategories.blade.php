@extends('pages.shopHeader')

@section('extra-js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  </script>

@endsection

@section('filter-form')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  function categoryFunction($id) {
    $.ajax({  
               type:'POST',
               url:"/shopProductsByCat",
               data: {_token: "{{ csrf_token() }}", id: $id },
               
               success:function(data) {
                  console.log("cat click",data);
                  document.getElementById("product_sort").innerHTML = data;
              }
    });          
  }
  function brandFunction($id) {
      $.ajax({  
                type:'POST',
                url:"/shopProductsByBrand",
                data: {_token: "{{ csrf_token() }}", id: $id },
                
                success:function(data) {
                    console.log("brand click",data);
                    document.getElementById("product_sort").innerHTML = data;
                }
      });          
  }
</script>

<!--breadcrumb-->
      <div class="breadcrumbs pull-left">
        <ol class="breadcrumb">
          <li><a href="">Home</a></li>
          <li class="active">All Categories</li>
        </ol>
      </div>

          <!--//breadcrumb-->


<script>
  $('[name="filter_sort"]').change(function(event) {
    var filter_sort = $('#filter_sort option:selected').attr('value');
    console.log(filter_sort);

    $.ajax({  
               type:'POST',
               url:"/shopProductsSorted",
               data: {_token: "{{ csrf_token() }}", filter_sort: filter_sort},
               
               success:function(data) {
                  document.getElementById("product_sort").innerHTML = data;
              }
    });       
  });
</script>

@endsection

@section('content')

<!--main right-->
<div id="product_sort" class="features_items"><!--features_items-->
  <h2 class="title text-center">Browse Categories</h2>

@foreach($categories as $product)            
<div class="col-sm-2">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo_home text-center">
<a href="{{ route('shop.shopProductCat',['id' => $product->id ])}}">
  <img src="{{ asset('img/cats/'.$product->image)}}"  height="50%" width="50%" alt="Easy Polo Black Edition 17" />
</a>

<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a>
<p><small style="color: #b2b2b2;">{{ $product->details }}</small>


</div>
@if($product->view == App\Product::max('view'))
    <img  src="{{ asset('img/hot.png')}}" class="new" alt="" /> 
@endif
</div>
<div class="choose">

</div>
</div>
</div>
@endforeach


</div> <!-- // id = products -->


<!--features_items-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Hot products</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                                                  <div class="item active">

@foreach($products3 as $product3)
<div class="col-sm-3">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="{{ route('shop.shopProductView',['id' => $product3->id ])}}"><img src="{{ asset('img/'.$product3->image)}}"  height="50%" alt="Easy Polo Black Edition 17" /></a>
<span class="new-price">${{ $product3->price }}</span>
<a href="{{ route('shop.shopProductView',['id' => $product3->id ])}}" ><p>{{ $product3->name }}</p></a>

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
<div class="col-sm-3">
<div class="product-image-wrapper product-single">
<div class="single-products   product-box-8">
<div class="productinfo text-center">
<a href=""><img src="{{ asset('img/products/img-18.jpg')}}" alt="Easy Polo Black Edition 8" /></a>
<span class="new-price">$15,000</span>
<a href=""><p>Easy Polo Black Edition 8</p></a>
<a class="btn btn-default add-to-cart" onClick="addToCartAjax('8','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
</div>

<img src="{{ asset('img/products/hot.png')}}" class="new" alt="" />

</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">
<li><a onClick="addToCartAjax('8','wishlist')"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
<li><a onClick="addToCartAjax('8','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
</ul>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="product-image-wrapper product-single">
<div class="single-products   product-box-1">
<div class="productinfo text-center">
<a href=""><img src="{{ asset('img/products/img-1.jpg')}}" alt="Easy Polo Black Edition 1" /></a>
<span class="new-price">$5,000</span><span class="old-price">$15,000</span>
<a href=""><p>Easy Polo Black Edition 1</p></a>
<a class="btn btn-default add-to-cart" onClick="addToCartAjax('1','default')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
</div>

<img src="{{ asset('img/products/sale.png')}}" class="new" alt="" />

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


<!--//main right-->

 @endsection

 
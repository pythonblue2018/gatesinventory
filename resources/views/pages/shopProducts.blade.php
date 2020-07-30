@extends('pages.shopHeader')

@section('extra-js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  </script>

@endsection

@section('filter-form')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--breadcrumb-->

<div class="col-sm-12">
  <img src="{{ asset('img/banners/banner11.jpg')}}"  class="img-responsive" alt="" />
</div>    
      <div class="breadcrumbs pull-left">
        <ol class="breadcrumb">
          <li><a href="">Home</a></li>
          <li class="active">All products</li>
        </ol>
      </div>
          <!--//breadcrumb-->
<form action="{{ route('shop.shopProducts')}}" method="post" id="filter_sort">
<div class="pull-right" style="margin-top: 5px;">

  <a href="{{ route('shop.shopCart')}}"> <i class="fa fa-shopping-cart"></i></a>(<span id="cart_quantity">{{ $cart_qty }}</span>)

<div>
 <!--  @php
    $queries = request()->except(['filter_sort','page']);
  @endphp
  @foreach ($queries as $key => $query)
    <input type="hidden" name="{{ $key }}" value="{{ $query }}">
  @endforeach -->

<select class="custom-select" name="filter_sort" id="filter_sort_selected">
  <option value="">Select filter sort</option>
  <option value="price_asc" {{ ($filter_sort =='price_asc')?'selected':'' }}>Sort by price (Low to high)</option>
  <option value="price_desc" {{ ($filter_sort =='price_desc')?'selected':'' }}>Sort by price (High to low)</option>
  <option value="sort_asc" {{ ($filter_sort =='sort_asc')?'selected':'' }}>Sort by priority (asc)</option>
  <option value="sort_desc" {{ ($filter_sort =='ort_desc')?'selected':'' }}>Sort by priority (desc)</option>
  <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>Sort by oldest product</option>
  <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>Sort by latest product</option>
</select>
</div>
<!-- <input class="custom-select" type="submit" name="sort"> -->
</div>
 {{ csrf_field() }}

</form>
<!--//fillter-->

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

<style type="text/css">
  .pagination {
    display: flex;
  }
</style>

<!--main right-->
<div id="product_sort" class="features_items"><!--features_items-->
  <h2 class="title text-center">Products</h2>
<div class="row">
  
@foreach($products as $product)            
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}">
  <img src="{{ asset('img/'.$product->image)}}"  alt="Easy Polo Black Edition 17" />
</a>

<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" style="color: #11324b;"><h4>{{ $product->name }}</h4></a>
<p><small style="color: #b2b2b2;">{{ $product->details }}</small></p>
<p><span class="new-price">${{ $product->price }}</span></p>

<!-- <span class="new-price">${{ $product->price }}</span>
<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a> -->

<!--  <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">
 {{ csrf_field() }} -->
  <!--  <a type="submit" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Add to cart</a>  -->

  <button onClick="ajaxAddToCart({{$product->id}})" class="btn btn-default text-center add-to-cart">
    <i class="fa fa-shopping-cart"></i> 
  Add to Cart</button>

  <!-- </form> -->

</div>
@if($product->view == App\Product::max('view'))
    <img  src="{{ asset('img/hot.png')}}" class="new" alt="" /> 
@endif
</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">
@php 
  $user_id = isset(auth()->user()->id) ? auth()->user()->id : 0 ;
@endphp

@if(App\Wishlist::where('user_id', $user_id)
                ->where('product_id',$product->id)
                ->exists())
   <li style="text-align: center;"><a style="color: green;"><i class="fa fa-plus-square"></i>In your wishlist</a>
    </li>
@else 
  <li style="text-align: center;"><a href="{{ route('shop.shopAddToWishlist',['add_id' => $product->id ])}}"><i class="fa fa-plus-square"></i>Add to wishlist</a>
  </li>
@endif

</ul>
</div>
</div>
</div>
@endforeach
</div>
</div> <!-- // id = products -->

<div style="text-align: center;">
  {{ $products->links() }}
</div>

<script type="text/javascript">

  // function ajaxAddToCart(id){
 
  //   var product_id = id;
  //   // console.log(product_id);

  //   $.ajax({
  //          type:'POST',
  //          url:'/ajaxAddToCart',
  //          data:{ _token: "{{ csrf_token() }}", id: product_id },

  //          success:function(data){
  //             console.log(data);
  //             document.getElementById("cart_quantity").innerHTML = data['cart_qty'];
  //             document.getElementById("header_cart_quantity").innerHTML = 
  //             `<button type="button" class="btn btn-success btn-rounded btn-icon">`+data['cart_qty']+`</button>`;
  //           }
  //       });
  // }
</script>

<!--features_items-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Hot products</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                                                  <div class="item active">
<div class="row">
@foreach($products3 as $product3)
<div class="col-sm-4">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="{{ route('shop.shopProductView',['id' => $product3->id ])}}">
  <img src="{{ asset('img/'.$product3->image)}}"  height="80%" width="80%" /></a>
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
</div>

</div>
<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
<i class="fa fa-angle-left"></i>
</a>
<a style="padding-right: 20px;" class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
<i class="fa fa-angle-right"></i>
</a>
</div>
</div>

  <!--/recommended_items-->


<!--//main right-->

 @endsection

 
@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="https://demo.s-cart.org">Account</a></li>
          <li class="active">My Wishlist</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection

@section('content')
        <!-- Main content -->
@include('user.account_sidebar')

<!-- Page content -->

@foreach($products as $product)            
<div class="col-sm-3">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}"><img src="{{ asset('img/'.$product->image)}}"  height="50%" alt="Easy Polo Black Edition 17" /></a>
<span class="new-price">${{ $product->price }}</span>
<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a>

 <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">
 {{ csrf_field() }}
  <!--  <a type="submit" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Add to cart</a>  -->
  <button type="submit" class="btn btn-default text-center add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
  </form>

</div>
</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">
<li><a href="{{ route('shop.deleteFromWishlist',['del_id' => $product->product_id ])}}"><i class="fa fa-trash" style="color: red;"></i>Remove from wishlist</a></li>

</ul>
</div>
</div>
</div>
@endforeach
                                
</div> 
</div>
            
@endsection

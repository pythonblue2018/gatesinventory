
<h2 class="title text-center">Products By Brand > {{ $brand->name }}</h2>

@foreach($products as $product)            
<div class="col-sm-4">
<div class="product-image-wrapper product-single">
<div class="single-products product-box-17">
<div class="productinfo text-center">
<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}">
  <img src="{{ asset('img/'.$product->image)}}"  height="50%" width="90%" alt="Easy Polo Black Edition 17" />
</a>

<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a>
<p><small style="color: #b2b2b2;">{{ $product->details }}</small>
<span class="new-price">${{ $product->price }}</span></p>



 <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">
 {{ csrf_field() }}

  <button type="submit" class="btn btn-default text-center add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
  </form>

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
   <li><a style="color: green;"><i class="fa fa-plus-square"></i>In your wishlist</a>
    </li>
@else 
  <li><a href="{{ route('shop.shopAddToWishlist',['add_id' => $product->id ])}}"><i class="fa fa-plus-square"></i>Add to wishlist</a>
  </li>
@endif

<li><a onClick="addToCartAjax('17','compare')"><i class="fa fa-plus-square"></i>Add to compare</a></li>
</ul>
</div>
</div>
</div>
@endforeach

<div style="text-align: center;">
  {{ $products->links() }}
</div>
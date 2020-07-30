@extends('pages.shopHeaderBannerSidebar')

@section('content')

<style type="text/css">
	.pagination {
		display: flex;
	}
</style>
<!--main right-->
 <!-- <div id="product_sort" class="features_items"> -->
	<!--features_items -->
      <h2 class="title text-center">Browse Products</h2>
 <div class="row">

@foreach($categories as $product)            
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
	
	<div class="text-center">
	<a href="{{ route('shop.shopProductCat',['id' => $product->id ])}}">
		<img src="{{ asset('img/cats/'.$product->image)}}"  height="120px" width="120px" alt="Easy Polo Black Edition 17" /></a>
	<a href="{{ route('shop.shopProductView',['id' => $product->id ])}}" ><p>{{ $product->name }}</p></a>
	</div>
	</div>
@endforeach
                                
</div>

<div class="col-md-12" style="text-align: center;">{{ $products->links() }}</div>
<!--features_items-->

        <!--  -->
  <!--/recommended_items-->


<!--//main right-->
 
 @endsection
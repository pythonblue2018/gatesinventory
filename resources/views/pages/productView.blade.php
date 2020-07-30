@extends('layouts.royalbase')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endsection
@section('content')

 <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Product Details</h4>
                </div>
                <div>
                    <a a href="{{ route('admin.editProduct',['id' => $product->id ])}}" >
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Edit Product
                    </button>
                    </a>
                </div>
              </div>
            </div>
          </div>

<style type="text/css">
  .table th, .table td{
     padding: 10px 5px;
     overflow: hidden;
  }
</style>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
          
            
            <div class="row">
              <div class="col-md-5">
<!-- test -->

        <img style="width:300px;" src="{{ asset('img/'.$product->image)}}">
       </div>

        <div class="col-xs-5 col-sm-6 col-md-5">
        <div class="thumbnail">
        <div class="caption">
        <h4>{{ $product->name }}</h4>
        <h5>{{ $category->name }} | 10 Sold | {{ $product->quantity }} in Stock</h5>
        <p>{{ $product->details }}</p>
        <h5><strong>Price: ${{ $product->price }}</strong></h5><br>

        <p>@if ($product->quantity > 2)
          <div class="col-md-5 form-group Qty" >
          <label for="quantity" class="col-form-label">Quantity </label>    

<div class="row" style="display: table-row;">        
<span class="input-group-btn first qtyminus">
@if ($cart_item_qty > 0)           
<a href="{{ route('cart.removeFromCart',    ['id'=>$product->id]) }}">
<button class="btn btn-defualt" type="button">-</button></a> 
@endif     
</span>           
<input style="width: 40px;" type="text" readonly name="quantity" value="{{ $cart_item_qty }}" min="1" max="5" class="form-control qty">           
<span class="input-group-btn last qtyplus">  
@if ($cart_item_qty > 0)   
<a href="{{ route('cart.updateCart', ['id'=>$product->id]) }}">
<button class="btn btn-defualt" type="button">+</button>
@endif
</a>            
</span>  
</div>

          </div>
        <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-warning btn-block text-center">Add to Cart</button>
        </form>
        </p>
        @else <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to Wish List</a> </p>
        @endif 
        </div>
        </div>
        </div>
      <div class="col-md-12">
    
        <hr style="border-color: #F0CA4D;">

<div class="product-tabs">
<!-- Nav tabs -->

<a style="color: #F0CA4D" class="nav-link active" id="product-desc-tab" data-toggle="tab" href="#product_desc" role="tab" aria-controls="product_desc" aria-selected="true"><h3>Products Description</h3></a>
        <hr style="border-color: #F0CA4D;">
<!-- Tab panes -->
<ul style="font-family: Roboto, sans-serif;
    font-size: 1.5rem;
    font-weight: 400;
    line-height: 1.5;
    color: #5d5d60;">
<li>100% cotton.</li>
<li>Machine washable.</li>
<li>Size medium has a 17&frac34;&quot; body length.</li>
<li>Signature embroidered pony at the left chest.</li>
<li>Rib-knit crewneck. Buttoned placket.</li>
<li>Puffed long sleeves with rib-knit cuffs.</li>
<li>Ruffled hem.</li>
<li>Imported.</li>
</ul>
<br><br>
<a style="color: grey" class="nav-link active" id="product-desc-tab" data-toggle="tab" href="#product_desc" role="tab" aria-controls="product_desc" aria-selected="true"><h3>Related Products</h3></a>
<hr style="border-color: #F0CA4D;">

  @forelse ($products as $product)

            <div class="col-xs-3 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <h4 style="text-align: center;">
                            <a href="{{ route('admin.productView',['id' => $product->id ])}}" >{{ $product->name }}</a></h4>
                        <p class="text-center"><img src="{{ asset('img/'.$product->image) }}" alt="..." class="itemmg-responsive" style="height: 120px; width: 120px" /></p>
                        <p><strong>Price: ${{ $product->price }}</strong><br>
                        {{ $product->details }}</p>
                        <p>
                @if ($product->quantity > 0)
                <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning btn-block text-center">Add to Cart</button>
                </form>
                @endif  </p>
                      
                    </div>
                </div>
            </div>

        @empty

            <div class="col-xs-3 col-sm-6 col-md-3" style="text-align: left">No items found</div>
        @endforelse      

        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
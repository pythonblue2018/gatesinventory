@extends('layouts.base')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endsection
@section('content')

<div class="content-wrapper"> 
    <section class="content-header">
      <h1>
        Product Edit
        <small>Control panel | <a class="nav-link" href="{{ route('shop.cart') }}">Cart 
                @if (Session::get('cart')) ({{ Session::get('cart')->totalQty }})
                @else (0)
                @endif  </a>
        </small>
      </h1>        
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Main content -->
<div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Product </h3>
            <!-- <div class="box-tools pull-right">
              <a href="addNewProduct" type="button" class="btn btn-block btn-primary">Add New Product</a>
            </div> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            
            <div class="row">
              <div class="col-md-5">
<!-- test -->

        <img style="width:300px;" src="{{ asset('img/'.$product->image)}}">
       </div>

        <div class="col-xs-5 col-sm-6 col-md-5">
        <div class="thumbnail">
        <div class="caption">
        <h2>{{ $product->name }}</h2>
        <h4>{{ $category->name }} | 10 Sold | {{ $product->quantity }} in Stock</h4>
        <h4><strong>Price: ${{ $product->price }}</strong></h4><br>
        <p>{{ $product->details }}</p>

        <p>@if ($product->quantity > 4)
          <div class="col-md-5 form-group Qty" >
          <label for="quantity" class="col-form-label">Quantity </label>                        
          <div class="input-group">           
          <span class="input-group-btn first qtyminus">           
          <button class="btn btn-defualt" type="button">-</button>            
          </span>           
          <input type="text" readonly name="quantity" value="1" min="1" max="492" class="form-control qty">           
          <span class="input-group-btn last qtyplus">           
          <button class="btn btn-defualt" type="button">+</button>            
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
</section>
</div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
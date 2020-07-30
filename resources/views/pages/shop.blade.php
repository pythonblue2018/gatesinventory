@extends('layouts.royalbase')
@section('extra-css')

<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

@endsection

@section('content')
<style type="text/css">
.form-control {
    background-color: #e0f9d4;
    font-size: 1.5rem;
    font-family: sans-serif;
    }   
</style>

<div class="content-wrapper"> 
<section class="content-header">
      <h1>
        Shop        
        <small>Products | 
            <a class="nav-link" href="{{ route('shop.cart') }}">
                <i class="fa fa-shopping-bag fa-lg"></i> 
                @if (Session::get('cart')) ({{ Session::get('cart')->totalQty }})
                @else (0)
                @endif  </a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Shop</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
        <!-- Main content -->
 <form class="form-inline form-validate" enctype="multipart/form-data" method="get" action="{{ route('admin.shopCat')}}">
        <div class="form-group">
        <h5 style="font-weight: bold; padding:0px 5px; ">Filter By Category/Products:</h5>
        </div>
        <div class="form-group" style="min-width: 220px">
        <select class="form-control" name="categories_id" style="width: 100%"><i class="fa fa-angle-down"></i>

        <option value="100">Select Category </option>
        <option value="100"><a href="/products"> All </a></option>

        @foreach($categories as $category)

        <option value="{{$category->id}}" {{ ($catName == $category->name) ? 'selected' : '' }} > {{$category->name}}</option>
        
        @endforeach  

        </select>
        </div>
        <div class="form-group">
        <input type="text" name="product" class="form-control" id="exampleInputPassword3" placeholder="Products">
        </div>
        <button type="submit" class="btn btn-success">Search</button>
        <a href="#" class="btn btn-danger">Clear Search</a>
      </form>
<hr style="border-color: #c2c2c2;">
    <div> 
        <div class="row">
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

         </div><!-- End row -->
 
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
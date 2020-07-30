@extends('layouts.royalbase')

@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Edit Product</h4>
                </div>
                <div>
                    <a href="{{route('admin.addNewProduct')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Product
                    </button></a>
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

<!-- FORM -->
<form method="POST" action="{{route('admin.postEditProduct',['id' => $product->id ]) }}" class="form-horizontal form-validate">
    
<div class="form-group">
<label for="name" class="col-sm-2 col-md-3 control-label">Product Type </label>
<div class="col-sm-10 col-md-6">
    <select class="form-control field-validate prodcust-type" name="product_type">
        <option value="">Choose Type</option> 
        <option value="0">Simple</option>
        <option value="1">Variable</option>
        <option value="2">External</option>
    </select><span class="help-block" style="font-weight: normal;font-size: 11px; margin-bottom: 0;">
    Please choose product type..</span>
</div>
</div>

<hr style="border-color: #c2c2c2;">
<div class="form-group">
<label for="name" class="col-sm-2 col-md-3 control-label">Select Category</label>
<div class="col-sm-10 col-md-6">
      <select class="form-control" name="product_category" style="width: 245px;">
        <!-- <option value="0">Select Category</option> -->
        @foreach($categories as $category)
         <option value="{{$category->id}}" {{ ($catName == $category->name) ? 'selected' : '' }} > {{$category->name}}</option>
        @endforeach  
      </select>
    </div>
</div>    
<div class="form-group">
  <label for="name" class="col-sm-2 col-md-3 control-label">Product Name</label>
  <div class="col-sm-10 col-md-4">
        <input type="text" name="product_name" value="{{ $product->name}}" class="form-control field-validate">
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product Name In English </span>
  <span class="help-block hidden">This field is required.</span>
  </div>
</div>
<div class="form-group">
  <label for="name" class="col-sm-2 col-md-3 control-label">Details</label>
    <div class="col-sm-10 col-md-8">
      <input type="text" name="product_details" value="{{ $product->details}}"class="form-control" rows="1">
      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter product description in English</span>
      </div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 col-md-3 control-label">Description</label>
  <div class="col-sm-10 col-md-8">
    <input type="text" name="product_description" value="{{ $product->description}}"class="form-control" rows="2">
    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
     Enter product description in English</span>
    </div>
</div>   
<div class="form-group">
<label for="name" class="col-sm-2 col-md-3 control-label">Brand</label>
<div class="col-sm-10 col-md-4">
  <select class="form-control" name="product_brand">
    @php $brands = App\Brand::all(); @endphp
      @foreach($brands as $brand)
          <option value="{{$brand->id}}" {{ ($catName == $brand->name) ? 'selected' : '' }} > {{$brand->name}}</option>
        @endforeach          
  </select>
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
  Please choose &#039;Active&#039; to show this product in flash sales.</span>                    
</div>
</div>
<div class="form-group">
  <label for="name" class="col-sm-2 col-md-3 control-label">Price</label>
  <div class="col-sm-10 col-md-4">
        <input type="number" name="product_price" value="{{ $product->price}}" class="form-control field-validate">
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product Price </span>
  <span class="help-block hidden">This field is required.</span>
  </div>
</div>
<div class="form-group">
  <label for="name" class="col-sm-2 col-md-3 control-label">Quantity</label>
  <div class="col-sm-10 col-md-4">
        <input type="number" name="product_quantity" value="{{ $product->quantity}}" class="form-control field-validate">
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product quantity </span>
  <span class="help-block hidden">This field is required.</span>
  </div>
</div>
<div class="form-group">
     <label for="name" class="col-sm-2 col-md-3 control-label">Image</label>
    <div class="col-sm-5 col-md-4" >
     <input id="products_image" class="field-validate" name="product_image" value="{{ $product->image}}" type="file">{{ $product->image}}
      </div>
      <div class="col-sm-5 col-md-4" >
      <img src="{{ asset('img/'.$product->image)}}" height="100px" width="80px" style="border: 1px solid; border-color: #c2c2c2;"/>

      </div>
 </div>
 <div class="form-group">
     <label for="name" class="col-sm-2 col-md-3 control-label">Image2</label>
    <div class="col-sm-5 col-md-4" >
     <input id="products_image2" class="field-validate" name="product_image2" value="{{ $product->image2}}" type="file">{{ $product->image2}}
      </div>
      <div class="col-sm-5 col-md-4" >
      <img src="{{ asset('img/'.$product->image2)}}" height="100px" width="80px" style="border: 1px solid; border-color: #c2c2c2;"/>

      </div>
 </div>
 <div class="form-group">
     <label for="name" class="col-sm-2 col-md-3 control-label">Image3</label>
    <div class="col-sm-5 col-md-4" >
     <input id="products_image3" class="field-validate" name="product_image3" value="{{ $product->image3}}" type="file">{{ $product->image3}}
      </div>
      <div class="col-sm-5 col-md-4" >
      <img src="{{ asset('img/'.$product->image3)}}" height="100px" width="80px" style="border: 1px solid; border-color: #c2c2c2;"/>

      </div>
 </div>
 <div class="form-group">
     <label for="name" class="col-sm-2 col-md-3 control-label">Image4</label>
    <div class="col-sm-5 col-md-4" >
     <input id="products_image4" class="field-validate" name="product_image4" value="{{ $product->image4}}" type="file">{{ $product->image4}}
      </div>
      <div class="col-sm-5 col-md-4" >
      <img src="{{ asset('img/'.$product->image4)}}" height="100px" width="80px" style="border: 1px solid; border-color: #c2c2c2;"/>

      </div>
 </div>
      <hr style="border-color: #c2c2c2;">
    <div class="mx-auto" align="center">
      {{ csrf_field() }}
          <p>
          <button type="submit" class="btn btn-primary text-right">Submit</button></p>
    </div>            
</form>
<hr style="border-color: #c2c2c2;">

</div>
<!-- End Form  -->
</div>
</div>
</div>
</div>

@endsection

@section('extra-js')
  Include AlgoliaSearch JS Client and autocomplete.js library
  <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
  <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
  <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
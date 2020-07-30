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
                  <h4 class="font-weight-bold mb-0">Create Product</h4>
                </div>
                <div>
                    <a href="{{route('admin.addNewProduct')}}"><button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Create Product</button></a>
                </div>
              </div>
            </div>
          </div>


<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
<!-- FORM -->
<form method="POST" action="{{route('admin.addNewProduct') }}" class="form-horizontal form-validate">
<h6>Product Details</h6>   

<div class="row mt-4 mb-4">

<div class="col-md-4">

<div class="form-group ">
  <label for="name" class="control-label">Product Name</label>
        <input type="text" name="product_name" class="form-control field-validate">
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product Name</span>
  <!-- <span class="help-block hidden">This field is required.</span> -->
</div>
</div>
<div class="col-sm-10 col-md-8">

<div class="form-group">
  <label for="name" class="  control-label">Details</label>
      <textarea id="product_details" name="product_details"class="form-control" rows="1"></textarea>
       
      </div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="name" class="  control-label">Select Category</label>
      <select class="form-control" name="product_category" style=" ">
        <option value="1">Select Category</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}" {{ ($catName == $category->name) ? 'selected' : '' }} > {{$category->name}}</option>
        @endforeach  
      </select>
    </div>
</div>    

<div class="col-md-4">
<div class="form-group">
<label for="name" class="  control-label">Brand</label>
  <select class="form-control" name="product_brand">
    @php $brands = App\Brand::all(); @endphp
      @foreach($brands as $brand)
          <option value="{{$brand->id}}" {{ ($catName == $brand->name) ? 'selected' : '' }} > {{$brand->name}}</option>
        @endforeach          
  </select>
</div>                   
</div>

<div class="col-md-4">
<div class="form-group">
<label for="name" class="control-label">Product Type </label>
    <select class="form-control field-validate prodcust-type" name="product_type">
        <option value="0" selected>General</option>
        <option value="1">Service</option>
    </select>
</div>
</div>
  <div class="col-sm-10 col-md-8">

<div class="form-group">
<label for="name" class="  control-label">Description</label>
    <textarea id="editor1" name="product_description"class="form-control" rows="5"></textarea>
    
    </div>
</div>   
<div class="col-sm-10 col-md-4">

</div>
</div>

      <hr style="border-color: #c2c2c2; margin-bottom: 20px;">
<h6>Additional Details</h6>
<div class="row mt-4 mb-4">

<div class="col-sm-10 col-md-4">
 <div class="form-group">
  <label for="name" class=" control-label">Price</label>
  <input type="number" name="product_price" class="form-control field-validate">
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product Price* </span>
  <!-- <span class="help-block hidden">This field is required.</span> -->
  </div>
</div>
<div class="col-sm-10 col-md-4">
 <div class="form-group">
  <label for="name" class=" control-label">Purchase Price</label>
  <input type="number" name="product_price" class="form-control field-validate">
   
   </div>
</div>

<div class="col-sm-10 col-md-4">
<div class="form-group">
  <label for="name" class=" control-label">Quantity</label>
        <input type="number" name="product_quantity" class="form-control field-validate">
  
  </div>
</div>

<div class="col-sm-10 col-md-4">
 <div class="form-group">
  <label for="name" class=" control-label">Product Code</label>
  <input type="number" name="product_price" class="form-control field-validate">
  <!-- <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
       Enter Product Price </span>
  <span class="help-block hidden">This field is required.</span> -->
  </div>
</div>
<div class="col-sm-10 col-md-4">
 <div class="form-group">
  <label for="name" class=" control-label">Barcode</label>
  <input type="number" name="product_price" class="form-control field-validate">
  </div>
</div>
<div class="col-sm-10 col-md-4">
 <div class="form-group">
  <label for="name" class=" control-label">Reorder Quantity</label>
  <input type="number" name="product_price" class="form-control field-validate">
  </div>
</div>
</div>
      <b style="margin-bottom: 20px;"></b>
<h6>Product Image</h6>
<div class="row">
<div class="col-sm-10 col-md-3">
<div class="form-group">
     <label for="name" class=" control-label">Image</label>
     <input id="products_image" class="field-validate" name="product_image" type="file">
            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              Upload default product image.</span>
                            </div>
</div>
                 <div class="col-sm-10 col-md-3">
<div class="form-group">
     <label for="name" class="  control-label">Image2</label>
     <input id="products_image2" class="field-validate" name="product_image2" type="file">
             
                            </div>
</div>
                <!--  <div class="col-sm-10 col-md-3">
<div class="form-group">
     <label for="name" class=" control-label">Image3</label>
     <input id="products_image3" class="field-validate" name="product_image3" type="file">
             
                            </div>
</div>
                 <div class="col-sm-10 col-md-3">
<div class="form-group">
     <label for="name" class=" control-label">Image4</label>
     <input id="products_image4" class="field-validate" name="product_image4" type="file">
             
                            </div>
</div> -->
</div>
      <hr style="border-color: #c2c2c2; margin-bottom: 10px;">


    
<!-- <div class="form-group special-link">
  <label for="name" class="col-sm-2 col-md-3 control-label">Special</label>
  <div class="col-sm-10 col-md-4">
       <select class="form-control" onChange="showSpecial()" name="isSpecial" id="isSpecial">
          <option value="no">No</option>
          <option value="yes">Yes</option>
      </select>
  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
  Choose if this is in deals/special products. Special products belongs to deals.</span>
  </div>
</div> -->

    <div class="mx-auto">
      {{ csrf_field() }}
          <p>
          <button type="submit" class="btn btn-primary text-right">Create Product</button></p>
    </div>            
</form>
<!-- End Form  -->
  </div>
  </div>
  </div>
  </div>
</div>

@endsection

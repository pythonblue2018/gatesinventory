@extends('layouts.royalbase')

@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Create Order</h4>
                </div>
                <div>
                    <a href="{{route('admin.createOrder')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Create Order
                    </button></a>
                </div>
              </div>
            </div>
          </div>

<!-- test -->
<style type="text/css">
  .table th, .table td{
     padding: 10px 5px;
     overflow: hidden;
  }
</style>

  <div class="row">
    <div class="col-md-8">

    <div class="grid-margin stretch-card">
     <div class="card">
       <div class="card-header"><h4>Add Product</h4></div>
          <div class="card-body">
    
       <div class="form-group" style="font-weight: bold; text-align: left; min-width: 220px; display:flex;">
        <div class="form-group col-md-3">Category</div>
        <div class="form-group col-md-4">Product</div>
        <div class="form-group col-md-4">Quantity</div>
      </div>

  <div class="form-group" style="text-align: left; min-width: 220px; display:flex;">        
        <select class="form-control pull-left" id="category" name="category" style="width: 245px;">
          <option value="0">Select Category</option>
          @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} : {{$category->id}}</option>
          @endforeach  
        </select>
        @php $stock_limit = 10; @endphp

        <div id="product_by_cat">
            <select class="form-control pull-left" id="product" name="product" style="width: 245px;">
            <option value="0">Select Product</option>
            @foreach($products as $product)            
                <option value="{{$product->id}}"> {{$product->name}} : ${{$product->price}}</option>
            @endforeach  
            </select>
        </div>

        <select class="form-control pull-left" id="quantity" name="quantity" style="width: 245px;">
          <option value="1">Select Quantity</option>
          @for ($i = 1; $i <= $stock_limit; $i++)
            <option value="{{ $i }}"> {{ $i }}</option>
          @endfor  
        </select>
        {{ csrf_field() }}        
  </div>

    <p>
    <button onClick="addToAjaxCart()" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Add To Cart</button>
    </p>

    </div>
    </div>
 </div> 
    <div class="grid-margin stretch-card">
      <div class="card">
      <div class="card-header"><h4>Shipping Details</h4></div>
      <div class="card-body">
        <div class="form-group col-md-12" style="font-weight: bold; text-align: left; min-width: 220px; display:flex;">
          <div class="form-group col-md-3">
          <label for="phone" class="control-label"><i class="fa fa-user"></i> First name:</label> 
      <input name="name" id="name" type="text" placeholder="First name" value="" >
          </div>
          <div class="form-group col-md-3"><label for="address" class="control-label"><i class="fa fa-home"></i> Address:</label> 
      <input name="address" id="address" type="text" placeholder="Address" value="">
          </div>
          <div class="form-group col-md-3"><label for="post_code" class="control-label"><i class="fa fa-university"></i> Post Code</label>
      <input name="post_code" type="text" placeholder="Post Code" value="">
          </div>    
      </div>
      </div>
      </div>    
    </div>
    <div class="grid-margin stretch-card offset-md-4">
      
      <button onClick="placeOrder()" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Place Order</button>
      </div>
  </div>

  <div class="col-md-4">
        <div class="card">
          <div class="card-header"><h4>Basket</h3></div>
          <div class="card-body">            
            <div class="row">
              <div class="col-md-12">
              <div id="basket"></div>
              </div>
            </div>
          </div>
        </div>
  </div>

</div>
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
  var final_cart = [];
  var order_total = 0;
  var total_quantity = 0;
  var product = [];

  function addToAjaxCart(){
    var id  = $('#product option:selected').val();
    var quantity = $('#quantity option:selected').val();

    $.ajax({  
        type:'POST',
          url:"/addToCartProduct/"+id,
          data: {_token: "{{ csrf_token() }}" },
          
          success:function(data) {
            // console.log("Product:",data);
            product = data;
            quantity = (quantity > product.quantity) ? product.quantity : quantity;
          var cart = {
              item: product,
              qty : quantity,
              price: product.price,
              item_total: product.price*quantity
          }; 
          final_cart.push(cart);
          order_total = order_total + cart.item_total;
          total_quantity = total_quantity + parseInt(quantity);
          console.log(final_cart);
          console.log(quantity);

          var basket = "" ;
          for (var i=0; i<final_cart.length;i++) { 
            basket += `<tr>
                            <td style='width:40%;'>`+final_cart[i]['item']['name']+`</td>
                            <td >`+final_cart[i]['item']['price']+`</td>
                            <td >`+final_cart[i]['qty']+`</td>
                            <td >`+final_cart[i]['item_total']+`</td>
                        </tr>`
          }
          document.getElementById("basket").innerHTML = `
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th >Product</th>
                    <th>Price</th>
                    <th style="width:10%;">Qty</th>
                    <th style="width:15%;"class="text-center">Subtotal</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                `+ basket +`
                <tfoot>       
                <tr>
                    <td></td>
                    <td></td>
                    <td class="hidden-xs text-center"><strong>Total</strong></td>
                    <td style="width:30%;"class="hidden-xs text-center"><strong>$ `+order_total+`</strong></td>
                  
                </tr>
                </tfoot>
            </table>`;  
        }
    });       
  }

  function placeOrder(){
        var name = $('#name').val();
        var address =  $('#address').val();
        console.log('cart',final_cart);
        console.log('order_total',order_total);


        $.ajax({  
              type:'POST',
               url:"/ajaxPlaceOrder",
               data: {_token: "{{ csrf_token() }}",
                       name: name,
                       address: address,
                       post_code: address, 
                       cart: final_cart,
                       total_quantity: total_quantity,
                       order_total: order_total},
               
               success:function(data) {
                  console.log(data);                                 
              }
    });    
  }

  $('[name="category"]').change(function(event) {
    var id = $('#category option:selected').val();

    $.ajax({  
              type:'POST',
               url:"/createOrderCat",
               data: {_token: "{{ csrf_token() }}", id: id },
               
               success:function(data) {
                  console.log("category selected.");
                  document.getElementById("product_by_cat").innerHTML = data;
              }
    });       
  });
</script>
@endsection

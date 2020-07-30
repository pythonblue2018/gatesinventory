@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Add Purchase</h4>
                </div>
      
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded"
                    data-target="#my_modal" data-toggle="modal" class="identifyingClass" data-id="1">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Purchase
                    </button>
                </div>
              </div>
            </div>
          </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     



<div class="col-md-12 bg-white">

 <div class="row">

   <div class="col-md-12 mt-3">
    <div class="grid-margin stretch-card">
     <div class="card">
      <div class="card-header bg-info"><h4>Purchase Details</h4></div>
      <div class="card-body">

      <p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
      <div class="row">
    

        <div class="col-md-4">
        <div class="form-group">
        <label for="date">Date</label>                                    <input type="text" name="date" value=""  class="form-control input-tip datetime" id="date" required="required" />
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="poref">Reference No</label>
        <input type="text" name="reference" value=""  class="form-control input-tip" id="reference" />
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="powarehouse">Warehouse</label>              
        <select name="warehouse" id="powarehouse" class="form-control input-tip select" data-placeholder="Select Warehouse" required="required" style="width:100%;" >
        
        <option value=""></option>
        <option value="1" selected="selected">Warehouse 1</option>
        <option value="2">Warehouse 2</option>
        <option value="2">Warehouse 2</option>
      </select>
      </div>
      </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="postatus">Status</label>                                

        <select name="status" id="status" class="form-control input-tip select" data-placeholder="Select Status" required="required" style="width:100%;" >
        <option value="Confirmed">Confirmed</option>
        <option value="Pending">Pending</option>
        <option value="Pruchased">Pruchased</option>
        </select>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="document">Attach Document</label>                                <input id="document" type="file" data-browse-label="Browse ..." name="document" data-show-upload="false" data-show-preview="false" class="form-control file p-1">
        </div>
        </div>
<div class="col-md-4">
        <div class="form-group">
        <label for="posupplier">Supplier</label>                                            
        <div class="input-group">                                                
         <select name="supplier" id="supplier" class="form-control input-tip select" data-placeholder="Select Status" required="required" style="width:100%;" >
          <option value="MicroSoft"> Micho sofr</option>

        <!-- <option value="Apple Mac">Apple Mac</option> -->
        <!-- <option value="Nasa us">Nasa us</option> -->
        </select>
        </div>
        </div>
        </div>
        
<!-- <div class="clearfix"></div> -->
<!-- <div class="form-group">
<label for="ponote">Note</label>                                
<textarea name="note" cols="60" rows="2"  class="form-control" id="note" style="margin-top: 5px;"></textarea>
</div> -->

    </div>
    </div>
    </div>        
      </div>
    </div>
  
    <div class="col-md-12">

    <div class="grid-margin stretch-card">
     <div class="card">
       <div class="card-header bg-info"><h4>Add Product To Purchase</h4></div>
          <div class="card-body">
     <div class="row">

    <div class="col-md-3">
        <div class="form-group">
        <label for="company">Category</label>                                           
        <div class="input-group">                                                
         <select class="form-control pull-left" id="category" name="category" style="width: 245px;">
          <option value="0">Select Category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}"> {{ $category->name }}</option>
              @endforeach

        </select>
        </div>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label for="company">Product</label>                                           
        <div class="input-group" id="product_by_cat"> 
         
         <select class="form-control pull-left ml-2" id="product" name="product">
            <option value="1">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}"> {{ $product->name }}</option>
            @endforeach  
            </select>
        </div>
        </div>
        </div>


        <div class="col-md-2">
        <div class="form-group">
        <label for="company">Price</label>                                           
        <div class="input-group">
          <input style="width:0px; text-align:right;" type="number" id="price" class="form-control" name="price" value="1">
        </div>
        </div> 
        </div> 

        <div class="col-md-2">
        <div class="form-group">
        <label for="company">Quantity</label>                                           
        <div class="input-group">                                                
         <input style="width:50px; text-align:right;" type="number" id="quantity" class="form-control" name="quantity" value="1">
        </div>
        </div>
        </div>

<div class="col-md-2">
        <div class="form-group">
        <label for="company">Add  | Remove all</label>                                           
        <div class="input-group">                                                
         <button onClick="addToPurchase()" class="btn btn-primary pull-right p-2"><i class="fa fa-plus fa-lg"></i></button>
        <button onClick="clearBasket()" class="btn btn-danger ml-2 p-2"><i class="fa fa-trash fa-lg"></i></button>
        </div>
        </div>
        </div>
      </div>
        </div>
        </div>
     </div> 

    <div class="table-responsive" id="basket">      
    </div>
    </div>    
        
      

      <div class="col-md-12 mt-3">
        <div class="grid-margin stretch-card offset-md-4">
      
      <button onClick="confirmPurchase()" class="btn btn-danger pull-right"><i class="fa fa-edit"></i>Confirm Purchase</button>
      </div>
      </div>

    </div>   
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style type="text/css">
  .table th, .table td {
    padding: 10px 15px;
    font-size: 15px;
  }
  .table thead th{
    font-size: 15px;
  }
</style>

<script>

  var final_cart = [];
  var order_total = 0;
  var total_quantity = 0;
  var product = [];
  var shipping = 0;
  var discount = 0;
  var index = null;


  function clearBasket(){
    final_cart = []; order_total = 0; total_quantity = 0; 
    shipping = 0; discount = 0;
    document.getElementById("basket").innerHTML = '';
  }

  function addShipping() {
      shipping = (document.getElementById('shipping').value) ? (document.getElementById('shipping').value) : 0;
      discount = (document.getElementById('discount').value) ? (document.getElementById('discount').value) : 0;

      document.getElementById('total').innerHTML = parseInt(order_total) + parseInt(shipping) - parseInt(discount);
  }

  function confirmPurchase(){
        var supplier = $('#supplier').val();
        var status =  $('#status').val();
        var reference =  $('#reference').val();
        // console.log('final_cart type',typeof(final_cart));
        // console.log('order_total',order_total);
        purchase_items = (final_cart);

    if(order_total > 0){
        $.ajax({  
          type:'GET',
            url:'/confirmPurchase',
            data: {  supplier: supplier,
                     status: status,
                     reference: reference, 
                     purchase_items: purchase_items,
                     total_quantity: total_quantity,
                     order_total: parseInt(order_total) + parseInt(shipping) - parseInt(discount) },
               
               success:function(data) {
                  console.log(data);     
                  clearBasket();                            
              }
    });    
      }        else { alert("Add products to Purchase !!")}

  }


  $('[name="category"]').change(function(event) {
    var id = $('#category option:selected').val();
    console.log("category selected.",id);

    $.ajax({  
              type:'GET',
               url:"/createPurchaseCat",
               data: { id: id },
               
               success:function(data) {
                  console.log("category selected.");
                  document.getElementById("product_by_cat").innerHTML = data;
              }
    });       
  });

$('#product_by_cat').on('change', '#product', function(){    
    var id = $('#product option:selected').val();
    console.log("product selected.",id);

    $.ajax({  
              type:'GET',
               url:"/getProductPrice",
               data: { id: id },
               
               success:function(data) {
                  console.log(data);
                  document.getElementById("price").value = data;
               }
    });       
  });

  function addToPurchase(){
    var product_id  = $('#product option:selected').val();
    var product_price = (document.getElementById('price').value) ? (document.getElementById('price').value) : 0;
    var quantity = document.getElementById('quantity').value;
    console.log("Purchase", product_id,'X',quantity);
    if(product_price == 0) alert("Select Product !!")


    $.ajax({  
       type:'GET',
       url:'/addToPurchase',
       data: { product_id :product_id },
          
       success:function(data) {
         console.log("Product:",data.product[0]);
         for(var i=0; i<final_cart.length; i++){
           if(final_cart[i]['item'] == data.product[0]){
             var index = i;
             break;
            }
          }
          // var product_price = (product_price) ? (product_price) : parseInt(data.product[1]);    
          // quantity = (quantity > data.p[2]) ? data.p[2] : quantity;
          var cart = {
              item: data.product[0],
              qty : quantity,
              // price: parseInt(data.product[1]),
              // item_total: data.product[1]*quantity
              price: product_price,
              item_total: product_price*quantity
          }; 

          if(index == null){  
           final_cart.push(cart);
           order_total = order_total + cart.item_total;
           total_quantity = total_quantity + parseInt(quantity);
           // console.log(final_cart[0]['item']);
           // console.log(quantity);
           }
           else {
            console.log('exists quantity');
            final_quantity = parseInt(final_cart[index]['qty']) + parseInt(quantity);
            final_cart[index]['qty']= final_quantity;
            final_cart[index]['item_total']=parseInt(final_cart[index]['price']) * final_quantity ;
            order_total = order_total + (parseInt(final_cart[index]['price']) *  parseInt(quantity) );  
            }

          var basket = "" ;
          for (var i=0; i<final_cart.length;i++) { 
            basket += `<tr>
                       <td style='width:40%;'>`+final_cart[i]['item']+`</td>
                       <td >`+final_cart[i]['price']+`</td>
                       <td >`+final_cart[i]['qty']+`</td>
                       <td style="text-align: center">`+final_cart[i]['item_total']+`</td>
                       </tr>`
          }
          document.getElementById("basket").innerHTML = `
            <table class="table table-bordered bg-light" >
                <thead class="bg-info" style="font-size:15px;">
                <tr>
                    <th >Product</th>
                    <th>Price</th>
                    <th style="width:10%;">Quantity</th>
                    <th style="width:15%;"class="text-center">Sub total</th>
                </tr>
                </thead>

                <tbody>
                `+ basket +`
                </tbody>
                <tfoot>       
                <tr>
                    <td colspan="3" class="text-right"><strong>Sub total</strong></td>
                    <td style="width:30%;"class="text-center"><strong>$ `+order_total+`</strong></td>                  
                </tr>

            <tr class="discount" style="width: 100%;">                    
              <th colspan="3" style="text-align: right">Discount / Coupon amount </th>
              <td style="text-align: right;" id="discount_value">
              <input style="width:100px; margin-left:50px;text-align:right;" type="number" id="discount" onkeyup="addShipping()" class="form-control" name="discount" value="0" autocomplete="off" ></td>
            </tr>
            <tr class="shippingCost">                    
              <th colspan="3" style="text-align: right;">Shipping Cost </th>
              <td style="text-align: right" id="shippingCost">
                <input style="width:100px; margin-left:50px; text-align:right;" type="number" id="shipping" onkeyup="addShipping()" class="form-control" name="shipping" value="0"></td>
            </tr>
            <tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">                    
              <th colspan="3" style="text-align: right">Grand Total</th>
              <td style="text-align: center" id="total">$ `+order_total+` </td>
            </tr>

                </tfoot>
            </table>`;   
        }
    });       
  }
  

</script>
@endsection

@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Add Sale</h4>
                </div>
      
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded"
                    data-target="#my_modal" data-toggle="modal" class="identifyingClass" data-id="1">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Sale
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
      <div class="card-header bg-info"><h4>Sale Details</h4></div>
      <div class="card-body">

      <p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
      <div class="row">
    
        <div class="col-md-4">
        <div class="form-group">
        <label for="name">Client Name</label>  
        <select class="form-control pull-left" name="name" id="name" >
        <option value="0">Select customers</option>
              @foreach($customers as $customer)
              <option value="{{ $customer->first_name }} {{ $customer->last_name }}"> {{ $customer->first_name }} {{ $customer->last_name }}</option>
              @endforeach
        </select>               
        <!-- <input type="text" name="name" value=""  class="form-control input-tip" id="name" /> -->
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="name">Invoice Number</label>                                
        <input type="text" name="name" value="{{$invoiceNumber}}"  class="form-control input-tip" id="invoiceNumber" />
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="podate">Invoice Date</label>
        <input type="text" name="date" value="{{$invoiceDate}}"  class="form-control input-tip datetime" id="podate" required="required" />
        </div>
        </div>

                
        <div class="col-md-4">
        <div class="form-group">
        <label for="company">Company</label>                                           
        <div class="input-group">                                                
         <select name="company" id="company" class="form-control input-tip select" data-placeholder="Select Status" required="required" style="width:100%;" >
        <option value="MicroSoft ltd">MicroSoft ltd</option>
        <option value="Apple Mac">Apple Mac</option>
        <option value="Nasa us">Nasa us</option>
        </select>
        </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="note">Note</label>  
        <input id="note" type="text" data-browse-label="Note ..." name="note" data-show-upload="false" class="form-control"> 
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="postatus">Status</label>                                

        <select name="status" id="postatus" class="form-control input-tip select" data-placeholder="Select Status" required="required" style="width:100%;" >
        <option value="received">Confirmed</option>
        <option value="pending">Pending</option>
        <option value="ordered">Pruchased</option>
        </select>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="document">Attach Document</label>                                <input id="document" type="file" data-browse-label="Browse ..." name="document" data-show-upload="false" data-show-preview="false" class="form-control file p-1">
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
       <div class="card-header bg-info"><h4>Add Product</h4></div>
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

        <div class="col-md-3">
        <div class="form-group">
        <label for="company">Quantity</label>                                           
        <div class="input-group">                                                
         <select class="form-control pull-left ml-2" id="quantity" name="quantity" style="width: 245px;">
          <option value="1">Select Quantity</option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
            <option value="6"> 6 </option>
            <option value="7"> 7 </option>
            <option value="8"> 8 </option>
            <option value="9"> 9 </option>
        </select>
        </div>
        </div>
        </div>

<div class="col-md-3">
        <div class="form-group">
        <label for="company">Action</label>                                           
        <div class="input-group">                                                
         <button onClick="addToSale()" class="btn btn-primary pull-right ml-2 p-2"><i class="fa fa-plus fa-lg"></i></button>
        <button onClick="clearBasket()" class="btn btn-danger ml-2 p-2"><i class="fa fa-times fa-lg"></i></button>
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
      
      <button onClick="confirmSale()" class="btn btn-danger pull-right"><i class="fa fa-edit pr-2"></i>Generate Sale</button>
      </div>
      </div>

    </div>   
  </div>
</div>

   

<!-- <script>
function alertF(){
        alert("Hello World! Welcome to Tutorialdeep.");
}
</script>

<button onClick="alertF()" class="btn btn-primary">Alert me!</button> -->


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

  function clearBasket(){
    final_cart = []; order_total = 0; total_quantity = 0; 
    shipping = 0; discount = 0;
    document.getElementById("basket").innerHTML = '';
  }
  
  function addShipping() {
            var shipping = document.getElementById('shipping').value;
            var discount = document.getElementById('discount').value;

            document.getElementById('total').innerHTML = parseInt(order_total) + parseInt(shipping) - parseInt(discount);
  }

  function confirmSale(){
        var name = $('#name').val();
        var company =  $('#company').val();
        console.log('final_cart type',typeof(final_cart));
        console.log('order_total',order_total);
        sale_items = (final_cart);

        if(order_total > 0){
          $.ajax({  
            type:'GET',
              url:'/confirmSale',
              data: {  name: name,
                       address: company,
                       post_code: company, 
                       sale_items: sale_items,
                       total_quantity: total_quantity,
                       order_total: order_total},
                 
                 success:function(data) {
                    console.log(data);
                    clearBasket();
                    location.reload();
                }
          });    
        }
        else { alert("Add products to sale !!")}
  }

  $('[name="category"]').change(function(event) {
    var id = $('#category option:selected').val();

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

  function addToSale(){
    var product_id  = $('#product option:selected').val();
    var quantity = $('#quantity option:selected').val();
     var index = null;
    console.log("Sale", product_id,'X',quantity);
  
    $.ajax({  
       type:'GET',
       url:'/addToSale',
       data: { product_id :product_id },
          
       success:function(data) {
         console.log("Product:",data.product[0]);
         for(var i=0; i<final_cart.length; i++){
          if(final_cart[i]['item'] == data.product[0]){
            var index = i;
            break;
             }
           }         
           // if(data.product[0] in final_cart){
         //    alert("Quantity increased..");
         //    }
         if (data.product[2] > 0) {   
             if(quantity > data.product[2]){
              alert("Only "+data.product[2]+" in stock !!");
            }
            quantity = (quantity > data.product[2]) ? data.product[2] : quantity;

          var cart = {
              item: data.product[0],
              qty : quantity,
              price: parseInt(data.product[1]),
              item_total: data.product[1]*quantity
          }; 

          if(index == null){  
          final_cart.push(cart);
          order_total = order_total + cart.item_total;
          total_quantity = total_quantity + parseInt(quantity);
          console.log(final_cart[0]['item']);
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
                       <td >`+final_cart[i]['item']+`</td>
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
              <td style="text-align: center" id="discount_value"><input style="width:100px;" type="number" id="discount" onkeyup="addShipping()" class="form-control" name="discount" value="0"></td>
            </tr>
            <tr class="shippingCost">                    
              <th colspan="3" style="text-align: right">Shipping Cost </th>
              <td style="text-align: center" id="shippingCost">
                <input style="width:100px;" type="number" id="shipping" onkeyup="addShipping()" class="form-control" name="shipping" value="0"></td>
            </tr>
            <tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">                    
              <th colspan="3" style="text-align: right">Grand Total</th>
              <td style="text-align: center" id="total">$ `+order_total+` </td>
            </tr>

                </tfoot>
            </table>`;  
        }
        else{
            alert('Not in STOCK !!')
        }
      }
    });       
  }

</script>
@endsection

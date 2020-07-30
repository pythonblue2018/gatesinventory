@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
<div class="breadcrumbs">
<ol class="breadcrumb">
<li><a href="">Checkout</a></li>
<li class="active">Shipping Method</li>
</ol>
</div>
<!--//breadcrumb-->
<!-- <div class="pull-right">
<a class="btn btn-default" href="{{ route('shop.clearCart')}}">Clear Cart</a>
</div> -->
@endsection

@section('content')

<!--main right-->

<!--body-->
<section>
<div class="container">

<h2 class="title text-center">Shipping Method</h2>
<div class="row">
<style>
.shipping_address td{
padding: 3px !important;
}
.shipping_address textarea,.shipping_address input[type="text"],.shipping_address option{
width: 100%;
padding: 7px !important;
}
.row_cart>td{
vertical-align: middle !important;
}
input[type="number"]{
text-align: center;
padding:2px;
}

/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- LEFT -->
<div class="col-md-7">
  <!-- FORM -->
<div class="row">
<div class="col-md-12">
<input type="hidden" name="_token" value="86LdwxbJNtVSyHavNjHNjThSttfQ2Gqs57sze8ek">            <table class="table  table-bordered">
<tr>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-user"></i> First name:</label> 
{{ $customer['name']}}
</td>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-user"></i> Last name:</label> <!-- <input name="last_name" type="text" placeholder="Last name" value=""> -->
</td>
</tr>
<tr>
<td  class="form-group">
<label for="email" class="control-label"><i class="fa fa-user"></i> Email:</label> guest@gmail.com
</td>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> Phone:</label> 0800-1155-3344
</td>
</tr>

<tr>
<td colspan="2" class="form-group">
<label  for="country" class="control-label"><i class="fa fa-dribbble" aria-hidden="true"></i> Country:</label>
<!-- <select class="form-control country " style="width: 100%;"  -->
</td>
</tr>


<tr>
<td class="form-group"><label for="address1" class="control-label"><i class="fa fa-home"></i> Address:</label> {{ $customer['address']}}
</td>
<td class="form-group"><label for="address2" class="control-label"><i class="fa fa-university"></i> Post Code</label> {{ $customer['post_code']}}
</td>
</tr>
<tr>
<td colspan="2">
<label  class="control-label"><i class="fa fa-file-image-o"></i> Note:</label>
<textarea rows="2" name="comment" placeholder="Note...."></textarea>
</td>

</tr>
</table>
</div>
</div>
</div>

<!-- RIGHT -->
<div class="col-md-5">

<div class="col-md-12">

@if($Cart != null ) 

<table class="table table-bordered">
<thead>
<tr  style="background: #eaebec;">
<th style="width: 20px; text-align: center;">No.</th>
<th>Name</th>
<th style="text-align: center;">Price</th>
<th style="text-align: center;">Qty</th>
<th style="text-align: center;">Total</th>
</tr>
</thead>
<tbody>


@foreach($Cart->items as $product)

<tr class="row_cart">
    <td style="text-align: center;">{{ $loop->index + 1 }}</td>
    <td style="width: 100px;">{{ $product['item']['name'] }}<br>
    </td>
    <td style="text-align: center; "><span>$ {{ $product['item']['price'] }}</span></td>    
    <td style="text-align: center;">
      {{ $product['qty'] }}       
    </td>
    <td align="right">$ {{ $product['price'] }}</td>    
</tr>
@endforeach
</tbody>

<tfoot>
<tr  style="background: white">
<td colspan="7">
<div class="pull-left">
<button class="btn btn-default" type="button" style="cursor: pointer;padding:5px 10px" onClick="location.href='{{ route('shop.shopCart')}}'"><i class="fa fa-arrow-left"></i> Back to Cart</button>
</div>

</td>
</tr>
</tfoot>
</table>
</div>


<div class="col-md-12">
<table class="table table-bordered" id="showTotal">

<tr class="subTotal">
<th>Sub Total</th>
<td style="text-align: right" id="subtotal">$ {{ $totalprice }}</td>
</tr>

<tr class="discount">
<th>Discount / Coupon ({{ $coupon_amount }})</th>
<td style="text-align: right" id="coupon_value">$ {{ $coupon_amount }}</td>
</tr>
<tr class="shippingCost">
<th>Shipping Cost ( Shipping Method )</th>
<td style="text-align: right" id="shippingCost">$ {{ $shipping }}</td>
</tr>

<tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">
<th>Total</th>

<td style="text-align: right" id="total">$ {{ $totalprice + $shipping - $coupon_amount }}</td>
</tr>

</table>
</div>

<div class="form-group col-md-12">

  <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange" aria-hidden="true"></i> Coupon </label>

@if($coupon_amount > 0) 
  Coupon Applied.
@else            
<div class="row" style="display: table-row;">        
  <input type="text"  placeholder="Your coupon" class="form" id="coupon-value" name="coupon">
  <!-- <input class="form" type="submit" value="Apply" > -->
  <button onClick="coupon_ajax()" class="btn btn-info form">Apply</button>

</div>  
 @endif  
<!-- </form> -->
    


 <p><div class ="shipping_radio" id="my_radio_box">
      <input type="radio" name="shipping_radio" value="0"> <label for="Free Shipping ($0.00)"> Free Shipping ($0.00)</label><br>
      <input type="radio" name="shipping_radio"  value="10"> <label for="question1"> Standard Shipping ($10.00)</label><br>
      <input type="radio" name="shipping_radio"  value="20"> <label for="question1"> Express Shipping ($20.00)</label> 
   </div>
 </p>
   <div class="row" style="display: table-row;">       

</div>

</div>




@else 
      <div style="text-align: center;">Cart Empty !</div>
      <hr style="border-color: #c2c2c2;">

@endif
</div>

</div>
<span class="pull-right" style="text-align: center; padding: 10px 20px;">
  <a href="{{ route('shop.shopPayMethod') }}" >
  <button class="btn btn-danger" id="submit-order" type="submit" style="cursor: pointer;padding:10px 30px"><i class="fa fa-check"></i>Continue Checkout</button>
    </a>
</span>
</div>

</section>
<!--//main right-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

      $('#my_radio_box').change(function(){
        var shipping_cost = $('input[name="shipping_radio"]:checked').val();
        console.log(shipping_cost);

        $.ajax({
       type:'POST',
       url:'/shippingMethod',
       data:{ _token: "{{ csrf_token() }}",shipping_cost: shipping_cost },

       success:function(data){
          console.log(data);
          if((data['shipping_cost'] + data['total_price']) > 0){
           document.getElementById("shippingCost").innerHTML = '$'+ data['shipping_cost'];
           document.getElementById("total").innerHTML = '$'+ data['total_price'];
          }
       }
    });
          });
    
    });
      
  
  function coupon_ajax(){
 
    var coupon_value = $('input[name="coupon"]').val();
    // console.log(coupon_value);

    $.ajax({
           type:'POST',
           url:'/couponValue',
           data:{ _token: "{{ csrf_token() }}",coupon_value: coupon_value },

           success:function(data){
              console.log(data['total_price']);
              if((data['coupon_amount'] + data['total_price']) > 0){
               document.getElementById("coupon_value").innerHTML = '$'+ data['coupon_amount'];
               document.getElementById("total").innerHTML = '$'+ data['total_price'];
              }
           }
        });
  }

</script>

@endsection
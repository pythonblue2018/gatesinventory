@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
<div class="breadcrumbs">
<ol class="breadcrumb">
<li><a href="">Checkout</a></li>
<li class="active">Shipping Information</li>
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

<h2 class="title text-center">Shipping Information</h2>
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

<div class="col-md-8">

<!-- FORM -->
<form class="shipping_address" id="customer_form" role="form" method="POST" action="{{ route('shop.shopShipInfo') }}">

<div class="row">
<div class="col-md-12">

<table class="table  table-bordered table-responsive">
<tr>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-user"></i> First name:</label> <input name="name" type="text" placeholder="First name" value="">
</td>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-user"></i> Last name:</label> <!-- <input name="last_name" type="text" placeholder="Last name" value=""> -->
</td>
</tr>
<tr>
<td  class="form-group">
<label for="email" class="control-label"><i class="fa fa-user"></i> Email:</label> <!-- <input name="email" type="text" placeholder="Email" value=""> -->
</td>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> Phone:</label> <!-- <input name="phone" type="text" placeholder="Phone" value=""> -->
</td>
</tr>

<tr>
<td colspan="2" class="form-group">
<label  for="country" class="control-label"><i class="fa fa-dribbble" aria-hidden="true"></i> Country:</label>
<!-- <select class="form-control country " style="width: 100%;"  -->
</td>
</tr>


<tr>
<td class="form-group"><label for="address1" class="control-label"><i class="fa fa-home"></i> Address:</label> <input name="address" type="text" placeholder="Address 1" value="">
</td>
<td class="form-group"><label for="address2" class="control-label"><i class="fa fa-university"></i> Post Code</label><input name="post_code" type="text" placeholder="Address 2" value="">
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

<div class="col-md-4">
<div class="table-responsive">

@if($Cart != null ) 

<table class="table box table-bordered col-md-3">
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

<div class="row">
<div class="col-md-12">
<table class="table box table-bordered" id="showTotal">

<tr class="subTotal">
<th>Sub Total</th>
<td style="text-align: right" id="subtotal">$ {{ $totalprice }}</td>
</tr>

<tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">
<th>Total</th>
<td style="text-align: right" id="total">$ {{ $totalprice }}</td>
</tr>
</table>
</div>
</div>
</div>
@else 
      <div style="text-align: center;">Cart Empty !</div>
      <hr style="border-color: #c2c2c2;">
@endif
</div>
</div>

<span class="pull-right" style="text-align: center;padding: 10px 20px;">
     {{ csrf_field() }}

  <button type="submit" class="btn btn-success" style="cursor: pointer;padding:10px 30px"> Continue Checkout <i class="fa fa-caret-right"></i></button>
    
</span>
</form>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">

  $('#customer_form').submit(function(e) {
    e.preventDefault();
    var shipping_info = $(this).serializeArray();
    // console.log(shipping_info);

    $.ajax({
           type:'POST',
           url:'/shippingInfo',
           data:{ _token: "{{ csrf_token() }}",shipping_info: shipping_info },

           success:function(data){
              console.log(data);
              window.location.href = "{{ route('shop.shopShipMethod') }}";
           }
        });
  });
   
</script>
</section>
<!--//main right-->

@endsection
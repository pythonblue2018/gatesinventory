@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
<div class="breadcrumbs">
<ol class="breadcrumb">
<li><a href="">Home</a></li>
<li class="active">View Cart</li>
</ol>
</div>
<!--//breadcrumb-->
@endsection
@section('content')
<meta name="csrf-token" content="{!! csrf_token() !!}">


<!--main right-->

<!--body-->
<section>
<div class="container">
<h2 class="title text-center">View cart</h2>
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
</style>
<div class="table-responsive"  id="cart_table">

@if($Cart != null ) 

<table class="table box table-bordered">
<thead>
<tr  style="background: #eaebec;">
<th style="width: 50px; text-align: center;">No.</th>
<th style="width: 100px; text-align: center;">SKU</th>
<th>Name</th>
<th style="text-align: center;">Price</th>
<th style="text-align: center;">Quantity</th>
<th style="text-align: center;">Total</th>
<th style="text-align: center;">Delete</th>
</tr>
</thead>
<tbody>


@foreach($Cart->items as $product)

<tr class="row_cart">
    <td style="text-align: center;">{{ $loop->index + 1 }}</td>
    <td>ALOKK1-AY</td>
    <td>{{ $product['item']['name'] }}<br>
    (
    <b>Color</b>: <i>Blue</i> ;
    <b>Size</b>: <i>S</i> ;
    )<br>
    <a href="{{ route('shop.shopProductView',['id' => $product['item']['id'] ])}}"><img width="100" src="{{asset('img/'.$product['item']['image']) }}" alt=""></a>
    </td>
    <td style="text-align: center;"><span class="new-price">$ {{ $product['item']['price'] }}</span></td>
    
    <td style="text-align: center; width: 70px;">
      <div class="row" style="display: table-row;">    

        <span class="input-group-btn first qtyminus">           
        <button onClick="ajaxRemoveOneFromCart({{$product['item']['id']}})" class="btn btn-defualt" type="button"><i class="fa fa-minus"></i></button>
        </span>    

        <input style="width: 45px; text-align: center;" type="text" readonly name="quantity" value="{{ $product['qty'] }}" min="1" max="5" class="form-control qty">           
        
        <span class="input-group-btn last qtyplus">   
        <button onClick="ajaxAddToCart({{$product['item']['id']}})" class="btn btn-defualt" type="button"><i class="fa fa-plus"></i></button>
        </span> 

        </div>    
      </td>
    <td align="right">$ {{ $product['price'] }}</td>
    <td style="text-align: center;">
      <i class="fa fa-trash fa-2x" style="color:red;" onClick="ajaxDeleteFromCart({{$product['item']['id']}})"></i>
    </td>
</tr>
@endforeach
</tbody>
<tfoot>

<tr  style="background: #eaebec">
<td colspan="7">
<div class="pull-left"style="padding-left: 20px"> Sub Total</div>
<div class="pull-right" style="padding-right: 10px;">$ {{ $totalprice }}
</div>
</td>
</tr>


<tr  style="">
<td colspan="7">
</td>
</tr>

<tr  style="background: #eaebec">
<td colspan="7">
<div class="pull-left">
<button class="btn btn-default" type="button" style="cursor: pointer;padding:10px 30px" onClick="location.href='{{ route('shop.shopProducts')}}'"><i class="fa fa-arrow-left"></i> Back to Shop</button>
</div>
<div class="pull-right">
<a onClick="return confirm('Confirm ?')" href="{{ route('shop.clearCart')}}"><button class="btn" type="button" style="cursor: pointer;padding:10px 30px">Remove all</button></a>
</div>
</td>
</tr>
</tfoot>
</table>

</div>

<script type="text/javascript">

  
</script>

<hr style="border-color: #c2c2c2;">
<p><span class="pull-left" style="text-align: center;">
  <a href="{{ route('shop.shopCheckout') }}" >
  <button class="btn btn-success" id="submit-order" type="submit" style="cursor: pointer;padding:10px 30px"><i class="fa fa-check"></i>Quick Checkout</button></a></span>
  
  <span class="pull-right" >
  <a href="{{ route('shop.shopShipInfo') }}" >
  <button class="btn btn-danger pull-right" id="submit-order" type="submit" style="cursor: pointer;padding:10px 30px; text-align: center;"><i class="fa fa-check"></i>Continue Checkout</button></a></span>
</p>

@else
      <div style="text-align: center;">Cart Empty !</div>
      <hr style="border-color: #c2c2c2;">
@endif
<p></p>
</div>
</div>
</section>
<!--//main right-->

@endsection
@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
<div class="breadcrumbs">
<ol class="breadcrumb">
<li><a href="">Checkout</a></li>
<li class="active">Payment Method</li>
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
<h2 class="title text-center">Checkout > Payment Method</h2>
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
<form class="shipping_address" id="payment-form" role="form" method="POST" action="{{ route('shop.checkout') }}">
<div class="row">
<div class="col-md-12">
<input type="hidden" name="_token" value="86LdwxbJNtVSyHavNjHNjThSttfQ2Gqs57sze8ek">            <table class="table  table-bordered table-responsive">
<tr>
<td class="form-group">
<label for="phone" class="control-label"><i class="fa fa-user"></i> First name:</label> <input name="name" type="text" placeholder="First name" value="{{ $customer['name']}}">
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
<td class="form-group"><label for="address1" class="control-label"><i class="fa fa-home"></i> Address:</label> <input name="address" type="text" placeholder="Address 1" value="{{ $customer['address']}}">
</td>
<td class="form-group"><label for="address2" class="control-label"><i class="fa fa-university"></i> Post Code</label><input name="post_code" type="text" placeholder="Address 2" value="{{ $customer['post_code']}}">
</td>
</tr>
<tr>
<td colspan="2">
<label  class="control-label"><i class="fa fa-file-image-o"></i> Note:</label>
<textarea rows="2" name="comment" placeholder="Note...."></textarea>
</td>
<tr>
  <td colspan="2" >
  <hr style="border-color: #c2c2c2;">

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
  $(document).ready(function(){
    $("input[name='payment_radio']").click(function(){
      var payment_methos = $(this).val();
      if(payment_methos == 1){

         document.getElementById("card_payment").innerHTML = 
          `<div class="card card-info col-md-12">
            <div class="card-header"> Credit debit card payment
            </div>
            <div class="card-body">
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
            </div>
          </div>  `;
          // Create a Stripe client.
var stripe = Stripe('pk_test_IVfYXt95ER8znlkiuAqeQ9Uv00ILul4gkI');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
      }

      else if(payment_methos == 2){
         document.getElementById("card_payment").innerHTML = 
          `<div class="card card-info col-md-12">
            <div class="card-header"> Paypal Payment</div>
            <div class="card-body" style="color:grey;">
              <div class="col-md-12">
              <div class="col-md-3">
              <label for="email"><b>Username</b></label></div>
              <div class="col-md-8">
              <input type="text" placeholder="Enter Username" name="email" required style="width:240px;height:35px;"></div>
              <div class="col-md-3">
              <label for="psw"><b>Password</b></label></div>
              <div class="col-md-8">
              <input type="password" placeholder="Enter Password" name="password" required style="width:240px;height:35px;margin-top:5px;"></div>
              <div class="col-md-12 off-col-4">
              <button type="submit">Login</button>
              </div>
              </div>
          </div>  `;
      }
      else {
        document.getElementById("card_payment").innerHTML = 
          `<div class="card card-info col-md-12">
            <div class="card-header"> Cash Payment</div>
            <div class="card-body">
              <p>Cash will be collected on delivery.</p>
                        
            </div>
          </div>  `;
      }
    });
});


    // $(document).ready(function(){
    //           $("input[type='button']").click(function(){

    //         var radioValue = $("input[name='payment_radio']:checked").val();
    //         if(radioValue){

    //             alert("Your are a - " + radioValue);
    //             console.log('Radio');
    //         }
    //       });
    // });
</script>

<p><div class ="payment_radio">
      <input type="radio" name="payment_radio"  id="question1" value="1"> 
          <img src="{{ asset('img/credit/visa.png')}}" alt="Visa">
          <img src="{{ asset('img/credit/mastercard.png')}}" alt="Mastercard">
          <img src="{{ asset('img/credit/american-express.png')}}" alt="American Express">
          <br><br>
      <input type="radio" name="payment_radio"  id="question1" value="2">
          <img src="{{ asset('img/credit/paypal2.png')}}" alt="Paypal"><br><br>
      <input type="radio" name="payment_radio"  id="question1" value="3">           <img src="{{ asset('img/credit/cod.jpg')}}" alt="Paypal"><label for="cash"> Cash on delivery </label> 
   </div>
</p>

<p>
<div class="form-row p-3" id="card_payment">
    <!-- <label for="card-element">
      Credit or debit card
    </label> -->
    <!-- <div id="card-element"> -->
      <!-- A Stripe Element will be inserted here. -->
    <!-- </div> -->

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

</p> <br>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-success text-center" 
    style="cursor: pointer; padding:10px 30px; margin-left: 20px; margin-bottom: 5px;"><i class="fa fa-check"></i>
    Pay Now</button>
</td></tr>
</tr>
</table>
</div>
</div>
</form>
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
<tr class="discount">
<th>Discount / Coupon ({{ isset($coupon_amount) ? $coupon_amount : 0 }})</th>
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

<div class="row">
<div class="form-group col-md-12">

<!-- <form method="GET" action="{{ route('shop.shopCheckoutCoupon') }}"> -->
  <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange" aria-hidden="true"></i> Coupon </label>

@if($coupon_amount > 0) 
  <span style="background-color: #81F7BE"> Coupon Applied</span>.
@else            
<div class="row" style="display: table-row;">        
  <input type="text"  placeholder="Your coupon" class="form" id="coupon-value" name="coupon">
  <!-- <input class="form" type="submit" value="Apply" > -->
</div>  
 @endif  
<!-- </form> -->
<!-- <button onClick="coupon_ajax()" class="btn btn-info form">Apply</button>

<script type="text/javascript">
  
  function coupon_ajax(){
    var coupon_value = $('input[name="coupon"]').val();
    // console.log(coupon_value);

    $.ajax({
           type:'POST',
           url:'/couponValue',
           data:{ _token: "{{ csrf_token() }}",coupon_value: coupon_value },

           success:function(data){
              console.log(data);
              document.getElementById("coupon_value").innerHTML = '$ '+ data;
           }
        });
  }
</script> -->

</div>
</div>
</div>

</div>
</div>

@else 
      <div style="text-align: center;">Cart Empty !</div>
      <hr style="border-color: #c2c2c2;">

@endif
</div>

</div>
</div>

</section>
<!--//main right-->
<script>

</script>

@endsection
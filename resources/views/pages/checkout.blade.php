@extends('layouts.base')

@section('content')

<script src="https://js.stripe.com/v3/"></script>
<style>
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

<div class="content-wrapper"> 

  <section class="content-header">
      <h1>
        Checkout
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
         <!-- Main content -->
<hr style="border-color: #c2c2c2;">
<div class="col-md-11">

<form action="{{ route('shop.checkout') }}" method="post" id="payment-form">


<h3>Stripe Payment</h3>
<hr style="border-color: #c2c2c2;">
<div class="form-group">
    <label for="name">Card Holder Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
</div>
<div class="form-group">
    <label for="address">Billing Address</label>
    <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your address with anyone else.</small>
</div>
<div class="form-group">
    <label for="post_code">Post Code</label>
    <input type="text" class="form-control" name="post_code" aria-describedby="emailHelp" placeholder="Enter email" required>    
</div>
<hr style="border-color: #c2c2c2;">

<p>
<div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
</p> <br>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary btn-block text-center">Pay Now</button> 
    </form>
<hr style="border-color: #c2c2c2;">


<!-- Basket -->
        <div class="box">
            <div class="box-header">
            <h3 class="box-title"><i class="fa fa-shopping-basket"></i> Basket </h3>
          </div>
        <div class="box-body">

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Product</th>
            <th>Details</th>
            <th>Price</th>
            <th style="width:10%;">Quantity</th>
            <th class="text-center">Subtotal</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

    @if($Cart != null )  
        @foreach($Cart->items as $product)
        <tr>
            <td data-th="Product">
                <h5>{{ $product['item']['name'] }}</h5>
                
                </td>
                <td>                    
                    <p> {{ $product['item']['details'] }}</p>
                </td>
            <td data-th="Price"style="text-align: center;">$ {{ $product['item']['price'] }}</td>
            <td data-th="Quantity" style="text-align: center;">
               <!--  <input type="number" class="form-control text-center" value="{{ $product['qty'] }}"> -->
               <label >{{ $product['qty'] }}</label>
            </td>
            <td data-th="Subtotal" class="text-center"style="text-align: center;">        
            $ {{ $product['price'] }} </td>
            <td class="actions" data-th="">
                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm" action=""><a href="{{ route('cart.removeFromCart', ['id'=>$product['item']['id']]) }}"><i class="fa fa-trash-o"></i></a></button>
            </td>
        </tr>
        @endforeach
    @else
            <tr><td>
                <div style="text-align: left">No items found</div>
            </td></tr>
    @endif
        </tbody>
        <tfoot>
        <!-- <tr class="visible-xs">
            <td class="text-center"><strong>    {{ $product['price'] }} </strong></td>
        </tr> -->
         <tr>
            <td><a href="{{ url('/shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <!-- <td colspan="2" class="hidden-xs"></td> -->
             <td><a href="{{ route('shop.cart') }}" class="btn btn-danger"><i class="fa fa-shopping-basket"></i> Edit Cart</a></td>
             <td></td>
            <td class="hidden-xs text-center"><strong>Total</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ $totalprice }}</strong></td>
             <td><a href="{{ url('/shop') }}" class="btn btn-success">
             <i class="fa fa-cash-register"></i> Submit </a></td>
        </tr>
        </tfoot>
    </table>
   </div>
  </div>

    <hr style="border-color: #c2c2c2;">



    </div> 
</section>
</div>

@endsection

@section('extra-js')

<!-- <script src="https://js.stripe.com/v3/"></script> -->

<script>
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
</script>

@endsection
@extends('layouts.royalbase')

@section('content')

<div class="content-wrapper"> 
<section class="content-header">
      <h1>
        Shopping Cart
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Basket</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
<div class="row">
      <div class="col-md-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Items In your Cart </h3>
          </div>
        <div>
            <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="padding-left:5px;">Product</th>
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
                <img src="{{asset('img/'.$product['item']['image']) }}" alt="..." class="itemmg-responsive" style="height: 80px; width: 100px" />
                </td>
                <td>
                    <h5>{{ $product['item']['name'] }}</h5>
                    <p> {{ $product['item']['details'] }}</p>
                </td>
            <td data-th="Price">$ {{ $product['item']['price'] }}</td>
            
        <td>   
        <div class="row" style="display: table-row;">        
        <span class="input-group-btn first qtyminus">           
        <a href="{{ route('cart.removeFromCart',    ['id'=>$product['item']['id']]) }}">
        <button class="btn btn-defualt" type="button">-</button></a>      
        </span>           
        <input style="width: 40px;" type="text" readonly name="quantity" value="{{ $product['qty'] }}" min="1" max="5" class="form-control qty">           
        <span class="input-group-btn last qtyplus">   
        <a href="{{ route('cart.updateCart', ['id'=>$product['item']['id']]) }}">
        <button class="btn btn-defualt" type="button">+</button>
        </a>            
        </span>  
        </div>         
        </td>
            <!-- <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="{{ $product['qty'] }}">
            </td> -->
            
            <td data-th="Subtotal" class="text-center">        
            $ {{ $product['price'] }} </td>
            <td class="actions" data-th="">
                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>

                <button class="btn btn-danger btn-sm" action=""><a href="{{ route('cart.removeFromCart',    ['id'=>$product['item']['id']]) }}"><i class="fa fa-trash-o"></i></a></button>

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
             <td></td>
             <td></td>
            <td class="hidden-xs text-center"><strong>Total</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ $totalprice }}</strong></td>
        @if($Cart != null )
             <td><a href="{{ route('shop.checkout')}}" class="btn btn-success">
             <i class="fa fa-cart-arrow-down"></i> Checkout  <i class="fa fa-angle-right"></i> </a>
            </td>
        @endif
        </tr>
        </tfoot>
    </table>
<hr style="border-color: #c2c2c2;">

    </div> 
    </div> 
</div>

</div>

</section>
</div>

@endsection
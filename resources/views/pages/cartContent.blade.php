
@if($cart != null ) 

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


@foreach($cart->items as $product)

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
    <!-- <a href="{{ route('cart.deleteFromCart', ['id'=>$product['item']['id']]) }}"> -->
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

@else
      <div style="text-align: center;">Cart Content Empty Ajax!</div>
      <hr style="border-color: #c2c2c2;">
@endif
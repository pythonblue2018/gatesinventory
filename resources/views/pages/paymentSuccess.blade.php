@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="">Home</a></li>
          <li class="active">Order Summary</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection

@section('content')

<div class="container">

        <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-md-12" style="border: 1px solid;border-color: #c2c2c2;">
              <div class="box">
                  <div class="box-header" style="text-align: center;color: green">
                  <h2 class="box-title"><strong>CHECKOUT SUMMARY </strong></h2>
                  </div>
      <hr style="border-color: #c2c2c2;">

      <div class="box-body">
            <div class="position-relative overflow-hidden  text-center bg-light">
          <div class="col-md-12 p-lg-5 mx-auto my-5">
          <h4 class="font-weight-normal">
          Order ID: {{ $order->id }} | {{ $message }} </h4>
                   
          <hr style="border-color: #c2c2c2;">
          </div> 
          <div class="col-md-3">Paid By:</div>
      <div class="col-md-6" style="text-align: left;">
        {{$order->name}}
        <p>{{$order->address}}</p>
        {{$order->post_code}}</div>

      <div class="col-xs-12 table-responsive">
          <hr style="border-color: #c2c2c2;">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Product Modal</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
       @if(isset($items))  
            @foreach($items['items'] as $item) 
              <tr>
                <td  width="15%">{{ $item['item']['name'] }}<br></td>
                <td >
                  <img src="{{ asset('img/'.$item['item']['image']) }}" width="60px"> <br>
                </td>
                <td width="25%">{{ $item['item']['details'] }}</td>
                <td>{{ $item['item']['price'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ $item['item']['price'] }}</td>
             </tr>
            @endforeach
    @else
            <tr><td>
                <div style="text-align: left">No items found</div>
            </td></tr>
    @endif
            </tbody>
            <tfoot>
              <tr>
            <td></td><td></td><td></td><td></td>
            <td class="hidden-xs text-left"><strong>Sub Total</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ $order->total_price }}</strong></td>
        </tr>
              <tr>left
            <td></td><td></td><td></td><td></td>
            <td class="hidden-xs text-left"><strong>Coupon / Discount</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ $order->discount }}</strong></td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td class="hidden-xs text-left"><strong>Shipping Cost</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ $order->shipping_cost }}</strong></td>
        </tr>
            <tr>
            <td></td><td></td><td></td><td></td>
            <td class="hidden-xs text-left"><strong>Total</strong></td>
            <td class="hidden-xs text-center"><strong>$ {{ ($order->total_price - $order->discount) + $order->shipping_cost }}</strong></td>
        </tr>
        </tfoot>
          </table>
        </div>
       </div>

      </div>
      
 </div>
</div>
</div>
</section>
</div>

@endsection

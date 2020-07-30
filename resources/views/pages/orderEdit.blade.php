@extends('layouts.royalbase')
@section('content')


<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Order Edit</h4>
                </div>
                <div>
                    <a href="#"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Edit Order
                    </button></a>
                </div>
              </div>
            </div>
          </div>
<style type="text/css">
  .table th, .table td{
     padding: 10px 5px;
     overflow: hidden;
  }
</style>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  

<!-- test -->
<div class="invoice" style="margin: 15px;">
      <!-- title row -->
                    <div class="row">
        <div class="col-xs-12">
          <h4 class="page-header">
            <i class="fa fa-globe"></i> Order ID# {{$order->id }} 
            <small style="display: inline-block">Ordered Date: {{ $order->created_at }}</small>
            <a href="" target="_blank"  class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a> 
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h5>Customer Info:</h5>
          <address>
            <strong>{{ $order->name }} Amd</strong><br>
            Jshshsuahsbbs <br>
            user ID: {{ $order->user_id }} <br>
            {{ $order->address }} Fsb, other 38000<br>
            Phone: {{ $order->phone }} 03348860100<br>
            {{ $order->email }} Email: nbl@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <h5>ShippingInfo</h5>
          <address>
            <strong>{{ $order->name }} Amd</strong><br>
            Jshshsuahsbbs <br>
            {{ $order->address }} Fsb, other 38000, Pakistan<br>
            
            <strong>Phone: </strong>{{ $order->phone }}<br>
           <strong> ShippingMethod:</strong> Flat Rate(flateRate) <br>
           <strong> Shipping Cost:</strong>  $9.99  <br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         <h5>Billing Info </h5>
          <address>
            <strong>{{ $order->name }} Amd</strong><br>
            {{ $order->address }} <br>
            <strong>Phone: </strong>{{ $order->phone }}<br>
            {{ $order->address }} Fsb, other 38000<br>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<hr style="border-color: #c2c2c2;">
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Product Modal</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Sub Total</th>
              <th width="12%">Remove</th>
            </tr>
            </thead>
            <tbody>
    @if(isset($order_items))  
            @foreach($order_items as $item) 
              <tr>
                @foreach($order_products as $order_product)
                    @if($item->id == $order_product->id)
                    <td  width="15%">{{ $order_product->name }}<br></td>                   
                    <td ><img src="{{ asset('img/'.$order_product->image) }}" width="60px"> <br>
                    </td>
                    @endif
                @endforeach
                <td width="25%">{{ $item->product_id }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->item_total }}</td>
                <td>
                  <a style="color: red;" href="{{ route('admin.removeFromOrder', [ 'order_id' => $order->id, 'product_id' => $item->product_id ]) }}"><i class="fa fa-trash fa-lg" ></i> [id : {{ $item->product_id }}]</a></td>
             </tr>
            @endforeach
            @php $ship = 0 @endphp
    @else
            <tr><td>
                <div style="text-align: left">No items found</div>
                @php $ship = - 9.99 @endphp
            </td></tr>
    @endif
            </tbody>
          </table>
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->


<div class="form-group col-md-12" style="text-align: left; min-width: 220px; display:flex;">

<form method="POST" action="{{ route('admin.addToOrder', ['order_id' => $order->id ])}}">
        <select class="form-control pull-left" name="product_id" style="width: 245px;">
          <option value="0">Select Product</option>
          @foreach($products as $product)
            <option value="{{$product->id}}"> {{$product->name}} 
               :      ${{$product->price}}</option>
          @endforeach  
        </select>
        <select class="form-control pull-left" name="quantity" style="width: 245px;">
          <option value="1">Select Quantity</option>
          @for ($i = 1; $i < 11; $i++)
            <option value="{{ $i }}"> {{ $i }}</option>
          @endfor  
        </select>
    <!--   <a href="{{ route('admin.addToOrder', ['order_id' => $order->id ])}}" class="btn btn-default"><i class="fa fa-edit"></i> Add Product</a> -->
        {{ csrf_field() }}

    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Add Product</button>
</form>
</div>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-md-7">
          <p class="lead" style="margin-bottom:10px">Payment Methods:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize">
            Hyperpay
          </p>
          <img src="{{ asset('img/credit/visa.png')}}" alt="Visa">
          <img src="{{ asset('img/credit/mastercard.png')}}" alt="Mastercard">
          <img src="{{ asset('img/credit/american-express.png')}}" alt="American Express">
          <img src="{{ asset('img/credit/paypal2.png')}}" alt="Paypal">
          
      <p class="lead" style="margin-bottom:10px">Order information:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize; word-break:break-all;">
                          []
                     </p>
        </div>
        <!-- /.col -->
        <div class="col-md-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td style="text-align: right;">${{$order->total_price}}</td>
              </tr>
              <tr>
                <th>Discount:</th>
                <!-- @php $tax = $order->total_price*0.05 @endphp -->
                <td style="text-align: right;"> ${{ $order->discount }}</td>
              </tr>
              <tr>
                <th>Shipping Cost:</th>
                   <!-- @php $shipping = $ship + 9.99 @endphp -->
                  <td style="text-align: right;">${{ $order->shipping_cost }}</td>
              </tr>
                            <tr>
                <th>Total:</th>
                @php $order_total = ($order->total_price - $order->discount) + $order->shipping_cost 
                @endphp
                <td style="text-align: right;">${{ $order_total }}</td>
              </tr>
            </table>
          </div>
              
        </div>

   <div class="col-md-12">
    <form method="POST" action="{{ route('admin.orderTrack') }}" ><input name="_token" type="hidden" value="DMdZwtObFlJ6WT498oEXTInK6NYhDAFmaiSSf8gM">
     
     <input class="form-control" id="order_id" name="order_id" type="hidden" value="{{$order->id}}">
     
        <hr style="border-color: #c2c2c2;">
          <p class="lead">Change Order Status:</p>
          
            <div class="col-md-3">
              <div class="form-group">
                <label>Payment Status:</label>
                <select class="form-control select2" id="status_id" name="order_status" style="width: 100%;">
                   <option value="Pending"  >Pending</option>
                   <option value="Completed"  selected="selected"  >Completed</option>
                   <option value="Cancel"  >Cancel</option>
                   <option value="Return"  >Return</option>
                 </select>
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Choose status</span>
              </div>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-8">
               <div class="form-group">
                <label>Comments:</label>
                <textarea class="form-control" id="comments" rows="1" name="comments" cols="50"></textarea>
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Comment order</span>
              </div>
            </div>
         <!-- this row will not appear when printing -->
            <div class="col-xs-12">
              <a href="{{ route('admin.orders')}}" class="btn btn-default"><i class="fa fa-angle-left"></i> Back</a>
              
              {{ csrf_field() }}

              <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit </button>


              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>

         <br><br> <hr style="border-color: #c2c2c2;"><br>
            </div>
          </form>
        </div>
        
        <div class="col-md-12">
          <p class="lead">Order Tracking History</p>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>Date</th>
              <th>Status</th>
              <th>Comments</th>
              </tr>
              </thead>
              <tbody>

        @foreach(App\OrderTrack::where('order_id',$order->id)->get() as $orderStatus)   
            <tr>
            <td>{{$orderStatus->created_at}}   </td>
            <td>
            <span class="label label-success">
            {{$orderStatus->status}}
            </span>
            </td>
            <td style="text-transform: initial;">{{$orderStatus->comments}}</td>
            </tr>
        @endforeach

              </tbody>
            </table>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     </div>
<!-- test end -->
</div>
</div></div></div>
</div>
@endsection

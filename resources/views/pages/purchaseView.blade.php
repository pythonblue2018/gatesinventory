@extends('layouts.royalbase')
@section('content')


<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">PO | Purchase Order Details</h4>
                </div>
                <div> 
                  <a href="{{route('admin.printPo', ['id' => $order->id]) }}" target="_blank" >
                    <button type="button" class="btn btn-info btn-icon-text btn-rounded"><i class="fa fa-print"></i> Print Preview
                    </button>
                    </a> 
                   <a href="#">
                  <button type="button" class="btn btn-danger btn-icon-text btn-rounded"><i class="ti-clipboard btn-icon-prepend"></i>PDF PO
                    </button></a>
                    <a href="{{route('admin.createOrder')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Edit PO
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
       <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row mt-2">
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
                        <img src="{{asset('img/gatestech.png')}}"
                             class="img-responsive p-1 m-b-2" style="max-height: 80px;">
                        <p class="ml-2 mt-2">Gates Tech Online<br>
      1 New Town, Buckinghamshire</p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
                        <h4>Purchase Order</h4>
                        <p class="pb-1"> PO # {{$order->id }} </p>
                            <p class="pb-1">Reference:</p>
                            Gross Amount <strong> ${{$order->total_price }} </strong>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->

                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-xs-center text-md-left">
                        <p class="text-muted"> PO To </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
        <ul class="px-0 list-unstyled">


            <li class="text-bold-800"><a
            href="https://pos.ultimatekode.com/vertical/customers/view?id=52"><strong
                class="invoice_a">Mr. {{ $order->first_name }}</strong></a></li><li></li><li>{{ $order->address }}</li><li>Jakarta Timur,Indonesia</li><li> Phone: 08987111373</li><li> Email: {{ $order->email }}aguss@webs.co.id</li>

        </ul>

                    </div>
                    <div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
                        <p><span class="text-muted">PO Date  :</span> {{$order->created_at}}</p> <p><span class="text-muted">PO Due Date :</span> {{$order->created_at}}</p>  <p><span class="text-muted">Terms :</span> Standard Terms</p>                    </div>
                </div>
                <!--/ Invoice Customer Details -->

         
      <!-- Table row -->
      <div class="row mt-4">
        <div class="col-xs-12 table-responsive">
          <table class="table border-top border-bottom">
            <thead>
            <tr class="bg-light">
              <th>Product Name</th>
              <th>Image</th>
              <th>Product Modal</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
    @if(isset($order_items))  
            @foreach($order_items as $item) 
              <tr>
                @foreach($order_products as $order_product)
                    @if($item->id == $order_product->id)
                    <td  width="15%">{{ $order_product->name }}<br></td>                   
                    <td ><img src="{{ asset('img/'.$order_product->image) }}" style="height: 40px;width: auto;"> <br>
                    </td>
                    @endif
                @endforeach
                <td width="25%">{{ $item->product_id }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->item_total }}</td>                
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


      <div class="row">
        <!-- accepted payments column -->
        <div class="col-md-7">
          <p class="lead" style="margin:20px; padding-top: 20px;">Payment Methods:</p>
                    <img src="{{ asset('img/credit/visa.png')}}" alt="Visa">
          <img src="{{ asset('img/credit/mastercard.png')}}" alt="Mastercard">
          <img src="{{ asset('img/credit/american-express.png')}}" alt="American Express">
          <img src="{{ asset('img/credit/paypal2.png')}}" alt="Paypal">
          
        </div>
        <!-- /.col -->
        <div class="col-md-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">
              <tr>
                <th style="width:50%">Total:</th>
                <td style="text-align: right;">${{$order->total_price}}</td>
              </tr>
              <!-- <tr> -->
                <!-- <th>Discount:</th> -->
                <!-- @php $tax = $order->total_price*0.05 @endphp -->
                <!-- <td style="text-align: right;"> ${{ $order->discount }}</td> -->
              <!-- </tr> -->
              <tr>
                <th>Paid:</th>
                   <!-- @php $shipping = $ship + 9.99 @endphp -->
                  <td style="text-align: right;">${{ $order->total_price }}</td>
              </tr>
                            <tr>
                <th>Balance:</th>
                <!-- @php $order_total = ($order->total_price - $order->discount) + $order->shipping_cost   @endphp -->
                <td style="text-align: right;">$ 0</td>
              </tr>
            </table>
          </div>
              
        </div>
</div>
          <hr>

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
</div></div>
</div>
@endsection

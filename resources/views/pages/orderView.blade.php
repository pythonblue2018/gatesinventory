@extends('layouts.royalbase')
@section('content')


<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Invoice | Order Details</h4>
                </div>
                <div>
                   <a href="{{route('admin.printInvoice', ['id' => $order->id]) }}" target="_blank" >
                    <button type="button" class="btn btn-info btn-icon-text btn-rounded"><i class="fa fa-print"></i> Print Preview
                    </button>
                    </a> 

                   <a href="#" onClick="printPDF()">
                  <button type="button" class="btn btn-danger btn-icon-text btn-rounded"><i class="ti-clipboard btn-icon-prepend"></i>PDF Invoice
                    </button></a>
                    
                    <a href="{{route('admin.createOrder')}}"> <button type="button" class="btn btn-warning btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Edit Invoice
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
  th {
    color: grey;
    font-weight: 500;
  }
</style>
<script type="text/javascript">
  function printPDF(){
    console.log('print pdf');
    window.print();
  }
</script>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  

<!-- test -->
<div class="invoice" style="margin: 15px;">

      <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row mt-2 mb-3">
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
                        <img src="{{asset('img/gatestech.png')}}"
                             class="img-responsive p-1 m-b-2" style="max-height: 80px;">
                        <p class="ml-2">Gates Tech Online<br>
                        1 New Town, Buckinghamshire</p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
                        <h4>INVOICE</h4>
                        <p class="pb-1"> INV# {{$order->id }} </p>
                            <p class="pb-1">Reference: fb sale</p>
                            <p class="pb-1">Gross Amount: <strong> ${{$order->total_price }} </strong></p>
                    </div>
                </div>
                <!--/ Invoice Company Details -->

                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-xs-center text-md-left">
                        <p class="text-muted"> <b>Bill To</b></p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
                        <ul class="px-0 list-unstyled">


                            <li class="text-bold-800"><a
                                        href="https://pos.ultimatekode.com/vertical/customers/view?id=52"><strong
                                            class="invoice_a">Mr {{ $order->name }} Lee</strong></a></li><li></li><li>Jakarta</li><li>Jakarta Timur,Indonesia</li><li> Phone: 08987111373</li><li> Email: aguss@webs.co.id</li>

                        </ul>

                    </div>
                    <div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
                        <p><span class="text-muted">Invoice Date  :</span> {{$order->created_at}}</p> <p><span class="text-muted">Due Date :</span> {{$order->created_at}}</p>  <p><span class="text-muted">Terms :</span> Payment Receipt</p>                    </div>
                </div>
                <!--/ Invoice Customer Details -->
     

<!-- <hr style="border-color: #c2c2c2;"> -->
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
                    <td ><img src="{{ asset('img/'.$order_product->image) }}" style="height:40px;width: auto;"> <br>
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
        <div class="col-md-7  mt-4 h-100 my-auto" 
        style="">

          <p class="lead" style="margin-bottom:10px">Payment Methods:</p>
         
          <img src="{{ asset('img/credit/visa.png')}}" alt="Visa">
          <img src="{{ asset('img/credit/mastercard.png')}}" alt="Mastercard">
          <img src="{{ asset('img/credit/american-express.png')}}" alt="American Express">
          <img src="{{ asset('img/credit/paypal2.png')}}" alt="Paypal">
          
      <p class="lead" style="margin-top: 20px">Invoice Note:</p>
          
        </div>
        <!-- /.col -->
        <div class="col-md-5  mt-4">
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
              <tr>
                <th>Payment Made:</th>
                   <!-- @php $shipping = $ship + 9.99 @endphp -->
                  <td style="text-align: right;">(-) $ 0.00</td>
              </tr>
              <tr>
                <th>Balance Due:</th>
                   <!-- @php $shipping = $ship + 9.99 @endphp -->
                  <td style="text-align: right;">${{ $order_total }}</td>
              </tr>
            </table>
            <div class="text-xs-center mt-3">
            <p>Authorized person</p>
            <img src="https://pos.ultimatekode.com/vertical/userfiles/employee_sign/sign.png" alt="signature" style="height: 50px;" />
                <h6>(Account Manager)</h6>
                <p class="text-muted">Account Manager, Gates Tech Online</p>                            </div>
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
        <hr>
        <div class="row">

                        <div class="col-md-12 text-center text-small">

                           Gates Tech Online | 1 Bucks New Town, Buckinghamshire, UK | gatestechonline@gmail.com
                        </div>

                    </div>

      </div>
      <!-- /.row -->

     </div>
<!-- test end -->
</div>
</div></div>
</div>
@endsection

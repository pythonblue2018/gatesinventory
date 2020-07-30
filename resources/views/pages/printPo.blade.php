 <!-- <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css')}}"> -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('img/gates.png')}}" />

<!-- CUSTOM -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

  <style type="text/css">
  /* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}

.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  background-color: #fff;
}
.container{
  font-size: 18px;
  margin-bottom: 80px;
}
ul, ol, dl, th, td, p, .table td, .table th, .table thead th {
  font-size: 20px;
}
.table th, .table td  {
    padding: 0.5rem 0.9375rem
}

</style> 


<div class="container">
    <!-- Begin page content -->
    <div class="invoice-print"> 
     

    <!-- Invoice Company Details -->
     <div class="col-md-12 text-center mt-4">
       <p class="pull-right"><small><a href="#"  onClick="printPDF()"><i class="fa fa-print"></i> Print</a></small></p>
            <h3>Purchase Order</h3>

         <div class="row">   

      <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
      <img src="{{asset('img/gatestech.png')}}"
      class="img-responsive p-1 m-b-2" style="max-height: 80px;">

      <p class="ml-2 mt-2">Gates Tech Online<br>
      1 New Town, Buckinghamshire</p>
      </div>                     

      <div class="col-md-6 col-sm-12 text-xs-center text-md-right">
      <p class="pb-1"> PO NUMBER # {{$order->id }} </p>
      <p class="pb-1">Reference: fb-sale</p>
      <p class="pb-1">Gross Amount: <strong> ${{$order->total_price }} </strong></p>
      </div>

      </div>
    </div>
      <!--/ Invoice Company Details -->
<hr>
      <!-- Invoice Customer Details -->
      <div class="col-md-12">
         <div class="row">  

      <div class="col-md-4 col-sm-12 text-xs-center text-md-left">
              <p class="text-muted"> <b>PO To</b></p>

      <ul class="px-0 list-unstyled">
      <li class="text-bold-800"><a
      href="#"><strong
      class="invoice_a">Mr {{ $order->name }} Lee</strong></a></li><li></li><li>Jakarta</li><li>Jakarta Timur,Indonesia</li><li> Phone: 08987111373</li><li> Email: aguss@webs.co.id</li>
      </ul>
      </div>
      <div class="col-md-4 col-sm-12 text-xs-center text-md-left">
             <!--  <p class="text-muted"> <b>Shipping Address</b></p>

      <ul class="px-0 list-unstyled">
      <li class="text-bold-800 "><a
      href="#"><strong
      class="invoice_a ">Mr {{ $order->name }} Lee</strong></a></li><li></li><li>Jakarta</li><li>Jakarta Timur,Indonesia</li><li> Phone: 08987111373</li><li> Email: aguss@webs.co.id</li>
      </ul> -->
      </div>
      <!-- offset-md-3  -->
      <div class="col-md-4 col-sm-12 text-xs-center text-md-right">
      <p><span class="text-muted">PO Date  :</span> {{$order->created_at}}</p> <p><span class="text-muted">PO Due Date :</span> {{$order->created_at}}</p>  <p><span class="text-muted">Terms :</span> Standard Terms</p>                    
      </div>
      </div>
    </div>
      <!--/ Invoice Customer Details -->


<!-- <hr style="border-color: #c2c2c2;"> -->
      <!-- Table row -->
      <div class="row mt-4">
        <div class="col-md-12 table-responsive">
          <table class="table border">
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
            <table class="table border order-table">
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
        
         


    

 
  </div>
</div>

  <footer class="footer text-center">
        <span style="font-size: 16px;">Gates Tech Online | 1 Bucks New Town, Buckinghamshire, UK | gatestechonline@gmail.com</span>
  </footer>

<script type="text/javascript">

  function printPDF(){
    console.log('print pdf');
    window.print();
  }
</script>
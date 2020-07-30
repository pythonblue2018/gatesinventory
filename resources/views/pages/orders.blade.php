@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Orders | Sales Invoices</h4>
                </div>
                <div>
                    <a href="{{route('admin.addSale')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Sale</button></a>
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
<div id="success_message" class="alert bg-info" style="width:100%; height:100%; display:none; ">
<span class="closebtn pull-right" style="font-size: 20px;cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
        <h4>Mail sent successfully!</h4>
</div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped" style="width:100%; ">
                      <thead>
                        <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col"style="width:80px;">Order Date</th>
                      <th scope="col">Cust Name</th>
                      <th scope="col">Post Code</th>
                      <th style="max-width:50px;" scope="col">Address</th>
                      <th scope="col">Order Total</th>
                      <th scope="col">Status </th>
                      <th scope="col" width="130px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                    <tr>             
                      <td>ODR-{{ $order->id }}</td>
                      <td>{{ $order->created_at }}</td>                       
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->post_code}}</td>
                      <td style="max-width:50px;">{{ $order->address }}</td> 
                      <td style="text-align:right;">${{$order->total_price}} </td>
                      
              @if($order->order_status=='Delivered')
              <td style="text-align:center;"><span class="badge badge-success">{{$order->order_status}}</span>
              </td>
              @elseif($order->order_status=='InTransit')
              <td style="text-align:center;"><span class="badge badge-warning" >{{$order->order_status}}</span>
              </td>
              @elseif($order->order_status=='New Order')
              <td style="text-align:center;"><span class="badge badge-primary" >{{$order->order_status}}</span>
              </td>
              @else
              <td style="text-align:center;"><span class="badge badge-danger">{{$order->order_status}}</span>
              </td>
              @endif

              <td>
          @foreach($customers as $customer)
             @if($order->user_id == $customer->user_id)      
                <a data-toggle="modal" data-target="#myModal"
                 data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('order.view', ['id' => $order->id ]) }}" class="badge bg-light-blue"><i class="fa fa-lg fa-envelope" style="color: orange;" aria-hidden="true" onClick="getEmail('{{$customer->email}}','{{$order->id}}')"></i></a>
              @endif
            @endforeach

                <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('order.view', ['id' => $order->id ]) }}" class="badge bg-light-blue"><i class="fa fa-lg fa-eye" style="color: green;" aria-hidden="true"></i></a>

                <a data-toggle="tooltip" data-placement="bottom" title="View Order" 
                href="{{ route('admin.orderEdit', ['id' => $order->id ]) }}" class="badge bg-light-blue"><i class="fa fa-lg fa-pencil-square-o" style="color: blue;" aria-hidden="true"></i></a>
            
               <a data-toggle="tooltip" data-placement="bottom" title="Delete Order" id="deleteOrdersId" class="badge bg-red"><!-- <i class="fa fa-trash" aria-hidden="true"></i> -->

               <i class="fa fa-lg fa-trash" style="color: red;" aria-hidden="true"></i>
                </a>
               </td>
                   
                  </tr>
                 @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Send Email</h4>
<button type="button" class="close" data-dismiss="modal">×</button>

</div>
<div class="modal-body p-5">

       <div class="form-group row">
            <label for="email" class="col-sm-3">
                Email:</label>
            <input type="email" class="form-control col-sm-9"
            id="email" name="email" required maxlength="50" value="">
            <input type="number" id="order_id" name="order_id" value="" hidden>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3">
                Subject:</label>
            <input type="text" class="form-control col-sm-9"
            id="subject" name="subject"   required maxlength="50">
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3">
                Message:</label>
            <textarea class="form-control col-sm-9" type="textarea" name="message"
            id="message" placeholder="Your Message Here"
            maxlength="6000" rows="6"></textarea>
        </div>

        <button onClick="sendEmail()" type="submit" class="btn btn-danger btn-block" id="btnContactUs" style="cursor: pointer;">
        Send <i class="fa fa-paper-plane"></i></button>

   <!--  <div id="success_message" style="width:100%; height:100%; display:none; ">
        <h3>Sent your message successfully!</h3>
    </div>
    <div id="error_message"
    style="width:100%; height:100%; display:none; ">
        <h3>Error</h3>
        Sorry there was an error sending your form.

    </div> -->
</div>

</div>

 </div>
</div>

<script type="text/javascript">

function getEmail(email,order_id){
  console.log('email:',order_id)
  document.getElementById('email').value = email;
  document.getElementById('order_id').value = order_id;
}  

function sendEmail(){
  email =   document.getElementById('email').value;
  order_id =   document.getElementById('order_id').value;
  subject =   document.getElementById('subject').value;
  message =   document.getElementById('message').value;
  console.log('email:',email,subject,message)

  $.ajax({  
      type:'GET',
      url:'/sendEmail',
      data: {  email: email, order_id: order_id,
               subject: subject, message: message },
         
         success:function(data) {
            console.log(data);
            $('#myModal').modal('hide');
            $("#success_message").css("display", "block");
            // document.getElementById('success_message').value;
            // alert('mail sent');
        }
  });

}  

</script>        
@endsection

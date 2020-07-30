@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Pruchases | PO </h4>
                </div>
                <div>
                    <a href="{{route('admin.addPurchase')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Purchase</button></a>
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
                  <div class="table-responsive">
                    <table class="table table-stripped" style="width:100%; ">
                      <thead>
                        <tr>
                      <th scope="col">purchase ID</th>
                      <th scope="col"style="width:80px;">purchase Date</th>
                      <th scope="col">Supplier</th>
                      <th scope="col">Reference</th>
                      <th style="max-width:50px;" scope="col">$ Status</th>
                      <th scope="col">purchase Total</th>
                      <th scope="col">Status </th>
                      <th scope="col" width="130px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($purchases as $purchase)
                    <tr>             
                      <td>ODR-{{ $purchase->id }}</td>
                      <td>{{ $purchase->created_at }}</td>                       
                      <td>{{ $purchase->supplier }}</td>
                      <td>{{ $purchase->reference }}</td>
                      <td >{{ $purchase->payment_status }}</td> 
                      <td >${{$purchase->total_price}} </td>
                      
              @if($purchase->purchase_status=='Delivered')
              <td style="text-align:center;"><span class="badge badge-success">{{$purchase->purchase_status}}</span>
              </td>
              @elseif($purchase->purchase_status=='InTransit')
              <td style="text-align:center;"><span class="badge badge-warning" >{{$purchase->purchase_status}}</span>
              </td>
              @elseif($purchase->purchase_status=='New purchase')
              <td style="text-align:center;"><span class="badge badge-primary" >{{$purchase->purchase_status}}</span>
              </td>
              @else
              <td style="text-align:center;"><span class="badge badge-danger">{{$purchase->purchase_status}}</span>
              </td>
              @endif

              <td>
                <a data-toggle="modal" data-target="#myModal"
                 data-toggle="tooltip" data-placement="bottom" title="View purchase" href="{{ route('order.view', ['id' => $purchase->id ]) }}" class="badge bg-light-blue"><i class="fa fa-lg fa-envelope" style="color: orange;" aria-hidden="true"></i></a>

                <a data-toggle="tooltip" data-placement="bottom" title="View purchase" href="{{route('admin.purchaseView', ['id' => $purchase->id ]) }}" class="badge bg-light-blue"><i class="fa fa-lg fa-eye" style="color: green;" aria-hidden="true"></i></a>

                <a data-toggle="tooltip" data-placement="bottom" title="View purchase" 
                href="#" class="badge bg-light-blue"><i class="fa fa-lg fa-pencil-square-o" style="color: blue;" aria-hidden="true"></i></a>
            
               <a data-toggle="tooltip" data-placement="bottom" title="Delete purchase" id="deletepurchasesId" class="badge bg-red">
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

        <form role="form" method="post" id="reused_form" >
        
        <div class="form-group row">
            <label for="email" class="col-sm-3">
                Email:</label>
            <input type="email" class="form-control col-sm-9"
            id="email" name="email" required maxlength="50">
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3">
                Subject:</label>
            <input type="text" class="form-control col-sm-9"
            id="name" name="name"   required maxlength="50">
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3">
                Message:</label>
            <textarea class="form-control col-sm-9" type="textarea" name="message"
            id="message" placeholder="Your Message Here"
            maxlength="6000" rows="6"></textarea>
        </div>

        <button type="submit" class="btn btn-danger btn-block" id="btnContactUs">
        Send <i class="fa fa-paper-plane"></i></button>

    </form>
    <div id="success_message" style="width:100%; height:100%; display:none; ">
        <h3>Sent your message successfully!</h3>
    </div>
    <div id="error_message"
    style="width:100%; height:100%; display:none; ">
        <h3>Error</h3>
        Sorry there was an error sending your form.

    </div>
</div>

</div>

 </div>
</div>

<script>
$(function()
{
    function after_form_submitted(data)
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' );
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });

        }//else
    }

  $('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' );
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });


                    $.ajax({
                type: "POST",
                url: 'handler.php',
                data: $form.serialize(),
                success: after_form_submitted,
                dataType: 'json'
            });

      });
});
</script>         
@endsection

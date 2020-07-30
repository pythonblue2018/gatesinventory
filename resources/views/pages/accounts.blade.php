@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Accounts</h4>
                </div>
                <div>
                    <a href="#> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Create Account</button></a>
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
                      <th scope="col">ID</th>
                      <th scope="col">Account Number</th>
                      <th scope="col">Account Holder</th>
                      <th scope="col">Balance</th>
                      <th  scope="col">Code</th>
                      <th scope="col">Type</th>
                      <th scope="col">Created </th>
                      <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($accounts as $account)
                    <tr>             
                      <td>#{{ $account->id }}</td>
                      <td>{{ $account->number }}</td>
                      <td>{{ $account->holder}}</td>
                      <td style="text-align:center;">${{ $account->balance }}</td> 
                      <td style="text-align:center;">{{ $account->code }}</td> 
                      <td>{{ $account->type }}</td>                       
                      <td style="text-align:left;">{{$account->created_at}} </td>
              <td>             
                <a>
                <i class="fa fa-lg fa-edit" style="color: green;" aria-hidden="true"></i>
                <i class="fa fa-lg fa-trash pl-2" style="color: red;" aria-hidden="true"></i>
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

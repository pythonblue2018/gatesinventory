@extends('layouts.royalbase')

@section('extra-js')
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

@endsection

@section('content')
<script>

  function myFunction($id) {
    $.ajax({  
               type:'GET',
               url:"/customerDetails/"+$id,
              //  data: {_token: "{{ csrf_token() }}", id: $id,
              //  message:$(".getinfo").val()},
               
               success:function(data) {
                  $("#msg").html(data.msg);
                  console.log(data.customer);
                  $response = data.customer;
                  document.getElementById("cust_details").innerHTML = data;
              }
    });          
}
</script>  

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Customer Management</h4>
                </div>
                <div>
                    <a href="#"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-user btn-icon-prepend"></i>Add Customer
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
  <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Import Customers</h4>
                  <p class="card-description">
                    Use the csv format <code> id, name, xyz </code>
                    to import
                  </p>
                  <form class="form-inline">
                    <label class="sr-only" for="inlineFormInputName2">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

        <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped" id="example1" style="width:100%; ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Personal Details</th>
                      <th>Address</th>
                      <th style="width:15%;">Action</th>
                    </tr>
                  </thead>
                   <tbody>

    @foreach($customers as $customer)
        <tr onClick="myFunction({{$customer->id}})">
        <td>{{ $customer->id }}</td>
        <td><img src="{{ asset('img/blog1.png')}}" alt="" width=" 100px" height="100px"></td>
        <td width="45%"><a href="{{ route('customer.view', ['id' => $customer->id ]) }}">
          <strong> {{ $customer->first_name }} {{ $customer->last_name }} </strong><br>
          <strong>Email: </strong> {{ $customer->email }} <br>
          <strong>Phone: </strong> {{ $customer->phone }} <br>
          <strong>City: </strong> {{ $customer->city }} <br></a>
        </td>
        <td>
          <strong>{{ $customer->first_name }} {{ $customer->last_name }}</strong> <br>
          {{ $customer->address }}<br>
          {{ $customer->postal_code }}<br>
          {{ $customer->city }} United Kingdom <br>
          <strong>Company: </strong>xyz
        </td>
       
        <td>
        <ul class="nav table-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Action <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('customer.edit', ['id' => $customer->id ]) }}">Edit customer</a></li>
                                                      
                <li role="presentation"><a role="menuitem" tabindex="-1" href="addinventory/98">Edit Address</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" id="deletecustomerId" customers_id="98">Delete customer</a></li>
            </ul>
          </li>
        </ul>
        </td>
    </tr>
    @endforeach
                  </tbody>
                </table>

                <div class="col-xs-12 text-right">
                  <ul class="pagination">
        
                    <li class="disabled"><span>&laquo;</span></li>
                     <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>                                          
                    <li><a href="#" rel="next">&raquo;</a></li>
            </ul>

                </div>
              </div>
              
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      <!-- /.col --> 
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user"></i> Customer Details </h3>            
          </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div id="cust_details">
            <!-- Ajax Data -->
            </div>
                        
          </div>
         </div>
      </div>
  </div>
</div>
   



@endsection

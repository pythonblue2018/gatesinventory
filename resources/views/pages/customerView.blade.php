@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">User Roles</h4>
                </div>
                <div>
                    <a href="{{route('admin.userRoles')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add user
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
                  <div class="table-responsive">
                    <table class="table table-stripped" style="width:100%; ">
     <thead>
        <th><span data-feather="edit"></span></th>
        <th scope="col">Customer ID</th>
        <th scope="col">Cust Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Post Code</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
    </thead>
           <tbody>
           <tr>
            <td><a href="{{ route('customer.view', ['id' => $customer->id ]) }}" 
                style="color:grey;"><span data-feather="edit"></span></a></td>
            <td><a href="#" style="color:#34495E;">CUST-{{ $customer->id }}</a></td>
            <td>{{$customer->first_name }} {{$customer->last_name }}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->postal_code}}</td>
            <td>{{$customer->address }}</td>       
            <td>London</td>
          </tr>
 </tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-12 col-sm-5">
    <div class="card bg-light mb-3">
        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-user"></i> Customer Details</div>
        <div class="card-body">
          <p>Mr. {{$customer->first_name }} {{$customer->last_name }} Lastman</p>
          <p>{{$customer->email}}</p>
          <p>{{$customer->phone}}</p>
          <p>{{$customer->address }}</p>
          <p>{{$customer->post_code}}</p>
          <p>London{{$customer->city }} </p>
          <p>United Kingdom</p>
        </div>       
      </div>      
    </div>
</div>
</div>

@endsection


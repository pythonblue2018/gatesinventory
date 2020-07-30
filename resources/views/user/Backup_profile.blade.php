@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="https://demo.s-cart.org">Home</a></li>
          <li class="active">My Account</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection

@section('content')

<!--body-->
<section>
<div class="container">

<!-- Small Box -->
@include('user.smallBox')
<!-- //Small Box -->

<div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">User Details </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <div class="col-md-8">
<table class="table">
     <thead>
        <!-- <th><span data-feather="edit"></span></th> -->
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>        
    </thead>
           <tbody>
           <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
          </tr>
 </tbody>
</table>
          </div>
          </div>
          </div>
      </section>
        <!-- right col -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->

   
    @endsection
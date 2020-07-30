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

@include('user.account_sidebar')

<!-- Page content -->

<table class="table">
     <thead>
        <!-- <th><span data-feather="edit"></span></th> -->
         <tr><th scope="col">User ID</th>  <td>{{ $user->id }}</td></tr>
        <tr><th scope="col">User Name</th><td>{{ $user->name }}</td></tr>
        <tr><th scope="col">Email</th>    <td>{{ $user->email }}</td></tr>
        <tr><th scope="col">Phone</th>    <td>{{ $user->email }}</td></tr>
        <tr><th scope="col">Address</th>  <td>{{ $user->email }}</td> </tr>       
    </thead>          
</table>

</div>
   </div>
    @endsection
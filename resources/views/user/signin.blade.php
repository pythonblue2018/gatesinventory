
@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="https://demo.s-cart.org">Home</a></li>
          <li class="active">Login</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection
@section('content')

<div class="content-wrapper"> 

    <!-- Main content -->
    <section class="content">
<div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-12"> 
      <!-- style="border: 1px solid; border-color: grey;"> -->
        <div class="box" >
          <div class="box-header">
            <h3 class="box-title" style="color: grey;">Login to your account! </h3>
              <br>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <div class="col-md-12">

    <form action="" method="post">
          
          <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Password" required>
          </div>
          <div class="mx-auto">
            {{ csrf_field() }}
              <p>
                <button type="submit" class="btn btn-primary text-right">Submit</button></p></div>            
      </form> 
      </div>
      </div>
          </div>
          <br><br><br>
 </div>
      </section>
        <!-- right col -->
      <!-- /.row (main row) -->
    </div>
    <br>
    @endsection
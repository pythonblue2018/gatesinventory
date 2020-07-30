@extends('layouts.base')
@section('content')

<div class="content-wrapper"> 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sign up
        <small>user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listing All Products </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <div class="col-md-8">

    <form action="" method="post">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
          </div>
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
              <button type="submit" class="btn btn-primary text-right">Submit</button></div>            
      </form> 
      </div>
      </div>
          </div>
      </section>
        <!-- right col -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
   </div>  
   
    @endsection
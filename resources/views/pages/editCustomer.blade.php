@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper"> 
<section class="content-header">
      <h1>
Edit Customer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Customer</li>
      </ol>
    </section>

        <!-- Main content -->
    <section class="content">
    <!-- Main content -->

<!-- test --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Customers </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                  <div class="box box-info">
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <br>                       
                                                
                                               
                        <!-- form start -->                        
                         <div class="box-body">
                         
                            <form method="POST" action=""  class="form-horizontal form-validate">

                              <input class="form-control" id="customers_id" name="customers_id" type="hidden" value="1">
                              
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">First Name </label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control field-validate" id="customers_firstname" name="customers_firstname" type="text" value="Ms">
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter first name.</span>
                                    <span class="help-block hidden">This field is required.</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Last Name</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control field-validate" id="customers_lastname" name="customers_lastname" type="text" value="Test">
                                   <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter last name.</span>
                                    <span class="help-block hidden">This field is required.</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                                 <label for="name" class="col-sm-2 col-md-3 control-label">Gender</label>
                                   <div class="col-sm-10 col-md-4">
                                        <label>
                                          <input  checked  type="radio" name="customers_gender" value="1" class="minimal" checked > Male  
                                        </label><br>
    
                                        <label>
                                          <input  type="radio" name="customers_gender" value="0" class="minimal"> Female
                                        </label>
                                   </div>
                                </div>                            
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Picture</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input id="newImage" name="newImage" type="file">
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please upload small size image.</span>
                                  <br>
                                    <input id="oldImage" name="oldImage" type="hidden" value="">
                                 </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">DOB</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control datepicker" id="customers_dob" name="customers_dob" type="text" value="09/11/1990">
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter date of birth.</span>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Telephone</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control" id="customers_telephone" name="customers_telephone" type="text" value="123456789">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter telephone.</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Fax</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control" id="customers_fax" name="customers_fax" type="text" value="123456859">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter fax.</span>
                                  </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Email Address </label>
                                  <div class="col-sm-10 col-md-4">
                                   <input class="form-control" id="old_email_address" name="old_email_address" type="hidden" value="test.user@gmail.com">
                                    <input class="form-control email-validate" id="email" name="email" type="email" value="test.user@gmail.com">
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"> Please enter email address.</span>
                                 
                                    <span class="help-block hidden"> Please enter a valid email address.</span>
                                  </div>
                                </div>
                                                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Do you want to Change Password?</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="" id="change-passowrd" name="changePassword" type="checkbox" value="yes">
                                  </div>
                                </div>
                                
                               <!-- <div class="form-group password_content">-->
                               <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Password</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input class="form-control " id="password" name="password" type="password" value="">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   Please enter password.</span>
                                    <span class="help-block hidden">This field is required.</span>
                                  </div>
                               </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Status
                                   </label>
                                  <div class="col-sm-10 col-md-4">
                                    <select class="form-control" name="isActive">
                                          <option                                   selected
                                                                                         value="1">Active</option>
                                          <option 
                                                                                      value="0">Inactive</option>
                  </select><span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please choose Status (Active status only able to login).</span>
                                 
                                  </div>
                                </div>
                                
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Update </button>
                                <a href="" type="button" class="btn btn-default">Back</a>
                              </div>
                              <!-- /.box-footer -->
                            </form>
                        </div>
                  </div>
              </div>
            </div>
            
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
<!-- test end -->
</section>
</div>

@endsection

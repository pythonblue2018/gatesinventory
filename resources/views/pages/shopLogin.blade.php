@extends('pages.shopHeader')

@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="">Home</a></li>
          <li class="active">Login</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection

@section('content')

<!--main right-->
<section id="form-login"><!--form-->
        <div class="container">
            <div class="row">
                <h2 class="title text-center">Login</h2>
      <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form">
<!--login form-->
              <h2>Login to your account!</h2>
  <form action="{{ route('user.signin')}}" method="post"  class="box">
          <input type="hidden" name="_token" value="MWlHmyMFfownYrW84Xa3IyaMDp1osmGBYP568KkT">
          <div class="form-group">
          <label for="email" class="control-label">Email</label>
          <input class="is_required validate account_input form-control "   type="text" name="email" value="" >

          </div>
          <div class="form-group">
          <label for="password" class="control-label">Password</label>
          <input class="is_required validate account_input form-control "   type="password"  name="password" value="" >

          </div>
          <p class="lost_password form-group">
          <a class="btn btn-link" href="">
          Forgot password
          </a>
          <br>
          </p>
          <button type="submit" name="SubmitLogin" class="btn btn-default">Login</button>
              </form>
          </div>
<!--/login form-->
      </div>

      <div class="col-sm-1">
          <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">

<!--sign up form-->
          <div class="signup-form">
              <h2>New User Signup!</h2>
              <form action="" method="post"  class="box">
          <input type="hidden" name="_token" value="MWlHmyMFfownYrW84Xa3IyaMDp1osmGBYP568KkT">
          <div class="form_content " id="collapseExample">
          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_first_name" placeholder="First name" value="">
          </div>
          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_last_name" placeholder="Last name" value="">
          </div>

          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_email" placeholder="Email" value="">
          </div>

          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_phone" placeholder="Phone" value="">
          </div>

          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_address1" placeholder="Address 1" value="">
          </div>

          <div class="form-group">
          <input  type="text" class="is_required validate account_input form-control "   name="reg_address2" placeholder="Address 2" value="">
          </div>

          <div class="form-group  ">
          <select class="form-control reg_country" style="width: 100%;" name="reg_country" >
          <option>__Country__</option>
          <option value="AL" >Albania</option>
          <option value="DS" >Bangladesh</option>
          <option value="YE" >Yemen</option>
          <option value="UK" >UK</option>
          </select>
          </div>

          <div class="form-group">
          <input  type="password" class="is_required validate account_input form-control "   name="reg_password" placeholder="Password" value="">
          </div>
          <div class="form-group">
          <input type="password" class="is_required validate account_input form-control "  placeholder="Confirm password" name="reg_password_confirmation" value="">
          </div>
          <input type="hidden" name="check_red" value="1">
          <div class="submit">
          <button type="submit" name="SubmitCreate" class="btn btn-default">Signup</button>
          </div>
      </div>

              </form>
          </div><!--/sign up form-->
      </div>
    </div>
  </div>
<br>
</section><!--/form-->

<!--//main right-->

@endsection
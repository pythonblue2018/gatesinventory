
<style type="text/css">
/* The side navigation menu */
.sidebar {
  /*margin: 0;*/
  padding: 0;
  background-color: #f1f1f1;
  float: left;
  height: 500px;
  overflow: hidden;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #c2c2c2;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  padding: 1px 16px;
  height: 100%;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<div class="col-md-12">
<!-- The sidebar -->
<div class="sidebar col-md-3">
  <a class="active" href="{{ route('user.profile')}}">My Account</a>
  <a href="{{ route('user.myOrders')}}">My Orders</a>
  <a href="{{ route('user.myWishlist')}}">My Wishlist</a>
  <a href="#Settings">Settings</a>
</div>

<!-- Page content -->
<div class="content col-md-9">



<!-- <style type="text/css">
  .left_side{
      padding-left: 0px;
 }
  .sideBarLi{
    padding: 10px 0px 10px 20px;
  }
  a{
    color: grey;
  }
</style>
 <section>
<div class="container-fluid">

<div class="col-md-12">

<div class="col-md-3" height="100%" style="background: #EFF0F1; border-right: 1px solid; border-color: #b2b2b2;
                              ">
<div class="left_side">
    <div >
        <ul  class="left_side">
          <li class="sideBarLi"><a href="{{ route('user.profile')}}"   >My Account</a></li>
          <li class="sideBarLi"><a href="{{ route('user.myOrders')}}"  >Orders</a></li>
          <li class="sideBarLi"><a href="{{ route('user.myWishlist')}}">Wishlist</a></li>
          <li class="sideBarLi"><a href="{{ route('user.myWishlist')}}">Details</a></li>
          <li class="sideBarLi"><a href="{{ route('user.myWishlist')}}">Setting</a></li>
        </ul>
    </div>
  </div>
</div> --> 
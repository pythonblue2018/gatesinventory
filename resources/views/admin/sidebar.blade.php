<style type="text/css">

.sidebar .nav:not(.sub-menu) > .nav-item > .nav-link {
  color: #e7dfdf;
  font-family: sans-serif;
}
.sidebar .nav .nav-item .nav-link .menu-title {
  font-size: 14px;
  }
.sidebar .nav > .nav-item > .nav-link > i.menu-icon {
    color: #b2b2b2;
}
.sidebar .nav.sub-menu .nav-item .nav-link {
  font-size: 14px;
  font-family: sans-serif;
}
/*.sidebar .nav.sub-menu{
  background-color: #07081e;
}
*/
/* Solid border */
hr.solid {
  border-top: 1px solid grey;
  margin: 1px; 
}
</style>
 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar" 
          style="background-color: #1e3051; 
          /* 074d9b; */
                 color: white;">
      <!-- <nav class="sidebar sidebar-offcanvas" id="sidebar"> -->
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false" aria-controls="ui-sales">
              <i class="ti-receipt menu-icon"></i>
              <span class="menu-title">Sales</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-sales">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.orders') }}">Standard Invoices</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.addSale') }}">Add Sale</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.addSale') }}">Create Invoice</a></li>  <li class="nav-item"> <a class="nav-link" href="{{route('admin.addSale') }}">Create Qoutes</a></li>                                        
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:orders' %}">Shop Sales</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Import Sales</a></li> -->
                 <!-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}">Invoices</a></li> -->

                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Deliveries</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
              <i class="ti-layout-grid2 menu-icon"></i>
              <span class="menu-title">Stock Manager</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.products') }}">All Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.addNewProduct')}}">Create Product</a></li>

                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories') }}">Categories </a>
                </li>   
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.brands') }}">
                Brands </a>
              </li>
              <!-- <i class="ti-control-play menu-icon"></i> -->
              
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:products' %}">Import Product</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'shop:cartview' %}">Quantity Adjustment</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'shop:cartview' %}">Stock Count</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'shop:cartview' %}">Stock Control</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-purchase" aria-expanded="false" aria-controls="ui-purchase">
              <i class="ti-notepad menu-icon"></i>
              <span class="menu-title">Purchase</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-purchase">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.purchases')}}">Purchase Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.addPurchase')}}">Create Purchase</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Import Purchase</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Add Expense</a></li> -->
              </ul>
            </div>
          </li> 
        
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.customers') }}">
              <i class="ti-face-smile menu-icon"></i>
              <span class="menu-title">CRM</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.shopHome') }}">
              <i class="ti-shopping-cart menu-icon"></i>
              <span class="menu-title">Front End</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="user-basic">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">HRM</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.userRoles') }}">All Admins</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Add Admin</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">All Customers</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:customers' %}">Add Customer</a></li> -->
               
              </ul>
            </div>
          </li>
        
    
          
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-quotation" aria-expanded="false" aria-controls="ui-quotation">
              <i class="ti-comment-alt menu-icon"></i>
              <span class="menu-title">Quotation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-quotation">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:orders' %}">All Quotations</a></li>
                <li class="nav-item"> <a class="nav-link" href="{% url 'adminpanel:addsale' %}">Add Quotations</a></li>
              </ul>
            </div>
          </li>
 -->

          

        <!--   <li class="nav-item">
            <a class="nav-link" href="{% url 'shop:home' %}">
              <i class="ti-shopping-cart-full menu-icon"></i>
              <span class="menu-title">Shop</span>
            </a>
          </li> -->
          
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-Suppliers" aria-expanded="false" aria-controls="ui-Suppliers">
              <i class="ti-face-smile menu-icon"></i>
              <span class="menu-title">Suppliers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Suppliers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.suppliers')}}">All Suppliers</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Add Supplier</a></li>
              </ul>
            </div>
          </li>
    <li><hr class="solid"></li>

      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-accounts" aria-expanded="false" aria-controls="ui-accounts">
              <i class="ti-credit-card menu-icon"></i>
              <span class="menu-title">Finance</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-accounts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.accounts')}}">Accounts</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Add Account</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="#">Add Purchase Return</a></li> -->
              </ul>
            </div>
          </li>
        
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-return" aria-expanded="false" aria-controls="ui-return">
              <i class="ti-back-left menu-icon"></i>
              <span class="menu-title">Stock Return</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-return">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">All Return</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Add Return</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="#">Add Purchase Return</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="ti-bar-chart menu-icon"></i>
              <span class="menu-title">Data & Reports</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#BusinessOwnerOnly">Business Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.coupons')}}">Coupons</a></li>
              </ul>
            </div>
          </li>
          <!-- end           -->

         <!--  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="ti-pie-chart menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/themify.html">
              <i class="ti-star menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->


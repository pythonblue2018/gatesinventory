<div class="row">        
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h6>User Name : {{ auth()->user()->name }}</h6>
              <h6>User ID   : {{ auth()->user()->id }}</h6>
              <h6>Email   : {{ auth()->user()->email }}</h6>

            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('user.profile')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>                
        <!-- ./col -->
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{ isset($order_count) ? $order_count : 0 }}</h3>
              <p>MY ORDERS</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatboxes"></i>
            </div>
            <a href="{{ route('user.myOrders')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>                
        <!-- ./col -->
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ Auth::check() ? (App\Order::where('user_id', Auth::user()->id) ? App\Wishlist::where('user_id', Auth::user()->id)->count() : 0 ) : 0 }}</h3>

              <p>Wishlist Items</p>
            </div>
            <div class="icon">
              <i class="ion ion-star"></i>
            </div>
            <a href="{{ route('user.myWishlist')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>                
        <!-- ./col -->
        <!-- <div class="col-lg-2 col-xs-4"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-purple">
            <div class="inner">
              <h3>15</h3>

              <p>New Messages</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>               -->  
        <!-- ./col -->
        <div class="col-lg-2 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>15</h3>

              <p>New Messages</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>                
        <!-- ./col -->
        <!-- <div class="col-lg-2 col-xs-3"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-green">
            <div class="inner">
              <h3>15</h3>

              <p>New Messages</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatboxes"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>           -->      
        <!-- ./col -->

      </div>
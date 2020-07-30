
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="single-widget">
              <h2><a href="{{ route('shop.shopProducts')}}"><img style="max-width: 150px;" src="{{ asset('img/footer_logo.png')}}"></a></h2>
             <ul class="nav nav-pills nav-stacked">
               <li>Euro Home</li>
             </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="single-widget">
              <h2>My account</h2>
              <ul class="nav nav-pills nav-stacked">
                        <li><a  href="{{ route('shop.shopProducts')}}">My profile</a></li>
        <li><a  >Compare page</a></li>
        <li><a  >Wishlist page</a></li>
                  </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="single-widget">
              <h2>About us</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Address: 123st - abc - xyz</a></li>
                <li><a href="#">Hot line: Support: 0987654321</a></li>
                <li><a href="#">Email: info@Euro Home.com</a></li>
            </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="single-widget">
              <h2>Subscribe</h2>
              <form action="" method="post" class="searchform">
                <input type="hidden" name="_token" value="RAUUX5aaYo2tCerlvYYSdBUHOchbW14lCfgpMZlk">
                <input type="email" name="subscribe_email" required="required" placeholder="Your email">
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p>Get the most recent updates from us</p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2018 <a href="https://s-cart.org">Euro Home</a> Inc. All rights reserved.</p>
          <p class="pull-right">Hosted by  <span><a target="_blank" href="">Euro Home</a></span></p>
           
        </div>
      </div>
    </div>
  </footer>
<!--//Footer-->
@include('pages.header')
<!--/header-->
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

<!--Module banner -->
           <section id="slider"><!--slider-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
      
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" width="100%" src="{{ asset('img/products/banner1.jpg')}}"  alt="First slide">
            <div class="container">
              
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" width="100%" src="{{ asset('img/products/banner2.jpg')}}" alt="Second slide">
            <div class="container">
             
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" width="100%" src="{{ asset('img/products/banner3.jpg')}}" alt="Third slide">
            <div class="container">
              
            </div>
          </div>
          <div class="carousel-item">
            <img class="fourth-slide" width="100%" src="{{ asset('img/products/banner4.jpg')}}" alt="fourth slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="fa fa-4x fa-chevron-circle-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="fa fa-4x fa-chevron-circle-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

          
        </div>
      </div>
    </div>
  </section><!--/slider-->
                                      <!--//Module banner -->


<!--Module top -->


<!--//Module top -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12" id="breadcrumb">
          <!--breadcrumb-->
                    <!--//breadcrumb-->

          <!--//fillter-->
                    <!--//fillter-->
        </div>

        <!--body-->
<!--main left-->

<!-- shopSidebar -->

<!--//main left-->



<!--main right-->
<div class="col-md-12 padding-right">

  @yield('content')

</div>
<!--//main right-->


          <!--Module right -->
  <!--//Module right -->
                <!--//body-->

      </div>
    </div>
  </section>

<!--Footer-->

<!--Module top footer -->
  <!--//Module top footer -->

@include('pages.footer')  
<!--//Footer-->

@include('pages.jsScript')  

<!--message-->
            <!--//message-->


<!--Module bottom -->
  <!--//Module bottom -->
    <div id="loading">
          <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
   </div>
</body>
</html>

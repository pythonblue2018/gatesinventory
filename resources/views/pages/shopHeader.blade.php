@include('pages.header')

<!--Module banner -->
          
<!--//Module banner -->


  <section>
    <div class="container-fluid">
      <div class="row" >
        <div class="col-sm-12" id="breadcrumb" style="position: relative;">
          <!--breadcrumb-->
                    <!--//breadcrumb-->
            @yield('filter-form')

          <!--//fillter-->
                    <!--//fillter-->
        </div>

        <!--body-->


<!--main right-->
<div class="col-sm-12 padding-right">

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

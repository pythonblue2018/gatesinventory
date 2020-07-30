@include('pages.header')
<!--/header-->

<!--Module banner -->
<!--//Module banner -->


<!--Module top -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=934208239994473';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--//Module top -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12" id="breadcrumb">
          <!--breadcrumb-->
                    <!--//breadcrumb-->

  <!--//fillter-->
  <!--//fillter-->
  @yield('filter-form')
            
  <!--//fillter-->
        </div>

        <!--body-->
<!--main left-->

@include('pages.shopSidebar')

<!--//main left-->


<!--main right-->
<div class="col-sm-9 padding-right">

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

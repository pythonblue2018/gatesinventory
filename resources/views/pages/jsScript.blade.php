
<script src="{{ asset('templates/js/jquery.js')}}"></script>
<script src="{{ asset('templates/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('templates/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('templates/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('templates/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('templates/js/main.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>




    <script type="text/javascript">
      function formatNumber (num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
      }
      $('#shipping').change(function(){
          $('#total').html(formatNumber(parseInt(0)+ parseInt($('#shipping').val())));
      });
    </script>

    <script type="text/javascript">
        function addToCartAjax(id,instance = null){
        $.ajax({
            url: "",
            type: "POST",
            dataType: "JSON",
            data: {"id": id,"instance":instance, "_token":"RAUUX5aaYo2tCerlvYYSdBUHOchbW14lCfgpMZlk"},
            async: false,
            success: function(data){
              // console.log(data);
                error= parseInt(data.error);
                if(error ==0)
                {
                  setTimeout(function () {
                    if(data.instance =='default'){
                      $('.shopping-cart').html(data.count_cart);
                    }else{
                      $('.shopping-'+data.instance).html(data.count_cart);
                    }
                  }, 1000);

                    $.notify({
                      icon: 'glyphicon glyphicon-star',
                      message: data.msg
                    },{
                      type: 'success'
                    });
                }else{
                  if(data.redirect){
                    window.location.replace(data.redirect);
                    return;
                  }
                  $.notify({
                  icon: 'glyphicon glyphicon-warning-sign',
                    message: data.msg
                  },{
                    type: 'danger'
                  });
                }

                }
        });
    }
</script>

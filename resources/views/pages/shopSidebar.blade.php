
<!--main left-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
  function categoryFunction($id) {
    $.ajax({  
               type:'POST',
               url:"/shopProductsByCat",
               data: {_token: "{{ csrf_token() }}", id: $id },
               
               success:function(data) {
                  console.log("cat click",data);
                  document.getElementById("product_sort").innerHTML = data;
              }
    });          
  }
  function brandFunction($id) {
      $.ajax({  
                type:'POST',
                url:"/shopProductsByBrand",
                data: {_token: "{{ csrf_token() }}", id: $id },
                
                success:function(data) {
                    console.log("brand click",data);
                    document.getElementById("product_sort").innerHTML = data;
                }
      });          
  }
</script>

<div class="col-sm-3">
<div class="left-sidebar">    <!--Module left -->              

<h2>Categories</h2>
<div class="panel-group category-products" id="accordian">

@if(isset ($categories))
  @foreach($categories as $category)
  <div class="panel panel-default">
  <div class="panel-heading">
  <h4 class="panel-title">
  <a data-toggle="collapse" data-parent="#accordian" href="#{{ $loop->index }}">
  <span class="badge pull-right"><i class="fa fa-plus"></i></span>
  </a>
  <a onClick="categoryFunction({{$category->id}})" >{{$category->name}}</a>
  </h4>
  </div>
  <div id="{{ $loop->index }}" class="panel-collapse collapse">
  <div class="panel-body">
  <ul>
      @foreach($categoriesSub as $sub)
          @if ($sub->parent_id == $category->id)
          <li>
            <i class="fa fa-minus"></i>
            <a onClick="categoryFunction({{$sub->id}})" >{{$sub->name}}</a>
          </li>
          @endif
      @endforeach
  </ul>
  </div>
  </div>
  </div>
  @endforeach
@endif

</div>                                           

<div class="brands_products"><!--brands_products-->
                <h2>Brands</h2>
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
               @if(isset ($brands))
                @foreach($brands as $brand)
                  <li><a onClick="brandFunction({{$brand->id}})"> {{ $brand->name }} </a></li>
                  @endforeach
                @endif  
              </ul>
          </div>
</div><!--/brands_products-->

  <div class="brands_products"><!--product special-->
      <h2>Special products</h2>
      <div class="products-name">
        <ul class="nav nav-pills nav-stacked">
        <li>
          <div class="product-image-wrapper product-single">
            <div class="single-products product-box-0">
            <div class="productinfo text-center">
            <a >
            <img src="{{ asset('img/products/img-1.jpg')}}" alt="Easy Polo Black Edition 1" /></a>
            <span class="new-price">$5,000</span><span class="old-price">$15,000</span>
            <a ><p>Easy Polo Black Edition 1</p></a>
            </div>
            <img src="{{ asset('img/products/sale.png')}}" class="new" alt="" />
            </div>
            </div>
       </li>
      </ul>
    </div>
      </div><!--/product special-->                                                                                                                                          <div class="last_view_product"><!--last_view_product-->
      <h2>Products recently viewed</h2>
      <div class="products-lasView">
        <ul class="nav nav-pills nav-stacked">
          <li>
              <div class="row">
                <div class="col-xs-4"><a><img src="{{ asset('img/products/img-1.jpg')}}" alt="Easy Polo Black Edition 1" /></a></div>
                <div class="col-xs-8"><a>Easy Polo Black Edition 1</a><span class="last-view">(2019-09-30 15:04:51)</span></div>
              </div>
          </li>
        </ul>
      </div>
    </div><!--/last_view_product-->
      <!--//Module left -->
      </div>
    </div>
<!--//main left-->

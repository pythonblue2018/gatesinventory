@extends('pages.shopHeader')

@section('filter-form')
<!--breadcrumb-->
<div class="breadcrumbs">
<ol class="breadcrumb">
<li><a href="">Home</a></li>
<li class="active">Products > Product Details</li>
</ol>
</div>

<!--//breadcrumb-->

@endsection

@section('content')
<style type="text/css">
  /* Style the tab */
.tab {
  overflow: hidden;
  /*border: 1px solid #ccc;*/
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #11324b;
  color: white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  /*border: 1px solid #ccc;*/
  border-top: none;
}
.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
  min-height: 200px;  
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>

<script type="text/javascript" src="{{ asset('js/ajaxFunction.js')}}"></script>

<section>
<div class="container">

<div class="product-details"><!--product-details-->
<div class="row">

  <div class="col-md-6">

<div id="product-detail-image" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<div class="view-product item active"  data-slide-number="0">  
<img src="{{ asset('img/'.$product->image)}}" alt="" id="productImage"></div>

@if($product->image2 !== null)
 <div class="view-product item"  data-slide-number="1">
<img src="{{ asset('img/'.$product->image2)}}" alt="" id="productImage2">
</div>
@endif

@if($product->image3 !== null)
<div class="view-product item"  data-slide-number="2">
<img src="{{ asset('img/'.$product->image3)}}" alt="" id="productImage3">
</div>
@endif

@if($product->image4 !== null)
<div class="view-product item"  data-slide-number="3">
<img src="{{ asset('img/'.$product->image4)}}" alt="" id="productImage4">
</div>
@endif

</div>

 <div style="text-align: center;">
<img src="{{ asset('img/'.$product->image)}}" alt="" height="80px" style="border:1px solid;border-color: #b2b2b2;" onclick="showImage(this)" >
<img src="{{ asset('img/'.$product->image2)}}" alt="" height="80px" style="border:1px solid;border-color: #b2b2b2;" onclick="showImage(this)" >
<img src="{{ asset('img/'.$product->image3)}}" alt="" height="80px" style="border:1px solid;border-color: #b2b2b2;" onclick="showImage(this)" >
<img src="{{ asset('img/'.$product->image4)}}" alt="" height="80px" style="border:1px solid;border-color: #b2b2b2;" onclick="showImage(this)" >

</div>
</div>
                          <!-- Controls -->
            <a class="left item-control" style="display: inherit;" href="#product-detail-image" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#product-detail-image" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a></div>       
          
            <div class="col-sm-6">
              <div class="product-information"><!--/product-information-->
                
              <h2  id="product-detail-name">{{ $product->name }}</h2>
              <p>SKU: <span  id="product-detail-model">ALOKK1-AY</span></p>
              <p>{{$product->details}}</p>
              <div id="product-detail-price">
              <span class="new-price">${{$product->price}}</span>
              </div>              
              <span>


<div class="row" style="display:inline-flex; margin-bottom: 5px;">        
  <label >Quantity:</label>
  <span class="input-group-btn first qtyminus" id="qtyminus">
  @if ($cart_item_qty > 0)           
  <a href="{{ route('cart.removeFromCart',    ['id'=>$product->id]) }}">
  <button class="btn btn-defualt" type="button">-</button></a> 
  @endif     
  </span>      
    <span class="input-group-btn last qtyplus">  
     <input style="width: 50px;" type="text" readonly name="quantity" id="quantity" value="{{ $cart_item_qty }}" min="1" max="10"> 
     </span>          
  <span class="input-group-btn last qtyplus">  
  @if ($cart_item_qty == 0)   
  <button onClick="ajaxAddToCart({{$product->id}})" class="btn btn-fefault cart">
       <span id="cart_plus"><i class="fa fa-shopping-cart"></i>Add to cart</span>
  </button>
  @elseif($cart_item_qty > 0) 
  <button onClick="ajaxAddToCart({{$product->id}})" class="btn btn-fefault cart">
        <span id="cart_plus">+</span>
  </button>
  @endif
  </a>            
  </span>  
</div>              
      
      <!-- <form action="{{ route('cart.getAddToCart', ['id'=>$product->id ]) }}" method="POST">


      {{ csrf_field() }} -->
      <!-- <button type="submit" class="btn btn-warning btn-block text-center">Add to Cart</button> -->
      
       <!-- </form>                -->

      <p style="color: green;">@if ($cart_item_qty > 0) In your Cart @endif</p>
    </span>
<div  id="product-detail-attr">
  <br>



<br>
  <b>Availability:</b>
  <span id="product-detail-available">
      {{ $product->quantity }} In stock
   </span>
  <br>
  <b>Brand:</b> <span id="product-detail-brand">
    @php 
     $brand = App\Brand::where('id',$product->brand)->first();
    @endphp
    {{ $brand->name }}</span><br>

              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
       </div>
<!-- Tab links -->
<div class="col-sm-12" style="margin-top: 40px;">
  <div class="tab nav-tab" style="background: ghostwhite; border-radius: 2px;">
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Description</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">Specification</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Details</button>
  </div>

  <!-- Tab content -->
  <div id="London" class="tabcontent" style="margin-top: 20px;">
    <p>{{$product->details}}</p>
    <p>London Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>

  <div id="Paris" class="tabcontent" style="margin-top: 20px;">
    <p>{{$product->details}}</p>
    <p>
      <ul class="specification-category">
          <li class="specification-item"><span class="units">Type of Dishwashers</span><span class="dimension">Built-in </span></li>
          <li class="specification-item"><span class="units">Place settings</span><span class="dimension">13 </span></li>
          <li class="specification-item"><span class="units">Drying system</span><span class="dimension">Residual Heat Drying </span></li>
          <li class="specification-item"><span class="units">Number of spray arms</span><span class="dimension">2 (Upper and Lower arm) </span></li>
          <li class="specification-item"><span class="units">Door panel minimum height</span><span class="dimension">645 mm</span></li>
          <li class="specification-item"><span class="units">Door panel maximum height</span><span class="dimension">720 mm</span></li>
          <li class="specification-item"><span class="units">Plinth height minimum</span><span class="dimension">100 mm</span></li>
          <li class="specification-item"><span class="units">Plinth height maximum</span><span class="dimension">230 mm</span></li>
      </ul>
    </p>
  </div>

  <div id="Tokyo" class="tabcontent" style="margin-top: 20px;">
    <p>Tokyo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
</div>


<!--recommended_items-->
<div class="col-sm-12 recommended_items" style="margin-top: 30px;">
  <h2 class="title text-center">Recommended items</h2>

  <div id="recommended-item-carousel" class="carousel slide">
    <div class="carousel-inner">
    <div class="item active">
                           <div class="row">       
@foreach($products as $productR)            

    <div class="col-sm-3">
    <div class="product-image-wrapper product-single">
    <div class="single-products   product-box-12">
    <div class="productinfo text-center">
    <a href="{{ route('shop.shopProductView',['id' => $productR->id ])}}"><img src="{{ asset('img/'.$productR->image)}}" width="80%" alt="Easy Polo Black Edition 12" /></a>
    <span class="new-price">${{$productR->price}}</span>
    <a href="{{ route('shop.shopProductView',['id' => $productR->id ])}}"><p>{{$productR->name}}</p></a>
    </div>
    </div>
    </div>
    </div>
@endforeach
</div>
 </div>
  </div>
</div><!--/recommended_items-->
</div>
</section>
<br>
<!--//main right-->
<script type="text/javascript">

  // function ajaxAddToCart(id){
 
  //   var product_id = id;
  //   // console.log(product_id);

  //   $.ajax({
  //          type:'POST',
  //          url:'/ajaxAddToCart',
  //          data:{ _token: "{{ csrf_token() }}", id: product_id },

  //          success:function(data){
  //             console.log(data);
  //             document.getElementById("cart_quantity").innerHTML = data['cart_qty'];
  //             document.getElementById("quantity").value = data['item_qty'];  // value
  //             document.getElementById("qtyminus").innerHTML = 
  //              ` <a href="{{ route('cart.removeFromCart', ['id'=>$product->id]) }}">
  //               <button class="btn btn-defualt" type="button">-</button></a> `;

  //             document.getElementById("header_cart_quantity").innerHTML = 
  //             `<button type="button" class="btn btn-success btn-rounded btn-icon">`+data['cart_qty']+`</button>`;

  //             // if((data['coupon_amount'] + data['total_price']) > 0){
  //             //  document.getElementById("coupon_value").innerHTML = '$'+ data['coupon_amount'];
  //             // }
  //          }
  //       });
  // }


  function showImage(element){

    var image = $(element).attr('src')
    console.log(image);
    document.getElementById('productImage').src= image; 
    document.getElementById('productImage2').src= image; 
  
  }
document.getElementById("defaultOpen").click();

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

@endsection

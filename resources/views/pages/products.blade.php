@extends('layouts.royalbase')
@section('content')

 <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Products</h4>
                </div>
                <div>
                    <a href="{{route('admin.addNewProduct')}}"><button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add New Product</button></a>
                </div>
              </div>
            </div>
          </div>

 <style type="text/css">
  .table th, .table td{
     padding: 10px 5px;
     overflow: hidden;
  }
</style>     

   <div class="row">
      <div class="col-12 grid-margin stretch-card">
      <form class="form-inline form-validate" enctype="multipart/form-data" method="get" action="{{ route('admin.productsCat')}}">
        <div class="form-group">
        <h5 style="font-weight: bold; padding:0px 5px; ">Filter By <!-- Category/Products: --></h5>
        </div>
        <div class="form-group m-2" style="min-width: 220px;">
        <select class="form-control" name="categories_id" style="width: 100%">

        <option value="100">Select Category</option>
        <option value="100"><a href="/products"> All </a></option>

        @foreach($categories as $category)

        <option value="{{$category->id}}" {{ ($catName == $category->name) ? 'selected' : '' }} > {{$category->name}}</option>
        
        @endforeach  

        </select>
        </div>
       <!--  <div class="form-group">
        <input type="text" name="product" class="form-control" id="exampleInputPassword3" placeholder="Products">
        </div> -->
        <button type="submit" class="btn btn-success m-2">Submit</button>
        <!-- <a href="#" class="btn btn-danger">Clear Search</a> -->
      </form>
      </div>    

      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped" style="width:100%; ">
           
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Product Details</th>
                      <th>Added/Last Modified Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
    @foreach($products as $product)
        <tr>
        <td>{{ $product->id }}</td>
        <td><img src="{{ asset('img/'.$product->image)}}" alt=""></td>
        <td width="45%">
          <strong><a href="{{ route('admin.productView',['id' => $product->id ])}}" >{{ $product->name }}</a> </strong><br>
            
            Details:  {{ $product->details }}<br>
            Manufacturer:  Home Textile<br>
            Price: $ {{ $product->price }} <br>
            in Stock:   {{ $product->quantity }}<br>
            Viewed:   {{ $product->view }} <br>                                        </td>
        <td>
          Added Date: {{ $product->created_at }}<br>
          Modified Date:  {{ $product->created_at }}
        </td>
       
        <td width="16%">
        <ul class="nav table-nav">
            <li class="dropdown" style="display: inline-flex; align-content: : center;">

      <a href="{{ route('admin.editProduct',['id' => $product->id ])}}"style="color: green; margin-right: 10px;"><i class="fa fa-edit fa-2x" ></i></a>
      <a href="#" style="color: red;"><i class="fa fa-trash fa-2x" ></i></a>

            </li>
            
        </ul>
        </td>
    </tr>
    @endforeach

       
                  </tbody>
                </table>
<div style="text-align: center;">
  {{ $products->links() }}
</div>  

              </div>
              
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
</div>
@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

<script type="text/javascript">
//delete Modal
  $(document).on('click', '#deleteProductId', function(){
    var products_id = $(this).attr('products_id');
    $('#products_id').val(products_id);
    $("#deleteproductmodal").modal('show');
  });
  
</script>
@endsection
@extends('layouts.royalbase')

@section('content')
 <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Brands</h4>
                </div>
                <div>
                  <a href="#">
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Brand
                    </button></a>
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
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped" style="width:100%; ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Category Details</th>
                      <th>Added/Last Modified Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
    @foreach($brands as $category)
        <tr>
        <td>{{ $category->id }}</td>
        <td><img src="{{ asset('img/products/'.$category->image)}}" alt="" width=" 100px" height="100px"></td>
        <td width="45%">
          <strong>Category: {{ $category->name }}</strong><br>            
            <strong>Details: </strong> {{ $category->details }}<br>
            <strong>Manufacturer: </strong> Electrolux<br>
        </td>
        <td>
          <strong>Added Date: </strong> {{ $category->created_at }}<br>
          <strong>Modified Date: </strong> {{ $category->created_at }}
        </td>
       
        <td width="16%">                

                <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('admin.categoryEdit',['id' => $category->id ])}}" class="badge bg-light-blue"><i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                </a>
            
               <a data-toggle="tooltip" data-placement="bottom" title="Delete Order" id="deleteProductId" class="badge bg-red">                
                <i class="fa fa-2x fa-trash" style="color: red;" aria-hidden="true"></i>
                </a>
        </td>
    </tr>
    @endforeach


       
                  </tbody>
                </table>               
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
   
@endsection

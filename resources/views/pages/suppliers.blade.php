@extends('layouts.royalbase')

@section('extra-js')
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
@endsection

@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Suppliers</h4>
                </div>
                <div>
                    <a href="#"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Supplier
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
  <div class="col-12 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped" id="example1" style="width:100%; ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Details</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                   <tbody>

    @foreach($suppliers as $customer)
        <tr onClick="myFunction({{$customer->id}})">
        <td>{{ $customer->id }}</td>
        <td><img src="{{ asset('img/blog1.png')}}" alt="" width=" 100px" height="100px"></td>
        <td width="45%"><a href="{{ route('customer.view', ['id' => $customer->id ]) }}">
          <strong>Name: </strong> {{ $customer->name }} <br>
          <strong>Company: </strong> {{ $customer->company }} <br>
          <strong>Details: </strong> {{ $customer->details }} <br>
          </a>
        </td>
        <td>
          <strong>{{ $customer->company }}</strong> <br>
          {{ $customer->address }}<br>
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

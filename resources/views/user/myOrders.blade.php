@extends('pages.shopHeader')
@section('filter-form')
<!--breadcrumb-->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">My Orders</li>
        </ol>
      </div>
          <!--//breadcrumb-->
@endsection

@section('content')
        <!-- Main content -->

@include('user.account_sidebar')
<!-- Page content -->

    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col"style="width:140px;">Order Date</th>
            <th scope="col">Cust Name</th>
            <th scope="col">Post Code</th>
            <th scope="col">Address</th>
            <th scope="col">Order Total</th>
            <th scope="col">Status </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
         <tbody>
        @foreach($orders as $order)
          <tr>             
            <td>ODR-{{ $order->id }}</td>
            <td style="width: 100px;">{{ $order->created_at }}</td>                       
            <td>{{ $order->name }} Armican</td>
            <td>{{ $order->post_code}}</td>
            <td>{{ $order->address }}</td> 
            <td style="text-align:right;width: 70px;">${{$order->total_price}} </td>
            
    @if($order->order_status=='Delivered')
    <td style="text-align:center;"><span class="label label-success">{{$order->order_status}}</span>
    </td>
    @elseif($order->order_status=='InTransit')
    <td style="text-align:center;"><span class="label label-warning" >{{$order->order_status}}</span>
    </td>
    @elseif($order->order_status=='New Order')
    <td style="text-align:center;"><span class="label label-primary" >{{$order->order_status}}</span>
    </td>
    @else
    <td style="text-align:center;"><span class="label label-danger">{{$order->order_status}}</span>
    </td>
    @endif

    <td>
      <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('order.view', ['id' => $order->id ]) }}" class="badge bg-green"><i class="fa fa-view" aria-hidden="true"></i>View</a>
     
     </td>
         
        </tr>
       @endforeach
       </tbody>
      </table>
      <div class="col-md-12 text-right">                  
      </div>
    </div>
  </div>          
@endsection

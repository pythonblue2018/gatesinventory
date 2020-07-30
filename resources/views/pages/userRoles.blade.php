@extends('layouts.royalbase')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">User Roles</h4>
                </div>
                <div>
                    <a href="{{route('admin.userRoles')}}"> <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add user
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
                      <th>Personal Details</th>
                      <th>Admin Permission</th>
                      <th style="width:19%;">Action</th>
                    </tr>
                  </thead>
                   <tbody>
    @foreach($users as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td><img src="{{ asset('img/'.$user->image)}}" alt="" width=" 100px" height="100px"></td>
        <td width="45%">
          <strong>user name: </strong> {{ $user->name }} <br>
          <strong>Email: </strong> {{ $user->email }} <br><br>
          <strong>Created: </strong> {{ $user->created_at }} <br>
          <strong>Updated: </strong> {{ $user->updated_at }} <br>
        </td>
        <td>
          <form method="POST" action="{{route('admin.postUserRoles',['id' => $user->id ]) }}">
         <select class="form-control field-validate prodcust-type" name="user_type">
          <option value="0" {{ ($user->admin == 0) ? 'selected' : '' }}>Basic</option>
          <option value="1" {{ ($user->admin == 1) ? 'selected' : '' }}>Moderate</option>
          <option value="2" {{ ($user->admin == 2) ? 'selected' : '' }}>Advance</option>
         </select>
         <br>
         <div class="mx-auto" align="center">
          {{ csrf_field() }}
          <p>
          <button type="submit" style="width: 98%;border: grey;" class="btn btn-danger text-right">Update</button></p>
        </div>
        </form>  
        </td>       
        <td>
        <ul class="nav table-nav">
          <li class="dropdown">
            <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('order.view', ['id' => $user->id ]) }}" class="badge bg-light-blue"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>

                <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="{{ route('order.view', ['id' => $user->id ]) }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
          </li>
        </ul>
        </td>
    </tr>
    @endforeach
                  </tbody>
                </table>
                
                <div class="col-xs-12 text-right">
                  <ul class="pagination">
        
                    <li class="disabled"><span>&laquo;</span></li>
                     <li class="active"><span>1</span></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                                          
                    <li><a href="" rel="next">&raquo;</a></li>
            </ul>

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

@extends('layouts.royalbase')
@section('extra-css')
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
@endsection
@section('content')

<div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Edit Category</h4>
            </div>
            <div>
                <a href="{{route('admin.addNewProduct')}}"><button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-clipboard btn-icon-prepend"></i>Add New Category</button></a>
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
<!-- FORM -->
<form method="POST" action="{{route('admin.categoryEdit',['id' => $category->id ])}}" >
    
    <div class="form-group col-md-12" style="min-width: 220px">
        <label for="name">For Sub-Category Select a Category</label>
      <select class="form-control" name="categories_id" style="width: 245px;">
        <option value="0">Select Category</option>
        @foreach($categories as $cat)
          @if($cat->parent_id == 0)
          <option value="{{$cat->id}}" 
            {{ ($catName == $cat->name) ? 'selected' : '' }} > {{$cat->name}}
          </option>
          @endif  
        @endforeach  
      </select>
    </div>
        
    <div class="col-md-4 form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Category Name" value="{{ $category->name }}" required >
        <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
    </div>
    <div class="col-md-12 form-group">
        <label for="details">Category Details</label>        
        <input type="text" name="details" class="form-control" id="details" value="{{ $category->details }}">
    </div>
    <hr style="border-color: #c2c2c2;">

    <div class="mx-auto">
      {{ csrf_field() }}
          <p>
          <button type="submit" class="btn btn-primary text-right">Submit</button></p>
    </div>            
</form>

</div>
<!-- End row  -->
</div>
</div>
</div>
</div>
@endsection


<select class="form-control pull-left" id="product" name="product" style="width: 245px;">
    <option value="0">Select Product</option>

    @foreach($products as $product)
        <option value="{{ $product->id }}"> {{$product->name}} : ${{$product->price}}</option>
    @endforeach    

</select>
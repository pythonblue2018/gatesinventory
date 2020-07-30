


<select class="form-control pull-left" id="product" name="product">
            <option value="1">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}"> {{ $product->name }}</option>
            @endforeach  
 </select>
@extends('Admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <h3>Edit product</h3>
                </div>
                <div class="col-md-6">
                    <div class="pull-right"><a class="btn btn-primary" href={{ url('/products') }}>Back</a></div>
                </div>

            </div>
        </div>

        <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <strong>Name Product</strong>
                <input type="text" name="name" value="{{$product->name}}" placeholder="enter name product">
            </div>
           <div class="form-group">
                <strong>description</strong>
                <input type="description" name="desc" value="{{$product->desc}}" placeholder="enter describle product">
            </div>
                <div class ="form-group">
                    <strong>Price</strong>
                    <input type="text" name="price" value="{{$product->price}}" placeholder="enter price">
                </div>
        </div>


          <div class="col-md-6">
                    <div class="form-group">
                        <strong>ImgURL:</strong>
                        <input type="file" name="ImgURL"  placeholder="enter ImgURL">
                        <td><img src="/ImgURL/{{$product->ImgURL}}" width="200px"></td>
                    </div>

                <div class="form-group">
                    <strong>Brand</strong>
                    <input type="text" name="brand" value="{{$product->brand}}" placeholder="enter brand product">
                </div>

                    <div class="form-group">
                        <strong>Status:</strong>
                        <input type="text" name="status" value="{{$product->status}}" placeholder="enter status">
                    </div>

                        <div class="form-group">
                            <strong>Select Category:</strong>
                            <select name="category_id">
                                @foreach ($categories as $item)
                                  <option @selected($item->id == $product->category_id) 
                                     value="{{$item->id}}">{{$item->name}}</option>  
                                @endforeach
                            </select>
                        </div>

                   </div>
              </div>
           <button type="submit" class="btn btn-success mt-2">Update</button>
      </form>
    </div>
 </div>
</div>    
@endsection
@extends('Admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <h3>Create product</h3>
                </div>
                
                <div class="col-md-6">
                    <div class="pull-right"><a class="btn btn-primary" href={{ url('/products') }}>Back</a></div>
                </div>

            </div>
        </div>

        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <form action="{{url('products')}}" method="POST">
                    {!! csrf_field() !!} --}}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <strong>Name Product</strong>
                <input type="text" name="name" class="form-control" placeholder="enter name product">
            </div>
           <div class="form-group">
                <strong>description</strong>
                <input type="description" name="desc" class="form-control" placeholder="enter describle product">
            </div>
                <div class ="form-group">
                    <strong>Price</strong>
                    <input type="text" name="price" class="form-control" placeholder="enter price">
                </div>
        </div>


          <div class="col-md-6">
                    <div class="form-group">
                        <strong>ImgURL:</strong>
                        <input type="file" name="ImgURL" class="form-control" placeholder="enter ImgURL">
                    </div>

                <div class="form-group">
                    <strong>Brand</strong>
                    <input type="text" name="brand" class="form-control" placeholder="enter brand product">
                </div>

                    <div class="form-group">
                        <strong>Status:</strong>
                        <input type="text" name="status" class="form-control" placeholder="enter status">
                    </div>

                        <div class="form-group">
                            <strong>Select Category:</strong>
                            <select name="category_id">
                                @foreach ($categories as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>  
                                @endforeach
                            </select>
                        </div>

                   </div>
              </div>
           <button type="submit" class="btn btn-success mt-2">Submit</button>
      </form>
    </div>
 </div>
</div>    
@endsection
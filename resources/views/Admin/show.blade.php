@extends('Admin.layout')
@section('content')
    <div class="row">
        <div class="pull-right"><a class="btn btn-primary" href={{ url('/products') }}>Back</a></div>
        
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{-- <input type="text" name="title" value="{{old('title')}}"  placeholder="Title"/> --}}
                {{ $product->name }}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>description:</strong>
                {{ $product->desc }}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Select Category:</strong>

                {{ $product->category->name }}
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Brand:</strong>
                {{ $product->brand }}
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $product->status}}
            </div>
        </div>
 
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Image:</strong>
               <img src="/ImgURLs/{{$product->ImgURL}}" width="200px">
            </div>
        </div>


    </div>
@endsection
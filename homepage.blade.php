
@extends('home.layout1')
    
@section('content')
     
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                <td><img src="/ImgURLs/{{$product->ImgURL}}" width="200px"></td>
                <div class="caption">
                    <h4>{{ $product->name}}</h4>
                    <p>{{ $product->desc}}</p>
                    <p><strong>Price: </strong> ${{ $product->price }}</p>
                    <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection
@extends('Admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                     <div class="col-md-6">
                        <h3>shop fashion</h3>
                     </div>
                     <div class="col-md-6">
                        <a class="btn btn-primary" href="{{route('products.create')}}">Create new product</a>
                     </div>
                </div>
            </div>

            <div class="card-body">
                @if (Session::has('msg'))
                  <div class="alert alert-success">
                    {{Session::get('msg')}}
                  </div>
                @endif

                <table class="table table bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name Product</th>
                            <th>Describle</th>
                            <th>Price</th>
                            <th>ImgURL</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Category</th>  

                            <th>Action</th>  
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $pr)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$pr->name}}</td>
                                <td>{{$pr->desc}}</td>
                                <td>{{$pr->price}}</td>
                                <td><img src="/ImgURLs/{{$pr->ImgURL}}" width="200px"></td>
                                <td>{{$pr->brand}}</td>
                                <td>{{$pr->status}}</td>
                                <td>{{$pr->category->name}}</td>
                                <td>
                                    <form action="{{route('products.destroy', $pr->id)}}" method="POST">
                                    <a class="btn btn-info" href="{{route('products.show',$pr->id)}}">Show</a>
                                    <a class="btn btn-info" href="{{route('products.edit',$pr->id)}}">Edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
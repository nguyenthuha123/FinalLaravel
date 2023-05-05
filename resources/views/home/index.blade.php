@extends('Admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                     <div class="col-md-6">
                        <h3>Page Order</h3>
                     </div>
                     <div class="col-md-6">
                        <a class="btn btn-primary" href="{{route('checkout.create')}}">Create new order</a>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Addess</th>
                            <th>Phone Number</th>
                            <th>Total price</th>
                            <th>UserID</th>

                            <th>Action</th>  
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $or)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$or->firstname}}</td>
                                <td>{{$or->lastname}}</td>
                                <td>{{$or->addess}}</td>
                                <td>{{$or->phonenumber}}</td>
                                <td>{{$or->Totalprice}}</td>
                                <td>{{$or->user_id->id}}</td>
                                <td>
                                    <form action="{{route('checkout.destroy', $or->id)}}" method="POST">
                                    <a class="btn btn-info" href="{{route('checkout.show',$pr->id)}}">Show Order</a>
                                    <a class="btn btn-info" href="{{route('checkout.edit',$pr->id)}}">Edit Order</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Delete Order</button>
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
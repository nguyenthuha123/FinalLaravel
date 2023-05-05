{{-- @extends('home.layout1')

@section('title')
CheckOut
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/store" method="POST" enctype="multipart/form-data">
                        {{-- @csrf --}}
                        {{-- {{csrf_field()}}
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="Enter Your First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter Your Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control"name="phonenumber" placeholder="Enter Your Phone Number">
                            </div>
                        </div> --}} 
{{-- 
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach (session('cart') as $id => $details)
                                
                                <tr>
                                    <td>{{ $details['name'] }}</td>
                                    <td data-th="Price">${{ $details['price'] }}</td>
                                    <td data-th="Quantity">{{ $details['quantity']}}</td>
                                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                    <td class="actions" data-th="">
                                    </td>
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                </tr>
                                    @endforeach
                                   
                            </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right"><h3><strong>Total ${{$total}} </strong></h3></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                                {{-- <form  action="{{url('messenger')}}"class="btn btn-success mt-2" > <button type ="submit" >Order Now</button></form> --}}
                                                {{-- <a href="{{ url('messenger') }}" class="btn btn-success"> Order Now</a> --}}
{{--                                                 
                                            </td>
                                        </tr>
                                    </tfoot>
                            </table> --}} 
                            {{-- <input type="submit" class="btn btn-success" value="CheckOut"/>
                        </form>
                     </div>
                </div>
            </div>
        </div>                             
    </div>
@endsection --}}
                                
@extends('home.layout1')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <h3>CheckOut</h3>
                </div>
                
                <div class="col-md-6">
                    <div class="pull-right"><a class="btn btn-primary" href={{ url('/checkout') }}>Back</a></div>
                </div>

            </div>
        </div>

        <div class="card-body">
            <form action="{{route('checkout.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <form action="{{url('products')}}" method="POST">
                    {!! csrf_field() !!} --}}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <strong>First Name</strong>
                <input type="text" name="firstname" class="form-control" placeholder="enter first name ">
            </div>
           <div class="form-group">
                <strong>Last Name</strong>
                <input type="text" name="lastname" class="form-control" placeholder="enter last name">
            </div>
                <div class ="form-group">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" placeholder="enter address">
                </div>
        </div>

          <div class="col-md-6">
                    <div class="form-group">
                        <strong>Phone number</strong>
                        <input type="text" name="phonenumber" class="form-control" placeholder="enter phone number">
                    </div>
        
        <div class="col-md-6">
                  <div class="form-group">
                       <strong>Total price</strong>
                        <input type="text" name="Totalprice" class="form-control" placeholder="enter phone number">
                 </div>
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">    
         </div>
              </div>
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach (session('cart') as $id => $details)
                    
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">{{ $details['quantity']}}</td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                        </td>
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    </tr>
                        @endforeach
                       
                </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right"><h3><strong>Total ${{$total}} </strong></h3></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                    {{-- <form  action="{{url('messenger')}}"class="btn btn-success mt-2" > <button type ="submit" >Order Now</button></form> --}}
                                    {{-- <a href="{{ url('messenger') }}" class="btn btn-success"> Order Now</a> --}}                                              
                                </td>
                            </tr>
                        </tfoot>
                </table> 
           <button type="submit" class="btn btn-success mt-2">Order Now</button>
      </form>
    </div>
 </div>
</div>    
@endsection    

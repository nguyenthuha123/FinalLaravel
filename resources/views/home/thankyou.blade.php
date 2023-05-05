@extends('home.layout1')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thank You') }}</div>

                    <div class="card-body">
                        <p>{{ __('Thank you for your order!') }}</p>
                        <p>{{ __('Your order has been placed and is being processed. We will send you an email confirmation shortly.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

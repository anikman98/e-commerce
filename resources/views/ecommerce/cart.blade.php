@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md">
                    <h1 class="display-4 mb-4">Cart items</h1>
                </div>
                <div class="col-md">
                    <a href="#"><button class="btn btn-lg btn-dark float-end" style="padding: 10px 50px">Checkout</button></a>
                </div>
            </div>
            <div class="row">
            @foreach($cartData as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="max-width: 300px">
                            <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/863/863684.png" alt={{$item->name}} style="height: 100px; width:100px; margin: auto">
                            <div class="card-body">
                                <h3 class="mt-4 mb-3">{{$item->name}}</h3>
                                <p>Price: ₹{{$item->price}}</p>
                                <div class="row">
                                    <div class="col-md">
                                        <p>Quantity: {{$item->quantity}}</p>
                                    </div>
                                    <div class="col-md">
                                        <div class="btn-group float-end" role="group">
                                            <a href={{route('cart.increase', $item->id)}}><button type="button" class="btn btn-sm btn-dark" style="border-top-right-radius: 0; border-bottom-right-radius: 0">+</button></a>
                                            &nbsp;
                                            <a href={{route('cart.decrease', $item->id)}}><button type="button" class="btn btn-sm btn-dark" style="border-top-left-radius: 0; border-bottom-left-radius: 0">-</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

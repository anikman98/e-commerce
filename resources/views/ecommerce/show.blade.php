@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/863/863684.png" alt={{$product->name}} style="margin: auto">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <h1 class="display-2">{{$product->name}}</h1>
            <h3 class="display-6 mt-3">Price: ₹{{$product->price}}</h3>
            <a href={{route('cart.add', $product->id)}}><button class="btn btn-primary btn-lg btn-dark mt-3">Add to cart</button></a>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="display-4">Products</h1>
            <div class="row">
            @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="max-width: 300px">
                            <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/863/863684.png" alt={{$product->name}} style="height: 100px; width:100px; margin: auto">
                            <div class="card-body">
                                <h3>{{$product->name}}</h3>
                                <div class="row">
                                    <div class="col-md">
                                        <p>Price: ₹{{$product->price}}</p>
                                    </div>
                                    <div class="col-md">
                                        <a href={{route('show', $product->id)}}><button class="btn btn-primary btn-dark float-end">Add to cart</button></a>
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
@extends('layouts.shop')

@section('content')

<div class="container">
    <a class="btn mb-3 btn-outline-dark" href="{{ route('products.index') }}">&lsaquo; Back</a>
    <h2 class="mb-3">Shopping Cart</h2>
    
    @if($products)
    <div class="row"> <?php $subtotal = 0; ?>
    @foreach($products as $product)
        <div class="col-12 col-lg-6">
            <div class="card bg-secondary mb-3">
                <div class="card-header mt-3 text-left">
                    <h3 class="text-light">{{$product->title}}</h3>
                </div>
                <div class="card-img">
                    <img src="{{ asset('storage/'. $product->imageName) }}" height="300px" width="100%">
                </div>
                <div class="card-body text-right">
                    <h4 class="text-light">Price: $<?php echo number_format($product->price, 2) ?></h4> <?php $subtotal += $product->price; ?>
                    <button class="btn btn-warning" onClick="removeFromCart({{$product->id}});">Remove From Cart</button>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <hr>
    <h2>Subtotal: $<?php echo number_format($subtotal, 2) ?></h2>
    <form action="{{ route('shop.checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
        <input type="submit" class="btn btn-lg btn-success text-white" value="Checkout">
    </form>
    @else
        <p class="text-center text-dark my-5">Your cart is empty, Go find some treasures!</p>
    @endif
</div>


@endsection
@extends('layouts.shop')

@section('content')
<div class="container">
    <a class="btn btn-outline-dark mb-3" href="{{ route('products.index') }}">&lsaquo; Back</a>
    <h2>{{ $product->title }} <?php if ($product->sold) { echo "<span class='text-red'>(SOLD)</span>";} ?></h2>
    <div class="row">
        <div class="col-12 col-lg-7 mb-3">
            <img class="rounded" src="{{ asset('storage/' . $product->imageName) }}" width="100%">
        </div>
        <div class="col-12 col-lg-5">
            <h3 class="text-primary">${{ $product->price }}</h3>
            <p>{{ $product->description }}</p>
            <button class="btn btn-dark" <?php if(in_array($product->id, $cart) || $product->sold == 1) { echo 'disabled';} ?> onclick=" addToCart({{$product->id}}, '../'); this.toggleAttribute('disabled'); this.innerHTML=cartIcon + ' In Cart'"><i class="foundicon-cart"></i><?php if(in_array($product->id, $cart)){?> In Cart<?php } else { ?> Add to Cart<?php } ?></button>
        </div>
    </div>
</div>
@endsection
@extends('layouts.shop')

@section('content')
<div class="container">
    <a class="btn btn-outline-dark mb-3" href="{{ route('products.index') }}">&lsaquo; Back</a>
    <h2>{{ $product->title }}</h2>
    <div class="row">
        <div class="col-12 col-lg-7 mb-3">
            <img class="rounded" src="{{ asset('img/products/' . $product->imageName) }}" width="100%">
        </div>
        <div class="col-12 col-lg-5">
            <h3 class="text-primary">${{ $product->price }}</h3>
            <p>{{ $product->description }}</p>
            <button class="btn btn-dark"><i class="foundicon-cart"></i> Add to Cart</button>
        </div>
    </div>
</div>
@endsection
@extends('layouts.shop')

@section('content')
<div class="container">
    <h2>{{ $product->title }}</h2>
    <div class="row">
        <div class="col-12 col-lg-7 mb-3">
            <img src="{{ asset('img/products/' . $product->imageName) }}" width="100%">
        </div>
        <div class="col-12 col-lg-5">
            <h3 class="text-primary">${{ $product->price }}</h3>
            <p>{{ $product->description }}</p>
            <a class="btn btn-dark"><i class="foundicon-cart"></i> Add to Cart</a>
        </div>
    </div>
</div>
@endsection
@extends('layouts.shop')
<!------------------ AVAILABLE VARIABLES  --------------->
<!-- 
    $products : Array of all products paginated in groups of 9, and ordered by however the user chooses
    $order : The order in which the products should be sorted, defaults to newest
 -->
@section('content')

<div class="container">
    <form class="ml-sm-4 mb-4 form-inline" id="orderForm">
        @csrf
        <label for="OrderBy">Order By:</label>
        <select class=" ml-sm-3 form-control" id="OrderBy" name='order'>
            <option <?php if($order == 'newest') { echo 'selected'; } ?> value="newest">Newest Arrivals</option>
            <option <?php if($order == 'alphabetical') { echo 'selected'; } ?> value="alphabetical">Name (Alphabetical)</option>
            <option <?php if($order == 'htl') { echo 'selected'; } ?> value="htl">Price: High to Low</option>
            <option <?php if($order == 'lth') { echo 'selected'; } ?> value="lth">Price: Low to High</option>
        </select>
    </form>
    {{$products->appends(['order' => $order])->links()}}
    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card mb-3 bg-primary text-light">
                <div class="card-header">{{$product->title}} <?php if ($product->sold) { echo "<span class='text-red'>(SOLD)</span>";} ?><span class="float-right">${{$product->price}}</span></div>
                <a class="text-decoration-none" href="{{ route('products.show', ['product' => $product->id]) }}">
                <div class="card-img py-1 bg-dark"><img class="rounded" src="{{ asset('img/products/'. $product->imageName) }}" width="100%"></div>
                </a>
                <div class="card-footer"><button class="btn btn-dark float-right" <?php if(in_array($product->id, $cart) || $product->sold == 1) { echo 'disabled';} ?> onclick=" addToCart({{$product->id}}); this.toggleAttribute('disabled'); this.innerHTML=cartIcon + ' In Cart'"><i class="foundicon-cart"></i><?php if(in_array($product->id, $cart)){?> In Cart<?php } else { ?> Add to Cart<?php } ?></button></div>
                
            </div>
        </div>    <!--<br>{{$product->price}}<br>{{$product->sold}}<br><br> -->
        @endforeach
    </div>
    {{$products->appends(['order' => $order])->links()}}
</div>

@endsection